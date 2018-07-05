<?php

namespace applications\ecommerce\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

class AttributoEntita extends Model{
    static function getTable()
    {
        return "ecommerce_attributo_entita";
    }

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "id_attributo"  =>  Field::int(),
            "id_entita"  =>  Field::int(),
            "entita"  =>  Field::varchar(64)

        ];
    }


    static function findByEntity( $entity, $id ){
        $sql = "SELECT * FROM ecommerce_attributo_entita WHERE entita=:entity AND id_entita=:id";
        return Db::$connection->fetchAll($sql,[
            "entity"    =>  $entity,
            "id"    =>  $id
        ]);
    }

    static function findByComplete( $entity, $id_attributo, $id_entita ){

        $sql = "SELECT * FROM ecommerce_attributo_entita WHERE entita=:entity AND id_entita=:id_entita AND id_attributo=:id_attributo";

        $query = AttributoEntita::query();
        $r = $query->
            where('entita="' . $entity .'"')
            ->where("id_entita=".$id_entita)
            ->where("id_attributo=".$id_attributo)
            ->getOne();





        return $r;
    }
}