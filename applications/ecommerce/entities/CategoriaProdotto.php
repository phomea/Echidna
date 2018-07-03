<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;

class CategoriaProdotto extends Model{

    public $prodotto = null;
    public $categoria = null;

    static function getTable()
    {
        return "ecommerce_categoria_prodotto";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "id_prodotto"  =>  Field::int(),
            "id_categoria"  =>  Field::int()
        ];
    }

    public function updateFromDb(){
        $this->prodotto = Prodotto::findById($this->id_prodotto);
        $this->categoria = Prodotto::findById($this->id_categoria);
    }

}