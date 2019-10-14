<?php
namespace applications\media;


use applications\banner\entities\Articolo;
use applications\banner\BannerBackend;

use applications\media\entities\Attachment;
use applications\media\entities\Media;
use applications\pages\entities\Pagina;
use backend\Menu;
use core\abstracts\Application;
use core\Model;
use core\services\Response;
use core\services\RouterService;

class MediaApplication extends Application {
    static function init($n)
    {
        parent::init($n); // TODO: Change the autogenerated stub

        /*Response::addVariable([
            "menu"  =>  [
                "gestionecontenuti" => [[
                    "icon"  =>  "picture",
                    "label" =>  "Media",
                    "children"  =>  [
                        ["label" => "Lista", "href" =>  "/backend/media/lista"],
                        ["label" => "Aggiungi","href" =>  "/backend/media/aggiungi"]
                    ]
                ]]
            ]
        ]);


        $menu = new Menu("Media","picture");
        $menu->addItem("Lista",RouterService::getRoute(Media::getEntity().".list"));
        $menu->addItem("Aggiungi",RouterService::getRoute(Media::getEntity().".add"));



        $backend = Response::getBackendTemplate();
        $backend::addMenu($menu);*/


    }


    static function getFrontendApplication()
    {
        // TODO: Implement getFrontendApplication() method.

        return null;
    }

    static function getBackendApplication()
    {
        // TODO: Implement getBackendApplication() method.
        return MediaBackend::class;
    }

    static function getEntityClass()
    {
        return Media::class;
    }
    static function install()
    {
        return [
            Attachment::class
        ];
    }

}