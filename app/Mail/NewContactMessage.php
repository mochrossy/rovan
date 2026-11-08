<?php
namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class NewContactMessage extends Mailable
{
    public function __construct(public ContactMessage $m) {}

    public function envelope(): Envelope
    {
        $name = trim(preg_replace('/[\r\n]+/', ' ', $this->m->name));
        return new Envelope(
            subject: 'Pesan baru dari ' . $name,
            replyTo: [new Address($this->m->email, $name)],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.contact');
    }
}
