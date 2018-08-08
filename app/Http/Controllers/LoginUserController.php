<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use JWTFactory;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginUserController extends Controller
{
    public function login(Request $request) {
        $user = User::where('email', $request->username)
        ->orWhere('phone_number', $request->username)->first();

        

        try {
            if(Hash::check($request->password, $user->password)) {
                return response()->json(JWTAuth::fromUser($user));
            }
            return response()->json(['error' => "Not Password"], 500);
        } catch (JWTException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
