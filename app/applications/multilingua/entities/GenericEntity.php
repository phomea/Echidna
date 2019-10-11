<?php
namespace applications\multilingua\entities;

use core\Model;

class GenericEntity extends Model{
    public $table = "";
    public $schema = [];

    public function localSchema()
    {
        return $this->schema;
    }

    public function localGetTable()
    {
        return $this->table;
    }


}