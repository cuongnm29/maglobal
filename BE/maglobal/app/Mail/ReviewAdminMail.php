<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\SettingMail;
class ReviewAdminMail extends Mailable
{
    use Queueable, SerializesModels;
    private $accountNumber,$name,$rate,$content,$email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(?string $accountNumber,?string $name,?string $rate,?string $content,?string $email)
    {
        $this->accountNumber = $accountNumber;
        $this->name=$name;
        $this->rate=$rate;
        $this->content=$content;
        $this->email=$email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = SettingMail::first();
        return $this->from($mail->driver, 'Expert Nails and Beauty family')->subject('Review for Expert Nails and Beauty family')->markdown('mail.ReviewAdminSendMail')
        ->with('accountNumber', $this->accountNumber) 
        ->with('name', $this->name)
        ->with('rate', $this->rate)
        ->with('content', $this->content)
        ->with('email', $this->email)
        ;
           
    }
}