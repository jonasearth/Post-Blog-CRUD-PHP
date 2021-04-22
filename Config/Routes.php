<?php

namespace Fnatic\Config;

use Fnatic\Tools\Returns;

use Fnatic\Config\Routes\Post\PostRouter;
use Fnatic\Config\Routes\Tests\TestsRouter;

class Routes
{
    public $uri;

    /**
     * init function
     *
     * @param [\FastRoute] $r
     * @return void
     */
    public static function init($r)
    {

        /**
         * Rotas de teste
         */
        TestsRouter::start($r);

        /**
         * Rotas de consumo (API)
         *
         */

        $r->addGroup('/api', function (\FastRoute\RouteCollector $r) {

            PostRouter::start($r);
        });
    }

    /**
     * getParam function
     * metodo para pegar a url e o metodo da requisição
     * @return void
     */
    public static function getParam()
    {
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $letrafinal = substr($uri, -1);
        if ($letrafinal == "/") {
            $uri = substr($uri, 0, -1);
        }
        $uri = rawurldecode($uri);
        $GLOBALS['URL_PARAM'] = $uri;
        $GLOBALS['httpMethod'] = $httpMethod;
        return [$httpMethod, $uri];
    }

    /**
     * startRoutes function
     * metodo que verifica se o request é valido
     * e permitido
     * @param [Routes] $dispatcher
     * @param [array] $parm
     * @return void
     */
    public static function startRoutes($dispatcher, $parm)
    {
        //Returns.php é um modelo padrão de retorno para facilitar o tratamento do front-end


        $routeInfo = $dispatcher->dispatch($parm[0], $parm[1]);

        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                Returns::simpleMsgError("Rota não encontrada");
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                Returns::simpleMsgError("Metodo não permitido.");
                break;
            case \FastRoute\Dispatcher::FOUND:
                $routeInfo[1]($routeInfo);
                break;
        }
    }
}
