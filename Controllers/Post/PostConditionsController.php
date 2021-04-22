<?php


namespace Fnatic\Controllers\Post;

use Fnatic\Languages\MessageErrorGlobal;
use Fnatic\Tools\Manipulador;
use Fnatic\Tools\Returns;

class PostConditionsController
{
    public static function save($data)
    {

        $data = PostConditionsController::both($data);
        if (!isset($data['url']))
            $data['url'] = $data['title'];

        $data['url'] = Manipulador::convertToUrl($data['url']);

        if (PostListController::findByUrlObj($data['url']) != null)
            Returns::simpleMsgError(MessageErrorGlobal::POST_URL_ALREADY_USED);

        return $data;
    }
    public static function update($data, $route)
    {
        $data = PostConditionsController::both($data);
        $data['url'] = Manipulador::convertToUrl($data['url']);

        $post = PostListController::findByUrlObj($data['url']);
        if ($post != null && $post->_id != $route[2]['id'])
            Returns::simpleMsgError(MessageErrorGlobal::POST_URL_ALREADY_USED);
        return $data;
    }

    public static function both($data)
    {
        if (!isset($data['title']) || strlen($data['title']) < 5) {
            Returns::simpleMsgError(MessageErrorGlobal::POST_TITLE_LENGTH_ERROR);
        }
        if (!isset($data['body']) || strlen($data['body']) == 20) {
            Returns::simpleMsgError(MessageErrorGlobal::POST_BODY_LENGTH_ERROR);
        }
        if (!isset($data['author']) || strlen($data['author']) == 1) {
            Returns::simpleMsgError(MessageErrorGlobal::POST_AUTHOR_LENGTH_ERROR);
        }
        return $data;
    }
}
