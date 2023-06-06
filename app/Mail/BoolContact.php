<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BoolContact extends Mailable
{
    use Queueable, SerializesModels;


    public $lead;

    public function __construct($_lead)
    {
        $this->lead = $_lead;
    }


    public function envelope()
    {
        return new Envelope(
            subject: 'Bool Contact',
            replyTo: $this->lead->address
        );
    }


    public function content()
    {
        return new Content(
            view: 'mails.new-contact',
        );
    }


    public function attachments()
    {
        return [];
    }
}
