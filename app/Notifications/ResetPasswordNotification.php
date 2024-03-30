<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Otp;

class ResetPasswordNotification extends Notification
{
    use Queueable;


     public $message;
     public $subject;
     public $fromEmail;
     public $mailer;
     public $otp;



    public function __construct()
    {
        $this->message = 'Use the code for resetting your password process';
        $this->subject = 'Password Resetting';
        $this->fromEmail = 'emanzidanelgmal@gmail.com';
        $this->mailer = 'smtp';
        $this->otp = new Otp;
    }



    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
     $otp=$this->otp->generate($notifiable->email,'numeric',8,10);

     return (new MailMessage)
        ->mailer('smtp')
        ->subject($this->subject)
        ->greeting('Hello'.$notifiable->first_name)
        ->line($this->message)
        ->line('code:'. strval($otp->token));

}

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
