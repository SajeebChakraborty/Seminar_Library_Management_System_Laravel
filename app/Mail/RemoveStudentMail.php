<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RemoveStudentMail extends Mailable
{
    use Queueable, SerializesModels;


    public $details_remove;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details_remove)
    {
        $this->details_remove=$details_remove;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Remove Account')
                    ->view('admin.remove_student_email');
    }
}
