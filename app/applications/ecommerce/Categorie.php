<?php

namespace applications\ecommerce;

use applications\ecommerce\entities\Categoria;
use applications\ecommerce\entities\Ordine;
use applications\ecommerce\entities\Prodotto;
use applications\ecommerce\traits\metodiCatalogoCategoria;
use applications\ecommerce\traits\metodiCatalogoProdotto;
use core\abstracts\Application;
use core\abstracts\BackendApplication;
use core\Route;
use core\Environment;
use core\services\RouterService;

class Categorie extends BackendApplication {
    use metodiCatalogoCategoria;

    static function getApplication()
    {
        return EcommerceApplication::class;
    }


    static function getEntityClass()
    {
        return Categoria::class;
    }


}