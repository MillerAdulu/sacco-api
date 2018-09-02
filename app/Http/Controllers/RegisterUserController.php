<?php
  
  namespace App\Http\Controllers;
  
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Hash;
  use App\User;
  use App\Http\Resources\UserResource;
  
  class RegisterUserController extends Controller
  {
    public function register(Request $request) {
      $data = $request->all();
      
      $user = new User;
      $user->fill($data);
      $user->password = Hash::make($request->password);
      $user->save();
      
      return new UserResource(
        $user
      );
      
    }
  }
