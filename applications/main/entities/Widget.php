<?php


namespace applications\main\entities;
use core\Model;
use core\db\Field;

class Widget extends Model {
    static function schema()
    {
        return[
            "id"    =>  Field::primaryIndex()->unique(),
            "class"  =>  Field::text(),
            "user" =>  Field::int(),
            "data" => Field::text()->editable()
        ];
    }


    public function render(){

        $widget = Widget::findById( $this->id );
        /**
         * @var $class WidgetFather
         */
        $class = $widget->class;
        $widget = $class::fromJson($widget->data);
        $widget->render();
    }
}