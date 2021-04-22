<?php

namespace Fnatic\Config\Routes\Post;


use Fnatic\Controllers\Post\PostCreateController;
use Fnatic\Controllers\Post\PostDeleteController;
use Fnatic\Controllers\Post\PostListController;
use Fnatic\Controllers\Post\PostUpdateController;

class PostRouter
{
    public static function start($r)
    {
        $r->addGroup('/post', function (\FastRoute\RouteCollector $r) {
            $r->addRoute('GET', '', function ($r) {
                PostListController::all($r);
            });
            $r->addRoute('POST', '', function ($r) {
                PostCreateController::save($r);
            });
            $r->addGroup('/{id}', function (\FastRoute\RouteCollector $r) {
                $r->addRoute('GET', '', function ($r) {
                    PostListController::find($r);
                });
                $r->addRoute('PUT', '', function ($r) {
                    PostUpdateController::update($r);
                });
                $r->addRoute('DELETE', '', function ($r) {
                    PostDeleteController::remove($r);
                });
            });
        });
    }
}
