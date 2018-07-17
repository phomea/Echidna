<?php

namespace core\services;


class UrlService{
    static $frontend = "http://localhost";
    /**
     * @var \Phroute\Phroute\RouteCollector
     */
    public $router;
    /**
     * UrlManager constructor.
     */
    public function __construct($router)
    {
        $this->router = $router;
    }

    public function currentUrl(){
        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return $actual_link;
    }


    public function frontend( $name , $var = []){
        return $this->router->route($name,$var);
    }

}