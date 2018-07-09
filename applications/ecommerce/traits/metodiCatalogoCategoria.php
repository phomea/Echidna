<?php
namespace applications\ecommerce\traits;

use \applications\ecommerce\entities\Categoria;
use \core\services\Response;
use core\services\RouterService;

trait metodiCatalogoCategoria{



    static function listaCategorie(){
        $data = Categoria::query()->getAll();
        Response::addVariable(
            [
                "title"         =>  "Categorie E-commerce",
                "breadcrumbs"   =>  [
                    ["link"=>"qwe","label"=>"qwe"]
                ]
            ]
        );
        return [
            "list",[
                "data" => $data,
                "entity"    =>  Categoria::class
            ]
        ];
    }
    static function editCategoria( $params ){

        $data = Categoria::findById( $params['id'] );

        $fields = static::generateFields(Categoria::class,$data);

        return [
            "mod",[
                "title" =>  "Modifica",
                "data"  =>  $data,
                "fields"    =>  $fields,
                "entity"    =>  Categoria::class
            ]
        ];
    }

    static function updateCategoria( $params = [] , $data = null ){
        return parent::actionUpdate($params,$data);
    }

    static function deleteCategoria( $params = []){
            Categoria::findById($params['id'])->remove();
            RouterService::getRoute(Categoria::getEntity().".list")->go();
    }

    static function addCategoria( $params){

        $entity = Categoria::class;


        $fields = static::generateFields($entity,new $entity());

        return [
            "mod",[
                "title" =>  "Modifica",
                "data"  =>  new $entity(),
                "fields"    =>  $fields
            ]
        ];

    }

    static function insertCategoria($params =[], $data){
        $entity = Categoria::class;


        /**
         * @var $e Model
         */
        $e = new $entity($data);
        $e->save();

        return Response::redirect(RouterService::$routes[$e::getEntity().".mod"]->build(['id'=>$e->id]));
    }
}