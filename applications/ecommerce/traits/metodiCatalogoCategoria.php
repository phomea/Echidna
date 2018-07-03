<?php
namespace applications\ecommerce\traits;

use \applications\ecommerce\entities\Categoria;
use \core\services\Response;

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
                "data" => $data
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
                "fields"    =>  $fields
            ]
        ];
    }

    static function updateCategoria( $params = [] , $data = null ){
        return parent::actionUpdate($params,$data);
    }

}