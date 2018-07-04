<?php
namespace applications\ecommerce\traits;

use \applications\ecommerce\entities\Categoria;
use applications\ecommerce\entities\CategoriaProdotto;
use applications\ecommerce\entities\Prodotto;
use applications\ecommerce\entities\TipologiaProdotto;
use \core\services\Response;

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
                            "idProdotto"            =>  $params['id'],
                            "campi" =>  $data->tipologia->campi
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
}