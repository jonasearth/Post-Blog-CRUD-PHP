<?php

namespace Fnatic\Controllers\Post;

use DateTime;
use Exception;
use Fnatic\Languages\MessageErrorGlobal;
use Fnatic\Languages\MessageSuccessGlobal;
use Fnatic\Models\Post;
use Fnatic\Tools\Returns;

class PostUpdateController
{
    static function update($route)
    {

        $data = PostConditionsController::update($_POST, $route);

        $date = new DateTime();
        $date = date_format($date, 'Y-m-d\TH:i:s\Z');

        try {

            $post = @Post::collection()->updateOne([
                '_id' => new \MongoDb\BSON\ObjectId($route[2]['id'])
            ], ['$set' => [
                'title' => $data['title'],
                'body' => $data['body'],
                'author' => $data['author'],
                'title' => $data['title'],
                'tags' => $data['tags'],
                'url' => $data['url'],
                'updated_at' => $date
            ]]);
        } catch (Exception $e) {

            Returns::simpleMsgError(MessageErrorGlobal::UPDATE_ERROR);
        }

        if ($post->getModifiedCount() > 0) {
            Returns::msgData(MessageSuccessGlobal::POST_UPDATED, []);
        } else {
            Returns::simpleMsgError(MessageErrorGlobal::UPDATE_ERROR);
        }
    }
}
