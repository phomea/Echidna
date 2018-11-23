<?php
namespace backend;



class MenuItem{
    public $label;
    public $route;
    public $href;

    public function __construct($label,$route){
        $this->label = $label;
        $this->route = $route;
        $this->href = $route->build();
    }
}