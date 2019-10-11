<?php

namespace applications\newsletter\entities;

use core\db\Field;
use core\Model;

class NewsletterUtente extends Model{
    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "email" =>  Field::varchar(512)->editable()
        ];
    }

}