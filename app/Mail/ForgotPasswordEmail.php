<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $action;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$action)
    {
        //
        $this->user = $user;
        $this->action = $action;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails/forgot_password_email')->subject('Neway Manpower Job-Portal: '.$this->action);
    }
}
