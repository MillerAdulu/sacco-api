<?php
  
  namespace App\Http\Controllers;
  
  use App\Http\Resources\UserResource;
  use App\User;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Hash;

  use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
  use RuntimeException;

  
  class LoginUserController extends Controller
  {
    public function login(Request $request)
    {      
      $user = User::where('email', $request->username)
        ->orWhere('phone_number', $request->username)->first();
      
      if (Hash::check($request->password, $user->password)) {
        return new UserResource(
          $user
        );
      }
      return null;
    }
    
    public function checkusername(Request $request) {

      Bugsnag::notifyException(new RuntimeException("Test error"));
      
      $user = User::where('email', $request->username)
        ->orWhere('phone_number', $request->username)->first();
      if(!$user) return null;
      return $user;
    }
  }
