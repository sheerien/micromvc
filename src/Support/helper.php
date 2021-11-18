<?php

use Micro\Mvc\App;

if(!function_exists('app')){
    function app(){
        static $instance = null;
        if(is_null($instance)){
            $instance = new App();
        }

        return $instance;
    }
}