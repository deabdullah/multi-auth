<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;




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
Route::middleware('auth:sanctum')->group( function () {

    Route::resource('products', ProductController::class);
    Route::resource('users', UserController::class);

});

Route::post('/admin/login', [LoginController::class, 'adminLogin']);//login for admin
Route::post('login', [LoginController::class, 'userLogin']);//login for user
Route::post('/admin/register', [RegisterController::class, 'createAdmin']);// register for admin
Route::post('/user/register', [RegisterController::class, 'createUser']);  // register for user

