<?php
  
  namespace App\Http\Controllers;
  
  use App\Http\Resources\UserResource;
  use App\User;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Hash;

  use Illuminate\Support\Facades\Auth; 
  use Validator;
  
  class LoginUserController extends Controller
  {
    public function login(Request $request)
    {    
      $user = User::where('email', $request->username)
        ->orWhere('phone_number', $request->username)->first();

      if(Auth::attempt(['email' => $user['email'], 'password' => $request->password])) {
        $authUser = Auth::user();
        return new UserResource(
          $authUser
        );
      }
      return null;
    }
    
    public function checkusername(Request $request) {
      
      $user = User::where('email', $request->username)
        ->orWhere('phone_number', $request->username)->first();
      if(!$user) return null;
      return $user;
    }
  }
