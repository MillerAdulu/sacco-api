<?php
  
  namespace App\Http\Controllers;
  
  use JD\Cloudder\Facades\Cloudder;
  use Illuminate\Support\Facades\Mail;
  use Illuminate\Support\Facades\Hash;
  use App\Http\Resources\MemberCollection;
  use App\Http\Resources\MemberResource;
  use App\Http\Resources\UserResource;
  use App\Member;
  use App\Mail\AccountDetailsMail;
  use Illuminate\Http\Request;
  use App\Http\Requests\StoreMember;
  use App\Http\Requests\UpdateMember;
  use App\User;
  
  class MemberController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\MemberCollection
     */
    public function index()
    {
      return new MemberCollection(
        MemberResource::collection(
          Member::latest()->get()
        )
      );
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMember  $request
     * @return \App\Http\Resources\MemberResource
     */
    public function store(StoreMember $request)
    {
      $data = $request->validated();
      
      $member = new Member();
      
      $member->fill($data);
      
      $member->save();
      
      $this->registerAccount($member->phone_number);
      
      return new MemberResource(
        $member
      );
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return new MemberResource(
        Member::findOrFail($id)
      );
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @return \App\Http\Resources\MemberResource
     */
    public function update(UpdateMember $request, $id)
    {
      $data = $request->validated();
      
      $member = Member::findOrFail($id);
      
      $member->fill($data);
      
      $member->password = Hash::make($request->password);
      
      $member->save();
      
      return new MemberResource(
        $member
      );
      
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      return Member::destroy($id);
    }

    public function uploadPassportPhoto(Request $request) {
      $this->validate($request,[
        'passport_photo' => 'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
      ]);

      $passport_photo = $request->file('passport_photo')->getRealPath();

      Cloudder::upload($passport_photo, null);

      list($width, $height) = getimagesize($passport_photo);

      $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height" => $height]);

      $member = Member::findOrFail($request->member_id);
      $member->passport_photo = $image_url;
      $member->save();

      return new MemberResource(
        $member
      );
    }
    
    public function registerAccount($member) {
      
      $user = User::where('email', $member)
        ->orWhere('phone_number', $member)
        ->first();
      
      if($user) {
        return response()
          ->json(['Error' => 'This user already exists']);
      }
      
      $saccoMember = Member::where('email', $member)
        ->orWhere('phone_number', $member)
        ->first();
      
      if(!$saccoMember) {
        return response()
          ->json(['Error' => 'This member doesn\'t exist']);
      }
      
      $newUserPassword = mt_rand(1000, 9999);
      
      $newUser = new User;
      $newUser->name = $saccoMember->last_name;
      $newUser->email = $saccoMember->email;
      $newUser->phone_number = $saccoMember->phone_number;
      $newUser->password = Hash::make($newUserPassword);
      $newUser->member_id = $saccoMember->member_id;
      $newUser->save();
      
      $saccoMember->password = $newUserPassword;
      
      Mail::to($saccoMember->email)->send(new AccountDetailsMail($saccoMember));
      
      return new UserResource(
        $newUser
      );
    }
    
    public function resetPassword(Request $request) {
      $member = $request->username;
      $resetPass =  User::where('email', $member)
        ->orWhere('phone_number', $member)
        ->first();
      
      if(!$resetPass) {
        return null;
      }
      
      $newUserPassword = mt_rand(0, 9999);
      
      $resetPass->password = Hash::make($newUserPassword);
      $resetPass->save();
      
      $member = Member::where('email', $member)
      ->orWhere('phone_number', $member)
      ->first();

      $member->password = $newUserPassword;
      
      Mail::to($resetPass->email)->send(new AccountDetailsMail($member));
      
      return new UserResource(
        $resetPass
      );
      
    }
  }
