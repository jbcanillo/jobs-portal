<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailProcessor extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $action;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($action,$data)
    {
        //
        $this->action = $action;
        $this->data = $data;
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->action=='Account Activation'){
            $view = "emails/account_activation_email";
        }elseif($this->action=='Reset Forgotten Password'){
            $view = "emails/forgot_password_email";
        }
        return $this->view($view)->subject('Neway Manpower Job-Portal: '.$this->action);
       
    }
}
