<?php
namespace applications\ecommerce\traits;

use \applications\ecommerce\entities\Categoria;
use applications\ecommerce\entities\CategoriaProdotto;
use applications\ecommerce\entities\Prodotto;
use \core\services\Response;

trait metodiCatalogoProdotto{

    static function listaProdotti(){
        $data = Prodotto::query()->getAll();
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
    static function editProdotto( $params ){

        $data = Prodotto::findById( $params['id'] );

        $fields = static::generateFields(Categoria::class,$data);

        $categorieDisponibili = Categoria::query()->getAll();

        $categorieAssociate = CategoriaProdotto::findById_prodotto( $params['id'] );

        foreach ($categorieAssociate as $value){
            $value->update
        }

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
                            "fields"    =>  $fields
                        ])->render()
                    ],
                    "categorie"    =>  [
                        "label" =>  "Categorie",
                        "content"   => Response::getTemplateToUse(
                            "ecommerce/templates/prodotto.edit.categorie",[
                            "template_extend"   =>  "empty.twig",
                            "categorieDisponibili"  =>  $categorieDisponibili,
                            "categorieAssociate"    =>  $categorieAssociate
                        ])->render()
                    ],
                ]
            ]

        ];
    }

    static function updateProdotto( $params = [] , $data = null ){
        return parent::actionUpdate($params,$data);
    }

}