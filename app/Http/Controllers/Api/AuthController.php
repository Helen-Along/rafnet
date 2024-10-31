<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)  {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $user = Auth::attempt($credentials);
        if($user){
           return response()->json(['token'=>Auth::user()->createToken($request->email)]); 
        }
        return response()->json(['error' => 'invalid user']);
    }

    public function register(Request $request) {
        $user = new User();
        $user->email= $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->username;

        $user->save();

        $user->assignRole('customer');

        return response()->json($user);
    }

    public function logout(Request $request)  {
        return response()->json(Auth::guard('sanctum')->user()->currentAccessToken()->delete());
    }

    public function user()  {
        return response()->json(Auth::guard('sanctum')->user());
    }
}