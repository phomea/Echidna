<?php
namespace applications\multilingua;

use applications\multilingua\entities\GenericEntity;
use core\abstracts\BackendApplication;
use core\db\Field;
use core\Model;
use core\Route;
use core\services\Response;

class MultilinguaBackend extends BackendApplication{
    static function getApplication()
    {
        return MultilinguaApplication::class;
    }

    static function getEntityClass()
    {
        return GenericEntity::class;
    }

    static function declareRoutes()
    {

        return array_merge(parent::declareRoutes(),[
            "backend.multilingua.getform"   =>  new Route("","getform",[self::class,"getForm"])
        ]);
    }

    static function actionInsert($params = [], $data = null)
    {
        $entity = $data['translation_entity'];
        $schema = $entity::schema();
        $schema["translation_entity"] = Field::text()->editable()->setTemplate("default");
        $schema["translation_entity_id"] = Field::int()->editable()->setTemplate("default");
        $schema["translation_lang"] = Field::varchar(10)->editable()->setTemplate("default");
        $e = new GenericEntity($data);
        $e->schema = $schema;
        $e->table = $entity::getTable()."_translation";


        $e->save();
        exit;
    }

    static function actionUpdate( $params = [] , $data = null){
        /**
         * @var $entity Model
         * @var $e Model
         */
        $entity = $data['translation_entity'];
        $schema = $entity::schema();
        $schema["translation_entity"] = Field::text()->editable()->setTemplate("default");
        $schema["translation_entity_id"] = Field::int()->editable()->setTemplate("default");
        $schema["translation_lang"] = Field::varchar(10)->editable()->setTemplate("default");
        $e = new GenericEntity($data);
        $e->schema = $schema;
        $e->table = $entity::getTable()."_translation";

        $e->save();

        exit;
    }



    static function getForm( $params ){
        /**
         * @var $entity Model
         */
        $entity = $params['entity'];
        $lang = $params['lang'];
        $id = $params["id"];

        $schema = $entity::schema();
        $schema["translation_entity"] = Field::text()->editable()->setTemplate("default");
        $schema["translation_entity_id"] = Field::int()->editable()->setTemplate("default");
        $schema["translation_lang"] = Field::varchar(10)->editable()->setTemplate("default");

        /**
         * @var $e Model
         */
        $e = new GenericEntity();
        $e->schema = $schema;
        $e->table = $entity::getTable()."_translation";

        $e->translation_entity = $entity;
        $e->translation_lang = $lang;
        $e->translation_entity_id = $id;


        $d = $e->localQuery()
            ->where('translation_entity="'.str_replace('\\','\\\\',$entity).'"')
            ->where("translation_entity_id=".$id)
            ->where('translation_lang="'.$lang.'"')
            ->getOne();




        if( !$d ){
            $d = $e;
        }else{

            $d->id = $d->translation["id"];
        }

        $fields = BackendApplication::generateFields($d, $d, $e->localSchema());


        Response::addVariable([
            "template_extend"   =>  "empty.twig"
        ],true);




        $return = [
            "multilingua/templates/mod-translation",[
                "template_extend"   =>  "empty.twig",
                "data"  =>  $d,
                "fields"    =>  $fields,
                "entity"    =>  $entity

            ]
        ];

        return $return;
        exit;
    }

}