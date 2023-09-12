<?php

namespace App\Http\Controllers\Servicios\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;
            return response()->json(['user' => Auth::user() ,'token' => $token], 200);
        }else{
            return response()->json(['message'=> 'Credenciales invalidas']);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
