<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Servicios\Auth\login;
use App\Http\Controllers\Servicios\Auth\Register;
use App\Http\Controllers\Servicios\Auth\Logout;
use App\Http\Controllers\Servicios\Users\GetUsers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->group(function(){
    Route::post('/user', [GetUsers::class, 'getUsers']);
    Route::post('/logout', [Logout::class,'logout']);
});
Route::post('/login', [login::class, 'login']);
Route::post('/register', [Register::class,'register']);


