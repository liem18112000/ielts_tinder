<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\User;

class RefuseMatchRequest extends Notification
{
    use Queueable;

    protected $from, $to;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $from, User $to, string $token)
    {
        $this->from = $from;
        $this->to = $to;
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->markdown('notify/RefuseMatchRequest', [
            'from' => $this->from,
            'to' => $this->to,
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'from' => $this->from,
            'to' => $this->to,
            'token' => $this->token,
        ];
    }
}
