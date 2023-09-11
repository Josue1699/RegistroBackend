<?php

namespace App\Http\Controllers\Servicios\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Logout extends Controller
{
    public function logout(Request $request){

        $request->user()->token()->revoke();
        
        return response()->json(['message' => 'Sesion Cerrada correctamente']);
    }
}
