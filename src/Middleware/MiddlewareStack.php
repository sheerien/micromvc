<?php
namespace Micro\Mvc\Middleware;

use Micro\Mvc\Route\Request;
use Micro\Mvc\Middleware\Middleware;

class MiddlewareStack
{
    protected $start;
    public function __construct()
    {
        $this->start = function (Request $request) {
            return $request;
        };
    }

    public function add( Middleware $middleware)
    {
        $next = $this->start;
        $this->start = function (Request $request) use ( $middleware, $next) {
            return $middleware($request, $next);
        };

        // dump($this->start);
    }

    public function handle(Request $request)
    {

        return call_user_func($this->start, $request);
    }
}