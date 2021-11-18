<?php
namespace Micro\Mvc;
use Micro\Mvc\Route\Request;
use Micro\Mvc\Middleware\Middleware;
use Micro\Mvc\Middleware\MiddlewareStack;

class App
{
    protected $middleware;
    public function __construct(MiddlewareStack $middleware)
    {
        $this->middleware = $middleware;
    }

    public function add(Middleware $middleware)
    {
        $this->middleware->add($middleware);
    }

    public function run()
    {
        $res = $this->middleware->handle(new Request());
        dump('run app', $res);
    }
}