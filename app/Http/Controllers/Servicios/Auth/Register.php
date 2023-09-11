<?php

namespace App\Http\Controllers\Servicios\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Register extends Controller
{
    public function register(Request $request){
        if($request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|confirmed|string|min:8',
        ]))
        {
                $user = new User([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);

                $user->save();

                return response()->json(['message' => 'Usuario registrado con éxito'], 201);
        }else{
            return response()->json(['message' => 'error'], 200);
        }
    }
}
