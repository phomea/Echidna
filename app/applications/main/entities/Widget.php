<?php


namespace applications\main\entities;
use core\Model;
use core\db\Field;
use core\services\Response;

class Widget extends Model {
    static function schema()
    {
        return[
            "id"    =>  Field::primaryIndex()->unique(),
            "class"  =>  Field::text()->editable()->setTemplate("hidden"),
            "user" =>  Field::int()->editable()->setTemplate("hidden"),
            "data" => Field::text()
        ];
    }


    public function render(){

        $widget = Widget::findById( $this->id );
        /**
         * @var $class WidgetFather
         */
        $class = $widget->class;
        $widget = $class::fromJson($widget->data);
        $widget->widget = $this;



        echo Response::getTemplateToUse($class::getTemplate(),
            $widget->prepareToRender()
        )->render();

    }


}