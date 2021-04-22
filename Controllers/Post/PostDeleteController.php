<?php

namespace Fnatic\Controllers\Post;

use Exception;
use Fnatic\Languages\MessageErrorGlobal;
use Fnatic\Languages\MessageSuccessGlobal;
use Fnatic\Models\Post;
use Fnatic\Tools\Returns;

class PostDeleteController
{
    public static function remove($route)
    {
        try {
            $post = @Post::collection()->deleteOne(['_id' => new \MongoDb\BSON\ObjectId($route[2]['id'])]);
        } catch (Exception $e) {
            Returns::simpleMsgError(MessageErrorGlobal::UPDATE_ERROR);
        }
        if ($post->getDeletedCount() > 0) {
            Returns::msgData(MessageSuccessGlobal::POST_DELETED, []);
        } else {
            Returns::simpleMsgError(MessageErrorGlobal::DELETE_ERROR);
        }
    }
}
