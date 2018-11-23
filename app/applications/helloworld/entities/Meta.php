<?php

namespace applications\helloworld\entities;

use core\Model;
use core\db\Field;


class HelloWorld extends Model {
    static function schema()
    {
        return[
            "id"    =>  Field::primaryIndex(),
            "title"  =>  Field::string()->editable(),
            "entity" =>  Field::string()->editable()->setTemplate("hidden"),
            "entity_id" => Field::int()->editable()->setTemplate("hidden"),
            "description" => Field::text()->editable()->setTemplate("textarea"),
            "og_image" => Field::text()->editable()->setTemplate("media")
        ];
    }
}