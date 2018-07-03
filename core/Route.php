<?php
namespace core;

use core\services\RouterService;

class Route{
    public $name;
    public $regex;
    public $callback;
    public $method;
    public $filters = [];



    const METHOD_GET    =   "GET";
    const METHOD_POST   =   "POST";
    const METHOD_PUT    =   "PUT";
    const METHOD_DELETE =   "DELETE";

    /**
     * Route constructor.
     * @param $name
     * @param $regex
     * @param $callback
     */
    public function __construct($name, $regex, $callback)
    {
        $this->name = $name;
        $this->regex = $regex;
        $this->callback = $callback;
        $this->method = static::METHOD_GET;
    }


    public function method( $method ){
        $this->method = $method;
        return $this;
    }

    public function addFilter( $callback ){
        $this->filters[] = $callback;
        return $this;
    }
    public function build( $params = []){


        $url = RouterService::buildUrl($this->regex,$params);
        return $url;

    }

    public function applyFilters(){
        foreach ($this->filters as $filter){
            $r = $filter[0]::{$filter[1]}($this);

            if($r !== null ) return $r;
            //call_user_func($filter,[&$this]);
        }
    }


    public function go( $params =[] ){


        $url = $this->build($params);
        header("Location: ".$url);
        exit;
    }

}