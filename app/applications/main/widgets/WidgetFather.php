<?php

namespace applications\main\widgets;


use applications\main\entities\Widget;
use core\db\Field;

class WidgetFather implements \ArrayAccess {

    public $dimension = self::DIMENSION_MEDIUM ;

    const DIMENSION_SMALL = 1;
    const DIMENSION_MEDIUM = 2;
    const DIMENSION_BIG = 3;


    public static function schema(){
        return [
            "dimension" =>  Field::text()->editable()->setTemplate("select")->setTemplateVar([
                ["label"=>"Grande","value"=> self::DIMENSION_BIG],
                ["label"=>"Medio","value"=> self::DIMENSION_MEDIUM],
                ["label"=>"Piccolo","value"=> self::DIMENSION_SMALL]
            ])
        ];
    }

    protected  static function mergeSchema( $s ){
        return array_merge( self::schema() , $s );
    }
    public $actions = [
        ["label"    =>  "Rimuovi","action"  =>  "remove"],
        ["label"    =>  "Modifica","action"  =>  "edit"]
    ];


    static function getTemplate(){
        return "";
    }

    static function getEntity(){
        return Widget::class;
    }

    static function getClass(){
        return static::class;
    }

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



    static function fromJson( $json ){
        $j = json_decode($json,true);



        $widget = new static();
        if($j) {
            foreach ($j as $key => $value) {
                //if (property_exists($widget, $key)) {
                    $widget->$key = $value;
                //}
            }
        }
        return $widget;
    }

    public function prepareToRender(){

        return $this->toArray();
    }

}