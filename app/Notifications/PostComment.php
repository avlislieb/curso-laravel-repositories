<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\{Comment};
use Illuminate\Notifications\Messages\BroadcastMessage;

class PostComment extends Notification implements ShouldQueue
{
    use Queueable;

    protected $comment;
    /**
     * Create a new notification instance.
     * @param Comment $_comment
     * @return void
     */
    public function __construct(Comment $_comment)
    {
        $this->comment = $_comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->success()
                ->subject("New Comment: {$this->comment->title}")
                ->line($this->comment->body)
                ->action('Show post with comment', route('posts.show', $this->comment->post_id))
                ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'comment' => $this->comment->load('user')
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage ([
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'comment' => $this->comment->load('user'),
                'linkPost' => route('posts.show', $this->comment->post_id)
            ]
        ]);
    }
}
