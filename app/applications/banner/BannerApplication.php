<?php
namespace applications\banner;


use applications\banner\entities\Banner;
use applications\banner\BannerBackend;
use applications\pages\entities\Pagina;
use backend\Menu;
use core\abstracts\Application;
use core\Config;
use core\Model;
use core\services\Response;
use core\services\RouterService;

class BannerApplication extends Application {

    static function init($n)
    {
        parent::init($n); // TODO: Change the autogenerated stub

        /*Response::addVariable([
            "menu"  =>  [
                "gestionecontenuti" => [[
                    "label" =>  "Banner",
                    "children"  =>  [
                        ["label" => "Lista", "href" =>  "/backend/banner/lista"],
                        ["label" => "Aggiungi","href" =>  "/backend/banner/aggiungi"]
                    ]
                ]]
            ]
        ]);*/

        $t = Response::getFrontendTemplate();
        $t->addFunction("banner",[self::class, "renderBanner" ]);



        $menu = new Menu("Banner",self::getBackendApplication()::getIcon());
        $menu->addItem("Lista",RouterService::getRoute(Banner::getEntity().".list"));
        $menu->addItem("Aggiungi",RouterService::getRoute(Banner::getEntity().".add"));

        $backend = Response::getBackendTemplate();
        $backend::addMenu($menu);


    }

    static function getFrontendApplication()
    {
        // TODO: Implement getFrontendApplication() method.

        return null;
    }

    static function getBackendApplication()
    {
        // TODO: Implement getBackendApplication() method.
        return BannerBackend::class;
    }

    static function getEntityClass()
    {
        return Banner::class;
    }

    static function getPositions(){
        $f = Config::getFile("banner");
        $return = [[
            "value" =>  "",
            "label" =>  "---Nessuna---"
        ]];
        if(isset($f['positions'])){
            foreach ($f['positions'] as $key => $position) {
                $return[] = [
                    "value" =>  $key,
                    "label" =>  $position
                ];
            }

            return $return;
        }
        return [];
    }

    static function getType(){
        $f = Config::getFile("banner");
        $return = [[
            "value" =>  "",
            "label" =>  "---Nessuno---"
        ]];
        if(isset($f['types'])){
            foreach ($f['types'] as $key => $position) {
                $return[] = [
                    "value" =>  $key,
                    "label" =>  $position
                ];
            }

            return $return;
        }
        return [];
    }



    static function renderBanner( $params = [] ){
        $banners = Banner::findByHook( $params );





        if( count($banners)>0) {

            return [
                "banner/default", [
                    "banners" => $banners
                ]
            ];
        }
        return false;
    }



}