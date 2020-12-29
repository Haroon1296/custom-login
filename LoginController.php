<?php

namespace App\Http\Controllers\admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    //
    public function index(){
        //
        if(empty(Auth::id())){
            return view('admin.auth.login');
        }else{
            return redirect()->intended('/home');
        }
    }

    public function loginpost(Request $request){
        //
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
 
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            //
            if(Auth::user()->userType == "admin"){
                //
                return redirect()->intended('/home');
            }else{
                //
                return redirect()->back()->withInput()->with('error','Invalid Crendentials');
            }
        }
        return redirect()->back()->withInput()->with('error','Invalid Crendentials');
    }

    public function logout(){
        //
        Auth::logout();
    	return redirect("/admin");
    }
}
