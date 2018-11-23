<?php
namespace core;
use applications\ecommerce\TipologiaProdotto;
use applications\media\entities\Attachment;
use core\db\Field;
use core\services\Db;
use core\services\Response;
use core\services\RouterService;
use frontend\melaverde\applications\etichetta\entities\Band;
use frontend\melaverde\applications\etichetta\entities\Evento;
use frontend\melaverde\applications\etichetta\entities\Pubblicazione;
use Stripe\Event;

abstract class Model {

    /**
     * Model constructor.
     */
    function __construct($data = array())
    {
       $this->buildProperties($data);
    }

    static function getDescription(){
        return "";
    }


    public function buildProperties( $data = array() ){
        if( !empty($data) ){
            foreach ($data as $key=>$value) {


                $this->$key = $value;


                //$this->{"set".ucfirst($key)}($value);

            }
        }
    }
    /**
     * @return Field[]
     */
    static abstract function schema();


    static function findById( $id ){
        return static::query()->where("id=$id")->getOne();
    }
    /**
     * @return Query
     */
    static function query($rawResult = false){
        return new Query(static::class,$rawResult);
    }
    static function getTable(){
        $a = explode("\\",static::class);
        return strtolower( end( $a ));
    }
    static function getEntity(){
        return static::class;
    }
    static function getEntityName(){
        $a = explode('\\',static::getEntity());
        return array_pop( $a );
    }
    public static function __callStatic($name, $arguments)
    {

        $var = lcfirst(substr($name, 6));
        if (strncasecmp($name, "findBy", 6) === 0) {
            $table = static::getTable();

            /**
             * @var $field Field
             */
            $field = static::schema()[$var];
            
            $where = "";

            if(Response::$templateToUse !== null ) {

                if(Response::$templateToUse == "frontendTemplate"){

                    $r = Db::$connection->perform("SHOW COLUMNS FROM `$table` LIKE '__active__';")->fetchAll();
                    if( count($r) > 0 )
                        $where = "__active__=1 AND ";
                }

            }

            if( $field->isUnique()) {
                $r = Db::getInstance()->fetchOne("select * from $table where $where $var = :arguments", [
                        "table" => self::getTable(),
                        "arguments" => $arguments
                    ]);
                if(!$r) return $r;
                return static::getInstance($r);
            }else{
                $r = [];                                         
                foreach (Db::getInstance()->fetchAll("select * from $table where $where $var = :arguments", [
                    "table" => self::getTable(),
                    "arguments" => $arguments
                ]) as $key => $value){
                    $r[] = static::getInstance($value); // new static( $value );
                }

                return $r;
            }
        }
    }


    function __call($method, $params) {


        $var = lcfirst(substr($method, 6));
        if (strncasecmp($method, "findBy", 6) === 0) {

            exit;
        }

        $var = lcfirst(substr($method, 3));
        if (strncasecmp($method, "get", 3) === 0) {
            /**
             * @var $field Field
             */
            $field = $this->schema()[$var];
            switch ( $field->getData()["Type"] ){

                case Field::TYPE_INT_UNSIGNED:
                    case Field::TYPE_INT:

                        return (int)$this->$var;

                case Field::TYPE_STRING:
                    case Field::TYPE_TEXT:
                    return $this->$var;

                case Field::TYPE_DATE:
                    return new \DateTime($this->$var);

            }
            return $this->schema()[$var];
        }
        if (strncasecmp($method, "set", 3) === 0) {


            $field = $this->schema()[$var];

            if( $field == null ){

                exit;
                return;
            }


            $this->$var = $params[0];

            /*switch ( $field->getData()["Type"] ){
                case Field::TYPE_BOOLEAN:
                    $this->$var = $params[0] == 1 || $params[0];
                    break;
                default:
                    $this->$var = $params[0];
                    break;
            }*/
        }
        if (strncasecmp($method, "is", 2) === 0) {
            $var = lcfirst(substr($method, 2));
            $field = $this->schema()[$var];
            switch ( $field->getData()["Type"] ){
                case Field::TYPE_BOOLEAN:
                    return $this->$var == 1 || $this->$var === true;
            }
        }

    }



    function getProperties(){

        return get_object_vars($this);
    }

    function load( $data = [] ){
        $fields = $this->schema();
        foreach($fields as $key => $value){
            if( isset($data[$key]) ){
                $method = "set" . ucfirst($key);
                $this->$method( $data[$key] );
            }
        }
    }


    function insert(){
        $sql = "insert into ".$this->getTable()." (";
        $chiavi = [];
        $valori = [];

        foreach ($this->schema() as $key => $item) {
            /**
             * @var $item Field
             */
            $fieldname = $key;


            if( isset($this->$fieldname) && !$item->getEntity()  ){


                $chiavi[]   =   $fieldname;
                $valori[]   =   $item->getInsertValue( $this->$fieldname );


            }

        }

        $sql.= implode(",",$chiavi);
        $sql.= ") VALUES (";
        $sql.=  implode(',',$valori);
        $sql.= ")";




        Db::$connection->perform($sql);
        $this->id = Db::$connection->lastInsertId();

        return;
        $db=new Db();
        $db->query($sql);

        $this->id = $db->getLastInsertId();

    }
    function update(){
        $sql = "update ".$this->getTable()." SET ";
        $valori = [];
        $primaryKey = "";

        $schema = $this->schema();
        $schema['__active__'] = Field::boolean()->setDefault(1);

        foreach ($schema as $key => $item) {
            $fieldname = $key;
            if( $item->getEntity()){
                if( $item->relation == 2){
                    $entity = static::getEntity();
                    $entity_id = $this->id;
                    $type = $item->getEntity();

                    $r = Attachment::query()
                        ->where('entity="'.str_replace("\\","\\\\",static::class).'"')
                        ->where("entity_id=".$this->id)
                        ->where('type="'.str_replace("\\","\\\\",$type).'"')
                        ->where('field="'.$fieldname.'"')
                        ->getAll();
                    if(!empty($r)){
                        foreach ($r as $v){
                            $v->remove();
                        }
                    }
                    if( isset($this->$fieldname)) {
                        $converted = $type::convertToDb($this->$fieldname);


                        foreach ($converted as $item) {
                            /*Attachment::query()
                                ->where('entity = "'.$entity.'"')
                                ->where("entity_id=".$entity_id)
                                ->where("type=".$type)
                                ->getOne();*/


                            $a = new Attachment([
                                "entity" => $entity,
                                "entity_id" => $entity_id,
                                "value" => $item,
                                "type" => $type,
                                "field" => $fieldname
                            ]);


                            $a->save();



                        }
                    }
                }
            }else {
                /**
                 * @var $item Field
                 */

                if (isset($this->$fieldname) && $item->getData()['Type'] != Field::primaryIndex()) {
                    $valori[] = $fieldname . " = " . $item->getInsertValue($this->$fieldname);
                }

                if ($item->getData()['Type'] == Field::TYPE_INT_UNSIGNED) {

                    $primaryKey = $fieldname;
                }
            }
        }





        $sql.=  implode(',',$valori);
        $sql.= " where $primaryKey = ".$this->$primaryKey;


        $r = Db::$connection->perform($sql);

        return true;
        exit;
        $db=new Db();
        $db->query($sql);
    }

    function save(){

        if( isset($this->id) && !empty($this->id)){
            $this->update();
        }else{

            $this->insert();
        }
    }

    function remove(){
        if( isset($this->id) ){
            $sql = "DELETE FROM ".$this->getTable()." WHERE id=:id";



            $r = Db::$connection->perform($sql,[
                "id"=>$this->id
            ]);
            return $r;
        }
    }

    function displayValue( $key ){
        return $this->$key;
    }

    static function __set_state($an_array)
    {
        return static::getInstance($an_array);
    }


    public function buildModLink(){
        return RouterService::getRoute(static::getEntity().".mod")->build(["id"=>$this->id]);

    }

    static function getModLink(){
        return "{id:([0-9]*)}";
    }
    static function getListLink(){
        return "lista";
    }
    static function getAddLink(){
        return "aggiungi";
    }
    static function getUpdateLink(){
        return static::getModLink();
    }



    static function getInstance( $data ){

        $dati = [];





            foreach (static::schema() as $key => $value) {
                if ($value->getEntity()) {
                    $query = Attachment::query();
                    $query->where('entity="' . str_replace('\\','\\\\',static::class) . '"')
                        ->where("entity_id=" . $data['id'])
                        ->where('type="' . str_replace('\\','\\\\', $value->getEntity()) . '"')
                        ->where('field="' . $key . '"');


                    $r = $query->getAll();



                    $data[$key] = $value->getEntity()::convertFromDb($r);
                }
            }



        return new static($data);
    }


    static function generateRoutes( $application,$prefixurl="",$prefixmethod ="" ){
        $entity = static::class;
        return [
            $entity::getEntity().".list"       =>  new Route("list",$prefixurl.$entity::getListLink(),[$application,$prefixmethod."actionList"]),
            $entity::getEntity().".mod"        =>  new Route("mod",$prefixurl.$entity::getModLink(),[$application,$prefixmethod."actionMod"]),
            $entity::getEntity().".add"        =>  new Route("add",$prefixurl.$entity::getAddLink(),[$application,$prefixmethod."actionAdd"]),


            $entity::getEntity().".update"     =>  (new Route("update",$prefixurl.$entity::getListLink(),[$application,$prefixmethod.'actionUpdate']))->method(Route::METHOD_PUT),
            $entity::getEntity().".insert"     =>  (new Route("insert",$prefixurl.$entity::getAddLink(),[$application,$prefixmethod.'actionInsert']))->method(Route::METHOD_POST),
            $entity::getEntity().".delete"     =>  (new Route("delete",$prefixurl.$entity::getModLink()."/delete",[$application,$prefixmethod.'actionDelete'])),

            $entity::getEntity().".deactivate"     =>  (new Route("deactivate",$prefixurl.$entity::getModLink()."/deactivate",[$application,$prefixmethod.'actionDeactivate'])),
            $entity::getEntity().".activate"     =>  (new Route("activate",$prefixurl.$entity::getModLink()."/activate",[$application,$prefixmethod.'actionActivate']))
        ];
    }

    static function deleteRoute($params){

    }


    static function getForSelect($label="",$id=""){



        $entity = static::class;


        $tt = $entity::query(true)->getAll();

        $options = [];
        $options[] = [
            "label" =>  "---scegli---",
            "value"=> 0
        ];


        foreach ($tt as $item) {

            $options[] = [
                "label" =>  $item->$label,
                "value" =>  $item->$id
            ];
        }
        return $options;
    }


    function expand(){
    }
    static function expandArray( $array = [] ){
        foreach ($array as $key=>$value){
            $value->expand();
        }
    }



}