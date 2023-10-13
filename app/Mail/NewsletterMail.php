<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected array $sources;
    public function __construct(array $sources)
    {
        $this->sources = $sources;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Newsletter',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.newsletter',
            with: [
                'sources' => $this->sources,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
