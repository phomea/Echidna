<?php
/**
 * Created by PhpStorm.
 * User: phome
 * Date: 22/05/2018
 * Time: 20:55
 */

namespace applications\schematics;
use applications\schematics\SchematicsApplication;
use core\abstracts\Application;

class SchematicsBackend extends \core\abstracts\BackendApplication{
    static function getApplication()
    {
        return SchematicsApplication::class;
    }

    /*
    //Non usare - test
    static function actionMod( $params =[] ){
		$r = parent::actionMod($params);
        return [
            "schematics/templates/modificaschema", $r[1]
        ];
    }
    */




}