<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class forgotpass extends Mailable
{
    use Queueable, SerializesModels;
    public $forgot_password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($forgot_password)
    {
        $this->forgot_password = $forgot_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->view('emails.reset');
    }
}
