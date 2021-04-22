<?php

namespace Fnatic\Config\Routes\Tests;

use Fnatic\Tests\ReplaceTest;

class TestsRouter
{

    public static function start($r)
    {
        $r->addGroup('/test', function (\FastRoute\RouteCollector $r) {
        });
    }
}
