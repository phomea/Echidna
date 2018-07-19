<?php
namespace applications\pages;


use applications\pages\entities\Pagina;
use core\abstracts\Application;
use core\Model;
use core\services\Response;

class PagesApplication extends Application {

    static function init($n)
    {
        parent::init($n); // TODO: Change the autogenerated stub
        Response::addVariable([
            "menu"  =>  [
                "gestionecontenuti" => [[
                    "label" =>  "Pagine",
                    "children"  =>  [
                        ["label" => "Lista", "href" =>  "/backend/".static::$name."/lista"],
                        ["label" => "Aggiungi","href" =>  "/backend/".static::$name."/aggiungi"]
                    ]
                ]
            ]]
        ]);
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

}