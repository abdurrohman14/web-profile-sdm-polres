<?php

namespace App\Mail;

use App\Models\Personel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PensiunNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $personel;

    public function __construct(Personel $personel)
    {
        $this->personel = $personel;
    }

    public function build()
    {
        return $this->subject('Pemberitahuan Pensiun')
                    ->view('emails.pensiun_notification');
    }
}
