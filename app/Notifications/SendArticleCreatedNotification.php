<?php
use App\Notifications\ArticleCreatedNotification;
use Illuminate\Support\Facades\Notification;

class SendArticleCreatedNotification
{
    public function handle(ArticleCreated $event)
    {
        $article = $event->article;

        $notification = new ArticleCreatedNotification($article);

        $article->user->notify($notification);
    }
}
