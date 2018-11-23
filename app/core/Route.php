<?php
namespace core;

use core\services\RouterService;

class Route{
    public $name;
    public $regex;
    public $callback;
    public $method;
    public $filters = [];


    public $type = 1; // 0 backend 1 frontend

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

    public function setFrontend(){
        $this->type = 1;
    }
    public function setBackend(){
        $this->type = 0;
    }

    public function method( $method ){
        $this->method = $method;
        return $this;
    }

    public function addFilter( $callback ){



        $filter = (new RouteFilter())->setCallback( $callback )->setName("filter.".$this->regex)->setRegex($this->regex);

        RouterService::addFilter($filter);
        //$this->filters[] = $callback;
        return $this;
    }
    public function build( $params = []){


        $url = RouterService::buildUrl($this->regex,$params);
        return $url;

    }

    public function applyFilters( $query ){





        foreach (RouterService::$filters as $filter){




            $pattern = $filter->regex;
            preg_match_all("|{([a-z-_]*):([\[\]\^/\(\)\.\[\]a-zA-Z0-9+*-]*)}|i",$filter->regex,$mm);





            foreach($mm[0] as $key=>$value){
                $pattern = str_replace($mm[0][$key],$mm[2][$key],$pattern);
            }

            $v = preg_match("/".str_replace("/","\/",$pattern)."/","/".$query);
            if($v !== 1){

            }else {

                $r = $filter->callback[0]::{$filter->callback[1]}($this);



                if ($r !== null && !$r) return $r;
                //call_user_func($filter,[&$this]);
            }
        }





        return;

        /*foreach ($this->filters as $filter){
            $r = $filter[0]::{$filter[1]}($this);

            if($r !== null ) return $r;
            //call_user_func($filter,[&$this]);
        }*/
    }


    public function go( $params =[] ){


        $url = $this->build($params);
        header("Location: ".$url);
        exit;
    }

}