<?php
namespace applications\contatti;

use applications\contatti\entities\Indirizzo;
use core\Route;

class ContattiBackend extends \core\abstracts\BackendApplication{
    static function getApplication()
    {
        return ContattiApplication::class;
    }

    static function getEntityClass()
    {
        return Indirizzo::class;
    }


    static function declareRoutes()
    {
        return array_merge(parent::declareRoutes(),[
           "backend.contatti.indirizzi" => new Route("","indirizzi",[self::class,"_indirizzi"])
        ]);
    }


    static function _indirizzi($params = []){
        return static::actionList($params);
        exit;
    }

}