<?php
namespace core\db;

use applications\meta\entities\Meta;
use applications\pages\entities\Contenuto;
use core\Cache;
use core\Environment;
use core\Events;
use core\Model;
use core\services\Db;
use core\services\Response;

;

class Query
{

    const JOIN_LEFT  = "left join";
    const INNER_JOIN = "inner join";

    private $useCache = true;


    public $entity;
    public $table;
    private $where;
    private $limit;
    private $offset;
    private $order;
    private $orderBy;
    public $query;
    private $fields = '*';

    private $numberPerPage = 12;

    private $rawResult = false;

    public $currentPage=0;


    private $pagination;

    private $paginate = true;

    private $joins = [];



    public function usePagination($p){
        $this->paginate = $p;
        return $this;
    }
    public function useCache($e = true){
        $this->useCache = $e;
        return $this;
    }

    public $rawJoins = [];

    /**
     * @return array
     */
    public function getJoins()
    {
        return $this->joins;
    }

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


    public function setFields($fields){
        $this->fields = $fields;
        return $this;
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

    public function setWhere($where){
        $this->where = $where;
    }
    public function getWhereArray(){
        return $this->where;
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


    public function mergeWhere( $w ){
        $this->where = array_merge($this->where,$w);
        
    }

    public function mergeJoins( $j ){
        $this->joins = array_merge($this->joins,$j);
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
        return $this;
    }

    /**
     * @return int
     */
    public function getNumberPerPage()
    {
        return $this->numberPerPage;
    }
    public function setPage($n){
        $this->currentPage = $n;
        $n = $n-1;
        if($n<0)$n=0;
        $this->setLimit($this->numberPerPage,$n*$this->numberPerPage);
        return $this;
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
        return $this;
    }


    /**
     * @return mixed
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    public function setOrderBy($orderBy,$order = "ASC")
    {
        $this->setOrder($order);
        $this->orderBy = $orderBy;
        return $this;
    }



    public function join($entity,$entityField,$mainField,$secondEntity = null,$type = Query::JOIN_LEFT){
        $this->joins[]=[
            "entity" => $entity,
            "mainField" =>  $mainField,
            "entityField" => $entityField,
            "secondEntity" => $secondEntity == null ? $this->entity : $secondEntity,
            "type"  =>  $type
        ];

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
    public function __construct($nomeEntita,$rawResult = false)
    {


        $this->rawResult = $rawResult;
        $this->entity = $nomeEntita;
        $this->table = $nomeEntita::getTable();


        if(Environment::is(Environment::DEV)){
            $this->useCache(false);
        }
        return $this;
    }

    public function echoQuery(){
        echo $this->query;
    }


    public function buildPagination(){
        $this->pagination = new Pagination($this);
    }

    /**
     * @return Model[]|bool
     */
    public function getAll()
    {
        if( Events::exists(Events::QUERY_GETALL) ){
            Events::dispatch(Events::QUERY_GETALL,$this);
        }

        $query = $this->buildQuery();



        $risultato = [];



        if($this->getLimit()!=null && $this->paginate){
            $this->pagination = new Pagination($this);
        }





        if( $this->entity::useCache() && $this->useCache && ($cached = Cache::get($this->entity,$query)) !== null){


            foreach ( $cached as $value){
                $risultato[] = $this->getResults( $value );
            };

        }else{

            $r = Db::$connection->fetchAll($query);

            if( $this->entity::useCache() && $this->useCache)
                Cache::set($this->entity,$query,$r);

            foreach ( $r as $value){
                $risultato[] = $this->getResults( $value );
            };




        }

        return $risultato;
    }

    public function getOne()
    {
        if( Events::exists(Events::QUERY_GETONE) ){
            Events::dispatch(Events::QUERY_GETONE,$this);
        }

        $this->setLimit(1);
        $query = $this->buildQuery();
        //$this->query .= " limit 1 ";

        if( $this->entity::useCache() && $this->useCache && ($cached = Cache::get($this->entity,$query)) !== null){

            return $this->getResults( $cached );
        }else{
            $r = Db::$connection->fetchOne($query);
            $risultato = $this->getResults(  $r );
            if($this->entity::useCache() && $this->useCache )
            Cache::set($this->entity,$query,$r);
        }
        //$risultato = $this->getResults(Db::query($query,$this->entity));





        return $risultato;
    }

    public function count()
    {
        if( Events::exists(Events::QUERY_COUNT) ){
            Events::dispatch(Events::QUERY_COUNT,$this);
        }

        $this->fields = "COUNT(".$this->getEntity()::getTable().".id) as conto";
        $query = $this->buildQuery(true);

        /** @var \mysqli_result $risultato */

        $rr = 0;
        $risultato = Db::$connection->perform($query);
        return $risultato->fetchColumn();


        if(false &&  $this->entity::useCache() && $this->useCache &&  ($cached = Cache::get($this->entity,$query))!==null){

            $rr = $cached;
        }else{

            $risultato = Db::$connection->perform($query);
            $rr = $risultato->fetchColumn();
            if(  $this->entity::useCache() && $this->useCache ){
                Cache::set($this->entity,$query,$rr);
            }


        }


        return $rr;

        if($risultato){
            $r = $risultato->fetch_assoc();
            return $r['conto'];
        }

        //$risultato = $this->getResults(Db::query($query,$this->entity));
        return 0;
    }

    public $groupBy = "";

    /**
     * @param string $groupBy
     */
    public function setGroupBy($groupBy)
    {
        $this->groupBy = $groupBy;
        return $this;
    }
    public function buildQuery($skipLimit = false)
    {

        if(Response::$templateToUse !== null ) {

            if(Response::$templateToUse == "frontendTemplate"){


                $q = "SHOW COLUMNS FROM `$this->table` LIKE '__active__';";

                    if( static::useCache() && Environment::is(Environment::PROD) && ($cached = Cache::get($this->entity::getEntity(),$q)) !== null ){
                        $this->where($this->getEntity()::getTable().".__active__=1");
                    }else{
                        $r = Db::$connection->perform($q)->fetchAll();
                        if( count($r) > 0 ){
                            $this->where($this->getEntity()::getTable().".__active__=1");
                            Cache::set($this->entity::getEntity(),$q,1);
                        }
                    }




                //$r = Db::$connection->perform("SHOW COLUMNS FROM `$this->table` LIKE '__active__';")->fetchAll();


                //if( count($r) > 0 )
                  //  $this->where($this->getEntity()::getTable().".__active__=1");
            }

        }

        $query = "SELECT ".$this->fields." FROM ";
        $query .= " `" . $this->table . "` ";


        foreach ($this->joins as $key => $value){

            $firstEntity = $value['secondEntity'] == null ? $this->getEntity()::getTable() : $value['secondEntity']::getTable() ;

            $j = $value['type'];
            $j .= " " . $value['entity']::getTable();
            $j .= " on ".$firstEntity.".".$value['mainField']."=".$value['entity']::getTable().".".$value['entityField'] ." ";

            $query .= $j;
        }

        foreach ($this->rawJoins as $key => $value){
            $query .= "join ".$value." ";
        }

        $query .= " where 1 ";
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



        if(!empty($this->groupBy)){
            $query.=" ".$this->groupBy;
        }


        if ($this->getOrder() != "") {
            switch (strtolower($this->order)) {
                case "asc":
                    if($this->getOrderBy()!=""){
                        $query .= " ORDER BY ".$this->getOrderBy()." ASC";
                    }else {
                        $query .= " ORDER BY id ASC";
                    }
                    break;
                case "desc";
                    if($this->getOrderBy()!=""){
                        $query .= " ORDER BY ".$this->getOrderBy()." DESC";
                    }else {
                        $query .= " ORDER BY id DESC";
                    }
                    break;
                default:

                    if($this->getOrderBy()!=""){
                        $query .= " ORDER BY ".$this->getOrderBy()." ASC";
                    }else {
                        $query .= " ORDER BY id ASC";
                    }
            }
        }

        if($this->getLimit()!=null && !$skipLimit){




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


        if($this->rawResult){

            return new $e($data);// new $e($data);
        }else {
            return $e::getInstance($data);// new $e($data);
        }
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
