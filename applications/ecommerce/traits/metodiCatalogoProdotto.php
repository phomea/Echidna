<?php
namespace applications\ecommerce\traits;

use \applications\ecommerce\entities\Categoria;
use applications\ecommerce\entities\CategoriaProdotto;
use applications\ecommerce\entities\Prodotto;
use applications\ecommerce\entities\TipologiaProdotto;
use core\services\Db;
use \core\services\Response;
use core\services\RouterService;

trait metodiCatalogoProdotto{

    static function listaProdotti(){
        $data = Prodotto::query()->getAll();
        Response::addVariable(
            [
                "title"         =>  "Prodotti E-commerce",
                "breadcrumbs"   =>  [
                    ["link"=>"qwe","label"=>"qwe"]
                ]
            ]
        );
        return [
            "ecommerce/templates/prodotto.list",[
                "data" => $data
            ]
        ];
    }

    static function addProdotto( $params){

        $entity = Prodotto::class;


        $fields = static::generateFields($entity,new $entity());



        return [
            "mod",[
                "title" =>  "Modifica",
                "data"  =>  new $entity(),
                "fields"    =>  $fields
            ]
        ];

    }

    static function insertProdotto( $params = [] , $data = null){
        $entity = Prodotto::class;


        /**
         * @var $e Model
         */
        $e = new $entity($data);
        $e->save();

        return Response::redirect(RouterService::$routes[$e::getEntity().".mod"]->build(['id'=>$e->id]));
    }


    static function editProdotto( $params ){

        $data = Prodotto::findById( $params['id'] );

        $data->expand();

        $fields = static::generateFields(Categoria::class,$data);

        $categorieDisponibili = Categoria::query()->getAll();

        /**
         * @var $categorieAssociate CategoriaProdotto[]
         */
        $categorieAssociate = CategoriaProdotto::findById_prodotto( $params['id'] );

        foreach ($categorieAssociate as $value){
            $value->updateFromDb();
        }

        $tipologieProdotto = TipologiaProdotto::query()->getAll();
        $attributiTipologia = $data->tipologia->getAttributes();


        return [
            "tabs",[
                "tabs"=>[
                    "pagina"    =>  [
                        "label" =>  "Proprietà",
                        "content"   => Response::getTemplateToUse(
                            "ecommerce/templates/prodotto.edit",[
                            "template_extend"   =>  "empty.twig",
                            "title" =>  "Modifica",
                            "data"  =>  $data,
                            "tipologieProdotto" =>  $tipologieProdotto,
                            "fields"    =>  $fields
                        ])->render()
                    ],
                    "categorie"    =>  [
                        "label" =>  "Categorie",
                        "content"   => Response::getTemplateToUse(
                            "ecommerce/templates/prodotto.edit.categorie",[
                            "template_extend"   =>  "empty.twig",
                            "categorieDisponibili"  =>  $categorieDisponibili,
                            "categorieAssociate"    =>  $categorieAssociate,
                            "idProdotto"            =>  $params['id']
                        ])->render()
                    ],
                    "campi"    =>  [
                        "label" =>  "Campi",
                        "content"   => Response::getTemplateToUse(
                            "ecommerce/templates/prodotto.edit.campi",[
                            "template_extend"   =>  "empty.twig",
                            "prodotto"  =>  $data,
                            "idProdotto"            =>  $params['id'],
                            "campi" =>  $data->tipologia->campi
                        ])->render()
                    ],
                    "varianti"    =>  [
                        "label" =>  "Varianti",
                        "content"   => Response::getTemplateToUse(
                            "ecommerce/templates/prodotto.edit.varianti",[
                            "template_extend"   =>  "empty.twig",
                            "prodotto"  =>  $data,
                            "idProdotto"            =>  $params['id'],
                            "campi" =>  $data->tipologia->campi,
                            "attributiTipologia"=>$attributiTipologia
                        ])->render()
                    ],
                ]
            ]

        ];
    }

    static function updateProdotto( $params = [] , $data = null ){
        return parent::actionUpdate($params,$data);
    }


    static function addCategories( $params = [], $data = null){
        $idProdotto = $params['id'];
        $ids = $data['ids'];

        foreach ($ids as $key=>$id_category){
            $present = CategoriaProdotto::findById_categoria($id_category);

            if( empty($present) ){
                $cp = new CategoriaProdotto();
                $cp->id_categoria = $id_category;
                $cp->id_prodotto = $idProdotto;
                $cp->save();


            }
        }

        echo json_encode(true);
        exit;
    }
    static function removeCategories( $params = [], $data = null){
        $idProdotto = $params['id'];
        $ids = $data['ids'];

        foreach ($ids as $key=>$id_category){
            $present = CategoriaProdotto::findById_categoria($id_category);

            if( !empty($present) ){
                /**
                 * @var $cp CategoriaProdotto
                 */
                $cp = $present[0];
                $r = $cp->remove();
            }
        }

        echo json_encode(true);
        exit;
    }

    static function getCategories( $params=[] ){

        $idProdotto = $params['id'];
        $c = CategoriaProdotto::findById_prodotto( $idProdotto );
        if(!empty($c)){
            foreach ($c as $value){
                $value->updateFromDb();
            }
        }
        return [
            "empty",[
                "data"  =>  $c
            ]
        ];
    }

    static function saveProperties( $params=[],$data){
        foreach ($data as $key=>$value) {
            $sql = "SELECT * FROM ecommerce_prodotto_campi WHERE id_ecommerce_prodotto=:id AND slug=:slug";
            $r = Db::$connection->fetchOne($sql,[
                "id"    =>  $params['id'],
                "slug"  =>  $key
            ]);
            if($r == false){
                $sql = "INSERT INTO ecommerce_prodotto_campi (id_ecommerce_prodotto,slug,valore) VALUES (:id,:slug,:valore)";
                Db::$connection->perform($sql,[
                    "id"    =>  $params['id'],
                    "slug"  =>  $key,
                    "valore"=>  $value
                ]);
            }else{
                $sql = "UPDATE ecommerce_prodotto_campi SET valore=:valore WHERE id_ecommerce_prodotto=:id AND slug=:slug";
                Db::$connection->perform($sql,[
                    "id"    =>  $params['id'],
                    "slug"  =>  $key,
                    "valore"=>  $value
                ]);
            }

        }

        exit;
    }


    static function addVariant( $params=[],$data){



        $sql = "INSERT INTO ecommerce_prodotto_variante (id_prodotto) VALUES (:id)";
        Db::$connection->perform($sql,$params);

        $idvariante = Db::$connection->lastInsertId();

        foreach ($data['attributi'] as $key=> $value) {
            $sql = "INSERT into ecommerce_prodotto_variante_attributi (id_ecommerce_prodotto_variante,id_ecommerce_attributo,id_valore) VALUE(:idvariante,:idattributo,:valore)";
            Db::$connection->perform($sql,[
                "idvariante"    =>  $idvariante,
                "idattributo"   =>  $key,
                "valore"        =>  $value
            ]);
        }
        exit;
    }
}