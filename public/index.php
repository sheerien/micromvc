<?php

use App\http\FirstMiddleware;
use App\http\SecondMiddleware;
use Micro\Mvc\App;
use Micro\Mvc\Middleware\MiddlewareStack;

require_once realpath(dirname(__DIR__) . '/vendor/autoload.php');
require_once realpath(dirname(__DIR__) . '/src/Support/helper.php') ;
require_once realpath(dirname(__DIR__)) . '/routes/web.php';
define('DS', DIRECTORY_SEPARATOR);
// dump(realpath(dirname(__DIR__) . '/vendor/autoload.php'));
// dump(realpath(dirname(__DIR__) . '/src/Support/helper.php'));

// $app = new App(new MiddlewareStack());

app()->add(new FirstMiddleware());
app()->add(new SecondMiddleware());
app()->run();
// dump(app());