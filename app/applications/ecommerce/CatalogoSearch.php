<?php

namespace applications\ecommerce;


use applications\ecommerce\entities\Categoria;
use applications\ecommerce\entities\CategoriaProdotto;
use applications\ecommerce\entities\Prodotto;
use core\services\Db;

class CatalogoSearch{

    private $categories = [];
    private $attributes = [];
    private $query = "";


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


    /**
     * @param $c int[]
     * @return CatalogoSearch
     */
    function setCategories( $c ){
        $this->categories = $c;
        return $this;
    }
    /**
     * @param $c int[]
     * @return CatalogoSearch
     */
    function setAttributes( $c ){
        $this->attributes = $c;
        return $this;
    }
    /**
     * @param $c string
     * @return CatalogoSearch
     */
    function setQuery( $c ){
        $this->query = $c;
        return $this;
    }


    function search(){
        $where = " WHERE 1 = 1";
        $sql = "SELECT prodotto.* FROM ecommerce_prodotto as prodotto ";

        if( count($this->categories) > 0){
            $sql .= " JOIN ecommerce_categoria_prodotto as categoria_prodotto ON prodotto.id = categoria_prodotto.id_prodotto";
            $where .= " AND categoria_prodotto.id_categoria IN (:categories)";
        }

        if( count($this->attributes) > 0){
            $sql .= " JOIN ecommerce_prodotto_variante as variante ON prodotto.id = variante.id_prodotto";
            $sql .= " JOIN ecommerce_prodotto_variante_attributi as variante_attributi ON variante.id = variante_attributi.id_ecommerce_prodotto_variante";

            $where .= " AND variante_attributi.id_ecommerce_attributo IN (:attribute_ids)";
            $where .= " AND variante_attributi.id_valore IN (:attribute_values)";
        }

        if( trim($this->query) != ""){
            $where .= " AND (LOWER(prodotto.nome) LIKE :query OR LOWER(prodotto.descrizione) LIKE :query )";
        }
        $sql .= " ".$where;

        $attribute_ids = array_keys($this->attributes);


        return Db::$connection->fetchAll($sql,[
            "categories"    =>  $this->categories,
            "attribute_ids" =>  $attribute_ids,
            "attribute_values"  =>  $this->attributes,
            "query"     =>  "%".strtolower($this->query)."%"
        ]);

    }


}