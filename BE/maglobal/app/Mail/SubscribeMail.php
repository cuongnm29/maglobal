<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\SettingMail;
class SubscribeMail extends Mailable
{
    use Queueable, SerializesModels;
    private $summary;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(?string $summary)
    {
        $this->summary = $summary;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = SettingMail::first();
        return $this->from($mail->driver, 'Expert Nails and Beauty family')->subject('Newsletter for Expert Nails and Beauty family')->markdown('mail.subscribeMail')
        ->with('summary', $this->summary) 
        ;
    }
}