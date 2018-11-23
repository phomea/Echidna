<?php
namespace applications\login\entities;

use core\db\Field;
use core\Model;

class RolePermission extends Model{
    static $permissions = [];

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "userrole_id"   =>  Field::int(),
            "route"  =>  Field::varchar(512)->editable(),
            "active"    =>  Field::boolean()
        ];
    }


    public function isActive(){
        return $this->active == 1;
    }

}