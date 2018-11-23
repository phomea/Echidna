<?php
namespace applications\pages;


use applications\login\LoginApplication;
use applications\pages\contents\ContentType;
use applications\pages\entities\Contenuto;
use applications\pages\entities\Pagina;
use applications\pages\entities\ProvaInstall;
use applications\users\UserRolesBackend;
use backend\Menu;
use core\abstracts\Application;
use core\Model;
use core\services\Response;
use core\services\RouterService;

class PagesApplication extends Application {

    static function init($n)
    {
        parent::init($n); // TODO: Change the autogenerated stub
        /*Response::addVariable([
            "menu"  =>  [
                "gestionecontenuti" => [[
                    "label" =>  "Pagine",
                    "icon"  =>  self::getBackendApplication()::getIcon(),
                    "children"  =>  [
                        ["label" => "Lista", "href" =>  "/backend/".static::$name."/lista"],
                        ["label" => "Aggiungi","href" =>  "/backend/".static::$name."/aggiungi"]
                    ]
                ]
            ]]
        ]);*/


        //self::addMenu("Lista",RouterService::getRoute(Pagina::getEntity().".list"));
        //self::addMenu("Lista",RouterService::getRoute(Pagina::getEntity().".list"));

        $menu = new Menu("Pagine",self::getBackendApplication()::getIcon());
        $menu->addItem("Lista",RouterService::getRoute(Pagina::getEntity().".list"));
        $menu->addItem("Aggiungi",RouterService::getRoute(Pagina::getEntity().".add"));

        $backend = Response::getBackendTemplate();
        $backend::addMenu($menu);

    }

    static function getFrontendApplication()
    {
        // TODO: Implement getFrontendApplication() method.

        return PagesFrontend::class;
    }

    static function getBackendApplication()
    {
        // TODO: Implement getBackendApplication() method.
        return PagesBackend::class;
    }

    static function getEntityClass()
    {
        return Pagina::class;
    }

    static function install()
    {
        return [
            Pagina::class,
            Contenuto::class
        ];
    }


    static function addMenu( $label, $route ){
        Response::addVariable([
            "menu"  =>  [
                "gestionecontenuti" => [[
                    "label" =>  "Pagine",
                    "icon"  =>  self::getBackendApplication()::getIcon(),
                    "children"  =>  [
                        ["label" => $label, "href" =>  $route->build()]
                    ]
                ]
                ]]
        ]);

    }

    static function createMenu(){

    }


}

