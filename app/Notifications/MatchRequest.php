<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MatchRequest extends Notification
{
    use Queueable;


    protected $room, $fromUser, $toUser;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($room, $fromUser, $toUser)
    {
        $this->room = $room;
        $this->fromUser = $fromUser;
        $this->toUser = $toUser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            'room'  => $this->room,
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
            'room'  => $this->room,
            'from'  => $this->fromUser,
            'to'    => $this->toUser,
        ];
    }
}
