<?php

namespace core;

class RouteFilter {
    public $callback;
    public $regex;
    public $name;

    function setCallback( $callback ){
        $this->callback = $callback;
        return $this;
    }
    function setRegex( $regex ){

        $this->regex = $regex;


        return $this;
    }
    function setName( $name ){
        $this->name = $name;
        return $this;
    }
}