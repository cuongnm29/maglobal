<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\SettingMail;
class BookingAdminMail extends Mailable
{
    use Queueable, SerializesModels;
    private $accountNumber,$firstname,$lastname,$email,$phone,$dateOrder,$timeOrder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(?string $accountNumber,?string $firstname,?string $lastname,?string $email, ?string $phone,?string $dateOrder,?string $timeOrder)
    {
        $this->accountNumber = $accountNumber;
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->email=$email;
        $this->phone=$phone;
        $this->dateOrder=$dateOrder;
        $this->timeOrder=$timeOrder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = SettingMail::first();
        return $this->from($mail->driver, 'Expert Nails and Beauty family')->subject('Appointment Booking for Expert Nails and Beauty family')->markdown('mail.BookingAdminSendMail')
        ->with('accountNumber', $this->accountNumber) 
        ->with('firstname', $this->firstname)
        ->with('lastname', $this->lastname)
        ->with('email', $this->email)
        ->with('phone', $this->phone)
        ->with('dateOrder', $this->dateOrder)
        ->with('timeOrder', $this->timeOrder);
           
    }
}