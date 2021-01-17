<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RejectMail extends Mailable
{
    use Queueable, SerializesModels;


    public $details_reject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details_reject)
    {
        $this->details_reject=$details_reject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Rejected your account')
                    ->view('admin.reject_email');
    }
}
