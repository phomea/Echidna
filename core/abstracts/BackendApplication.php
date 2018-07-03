<?php

namespace core\abstracts;


use core\Model;
use core\Route;
use core\services\Response;
use core\services\RouterService;

abstract class BackendApplication{

    /**
     * @return Application
     */
    static function getApplication(){
        return static::class;
    }

    static function declareWidgets(){
        return [];
    }

    static function declareRoutes(){
        $appllication = static::getApplication();
        $entity = $appllication::getEntityClass();
        return [
            $entity::getEntity().".list"       =>  new Route("list",$entity::getListLink(),[static::class,"actionList"]),
            $entity::getEntity().".mod"        =>  new Route("mod",$entity::getModLink(),[static::class,"actionMod"]),
            $entity::getEntity().".add"        =>  new Route("add",$entity::getAddLink(),[static::class,"actionAdd"]),


            $entity::getEntity().".update"     =>  (new Route("update","{id:(.*)}",[static::class,'actionUpdate']))->method(Route::METHOD_PUT),
            $entity::getEntity().".insert"     =>  (new Route("insert","aggiungi",[static::class,'actionInsert']))->method(Route::METHOD_POST)
        ];
    }

    static function init(){
        Response::setTemplateToUse("backendTemplate");
        Response::addVariable([
            "template_extend"   =>  "base.twig"
        ]);
    }

    static function generateFields( $entity, $data ){

        $fields = [];
        foreach ($entity::schema() as $key => $item) {
            if( $item->isEditable()){
                if( $data && property_exists( $data, $key) ) {
                    $item->value = $data->$key;
                }
                $fields[$key] = Response::getTemplateToUse("fields/".$item->template,
                    [
                        "data"  =>  $data,
                        "property"  =>  $key,
                        "field" =>  $item
                    ])->render();
            }
        }
        return $fields;
    }

    static function actionAdd( $params =[] ){
        $parent = static::getApplication();
        $entity = $parent::getEntityClass();

        $fields = static::generateFields($entity,new $entity());



        return [
            "mod",[
                "title" =>  "Modifica",
                "data"  =>  new $entity(),
                "fields"    =>  $fields
            ]
        ];

    }

    static function actionMod( $params =[] ){
        $parent = static::getApplication();
        $entity = $parent::getEntityClass();




        $data = $entity::findById( $params['id'] );


        $fields = static::generateFields($entity,$data);




        return [
            "mod",[
                "title" =>  "Modifica",
                "data"  =>  $data,
                "fields"    =>  $fields
            ]
        ];

    }

    static function actionInsert( $params = [] , $data = null){
        $parent = static::getApplication();
        $entity = $parent::getEntityClass();
        /**
         * @var $e Model
         */
        $e = new $entity($data);
        $e->save();

        return Response::redirect(RouterService::$routes[$e::getEntity().".mod"]->build(['id'=>$e->id]));
    }

    static function actionUpdate( $params = [] , $data = null){
        /**
         * @var $entity Model
         * @var $e Model
         */
        $entity = $data['form_entity'];
        $e = new $entity($data);
        $e->save();
        return [
            "mod",
            [
                "data"  =>  $e
            ]
        ];
    }


    static function actionList( $params = [] ){
        $parent = static::getApplication();
        $entity = $parent::getEntityClass();

        $data = $entity::query()->getAll();


        Response::addVariable(
            [
                "title"         =>  "Prova",
                "breadcrumbs"   =>  [
                    ["link"=>"qwe","label"=>"qwe"]
                ]
            ]
        );



        return [
            "list",[
                "data" => $data
            ]
        ];
    }
}