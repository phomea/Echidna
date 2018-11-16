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


    static function getEntityClass(){
        $appllication = static::getApplication();
        return $appllication::getEntityClass();
    }

    static function declareRoutes(){

        $entity = static::getEntityClass();

        return [
            $entity::getEntity().".list"       =>  new Route("list",$entity::getListLink(),[static::class,"actionList"]),
            $entity::getEntity().".mod"        =>  new Route("mod",$entity::getModLink(),[static::class,"actionMod"]),
            $entity::getEntity().".add"        =>  new Route("add",$entity::getAddLink(),[static::class,"actionAdd"]),


            $entity::getEntity().".update"     =>  (new Route("update",$entity::getUpdateLink(),[static::class,'actionUpdate']))->method(Route::METHOD_PUT),
            $entity::getEntity().".insert"     =>  (new Route("insert",$entity::getAddLink(),[static::class,'actionInsert']))->method(Route::METHOD_POST),
            $entity::getEntity().".delete"     =>  (new Route("insert",$entity::getModLink()."/delete",[static::class,'actionDelete']))
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

                $item->expandTemplateVar();
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

        return static::actionMod($params);

        $entity = static::getEntityClass();
        $e = new $entity($params);
        $fields = static::generateFields($entity, $e );

        return [
            "mod",[
                "title" =>  "Modifica",
                "data"  =>  $e ,
                "fields"    =>  $fields
            ]
        ];

    }

    static function actionMod( $params =[] ){
        $entity = static::getEntityClass();
        if( isset($params['id']) ) {
            $data = $entity::findById($params['id']);
        }else{
            $data = new $entity($params);
        }

        $fields = static::generateFields($entity,$data);




        return [
            "mod",[
                "title" =>  "Modifica",
                "data"  =>  $data,
                "fields"    =>  $fields,
                "entity"    =>  $entity

            ]
        ];

    }

    static function actionInsert( $params = [] , $data = null){
        $entity = static::getEntityClass();


        /**
         * @var $e Model
         */
        $e = new $entity($data);
        $e->save();

        return Response::redirect(RouterService::$routes[$e::getEntity().".mod"]->build(['id'=>$e->id]),$e);
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
        $entity = static::getEntityClass();



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
                "data"      => $data,
                "entity"    =>  $entity
            ]
        ];
    }


    static function actionDelete( $params =[]){
        $entity = static::getEntityClass();
        $entity::findById($params['id'])->remove();

        return Response::redirect(
            RouterService::getRoute($entity::getEntity().".list")->build()
        );

    }




    static function getForSelect($label="",$id=""){



        $entity = static::getEntityClass();



        $tt = $entity::query()->getAll(true);



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


}