<?php

namespace Fnatic\Controllers\Post;

use DateTime;
use Fnatic\Languages\MessageErrorGlobal;
use Fnatic\Languages\MessageSuccessGlobal;
use Fnatic\Models\Post;
use Fnatic\Tools\Returns;

class PostCreateController
{
    public static function save()
    {
        $date = new DateTime();
        $date = date_format($date, 'Y-m-d\TH:i:s\Z');


        $data = PostConditionsController::save($_POST);

        $post = Post::collection()->insertOne([
            'title' => $data['title'],
            'body' => $data['body'],
            'author' => $data['author'],
            'title' => $data['title'],
            'tags' => $data['tags'],
            'url' => $data['url'],
            'created_at' => $date,
            'updated_at' => $date
        ]);
        if ($post->getInsertedCount() > 0) {
            Returns::msgData(MessageSuccessGlobal::POST_CREATED, $post);
        } else {
            Returns::simpleMsgError(MessageErrorGlobal::CREATE_ERROR);
        }
    }
}
