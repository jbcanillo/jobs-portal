<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;

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
        'password' => $request->get('password'),
       );
       $remember = true;
       if(Auth::attempt($user_data,$remember)){
           $id = Auth::user()->id;
           $role = Auth::user()->role;

           $user = \App\User::find($id);
           $user->last_login = date('Y-m-d H:m:s');
           $user->save();

           if($role=='Administrator'){
                return view('admin/dashboard');
           }elseif($role=='Employer'){
                return view('employer/dashboard');
           }elseif($role=='Applicant'){
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
