<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Signup
    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()-> json([
            'message' => 'Successfuly created user!'
        ], 201);
    }

//Login method

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;
        if($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->acessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
    }
//Logout method

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'mesagge' => 'Successfully Logged Out'
        ]);
    }
//User method

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
