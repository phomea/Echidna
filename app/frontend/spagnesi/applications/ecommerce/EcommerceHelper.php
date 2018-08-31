<?php

namespace frontend\spagnesi\applications\ecommerce;

use applications\ecommerce\entities\Categoria;
use applications\ecommerce\entities\CategoriaProdotto;
use applications\ecommerce\entities\Prodotto;
use core\services\Response;

class EcommerceHelper{

    /**
     * @param $product Prodotto
     */
    function sameCategory( $product ){
        /**
         * @var $categoria Categoria
         */
        $categoria = reset($product->categories);

        $prodotti = [];
        $c = CategoriaProdotto::query()->where("id_categoria = ".$categoria->id)->where(" id_prodotto <>  ".$product->id)->getAll();

        foreach ($c as $item) {
            $prodotti[] = Prodotto::findById($item->id_prodotto);
        }

        return Response::getTemplateToUse("ecommerce/helpers/sameCategory",[
            "prodotti"  =>  $prodotti
        ]
        )->render();
        exit;
    }
}