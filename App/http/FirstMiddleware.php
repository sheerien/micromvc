<?php
namespace App\http;

use Micro\Mvc\Route\Request;
use Micro\Mvc\Middleware\Middleware;

class FirstMiddleware implements Middleware
{
    
	/**
	 * Summary of __invoke
	 * @param Request $request
	 * @param callable $next
	 * @return mixed
	 */
	public function __invoke(Request $request, callable $next) 
    {
        dump('First Middleware');
		$request->firstStatus = 300;
		return $next($request);
	}
}