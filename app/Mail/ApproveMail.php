<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApproveMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details_approve;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details_approve)
    {
        $this->details_approve=$details_approve;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Congrats! Your account is approved ')
                    ->view('admin.approve_Email');
    }
}
