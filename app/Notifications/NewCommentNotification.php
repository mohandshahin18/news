<?php

namespace App\Notifications;

use App\Models\Comment;
use App\Models\Visitor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCommentNotification extends Notification
{
    use Queueable;


    // protected $comment;
    // protected $visitor;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $comment , $article , $visitor)
    {
        $this->comment = $comment;
        $this->article_id = $article;
        $this->visitor_id = $visitor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) // $notifiable هو عبارة عن الشخص الي بدي ارسل الو الاشعار أوالمودل الي بدي ارسل الوالاشعار
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
        return (new MailMessage)
                    ->subject('New comment')
                    ->line('A new comment has been commented.')
                    ->action('view comment', url('/'))
                    ->line('Thank you for using our application!');
    }




    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return[
            // 'body'=>'A new comment has been commented.',
            'comment'=> $this->comment  ,
            'article'=> $this->article_id ,
            'visitor'=> $this->visitor_id ,
            'url'=> url("/home/news-detailes/$this->article_id")  ,


        ];

    }
}
