<?php

use App\http\FirstMiddleware;
use App\http\SecondMiddleware;
use Micro\Mvc\App;
use Micro\Mvc\Middleware\MiddlewareStack;

require_once realpath(dirname(__DIR__) . '/vendor/autoload.php');
define('DS', DIRECTORY_SEPARATOR);
// dump(realpath(dirname(__DIR__) . '/vendor/autoload.php'));

$app = new App(new MiddlewareStack());

$app->add(new FirstMiddleware());
$app->add(new SecondMiddleware());

$app->run();