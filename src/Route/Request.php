<?php
namespace Micro\Mvc\Route;

class Request
{
    public $code = 200;

    private string $action = '/';
    private array $params = [] ;

    public function __construct()
    {
        // extract($this->getParams());
    }
    /**
     * Get the value of action
     */ 
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set the value of action
     *
     * @return  self
     */ 
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get the value of params
     */ 
    public function getParams()
    {
        return $this->params;
    }


    /**
     * Set the value of params
     *
     * @return  self
     */ 
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }
    
    /**
     * get http method type from the request
     * @return string
     */
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * Summary of path
     * @return Request
     */
    public function path()
    {
        $path = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),'/'),2);
        if(isset($path[0]) && !empty($path[0])){
            $this->setAction("/{$path[0]}");
        }

        if(isset($path[1]) && !empty($path[1])){
            $this->setParams(explode('/', $path[1]));
        }
        return $this;
    }
}