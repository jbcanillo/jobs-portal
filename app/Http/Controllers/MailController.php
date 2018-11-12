<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailProcessor;
use App\User;

class MailController extends Controller
{
     /**
     * Send an e-mail reminder to the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function sendForgotPasswordEmail(Request $request){
        $validationError = $this->validate($request, ['email' => 'required|email']);
        if(!$validationError){
            $user = User::where('email',$request->email)->first();
            if($user){
                $email = $user->email;
                $action = 'Reset Forgotten Password';
                Mail::to($email)->send(new EmailProcessor($action,$user));
                return back()->with('success', 'A link on how to reset your password has been emailed to '.$email);
            }else{
                return back()->with('error', 'The email you entered cannot be found!');
            }
        }
    }

     /**
     * Send an e-mail from inquirer to neway.
     *
     * @param  Request  $request
     * @return Response
     */
    public function sendMessageEmail(Request $request){
        $validationError = $this->validate($request, ['email' => 'required|email','name' => 'required|string','message' => 'required|string']);
        if(!$validationError){
                $email = $request->email;
                $action = 'Inquiry';
                Mail::to('inquiry@newaymanpower.com')->send(new EmailProcessor($action,$request));
                return back()->with('success', 'Your message was succesfully sent.');
        }
    }
}


