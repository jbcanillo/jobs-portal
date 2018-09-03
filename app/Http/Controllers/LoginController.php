<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class LoginController extends Controller
{
    function index(){
        return view('login');
    }

    function home(Request $request){
        $this->validate($request, [
            'email'  => 'required|email',
            'password'  => 'required|min:8|max:20'
        ]);
  
       $user_data = array(
        'email'  => $request->get('email'),
        'password' => $request->get('password')
       );
  
       if(Auth::attempt($user_data)){
           $role = Auth::user()->role;
           if($role='Administrator'){
                return view('admin/dashboard');
           }elseif($role='Employer'){
                return view('employer/dashboard');
           }elseif($role='Applicant'){
                return view('applicant/dashboard');
           }
       }else{
            return back()->with('error', 'Incorrect Username and/or Password.');
       }
    }
    
    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
