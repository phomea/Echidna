<?php
namespace core;

use applications\meta\entities\Meta;
use applications\pages\entities\Contenuto;
use core\services\Db;

;

class Query
{
    private $entity;
    private $table;
    private $where;
    private $limit;
    private $offset;
    private $order;
    private $orderBy;
    public $query;
    private $fields = '*';

    private $numberPerPage = 12;


    /**
     * @return Model
     */
    public function getEntity()
    {
        return $this->entity;
    }

    public function getOffset(){
        return $this->offset;
    }



    /**
     * @return null
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return mixed
     */
    public function getWhere()
    {
        $w = '(1=1 ';
        foreach ($this->where["and"] as $valueAnd) {
            $w .= " and " . $valueAnd;
        }
        $w.= ')';
        return $w;
    }
    public function getOrWhere()
    {
        $w = '(';
        foreach ($this->where["or"] as $k => $valueOr) {
            if($k==0){
                $w .=   $valueOr;
            }else{
                $w .= " or " . $valueOr;
            }

        }
        $w.= ')';
        return $w;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }


    public function setNumberPerPage($n){
        $this->numberPerPage = $n;
    }
    public function setPage($n){
        $this->setLimit($this->numberPerPage,$n*$this->numberPerPage);
    }
    /**
     * @return mixed
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * @param int $entity
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * @param null $limit
     */
    public function setLimit($limit,$offset=null)
    {

        $this->limit = $limit;
        if($offset!=null)
            $this->offset=$offset;
        return $this;
    }

    /**
     * @param string $table
     */
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }


    public function setOrderBy($orderBy,$order)
    {
        $this->setOrder($order);
        $this->orderBy = $orderBy;
        return $this;
    }

    /**
     * @param mixed $where
     */
    public function where($where)
    {


            $this->where["and"][] = $where;


        return $this;
    }

    public function orWhere($OrWhere)
    {
        $this->where["or"][] = $OrWhere;
        return $this;
    }

    /**
     * QueryBuilder constructor.
     * @param $nomeEntita
     */
    public function __construct($nomeEntita)
    {
        $this->entity = $nomeEntita;
        $this->table = $nomeEntita::getTable();
        return $this;
    }

    public function echoQuery(){
        echo $this->query;
    }

    public function getAll()
    {
        $query = $this->buildQuery();

        $risultato = [];
        foreach ( Db::$connection->fetchAll($query) as $value){
            $risultato[] = $this->getResults( $value );
        }

        return $risultato;
    }

    public function getOne()
    {
        $this->setLimit(1);
        $query = $this->buildQuery();
        //$this->query .= " limit 1 ";

        /*if( $cached = Cache::get($this->entity,$this->query)){

            return $cached ? $cached[0] : false;
        }else{*/
            $risultato = $this->getResults(  Db::$connection->fetchOne($query) );
        //}
        //$risultato = $this->getResults(Db::query($query,$this->entity));





        return $risultato;
    }

    public function count()
    {
        $this->fields = "COUNT(id) as conto";
        $query = $this->buildQuery();

        /** @var \mysqli_result $risultato */

        if( $cached = Cache::get($this->entity,$this->query)){
            return $cached;
        }else{

            $risultato = Db::$connection->perform($query);
        }


        return $risultato->fetchColumn();

        if($risultato){
            $r = $risultato->fetch_assoc();
            return $r['conto'];
        }

        //$risultato = $this->getResults(Db::query($query,$this->entity));
        return 0;
    }

    public function buildQuery()
    {
        $query = "SELECT ".$this->fields." FROM ";
        $query .= " `" . $this->table . "` where 1 ";
        if (isset($this->where["and"])) {
            foreach ($this->where["and"] as $valueAnd) {
                $query .= " and " . $valueAnd;
            }
        }
        if (isset($this->where["or"])) {
            foreach ($this->where["or"] as $valueOr) {
                $query .= " or " . $valueOr;
            }
        }


        if ($this->getOrder() != "") {
            switch (strtolower($this->order)) {
                case "asc":
                    if($this->getOrderBy()!=""){
                        $query .= " ORDER BY `".$this->getOrderBy()."` ASC";
                    }else {
                        $query .= " ORDER BY id ASC";
                    }
                    break;
                case "desc";
                    if($this->getOrderBy()!=""){
                        $query .= " ORDER BY `".$this->getOrderBy()."` DESC";
                    }else {
                        $query .= " ORDER BY id DESC";
                    }
                    break;
                default:

                    if($this->getOrderBy()!=""){
                        $query .= " ORDER BY `".$this->getOrderBy()."` ASC";
                    }else {
                        $query .= " ORDER BY id ASC";
                    }
            }
        }

        if($this->getLimit()!=null){
            if($this->getOffset() !=null){
                $query .= " LIMIT ".$this->offset.",".$this->limit;
            }else{
                $query .= " LIMIT ".$this->limit;
            }

        }

        $this->query = $query;
        return $query;
    }


    private function getResults($data)
    {


        if(!$data) return $data;

        $e = $this->getEntity();

        return $e::getInstance($data);// new $e($data);
        exit;

        var_dump($data);
        exit;
        $ritorno = [];
        $entita = $this->entity;
        if ($data && $data->num_rows > 0 ) {
            while ($rows = $data->fetch_assoc()) {
                //$ritorno[] = $entita::getInstance($rows);
                $e = new $entita();
                $e->load($rows);
                $ritorno[] = $e;

            }


            return $ritorno;
        } else {
            return false;
        }
    }
}
