<?php

namespace App\Mail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignupEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('mail.signup-email')
        //             ->with([
        //                 'email_data' => $this->email_data,
                        
        //             ]);

        return $this->from(env( 'MAIL_USERNAME'),  'mywebsite.com')->subject( "Welcome to coding world")->view('mail.signup-email',['email_data'=>$this->email_data]);
    }
}
