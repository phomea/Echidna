<?php
namespace frontend\spagnesi\applications\homepage;

use applications\pages\entities\Pagina;
use core\abstracts\Application;
use core\Route;
use core\services\Db;

class HomepageBackend extends \core\abstracts\BackendApplication{
    static function getApplication()
    {
        return HomepageApplication::class;
    }

    static function declareRoutes()
    {

        return [
            "homepage.gestisci" =>  new Route("homepage.gestisci","gestisci", [self::class,"gestisci"]),
            "home.save"  =>  (new Route("home","gestisci",[self::class,"homeSave"]))->method(Route::METHOD_POST)
        ];
    }

    static function getHomepage(){
        $query = "SELECT * from homepage where id=1";
        $homepage = Db::$connection->fetchOne($query);
        $pagina = Pagina::findById($homepage['pagina_id']);
        $homepage['pagina']=$pagina;
        return $homepage;
    }

    static function gestisci(){
        $pagine = Pagina::query()->getAll();

        return [
            "homepage/templates/gestisci",[
                "pagine"    => $pagine,
                "homepage"  =>  self::getHomepage()
            ]
        ];
    }

    static  function homeSave( $params =[],$data = [] ){
        $query = "UPDATE homepage SET ";
        $campi = [];

        if( isset($data['pagina_id']) ) {
            $campi[] = "pagina_id=:pagina_id";
        }
        if( isset($data['meta_title']) ) {
            $campi[] = "meta_title=:meta_title";
        }
        if( isset($data['meta_description']) ) {
            $campi[] = "meta_description=:meta_description";
        }

        $query.= implode(",",$campi);
        $query.=" WHERE id=1";

        $r = Db::$connection->perform($query,$data);
        var_dump($r);
        exit;
    }


}