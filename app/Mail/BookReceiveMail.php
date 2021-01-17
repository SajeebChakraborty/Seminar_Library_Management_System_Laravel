<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookReceiveMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details_received;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details_received)
    {
        $this->details_received=$details_received;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Book Received')
                    ->view('admin.book_received_email');
    }
}
