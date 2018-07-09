<?php
namespace applications\ecommerce;

use applications\ecommerce\entities\Carrello;
use applications\ecommerce\entities\Categoria;
use applications\ecommerce\entities\Prodotto;
use core\Route;
use core\services\RouterService;
use core\services\SessionService;

class EcommerceFrontend extends \core\abstracts\FrontendApplication{
    static function declareRoutes()
    {
        return [
            "frontend.ecommerce.carrello"   =>  new Route("","/carrello",[self::class,"_carrello"]),

            "frontend.ecommerce.categoria"   =>  new Route("","/{slug:([0-9a-zA-Z-]*)}",[self::class,"_categoria"]),
            "frontend.ecommerce.carrello.aggiungi"   =>  (new Route("","/carrello/aggiungi",[self::class,"_carrelloAggiungi"]))->method(Route::METHOD_POST),

            "frontend.ecommerce.schedaprodotto"   =>  new Route("","/{slug:([0-9a-zA-Z-]*)}",[self::class,"_schedaProdotto"])

        ];
    }


    static function _carrelloAggiungi($params=[],$data){
        $carrello = Carrello::get()->createLineItem($data['id_variante'],$data['quantita']);
       RouterService::getRoute("frontend.ecommerce.carrello")->go();

    }

    static function _carrello( $params =[]){
        $carrello = Carrello::get();
        return [
            "ecommerce/carrello",[
                "carrello"  =>  $carrello
            ]
        ];
    }

    static function _schedaProdotto( $params=[]){
        $prodotto = Prodotto::findBySlug($params['slug']);
        if( !$prodotto ){
            return false;
        }


        $attributi = [];


        foreach ($prodotto[0]->varianti as $item) {


            $dataparents = [];


            foreach ($item->attributi as $key => $value){



                if(!isset($attributi[$value->attributo->id])){
                    $attributi[$value->attributo->id] = [
                        "idattributo" =>  $value->attributo->id,
                         "attributo" =>  $value->attributo,
                        "valori"    =>  []
                    ];
                }

                if($key>0) {
                    $attributi[$value->attributo->id]['attributo_precedente'] = $item->attributi[$key - 1]->attributo->id;

                }

                $o = [
                    "idvalore"  =>  $value->valore->id,
                    "valore"    =>  $value->valore

                ];



                 if($key>0) {
                     $dataparents[] = [
                         $item->attributi[$key - 1]->attributo->id,
                         $item->attributi[$key - 1]->valore->id
                     ];
                   $o["attributoprecedentevalore"] = $item->attributi[$key - 1]->valore->id;
                   $o["attributoprecedenteid"] = $item->attributi[$key - 1]->attributo->id;
                   $o["parents"] = $dataparents;
                }



                if(!in_array($o,$attributi[$value->attributo->id]['valori']))
                    $attributi[$value->attributo->id]['valori'][] = $o;

            }

        }


        /*
        foreach ($prodotto[0]->varianti as $item) {
            foreach ($item->attributi as $key => $value){

                if(!isset($attributi[$value->attributo->id])){
                    $attributi[$value->attributo->id] = [
                        "attributo" =>  $value->attributo,
                        "valori"    =>  []
                    ];
                }

                if( !in_array($value->valore , $attributi[$value->attributo->id]['valori']) ){
                    $attributi[$value->attributo->id]['valori'][] = $value->valore;
                }

            }
        }
        */

        $variante = $prodotto[0]->varianti[0];


        return [
            "ecommerce/scheda-prodotto",[
                "prodotto"  =>  $prodotto[0],
                "attributi" =>  $attributi,
                "variante"  =>  $variante
            ]
        ];
        exit;
    }


    static function _categoria( $params =[]){

        $cat = Categoria::findBySlug($params['slug']);
        if(empty($cat)){
            return false;
        }
        $categoria = $cat[0];


        $prodotti = Catalogo::search()->byCategory($categoria);

        return [
            "ecommerce/shop/category",[
                "categoria" =>  $categoria,
                "prodotti"  =>  $prodotti
            ]
        ];
    }

}