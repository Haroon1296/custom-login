<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;


class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     public function index()
    {
        return view('auth.login');
    }
    
    public function loginpost(Request $request)
    {	
		
    $request->validate([
    		'username' => ['required'],
    		'password' => ['required'],
    	]);


    	if (auth()->guard()->attempt($request->only('username', 'password'))):
    		  $user = auth()->guard()->user();
        	$user->remember_token = bin2hex(openssl_random_pseudo_bytes(30));
        	$user->save();
   			
   				      
   		return redirect()->intended("/");
   		else:
   			return redirect()->back()->withInput()->with('error','Invalid Crendentials');
   		endif;


    }



    public function logout(){

    	Auth::guard()->logout();
    	return redirect("login");

    }

    
}
