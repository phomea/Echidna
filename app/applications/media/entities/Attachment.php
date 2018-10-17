<?php


namespace applications\media\entities;

use core\Model;
use core\db\Field;


class Attachment extends Model {
    const ID = "id";
    const ENTITY = "entity";
    const VALUE = "value";
    const ENTITY_ID ="entity_id";
    const TYPE ="type";
    const FIELD ="field";

    static function schema()
    {
        return[
            self::ID    =>  Field::primaryIndex()->unique(),
            self::ENTITY  =>  Field::text(),
            self::VALUE =>  Field::text(  ),
            self::ENTITY_ID =>  Field::int(),
            self::TYPE =>  Field::text(),
            self::FIELD =>  Field::text(),

        ];
    }

}