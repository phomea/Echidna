<?php

namespace applications\main\widgets;


class WidgetFather implements \ArrayAccess {

    public $dimension = self::DIMENSION_MEDIUM ;

    const DIMENSION_SMALL = 1;
    const DIMENSION_MEDIUM = 2;
    const DIMENSION_BIG = 3;

    public $actions = [
        ["label"    =>  "Rimuovi","action"  =>  "remove"],
        ["label"    =>  "Modifica","action"  =>  "edit"]
    ];

    public function offsetExists($offset)
    {
        return isset($this->$offset);
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        return $this->$offset;

        // TODO: Implement offsetGet() method.
    }

    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;

        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset($offset)
    {
        unset($this->$offset);
        // TODO: Implement offsetUnset() method.
    }

    public function toArray(){
        return (array)$this;
    }

    static function getWidgetLabel(){
        return "Widget";
    }
    static function getWidgetName(){
        return "widget.father";
    }

    static function getSchema(){

    }

    static function fromJson( $json ){
        $j = json_decode($json,true);


        $widget = new static();
        if($j) {
            foreach ($j as $key => $value) {
                if (property_exists($widget, $key)) {
                    $widget->$key = $value;
                }
            }
        }
        return $widget;
    }

}