<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected function createAdmin(Request $request)
    {
    
        $validated = $request->validate
        ([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
        ]);//validation

        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);//creating user
   
        $token = $admin->createToken('multi-auth')->plainTextToken;//generating token
   
        return response()->json(['message' => 'Your account is created as Admin', 'token' => $token]);
    
    }

    protected function createUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',

        ]);//validation
        
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);//creating user

        $token = $user>createToken('multi-auth')->plainTextToken; //creating token
   
        return response()->json(['message' => 'Your account is created as User', 'token' => $token ]);
    
    }
    //
}
