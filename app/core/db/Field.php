<?php
namespace core\db;
use core\Model;

class Field{
    const TYPE_INT      =   "int(10)";
    const TYPE_BOOLEAN  =   "int(1)";
    const TYPE_INT_UNSIGNED     =   "int(10) unsigned";
    const TYPE_STRING   =   "varchar";
    const TYPE_TEXT     =   "text";
    const TYPE_DATE     =   "date";
    const TYPE_ENTITY   =   "entity";
    const TYPE_FLOAT    =   "float";


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

    private $unique     =   false;
    private $editable   =   false;

    public function expandTemplateVar(){

        if(is_callable($this->templateVar)){
            $this->templateVar = call_user_func($this->templateVar);
        }

    }
    public function setLabel( $l ){
        $this->label = $l;
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


    public function isUnique(){
        return $this->unique;
    }
    public function unique(){
        $this->unique = true;
        return $this;
    }

    static function primaryIndex(){
        return new static([
            "Type"  =>  self::TYPE_INT_UNSIGNED,
            "Null"   =>  "NO",
            "Key"   =>  "PRI",
            "Extra"    =>  "auto_increment",
        ]);
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

    static function float(){
        return new static([
            "Type"  =>  self::TYPE_FLOAT
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

    static function date(){
        return new static([
            "Type"      =>  self::TYPE_DATE,
            "Null"      =>  self::VALUE_NULLABLE
        ]);
    }

    static function getCreateSql( $key, $v,$skipKey=false ){
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
        switch ( $this->getData()["Type"] ){

            case Field::TYPE_INT_UNSIGNED:
            case Field::TYPE_INT:
            case Field::TYPE_FLOAT:
                if( empty($value )) return "null";
                return $value;

            case Field::TYPE_STRING:
            case Field::TYPE_TEXT:
                $value = str_replace('\"','"',$value);
                return '"'.str_replace('"','\"',$value).'"';

            case Field::TYPE_DATE:
                $value = str_replace('\"','"',$value);
                return '"'.str_replace('"','\"',$value).'"';
                //return $value;

        }
    }


}