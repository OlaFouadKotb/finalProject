<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $Data;
    /**
     * Create a new message instance.
     */
    public function __construct($Data)
    {
        $this->Data =$Data;
    }
    public function build()
    {
        return $this->subject('New Contact Form Submission')
        ->view('mails.wave_mail');
         // ->with('Data', $this->Data);
    }
}