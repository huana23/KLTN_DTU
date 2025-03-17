<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

   
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Mail',
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
        );
    }
    public function attachments(): array
    {
        return [];
    }
}
