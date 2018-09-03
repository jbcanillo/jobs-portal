<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SignUpController extends Controller
{
    public function index()
    {
        //
        return view('landing_page/sign_up');
    }

    private function validation($inputs){
        $rules =[
            'firstname' => 'required|string|max:40',
            'middlename' => 'required|string|max:40',
            'lastname' => 'required|string|max:40',
            'nickname' => 'required|string|max:40',
            'email' => 'required|string|email|max:40|unique:users,email',
            'contact_number' => 'required|string',
            'role' => 'required|string',
            'username' => 'required|string|max:40|unique:users,name'
        ];
        if($inputs->isMethod('post')){
           $rules['password']='sometimes|required|min:8|max:20';
           $rules['confirm_password']='sometimes|required|same:password';
        }
        return $this->validate($inputs, $rules);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationError = $this->validation($request);
        if(!$validationError){
            $user = new \App\User;
            $user->name = strtolower(strip_tags($request->get('username')));
            $user->email = $request->get('email');
            $user->password = bcrypt($request->get('password'));
            $user->role = $request->get('role');
            $user->status = 'Inactive';
            $user->created_at = strtotime(date('Y-m-d H:m:s'));
            $user->save();
            $last_saved_id = $user->id;
            $role = $request->get('role');
            if($role=='Employer'){
                $register = new \App\Employer;
            }elseif($role=='Applicant'){
                $register = new \App\Applicant;
            }
            $register->user_id = $last_saved_id;
            $register->firstname = strip_tags($request->get('firstname'));
            $register->middlename = strip_tags($request->get('middlename'));
            $register->lastname = strip_tags($request->get('lastname'));
            $register->nickname = strip_tags($request->get('nickname'));
            $register->contact_number = strip_tags($request->get('contact_number'));
            $register->status = 'Inactive';
            $register->created_at = strtotime(date('Y-m-d H:m:s'));
            $register->save();
            return redirect('sign_up')->with('success', 'Your account has been created.');
        }
    }
}
