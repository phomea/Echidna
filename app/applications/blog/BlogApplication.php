<?php
namespace applications\blog;


use applications\banner\BannerBackend;
use applications\blog\entities\Articolo;
use applications\blog\entities\Categoria;
use applications\pages\entities\Pagina;
use core\abstracts\Application;
use core\Model;
use core\services\Response;
use core\services\RouterService;

class BlogApplication extends Application {

    static function init($n)
    {
        parent::init($n); // TODO: Change the autogenerated stub
        Response::addVariable([
            "menu"  =>  [
                "gestionecontenuti" => [[
                    "label" =>  "Blog",
                    "icon"=>"rss",
                    "children"  =>  [
                        ["label" => "Articoli", "href" =>  "/backend/blog/articoli/lista"],
                        ["label" => "Categorie","href" =>  "/backend/blog/categorie/lista"]
                    ]
                ]]
            ]
        ]);


    }

    static function getFrontendApplication()
    {
        return BlogFrontend::class;
    }

    static function getBackendApplication()
    {
        // TODO: Implement getBackendApplication() method.
        return BlogBackend::class;
    }

    static function getEntityClass()
    {
        return Articolo::class;
    }

    static function declareRoutes()
    {
        RouterService::addRoutesPrefixed(Articoli::declareRoutes(),"/backend/blog/articoli/");
        RouterService::addRoutesPrefixed(Categorie::declareRoutes(),"/backend/blog/categorie/");

        return parent::declareRoutes(); // TODO: Change the autogenerated stub
    }

    static function install()
    {
        return [
            Articolo::class,
            Categoria::class
        ];
    }


}