<?php

namespace applications\ecommerce;


use applications\ecommerce\entities\Categoria;
use applications\ecommerce\entities\CategoriaProdotto;
use applications\ecommerce\entities\Prodotto;
use core\services\Db;

class CatalogoSearch{


    private $number_per_page;

    private $categories = [];
    private $attributes = [];
    private $query = "";


    private $pagination = null;

    private $params = [];

    /**
     * CatalogoSearch constructor.
     */
    public function __construct($params =[])
    {   $this->number_per_page = 9;

        $this->params = $params;

    }


    /**
     * @return null
     */
    public function getPagination()
    {
        return $this->pagination;
    }


    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }
    /**
     * @param $cat Categoria|int
     */
    function byCategory( $cat, $pag = 1 ,$includeSubCategories = true){
        if( is_int($cat)) {
            $id = $cat;
        }else{
            $id = $cat->id;
        }


        //$cp = CategoriaProdotto::findById_categoria( $id );

        /*$this->query = CategoriaProdotto::query(true)
            ->join(Prodotto::getEntity(),"id","id_prodotto")
            ->where(CategoriaProdotto::getTable().".id_categoria=".$id);

        foreach ($this->params as $key=>$value){
            if( isset(Prodotto::schema()[$key]) ){
                $this->query->where($key."=".Prodotto::formatToSql($key,$value));
            }
        }
        $this->query->setNumberPerPage($this->number_per_page);
        $this->query->setPage($pag);


        $cp = $this->query->getAll();

*/
        

        $this->query = Prodotto::query(true)
            ->setFields(Prodotto::getTable().".*")
            ->join(CategoriaProdotto::getEntity(),"id_prodotto","id");

        if($includeSubCategories){
            $this->query->
            join(Categoria::getEntity(),"id","id_categoria",CategoriaProdotto::getEntity())
            ->where("(".Categoria::getTable().".id=".$id." OR ".Categoria::getTable().".padre=".$id.")");
        }else{
            $this->query->where(CategoriaProdotto::getTable().".id_categoria=".$id);
        }

        foreach ($this->params as $key=>$value){
            if( isset(Prodotto::schema()[$key]) ){
                $this->query->where($key."=".Prodotto::formatToSql($key,$value));
            }
        }
        
        $this->query->setNumberPerPage($this->number_per_page);
        $this->query->setPage($pag);


        $cp = $this->query->getAll();


        Prodotto::expandArray($cp);

        $this->pagination = $this->query->getPagination();



        return $cp;





        $return = [];
        if( !empty($cp) ) {
            foreach ($cp as $value) {
                if( $p = Prodotto::query(true)->where("id=".$value->id_prodotto)->getOne() )
                {
                    $p->variantePrimaria = $p->getDefaultVariant();
                    $p->expandSchema();
                    $p->expandFields();

                $return[] = $p;
                }
            }
        }

        return $return;
    }


    /**
     * @param $c int[]
     * @return CatalogoSearch
     */
    function setCategories( $c ){

        $this->categories = array_filter($c);
        return $this;
    }
    /**
     * @param $c int[]
     * @return CatalogoSearch
     */
    function setAttributes( $c ){
        $this->attributes = array_filter($c);

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
            $sql .= " JOIN attachment as attachment ON prodotto.id = attachment.entity_id";
            $where .= " AND (LOWER(prodotto.nome) LIKE :query OR LOWER(prodotto.descrizione) LIKE :query OR attachment.value LIKE :query )";

        }
        $sql .= " ".$where;

        $sql .=" group by prodotto.id ";



        $attribute_ids = array_keys($this->attributes);


        $r = Db::$connection->fetchAll($sql,[
            "categories"    =>  $this->categories,
            "attribute_ids" =>  $attribute_ids,
            "attribute_values"  =>  $this->attributes,
            "query"     =>  "%".strtolower($this->query)."%"
        ]);

        if( !empty($r) ){
            $return = [];
            foreach ($r as $value){
                $return[] = new Prodotto($value);
            }
            return $return;
        }else{
            return [];
        }

    }


}