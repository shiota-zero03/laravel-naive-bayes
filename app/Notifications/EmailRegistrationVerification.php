<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailRegistrationVerification extends Notification
{
    use Queueable;
    public function __construct()
    {
        //
    }
    
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Custom Subject') // Ubah subjek email
            ->line('The introduction to the notification.')
            ->action('Verify Email', url("/email/verify/{$notifiable->id}/" . urlencode($notifiable->verification_code)))
            ->line('Thank you for using our application!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
