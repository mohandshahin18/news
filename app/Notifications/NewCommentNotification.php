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


    protected $comment;
    protected $visitor;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Comment $comment , Visitor $visitor)
    {
        $this->comment = $comment;
        $this->visitor = $visitor;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) // $notifiable هو عبارة عن الشخص الي بدي ارسل الو الاشعار أوالمودل الي بدي ارسل الوالاشعار
    {
        $via=['database'];
        if($notifiable->notfiy_mail){
           $via = 'mail';
        }
        if($notifiable->notfiy_sma){
            $via = 'nexmo';
         }
        return  $via;
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }


    // public function toDatabase($notifiable)
    // {

    // }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $body = sprintf(
            '%s comment for a article %s' ,
            $this->visitor->firstname,
            $this->comment->article->title ,
            );

        return [
            'title'=>'New Comment',
            'body'=> $body,
            'icon'=>'fas fa-comments',
            'url'=>route('news.detailes',$this->comment->article->id),
        ];
    }
}
