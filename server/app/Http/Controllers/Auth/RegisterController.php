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
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',

        ]);

        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return response()->json(['message' => 'Your account is created as Admin']);
    }

    protected function createUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',

        ]);
        
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return response()->json(['message' => 'Your account is created as User']);
    }
    //
}
