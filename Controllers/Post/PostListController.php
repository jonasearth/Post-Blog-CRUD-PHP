<?php

namespace Fnatic\Controllers\Post;

use Exception;
use Fnatic\Languages\MessageErrorGlobal;
use Fnatic\Languages\MessageSuccessGlobal;
use Fnatic\Models\Post;
use Fnatic\Tools\Returns;

class PostListController
{

    public static function all()
    {
        $posts =  self::allObj();
        if (count($posts) > 0) {
            Returns::msgData(MessageSuccessGlobal::RESULT_FOUND, $posts);
        } else {
            http_response_code(404);
            Returns::simpleMsgError(MessageErrorGlobal::NOT_RESULT_FOUND);
        }
    }

    public static function find($route)
    {

        $posts =  self::findObj($route);
        if ($posts) {
            Returns::msgData(MessageSuccessGlobal::RESULT_FOUND, $posts);
        } else {
            http_response_code(404);
            Returns::simpleMsgError(MessageErrorGlobal::NOT_RESULT_FOUND);
        }
    }


    public static function allObj()
    {
        try {
            $posts =  Post::collection()->find()->toArray();
        } catch (Exception $e) {
            Returns::simpleMsgError(MessageErrorGlobal::NOT_RESULT_FOUND);
        }
        foreach ($posts as $key => $value) {
            $posts[$key]['_id'] = (string)$value['_id'];
            if ($posts[$key]['created_at'] != null) {
                $posts[$key]['created_at'] = (string)$value['created_at'];
            }
            if ($posts[$key]['updated_at'] != null) {
                $posts[$key]['updated_at'] = (string)$value['updated_at'];
            }
        }
        return $posts;
    }

    public static function findObj($route)
    {
        try {
            $posts =  Post::collection()->findOne(['_id' => new \MongoDB\BSON\ObjectId($route[2]['id'])]);
        } catch (Exception $e) {
            Returns::simpleMsgError(MessageErrorGlobal::NOT_RESULT_FOUND);
        }
        if ($posts['_id'] != null) {
            $posts['_id'] = (string)$posts['_id'];
        }
        if ($posts['created_at'] != null) {
            $posts['created_at'] = (string)$posts['created_at'];
        }
        if ($posts['updated_at'] != null) {
            $posts['updated_at'] = (string)$posts['updated_at'];
        }

        return $posts;
    }
    public static function findByUrlObj($url)
    {
        try {
            $posts =  Post::collection()->findOne(['url' => "$url"]);
        } catch (Exception $e) {
            Returns::simpleMsgError(MessageErrorGlobal::NOT_RESULT_FOUND);
        }
        if ($posts['_id'] != null) {
            $posts['_id'] = (string)$posts['_id'];
        }
        if ($posts['created_at'] != null) {
            $posts['created_at'] = (string)$posts['created_at'];
        }
        if ($posts['updated_at'] != null) {
            $posts['updated_at'] = (string)$posts['updated_at'];
        }

        return $posts;
    }
}
