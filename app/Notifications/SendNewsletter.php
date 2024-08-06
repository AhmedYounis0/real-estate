<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendNewsletter extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public string $title;
    public string $content;
    public function __construct(string $title,string $content)
    {
        $this->title = $title;
        $this->content = $content;
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
        return (new MailMessage)
                    ->subject($this->title)
                    ->greeting('Hello!')
                    ->line('The introduction to the notification.')
                    ->line(strip_tags($this->content))
                    ->action('Visit our site', url('http://127.0.0.1:8000/'))
                    ->line('Thank you for being a subscriber!');
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
