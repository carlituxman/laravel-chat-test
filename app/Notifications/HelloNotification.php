<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;

class HelloNotification extends Notification
{
    use Queueable;
    
    protected $title;
    protected $body;
    protected $action;

    /**
     * Create a new notification instance.
    *
    * @return void
    */
    public function __construct($title, $body=null, $action=null)
    {
        $this->title = $title;
        $this->body = $body;
        $this->action = $action;
    }

    /**
     * Get the notification's delivery channels.
    *
    * @param  mixed  $notifiable
    * @return array
    */
    public function via($notifiable)
    {
        return ['database', 'broadcast', WebPushChannel::class];
    }

    /**
     * Get the array representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return array
    */
    public function toArray($notifiable)
    {
        $now = Carbon::now();

        $t = $this->title ?? "title";
        $b = $this->body ?? "body";
        $a = $this->action ?? 'https://laravel.com';

        return [
            'title' => $t,
            'body' => $b,
            'action' => $a,
            'created' => $now->toIso8601String(),
            'created_format' => $now->format('d/m/Y H:i')
        ];
    }

    /**
     * Get the web push representation of the notification.
    *
    * @param  mixed  $notifiable
    * @param  mixed  $notification
    * @return \Illuminate\Notifications\Messages\DatabaseMessage
    */
    public function toWebPush($notifiable, $notification)
    {
        $t = $this->title ?? "title";
        $b = $this->body ?? "body";
        $a = $this->action ?? 'https://laravel.com';

        return (new WebPushMessage)
            ->title($t)
            ->icon('/notification-icon.png')
            ->body($b)
            ->action($a, $a)
            ->data(['id' => $notification->id]);
    }
}