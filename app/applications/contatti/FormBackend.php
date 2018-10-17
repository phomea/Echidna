<?php
namespace applications\contatti;

use applications\contatti\entities\Form;
use applications\contatti\entities\Indirizzo;
use core\Route;

class FormBackend extends \core\abstracts\BackendApplication{
    static function getApplication()
    {
        return ContattiApplication::class;
    }

    static function getEntityClass()
    {
        return Form::class;
    }


    static function declareRoutes()
    {
        return array_merge(parent::declareRoutes(),[
            "backend.contatti.form" => new Route("","form",[self::class,"_lista"])
        ]);
    }


    static function _lista($params = []){
        return static::actionList($params);
        exit;
    }

}