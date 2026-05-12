<?php

namespace App\Mail;

use App\Models\OccasionRsvp;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OccasionRsvpConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public OccasionRsvp $rsvp)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'RSVP confirmation for ' . $this->rsvp->occasion->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.occasion-rsvp-confirmation',
        );
    }
}
