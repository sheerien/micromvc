<?php
namespace App\http;

use Micro\Mvc\Route\Request;
use Micro\Mvc\Middleware\Middleware;

class SecondMiddleware implements Middleware
{

	/**
	 * Summary of __invoke
	 * @param Request $request
	 * @param callable $next
	 * @return mixed
	 */
	public function __invoke(Request $request, callable $next) 
    {
        dump("Second Middleware");
		$request->secondStatus = 400;
		return $next($request);
	}
}