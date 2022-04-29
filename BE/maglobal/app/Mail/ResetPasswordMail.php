<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\SettingMail;
class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    private $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(?string $link)
    {
        $this->link = $link;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = SettingMail::first();
        return $this->from($mail->driver, 'Expert Nails and Beauty family')->subject('Reset Password for Expert Nails and Beauty Family')->markdown('mail.ForgotPasswordSendMail')
        ->with('link', $this->link) 
        ;
           
    }
}