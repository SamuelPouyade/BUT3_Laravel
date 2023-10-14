<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ArticleCreatedNotification extends Notification
{
    public $article;

    public function __construct($article)
    {
        $this->article = $article;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->line('Un nouvel article a été créé : ' . $this->article->titre)
        ->line('Cliquez sur le bouton ci-dessous pour le lire :')
        ->action('Lire l\'article', url('/article/' . $this->article->id));
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

}
