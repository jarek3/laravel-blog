<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    protected $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $message)
    {

        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() :ContactMessage
    {
        return $this->markdown('contact-mail',
        [
        'message' => $this->message,
    ])->subject('Email z kontaktního formuláře');

    }
}
