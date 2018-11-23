<?php
namespace backend;


use applications\users\UserRolesBackend;

class Menu{
    public $label;
    public $icon;

    public $children = [];


    public function __construct($label,$icon){
        $this->label = $label;
        $this->icon = $icon;
    }

    public function addItem($label,$route){
        if( UserRolesBackend::checkRoutePermission($route) )
            $this->children[] = new MenuItem($label,$route);
    }
}