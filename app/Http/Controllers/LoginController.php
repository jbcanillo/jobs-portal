<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator,Auth,Cookie;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
{

    use AuthenticatesUsers;

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
       if($this->hasTooManyLoginAttempts($request)){
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
       }else{
            if(Auth::attempt($user_data)){
                $id = Auth::user()->id;
                $role = Auth::user()->role;
                $status = Auth::user()->status;
                if($status=='Active'){
                    $user = \App\User::find($id);
                    $user->last_login = date('Y-m-d H:m:s');
                    $user->save();

                    $this->clearLoginAttempts($request);
                    Log::info($user->name." has logged in.");
                
                    if($role=='Administrator'){
                        return redirect('/dashboard');
                    }elseif($role=='Employer'){
                        return redirect('/employer/profile');
                    }elseif($role=='Applicant'){
                        return redirect('/applicant/profile');
                    }

                }else{
                    return back()->with('error', 'Your account is not yet activated. Kindly check your email for the instruction on how to activate your account.');
                }
                
            }else{
                $this->incrementLoginAttempts($request);
                return back()->with('error', 'Incorrect Username and/or Password.');
            }
        }
    }

    
    /**
     * Determine if the user has too many failed login attempts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function hasTooManyLoginAttempts(Request $request)
    {
        return $this->limiter()->tooManyAttempts(
            //3 attempts , 5 minutes lockdown
            $this->throttleKey($request), 3, 3
        );
    }

 
    public function updatePassword($data){
        $reset_password = (Auth::user())?false:true;
        return view('/landing_page/change_password',compact('data','reset_password'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveNewPassword(Request $request){
        $token  = $request->get('token');
        $rules =[
            'new_password' => 'sometimes|required|min:8|max:20',
            'confirm_new_password' => 'sometimes|required|same:new_password'
        ];
        $validationError = $this->validate($request, $rules);
        if(!$validationError){
            $user = User::where('remember_token',$token)->first();
            if($user){
                $user->password = bcrypt($request->get('new_password'));
                $user->updated_at = strtotime(date('Y-m-d H:m:s'));
                $user->save();
                return redirect('/login')->with('success', 'Your password has been changed.');
            }else{
                return redirect('/login')->with('error', 'There was an error occured. Try again later.');
            }
        }
    }
    
    function logout(){
        Auth::logout();
        return redirect('/login');
    }

}
