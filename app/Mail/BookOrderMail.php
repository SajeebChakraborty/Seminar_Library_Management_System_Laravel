<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details_order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details_order)
    {
        $this->details_order=$details_order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Book Order')
        ->view('admin.book_order_email');
    }
}
