<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
   

    public function adminLogin(Request $request)
    {
        $validated = $request->validate
        ([
        'email' => 'required',
        'password' => 'required',
        ]); //validation

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) //attempting login
        {
         
         $user = Auth::guard('admin')->user();   
         $token = $user->createToken('multi-auth')->plainTextToken; //creating token

         return compact('user', 'token');
      
        }
     
        return response()->json(['message' => 'You credentials are not correct']);
  
    }

    public function userLogin(Request $request)
    {
        $validated = $request->validate
        ([
        'email' => 'required',
        'password' => 'required',
        ]); //validation

        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) //attempting login
        {

         $user = Auth::guard('user')->user();   
         $token = $user->createToken('multi-auth')->plainTextToken; //creating token

         return response()->json(['message' => 'You are logged in as User', 'token' => $token]);
       
        }

        return response()->json(['message' => 'You credentials are not correct']);
  
    }

   
  


    //
}
