<?php
  
  namespace App\Http\Controllers;
  
  use App\Http\Resources\UserResource;
  use App\User;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Hash;
  
  class LoginUserController extends Controller
  {
    public function login(Request $request)
    {
      $user = User::where('email', $request->username)
        ->orWhere('phone_number', $request->username)->first();
      
      if(!$user) return response()->json(['No such user!'], 200);
      
      if (Hash::check($request->password, $user->password)) {
        return new UserResource(
          $user
        );
      }
      return response()->json(['error' => "Wrong Password"], 200);
    }
  }
