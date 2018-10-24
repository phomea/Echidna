<?php
namespace applications\ecommerce\traits;

use \applications\ecommerce\entities\Categoria;
use applications\ecommerce\entities\Variante;
use applications\meta\entities\Meta;
use core\services\Db;
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


    static function getCategoryImages( $params=[]){
        $sql =  "SELECT * FROM ecommerce_categoria_immagine WHERE id_categoria=:id";

        return Db::$connection->fetchAll($sql,[
            "id"   =>  $params['id']
        ]);
    }

    static function editCategoria( $params ){

        $data = Categoria::findById( $params['id'] );

        $fields = static::generateFields(Categoria::class,$data);




        $meta = Meta::query()->where('entity="ecommerce.categoria"')->where("entity_id=".$data->id)->getOne();
       

        if(!$meta){
            $meta = new Meta([
                "entity"    =>  "ecommerce.categoria",
                "entity_id" =>  $data->id
            ]);
        }
        $metaform = Response::getTemplateToUse("mod",[
            "template_extend"   =>  "empty.twig",
            "data"      =>  $meta,
            "fields"    =>  self::generateFields(Meta::class,$meta)
        ])->render();

        return[
            "tabs", [
                "tabs" =>[
                    "proprieta" => [
                        "label" =>  "Proprietà",
                        "content"   =>  Response::getTemplateToUse("mod",[
                            "title" =>  "Modifica",
                            "data"  =>  $data,
                            "fields"    =>  $fields,
                            "entity"    =>  Categoria::class
                        ],"empty.twig")->render()
                    ],
                    "meta"    =>  [
                        "label" =>  "Meta",
                        "content"   => $metaform
                    ],

                    /*,
                    "immagini"  =>  [
                        "label" =>  "Immagini",
                        "content"   =>  Response::getTemplateToUse("ecommerce/templates/addimages",[
                            "directory" => "catalogo/categorie/",
                            "postRoute" =>  RouterService::getRoute("ecommerce.catalogo.categoria.image.add")->build(["id"=>$data->id]),
                            "deleteRoute" =>  RouterService::getRoute("ecommerce.catalogo.categoria.image.remove")->build(),
                            "immagini" =>  $data->getImages()

                        ],"empty.twig")->render()

                    ]*/
                ]
            ]
        ];

        return [
            "mod",[
                "title" =>  "Modifica",
                "data"  =>  $data,
                "fields"    =>  $fields,
                "entity"    =>  Categoria::class
            ]
        ];
    }

    static function addCategoryImage( $params = [] , $data ){

        $sql = "INSERT INTO ecommerce_categoria_immagine (id_categoria,permalink) VALUES (:id,:permalink)";

        Db::$connection->perform($sql,[
            "id" => $params['id'],
            "permalink" => $data['permalink']
        ]);


        $lastid = Db::$connection->lastInsertId();

        $sql = "SELECT * FROM ecommerce_categoria_immagine where id=:id";
        return ["",[
            "data"=>Db::$connection->fetchOne($sql,["id"=>$lastid])
        ]
        ];

    }

    static function removeCategoryImage( $params = [], $data ){

        var_dump($params);

        $sql = "DELETE FROM ecommerce_categoria_immagine where id=:id";

        var_dump($sql);
        Db::$connection->perform($sql,$params);
        exit;
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