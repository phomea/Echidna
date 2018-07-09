<?php

namespace applications\ecommerce;


use applications\ecommerce\entities\Categoria;
use applications\ecommerce\entities\CategoriaProdotto;
use applications\ecommerce\entities\Prodotto;

class CatalogoSearch{

    /**
     * @param $cat Categoria|int
     */
    function byCategory( $cat ){
        if( is_int($cat)) {
            $id = $cat;
        }else{
            $id = $cat->id;
        }
        $cp = CategoriaProdotto::findById_categoria( $id );
        $return = [];
        if( !empty($cp) ) {
            foreach ($cp as $value) {
                if( $p = Prodotto::findById($value->id_prodotto) )
                $return[] = $p;
            }
        }

        return $return;
    }
}