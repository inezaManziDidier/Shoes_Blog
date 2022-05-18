<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApplicationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        return $this->subject('Mail from job portal app')
            ->view('emails.confirm-application')->with('details', $this->details);
    }
}
