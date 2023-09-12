<?php

namespace App\Http\Controllers\Servicios\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GetUsers extends Controller
{
    public function getUsers(){
        $usuario=DB::select('call usuarios()');
        //return response()->json($usuario);
        return User::all();
    }
}
