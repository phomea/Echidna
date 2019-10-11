<?php
namespace core\db;
use core\Model;

class Field{
    const TYPE_INT      =   "int(10)";
    const TYPE_BOOLEAN  =   "int(1)";
    const TYPE_INT_UNSIGNED     =   "int(10) unsigned";
    const TYPE_STRING   =   "varchar";
    const TYPE_PASSWORD   =   "varchar(35)";
    const TYPE_TEXT     =   "text";
    const TYPE_DATE     =   "date";
    const TYPE_DATETIME     =   "datetime";
    const TYPE_ENTITY   =   "entity";
    const TYPE_FLOAT    =   "float(10,2)";

    public $index = false;

    // chiavi
    const VALUE_KEY_PRIMARY =   "PRI";

    // nullable
    const VALUE_NOT_NULLABLE =   "NO";
    const VALUE_NULLABLE =   "YES";


    public $template = "default";
    public $templateVar = null;

    private $entity = false;


    private $data = [
        "Type"  =>  null,
        "Null"   =>  self::VALUE_NULLABLE,
        "Key"   =>  null,
        "Extra"    =>  "auto_increment",
        "Default"   =>  null
    ];

    public $value ="";
    public $label = "";
    public $hint = "";
    public $appendText = "";
    private $unique     =   false;
    private $defaultValue     =   "";
    private $editable   =   false;
    private $inlist   =   true;
    private $required   =   false;
    private $passmd5   =   false;
    private $placeholder   =   "";
    private $fieldsize   =   "";
    private $maxlength   =   "";
    private $isReference = false;




    public $onChange = "";


    public $newLine = false;

    public function newLine(){
        $this->newLine = true;
        return $this;
    }


    public $hideIf = [];



    public function hideIf($name,$value){

        if( !is_array($value)){
            $value = [$value];
        }
        $this->hideIf[]=[$name,$value];
        return $this;
    }

    public function onChange( $onChange){
        $this->onChange = $onChange;
        return $this;
    }

    public function setHint( $s ){
        $this->hint = $s;
        return $this;
    }

    public function setAppendText( $s ){
        $this->appendText = $s;
        return $this;
    }


    public $appendAction = false;
    public $appendActionLabel = "";
    public $appendActionAction = null;
    public $appendActionIcon = "";

    public function setAppendAction( $label,$action ="",$icon = false ){

        $this->appendAction = true;
        $this->appendActionLabel = $label;
        $this->appendActionAction = $action;
        $this->appendActionIcon = $icon;
        return $this;
    }

    public function expandTemplateVar($data = []){

        if(is_callable($this->templateVar)){
            $this->templateVar = call_user_func($this->templateVar,$data,$this);
        }

    }


    /**
     * @var Model
     */
    private $external_entity = null;
    private $external_field = null;
    private $external_schema = null;

    /**
     * @return null
     */
    public function getExternalField()
    {
        return $this->external_field;
    }


    /**
     * @return null
     */
    public function getExternalSchema()
    {
        return $this->external_schema;
    }


    public function getExternalEntity(){
        return $this->external_entity;
    }

    public function findExternalEntity(){
        $findby = "findBy" . ucfirst($this->external_field);
        return $this->external_entity::$findby($this->value);
    }
    public function isExternal(){
        return $this->external_entity != null && $this->external_field!=null && $this->external_schema != null;

    }
    public function setExternal($entity,$field, $schema){
        $this->external_entity = $entity;
        $this->external_field = $field;
        $this->external_schema = $schema;

        return $this;
    }





    public static  function startGroup( $open =false){
        $s = new static([]);
        $s->isReference = true;
        $s->inlist(false);
        $s->editable();
        $s->setTemplate("start_group");
        $s->setTemplateVar([
            "open"=>$open
        ]);
        return $s;
    }
    public static function endGroup(){
        $s = new static([]);
        $s->isReference = true;
        $s->inlist(false);
        $s->editable();
        $s->setTemplate("end_group");
        return $s;
    }



    public function index(){
        $this->index = true;
        return $this;
    }
    public function onUpdate( $s ){
        $this->data['Extra'] = "on update ".$s;
        return $this;
    }

    public function setLabel( $l ){
        $this->label = $l;
        return $this;
    }

    public $customRenderer = null;

    public function setCustomRenderer($callable){
        $this->customRenderer = $callable;
        return $this;
    }

    public function setTemplateVar($t){
        $this->templateVar = $t;
        return $this;
    }
    public function setDefault( $default ){
        $this->data['Default'] =    $default;
        return $this;
    }
    public function getData(){
        return $this->data;
    }
    /**
     * Field constructor.
     */
    public function __construct( $data )
    {
        $this->data = $data;
    }


    public function setTemplate( $template ){
        $this->template = $template;
        return $this;
    }
    public function editable( $e = true){
        $this->editable = $e;
        return $this;
    }
    public function isEditable(){
        return $this->editable;
    }

    public function inlist( $e = true){
        $this->inlist = $e;
        return $this;
    }
    public function isInlist(){
        return $this->inlist;
    }
    public function required( $e = true){
        $this->required = $e;
        return $this;
    }
    public function isRequired(){
        return $this->required;
    }

    public function setPlaceholder( $e ){
        $this->placeholder = $e;
        return $this;
    }
    public function getPlaceholder(){
        return $this->placeholder;
    }
    public function setFieldsize( $e ){
        $this->fieldsize = $e;
        return $this;
    }
    public function getFieldsize(){
        return $this->fieldsize;
    }
    public function setMaxlength( $e ){
        $this->maxlength = $e;
        return $this;
    }
    public function getMaxlength(){
        return $this->maxlength;
    }

    public function setDefaultValue( $e ){
        $this->defaultValue = $e;
        return $this;
    }
    public function getDefaultValue(){
        return $this->defaultValue;
    }




    public function passmd5( $e = true){
        $this->passmd5 = $e;
        return $this;
    }
    public function isPassmd5(){
        return $this->passmd5;
    }


    public function isUnique(){
        return $this->unique;
    }
    public function unique(){
        $this->unique = true;
        return $this;
    }

    public static function reference(){
        $s = new static([]);
        $s->isReference = true;
        $s->inlist(false);
        return $s;
    }

    public $primary = false;
    static function primaryIndex(){
        $s = new static([
            "Type"  =>  self::TYPE_INT_UNSIGNED,
            "Null"   =>  "NO",
            "Key"   =>  "PRI",
            "Extra"    =>  "auto_increment",
        ]);
        $s->primary = true;
        $s->inlist(false);
        return $s;
    }

    static function custom(){
        return new static([
            "Type"  =>  "custom"
        ]);
    }

    static function int(){
        return new static([
            "Type"  =>  self::TYPE_INT
        ]);
    }


    static function orderField(){
        $f = new static([
            "Type"  =>  self::TYPE_INT
        ]);

        $f->inlist(false);
        return $f;
    }

    static function float(){
        return new static([
            "Type"  =>  self::TYPE_FLOAT
        ]);
    }


    static function datetime(){
        return new static([
            "Type"      =>  self::TYPE_DATETIME,
            "Null"      =>  self::VALUE_NULLABLE
        ]);
    }

    static function boolean(){
        return new static([
            "Type"      =>  self::TYPE_BOOLEAN,
            "Default"   =>  0
        ]);
    }
    static function string(){
        return new static([
            "Type"      =>  self::TYPE_STRING,
            "length"    =>  256
        ]);
    }

    static function text(){
        return new static([
            "Type"      =>  self::TYPE_TEXT
        ]);
    }

    public function getEntity(){

        return $this->entity;

    }

    public $relation=0;
    /**
     * @param $e string
     * @param int $relation
     */
    static function entity( $e , $relation = 1){


        $n = new static([
            "Type"      =>  self::TYPE_ENTITY
        ]);
        $n->entity = $e;
        $n->relation = $relation;

        /*if( $relation == 1 ) {
            $n->setTemplate("select")->setTemplateVar($e::getForSelect("id","id"));
        }
        if($relation == 2){
            $n->setTemplate("select-multiple")->setTemplateVar($e::getForSelect("id","id"));
        }*/
        return $n;
    }

    static function varchar( $length ){
        return new static([
            "Type"      =>  self::TYPE_STRING,
            "length"    =>  $length
        ]);
    }

    static function password(){
        return new static([
            "Type"      =>  self::TYPE_STRING,
            "length"    =>  35
        ]);
    }

    static function date(){
        return new static([
            "Type"      =>  self::TYPE_DATE,
            "Null"      =>  self::VALUE_NULLABLE
        ]);
    }


    public function isReference(){
        return $this->isReference;
    }

    static function getCreateSql( $key, $v,$skipKey=false ){
        if( $v->isReference() ) return null;

        $sql = $key;

        $value = $v->getData();


        if(isset($value['Type'])){
            $sql .= " ".$value['Type'];

            if( $value['Type'] == self::TYPE_ENTITY){
                return false;
            }
        }
        if(isset($value['length'])){
            $sql .= " (".$value['length'].")";
        }
        if(isset($value['Default'])){
            $sql .=" DEFAULT ".$value['Default'];
        }
        if(isset($value['Extra'])){
            $sql .=" ".$value['Extra'];
        }
        if(isset($value['Key']) && !$skipKey){
            $sql .=" PRIMARY KEY";
        }
        return $sql;
    }
    static function compare( $old, $new ){




        if($old->getData()['Type'] == self::TYPE_ENTITY){
            return false;
        }
        foreach ($old->getData() as $key => $item) {
            if( isset($old->getData()['length']) && $key == 'Type'){



                if( $old->getData()[$key]."(".$old->getData()['length'].")" != $new[$key] ){
                    return false;
                }
            }else {


                if ($key != "length" && $old->getData()[$key] != $new[$key]) {


                    return false;
                }
            }

        }
        return true;
    }


    function getInsertValue( $value ){
        if($this->isPassmd5()){
            $value = md5($value);
        }
        switch ( $this->getData()["Type"] ){

            case Field::TYPE_BOOLEAN:
                if(empty($value) || !$value){
                    return 0;
                }
                return 1;
                break;
            case Field::TYPE_INT_UNSIGNED:
            case Field::TYPE_INT:
            case Field::TYPE_FLOAT:


                if($value === (int)0) return 0;
                if($value === (float)0.0) return 0;
                if($value === "0") return 0;
                if( empty($value )) return "null";
                $value = str_replace(',', '.', $value);
                return $value;

            case Field::TYPE_STRING:
            case Field::TYPE_TEXT:

                if(is_array($value)){
                    $value = json_encode($value);

                    return "'".$value."'";

                }else {
                    $value = str_replace('\"', '"', $value);
                    $value = str_replace('\\', '\\\\', $value);
                    return '"' . str_replace('"', '\"', $value) . '"';
                }

            case Field::TYPE_DATE:
                if( $value instanceof \DateTime){
                    return '"'.$value->format("Y-m-d").'"';
                }else {
                    $value = str_replace('\"', '"', $value);
                    if($value=="")
                        return "null";
                    return '"' . str_replace('"', '\"', $value) . '"';
                }
            case Field::TYPE_DATETIME:
                if( $value instanceof \DateTime){
                    return '"'.$value->format("Y-m-d H:i:s").'"';
                }else {

                    $value = str_replace('\"', '"', $value);
                    return '"' . str_replace('"', '\"', $value) . '"';
                }
                //return $value;

        }
    }


}