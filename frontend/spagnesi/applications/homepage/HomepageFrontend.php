<?php
namespace frontend\spagnesi\applications\homepage;

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


        $prodotti = Prodotto::query()->getAll();


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