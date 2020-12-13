<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\User;

class MatchRequest extends Notification
{
    use Queueable;


    protected $fromUser, $toUser, $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $fromUser, User $toUser, string $token)
    {
        $this->fromUser = $fromUser;
        $this->toUser = $toUser;
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
        return (new MailMessage)->markdown('notify/MatchRequest', [
            'token' => $this->token,
            'from'  => $this->fromUser,
            'to'    => $this->toUser
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
            'token' => $this->token,
            'from'  => $this->fromUser,
            'to'    => $this->toUser,
        ];
    }
}
