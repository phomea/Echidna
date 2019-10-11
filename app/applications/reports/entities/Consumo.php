<?php

namespace applications\reports\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

use applications\anagraficaimmobili\entities\Condominio;
use applications\anagraficaimmobili\entities\TipoAggregatore;


class Consumo extends Model{

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "idBolletta"    =>  Field::int(),
            "idVettore" =>  Field::int(),
            "valore"    =>  Field::float(),
            "lettura_iniziale"  =>  Field::float(),
            "lettura_finale"    =>  Field::float(),
            "spesa_nel_periodo" => Field::float(),
        ];
    }


    static function findByBollettaVettore( $idb,$idv){
        return Consumo::query()
            ->where("idBolletta=".$idb)
            ->where("idVettore=".$idv)
            ->getOne();
    }

}


