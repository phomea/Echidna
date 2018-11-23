<?php
namespace applications\login\entities;

use core\db\Field;
use core\Model;

class UserRole extends Model{
    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "name"  =>  Field::varchar(512)->editable()
        ];
    }

}