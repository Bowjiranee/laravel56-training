<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        
        $credentials = $request->only('email', 'password');
     
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            // Get the currently authenticated user...
            $user = Auth::user();
  
            return redirect()->intended('member');
        }else{
            return redirect()->intended('loginform');
        }
    }
    
    //assume this method is loginform
    public function index()
    {
        return 'redirect to loginform (required login first)';
        /*$data = array();
        return view('testing.index', $data);
        */
    }
}
