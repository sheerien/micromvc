<?php
namespace Micro\Mvc;
use Micro\Mvc\Route\Route;
use Micro\Mvc\Route\Request;
use Micro\Mvc\Route\Response;
use Micro\Mvc\Middleware\Middleware;
use Micro\Mvc\Middleware\MiddlewareStack;

class App
{
    // protected $middleware;
    protected Request $request;
    protected Response $response;
    protected Route $route;
    protected MiddlewareStack $middleware;

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->route = new Route($this->request, $this->response);
        $this->middleware = new MiddlewareStack();
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