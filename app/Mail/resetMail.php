<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class resetMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        //
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Recuperar Contraseña',
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'livewire.mails.reset_password',
        );
    }
    public function attachments(): array
    {
        return [];
    }
}
