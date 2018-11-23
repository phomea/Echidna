<?php
namespace frontend\consorzioleonardo\applications\ricerche\entities;

use core\db\Field;
use core\Model;
use core\services\Db;
use frontend\consorzioleonardo\applications\imprese\entities\Impresa;
use frontend\consorzioleonardo\applications\progetti\entities\AziendaProgetto;
use frontend\consorzioleonardo\applications\progetti\entities\Progetto;

class Ricerca extends Model{
    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::text()->editable(),
            "descrizione"   =>  Field::text()->editable()->setTemplate("textarea"),
            "entity"    =>  Field::text()->editable()->setTemplate("select")->setTemplateVar([
                [
                    "label" =>  "Impresa",
                    "value" =>  Impresa::class
                ],
                [
                    "label" =>  "Progetto",
                    "value" =>  Progetto::class
                ]
            ]),
            "_select"    =>  Field::text()->editable(),
            "_join"      =>  Field::text()->editable()->setTemplate("select")->setTemplateVar([
                [
                    "label" =>  "Nessuna join",
                    "value" =>  "no"
                ],
                [
                    "label" =>  "Azienda / Progetto",
                    "value" =>  AziendaProgetto::class
                ]
            ]),
            "_joinon"   =>  Field::text()->editable(),
            "_where"     =>  Field::text()->editable(),
            "_groupby"   =>  Field::text()->editable(),
            "askfor"    =>  Field::text()->editable(),
            "query" =>  Field::text()->editable(),
            "template"  =>  Field::text()->editable()->setTemplate("select")->setTemplateVar([
                [
                    "label" =>  "Template lista standard",
                    "value"  =>  "RicercaTemplate"
                ],
                [
                    "label" =>  "Impresa con risposte date",
                    "value"  =>  "ImpresaTemplate"
                ]
            ])
        ];
    }



    public function doSearch(){


        /**
         * @var $entity Model
         */

        $from = $this->entity::getTable();


        if($this->_select == "" ) $this->_select ="*";

        $query = "select ".$this->_select;

        $query .= " from $from";

        if( $this->_join != null && $this->_join != "no"){
            $query .= " join ".$this->_join::getTable()." on ".$this->_joinon." ";
        }
        $query .= " where 1=1 and deleted=0";
        if( $this->_where != "")
            $query .= "   and ".$this->_where;



        if( $this->_groupby != "") {
            $query .= " group by " . $this->_groupby;
        }




        $r = Db::$connection->fetchAll($query,$_GET);


        /**
         * @var $entity Model
         */


        $entity = $this->entity;



        $risultati = [];
        foreach ($r as $value){
            $risultati[] = new $entity($value);
        }


        return$risultati;


    }
}