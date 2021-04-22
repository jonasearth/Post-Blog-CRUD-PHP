<?php

/**
 * @author Jonas Lima
 * @version 1.1
 */

/**
 * autoload das classes de requisições e respostas utilizadas na maioria dos codigos
 */

spl_autoload_register(function ($class) {
    $prefix = 'Fnatic\\';
    $base_dir = __DIR__ . '/../';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

//timeset para definir horario local
date_default_timezone_set('America/Bahia');



//tipos de erros visualizaveis
error_reporting(E_ALL ^ E_NOTICE);

//mostrar erros
ini_set("log_errors", 1);
ini_set("display_errors", 1);
/*
const URL_SITE = "";
const URL_NOTIFY_PAYMENT_PAG_SEGURO = "";
*/
