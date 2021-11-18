<?php
namespace Micro\Mvc\Route;

class Route
{
    public static array $routes = [];

    public Request $request;

    public Response $response;

    /**
	 * @param $routes array 
	 * @param $request Request 
	 * @param $response Response 
	 */
	function __construct( Request $request, Response $response) {
	    $this->request = $request;
	    $this->response = $response;
	}

    public static function get($route , $action)
    {
        self::$routes['get'][$route] = $action;
    }
    
    public static function post($route , $action)
    {
        self::$routes['post'][$route] = $action;
    }
    public static function put($route , $action)
    {
        self::$routes['put'][$route] = $action;
    }
    public static function delete($route , $action)
    {
        self::$routes['delete'][$route] = $action;
    }

    public function resolve()
    {
        $method = $this->request->method();
        $url = $this->request->path()->getAction();
        $params = $this->request->path()->getParams();

        $action = self::$routes[$method][$url] ?? false;

        //handler 404 not found
        // if(!array_key_exists($url, self::$routes[$method])){
        //     echo 'not found';
        // }

        if(!$action){
            return;
        }

        /**
         * Handler Route is A Callback Function 
         */
        if(is_callable($action)){
            call_user_func_array($action, $params);
        }

        /**
         * Handler Route is An Array
         */
        if(is_array($action)){
            call_user_func_array([new $action[0], $action[1]], $params);
        }

        dump($method, $url, $params, $action);
    }

}