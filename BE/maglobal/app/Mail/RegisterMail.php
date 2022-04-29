<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\SettingMail;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;
    private $accountNumber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = SettingMail::first();
        return $this->from($mail->driver, 'Expert Nails and Beauty family')->subject('Register for Expert Nails and Beauty family')->markdown('mail.RegisterSendMail')->with('accountNumber', $this->accountNumber);
           
    }
}