<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/admin/login', [LoginController::class, 'adminLogin']);
Route::post('/user/login', [LoginController::class, 'userLogin']);
Route::post('/admin/register', [RegisterController::class, 'createAdmin']);
Route::post('/user/register', [RegisterController::class, 'createUser']);  

