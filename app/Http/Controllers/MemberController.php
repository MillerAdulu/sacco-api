<?php
  
  namespace App\Http\Controllers;
  
  use Illuminate\Support\Facades\Mail;
  use Illuminate\Support\Facades\Hash;
  use App\Http\Resources\MemberCollection;
  use App\Http\Resources\MemberResource;
  use App\Member;
  use App\Mail\AccountDetailsMail;
  use Illuminate\Http\Request;
  use App\Http\Requests\StoreMember;
  use App\Http\Requests\UpdateMember;
  
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
      $data = $request->all();

      $member = new Member();

      $member->fill($data);

      $member->save();

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
      $data = $request->all();

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

    public function registerPassword($member) {
      $member = Member::find($member);
      $password = str_random(8);
      $member->password = Hash::make($password);
      $member->save();

      $member->password = $password;

      Mail::to($member->email)->send(new AccountDetailsMail($member));
      
      return $member;
    }
  }
