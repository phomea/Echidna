<?php

namespace applications\reports\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

use applications\anagraficaimmobili\entities\Condominio;
use applications\anagraficaimmobili\entities\TipoAggregatore;


class EnergiaErogata extends Model{

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "idBolletta"    =>  Field::int(),
            "idGeneratore" =>  Field::int(),
            "valore"    =>  Field::float(),
            "lettura_iniziale"  =>  Field::float(),
            "lettura_finale"    =>  Field::float(),
            "servizio"  =>  Field::varchar(5), // cli , cle, acs
            "virtuale"  =>  Field::boolean()->setDefault(0)
        ];
    }

    static function findByGeneratoreServizio($idb,$idg,$s){
        return EnergiaErogata::query()
            ->where("idBolletta=".$idb)
            ->where("idGeneratore=".$idg)
            ->where('servizio="'.$s.'"')
            ->getOne();
    }

}


