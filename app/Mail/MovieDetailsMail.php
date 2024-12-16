<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MovieDetailsMail extends Mailable
{
    use Queueable, SerializesModels;
    public $movie;

    /**
     * Create a new message instance.
     */
    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    public function build(): MovieDetailsMail
    {
        return $this->subject('Movie Details: ' . $this->movie['Title'])
            ->view('movie_details');
    }
}
