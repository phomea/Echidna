<?php

namespace applications\ecommerce;

use applications\ecommerce\entities\Categoria;
use applications\ecommerce\entities\Prodotto;
use applications\ecommerce\traits\metodiCatalogoCategoria;
use applications\ecommerce\traits\metodiCatalogoProdotto;
use core\abstracts\Application;
use core\abstracts\BackendApplication;
use core\services\Response;

class Catalogo extends BackendApplication {

    use metodiCatalogoCategoria;
    use metodiCatalogoProdotto;

    static function getApplication()
    {
        return EcommerceApplication::class;
    }


    static function catalogo(){
        return [
            "ecommerce/templates/catalogo",[
                "entita" => [
                    "categoria" => Categoria::getEntity(),
                    "prodotto" => Prodotto::getEntity()
                ]
            ]
        ];
    }

}