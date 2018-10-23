<?php

namespace frontend\spagnesi\applications\ecommerce;

use applications\ecommerce\entities\Categoria;
use applications\ecommerce\entities\CategoriaProdotto;
use applications\ecommerce\entities\Prodotto;
use applications\media\entities\Attachment;
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

            $p =  Prodotto::findById($item->id_prodotto);
            if( $p )
                $prodotti[] = Prodotto::findById($item->id_prodotto);
        }



        return Response::getTemplateToUse("ecommerce/helpers/sameCategory",[
                "prodotti"  =>  $prodotti
            ]
        )->render();
        exit;
    }

    /**
     * @param $product Prodotto
     */
    function sameTag( $product ){
        /**
         * @var $categoria Categoria
         */

        $tags = explode(";",$product->tag);

        $simili = [];
        foreach ($tags as $value){
            $att = Attachment::query()
                ->where('entity="'.Prodotto::class.'"')
                ->where('field="tag"')
                ->where("entity_id <> ".$product->id)
                ->where('value="'.$value.'"')
                ->getAll();
            if( count($att)>0) {
                foreach ($att as $a) {
                    $simili[] = Prodotto::findById($a->entity_id);
                }
            }
        }


        if(count($simili) == 0){
            return $this->sameCategory($product);
        }


        return Response::getTemplateToUse("ecommerce/helpers/sameCategory",[
                "prodotti"  =>  $simili
            ]
        )->render();
        exit;
    }
}