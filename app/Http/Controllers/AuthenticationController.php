<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{

    public function register(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'username'=>'required',
            'password'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
        ]);

        $user = User::create([
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['access_token' => $token, 
                                 'token_type'   =>'Bearer', 
                                 'message'=>'User created successfully'], 201);
    }
    
    public function login(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json(['Bearer Token : '. $user->createToken('auth_token')->plainTextToken]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['logout berhasil']);
    }

    public function me(Request $request) {
        return response()->json(Auth::user());
    }
}
