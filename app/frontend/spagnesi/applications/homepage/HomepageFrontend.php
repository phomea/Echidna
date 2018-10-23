<?php
namespace frontend\spagnesi\applications\homepage;

use applications\ecommerce\Catalogo;
use applications\ecommerce\CatalogoSearch;
use applications\ecommerce\entities\Categoria;
use applications\ecommerce\entities\Prodotto;
use applications\pages\PagesApplication;
use applications\pages\PagesFrontend;
use core\abstracts\FrontendApplication;
use core\Route;

class HomepageFrontend extends FrontendApplication{
    static function declareRoutes()
    {
        return [
            "home"  =>  new Route("home","/",[self::class,"home"])

        ];
    }

    static function home(){
        $homepage = HomepageBackend::getHomepage();
        $homepage['pagina']->prepareHooks();


        $templatedausare = "tshirt";


        //$prodotti = Prodotto::query()->getAll();

        $prodotti = [];

        $categoriaHome = Categoria::findBySlug("home");
        if( count($categoriaHome) > 0 ) {
            $search = new CatalogoSearch();
            $prodotti = $search->byCategory( $categoriaHome[0] );
        }

        return[
            "pagine/home",
            [
                "pagina" =>  $homepage['pagina'],
                "prodotti"  =>  $prodotti
            ]
        ];

        exit;
    }
}