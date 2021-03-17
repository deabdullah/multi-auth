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
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) 
        {

         return response()->json(['message' => 'You are logged in as Admin']);
        }
        return response()->json(['message' => 'You credentials are not correct']);
    }

    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) 
        {

         return response()->json(['message' => 'You are logged in as User']);
        }
        return response()->json(['message' => 'You credentials are not correct']);
    }

   
  


    //
}
