<?php
namespace applications\ecommerce;

use applications\ecommerce\entities\Carrello;
use applications\ecommerce\entities\Categoria;
use applications\ecommerce\entities\Cliente;
use applications\ecommerce\entities\ClienteSpedizione;
use applications\ecommerce\entities\Coupon;
use applications\ecommerce\entities\LineItem;
use applications\ecommerce\entities\MetodoPagamento;
use applications\ecommerce\entities\Ordine;
use applications\ecommerce\entities\Prodotto;
use applications\ecommerce\entities\Provincia;
use applications\ecommerce\entities\Spedizione;
use applications\ecommerce\entities\Variante;
use applications\ecommerce\gateway\Braintree;
use applications\ecommerce\gateway\Contrassegno;
use applications\ecommerce\gateway\Stripe;
use applications\login\LoginApplication;
use Aura\Sql\Exception;
use core\Config;
use core\Email;
use core\Route;
use core\RouteFilter;
use core\services\Db;
use core\services\EmailService;
use core\services\Request;
use core\services\Response;
use core\services\RouterService;
use core\services\SessionService;
use frontend\spagnesi\applications\ecommerce\EcommerceSpagnesiFrontend;
use function MongoDB\BSON\fromJSON;

class EcommerceFrontend extends \core\abstracts\FrontendApplication{
    const SESSION_USER_LOGGED ="ecommerce.userlogged";

    const ROUTE_CARRELLO = "frontend.ecommerce.carrello";
    const ROUTE_CHECKOUT = "frontend.ecommerce.checkout";
    const ROUTE_LOGIN = "frontend.ecommerce.checkout.login";
    const ROUTE_LOGOUT = "frontend.ecommerce.user.account.logout";
    const ROUTE_REGISTRAZIONE = "frontend.ecommerce.checkout.registrazione";
    const ROUTE_REGISTRAZIONE_SAVE = "frontend.ecommerce.checkout.registrazione.save";


    const ROUTE_SPEDIZIONE = "frontend.ecommerce.checkout.spedizione";
    const ROUTE_SPEDIZIONE_SAVE = "frontend.ecommerce.checkout.spedizione.save";

    const ROUTE_METODO_SPEDIZIONE = "frontend.ecommerce.checkout.spedizione.metodo";
    const ROUTE_METODO_SPEDIZIONE_SAVE = "frontend.ecommerce.checkout.spedizione.metodo.save";



    const ROUTE_RICERCA = "frontend.ecommerce.ricerca";



    static function init()
    {

        parent::init(); // TODO: Change the autogenerated stub
    }


    static function declareRoutes()
    {

        RouterService::addFilter(
            (new RouteFilter())->setName("filter.frontend.ecommerce.login")->setRegex("/checkout/{a:(.*)}")->setCallback([self::class,"loginEcommerceFilter"])
        );

        RouterService::addFilter(
            (new RouteFilter())->setName("filter.frontend.ecommerce.variables")->setRegex("/{a:(.*)}")->setCallback([self::class,"loginEcommerceFilterVariables"])
        );



        return [
            self::ROUTE_CARRELLO   =>  new Route(self::ROUTE_CARRELLO,"/carrello",[self::class,"_carrello"]),
            self::ROUTE_CHECKOUT   =>  new Route(self::ROUTE_CHECKOUT,"/checkout",[self::class,"_checkout"]),

            self::ROUTE_LOGIN    =>  (new Route(self::ROUTE_LOGIN,"/checkout/login",[self::class,"_login"]))->method(Route::METHOD_POST),


            self::ROUTE_REGISTRAZIONE   =>  new Route("frontend.ecommerce.checkout.registrazione","/checkout/registrazione",[self::class,"_regitrazione"]),

            self::ROUTE_REGISTRAZIONE_SAVE  =>  (new Route( "frontend.ecommerce.checkout.registrazione.save" ,"/checkout/registrazione",[self::class,"_regitrazione"]))->method(Route::METHOD_POST),

            self::ROUTE_SPEDIZIONE   =>  new Route(self::ROUTE_SPEDIZIONE,"/checkout/spedizione",[self::class,"_spedizione"]),
            self::ROUTE_SPEDIZIONE_SAVE  =>  (new Route( self::ROUTE_SPEDIZIONE_SAVE,"/checkout/spedizione",[self::class,"_spedizione"]))->method(Route::METHOD_POST),

            self::ROUTE_METODO_SPEDIZIONE   =>  new Route(self::ROUTE_SPEDIZIONE,"/checkout/spedizione/corriere",[self::class,"_metodoSpedizione"]),
            self::ROUTE_METODO_SPEDIZIONE_SAVE  =>  (new Route( self::ROUTE_SPEDIZIONE_SAVE,"/checkout/spedizione/corriere",[self::class,"_metodoSpedizione"]))->method(Route::METHOD_POST),

            "frontend.ecommerce.checkout.pagamento"   =>  new Route("frontend.ecommerce.checkout.pagamento","/checkout/pagamento",[self::class,"_pagamento"]),
            "frontend.ecommerce.checkout.charge"   =>  (new Route("frontend.ecommerce.checkout.charge","/checkout/piazza",[self::class,"_charge"]))->method(Route::METHOD_POST),

            "frontend.ecommerce.checkout.thankyou"   =>  (new Route("frontend.ecommerce.checkout.thankyou","/checkout/ordine-effettuato",[self::class,"_thankyou"])),


            "frontend.ecommerce.categoria"   =>  new Route("frontend.ecommerce.categoria","/{slug:([0-9a-zA-Z-]*)}",[self::class,"_categoria"]),
            "frontend.ecommerce.carrello.aggiungi"   =>  (new Route("frontend.ecommerce.carrello.aggiungi" ,"/carrello/aggiungi",[self::class,"_carrelloAggiungi"]))->method(Route::METHOD_POST),
            "frontend.ecommerce.carrello.aggiungi.veloce"   =>  (new Route("frontend.ecommerce.carrello.aggiungi" ,"/carrello/aggiungi/veloce/{id:([0-9]*)}",[self::class,"_carrelloAggiungiVeloce"])),
            "frontend.ecommerce.carrello.rimuovi"   =>  (new Route("frontend.ecommerce.carrello.rimuovi" ,"/carrello/rimuovi/{id:([0-9]*)}",[self::class,"_carrelloRimuovi"])),

            "frontend.ecommerce.schedaprodotto"   =>  new Route( "frontend.ecommerce.schedaprodotto","/{slug:([0-9a-zA-Z-]*)}",[static::class,"_schedaProdotto"]),
            "frontend.ecommerce.schedaprodotto.variante"   =>  new Route( "frontend.ecommerce.schedaprodotto.variante","/{slug:([0-9a-zA-Z-]*)}/{slug-variante:([0-9a-zA-Z-]*)}",[self::class,"_schedaProdotto"]),
            "frontend.ecommerce.aggiungicoupon" =>  (new Route("frontend.ecommerce.aggiungicoupon","/carrello/aggiungi-coupon",[static::class,"_aggiungiCoupon"]))->method(Route::METHOD_POST),
            "frontend.ecommerce.rimuovicoupon" =>  (new Route("frontend.ecommerce.rimuovicoupon","/carrello/rimuovi-coupon",[static::class,"_rimuoviCoupon"]))->method(Route::METHOD_GET),
            self::ROUTE_RICERCA =>  new Route(self::ROUTE_RICERCA,"/shop/cerca",[self::class,"_ricerca"]),

            //user account
            "frontend.ecommerce.user.account"   =>  new Route("","/user-account",[static::class,"_userAccount"]),
            "frontend.ecommerce.user.account.save"   =>  (new Route("","/user-account",[static::class,"_userAccount"]))->method(Route::METHOD_POST),
            self::ROUTE_LOGOUT    =>  (new Route("","/user-account/logout",[self::class,"_logout"])),
        ];


    }

    static function loginEcommerceFilterVariables( $route ){


        Response::addVariable([
             "carrello"  =>  Carrello::get(),
            "user"  =>  SessionService::get(self::SESSION_USER_LOGGED)
        ],true);
        return true;
    }
    static function loginEcommerceFilter( $route ){


        if( !SessionService::get(self::SESSION_USER_LOGGED)){

            if(
                !in_array( $route->name,[
                    self::ROUTE_LOGIN,
                    self::ROUTE_REGISTRAZIONE,
                    self::ROUTE_REGISTRAZIONE_SAVE
                ])
            ) {
                RouterService::getRoute(self::ROUTE_CHECKOUT)->go();
            }
        }




        return true;
    }


    static function _carrelloAggiungi($params=[],$data){



        if(isset($data['attributi'])){
            $lineitem = new LineItem($data['id_variante'],$data['quantita']);
            $lineitem->additionalAttributes($data['attributi']);

            $carrello = Carrello::get()->add($lineitem);

        }else{
            $carrello = Carrello::get()->createLineItem($data['id_variante'],$data['quantita']);
        }



        RouterService::getRoute("frontend.ecommerce.carrello")->go();

    }


    static function _carrelloAggiungiVeloce($params=[]){



        $carrello = Carrello::get()->createLineItem($params['id'],1);

        RouterService::getRoute("frontend.ecommerce.carrello")->go();

    }

    static function _carrelloRimuovi($params=[]){


        $carrello = Carrello::get();
        $carrello->removeByVariant($params['id']);
       RouterService::getRoute("frontend.ecommerce.carrello")->go();

    }

    static function _carrello( $params =[]){
        $carrello = Carrello::get();


        return [
            "ecommerce/carrello",[

                "params"    =>  $params
            ]
        ];
    }

    static function preparaFromAttributi( $varianti ){
        $attributi = [];
        foreach ($varianti as $item) {
            $dataparents = [];
            foreach ($item->attributi as $key => $value){


                if (!isset($attributi[$value->attributo->id])) {
                    $attributi[$value->attributo->id] = [
                        "idattributo" => $value->attributo->id,
                        "attributo" => $value->attributo,
                        "valori" => []
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
        return $attributi;
    }
    static function _schedaProdotto( $params=[]){
        $prodotto = Prodotto::findBySlug($params['slug']);
        if( !$prodotto ){
            return false;
        }


        $attributi = self::preparaFromAttributi($prodotto[0]->varianti);


        /*foreach ($prodotto[0]->varianti as $item) {


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
        */
        $variante = $prodotto[0]->varianti[0];


        if(isset($params['slug-variante'])){
            $v = Variante::query()->where('id_prodotto='.$prodotto[0]->id)->where('sku="'.$params['slug-variante'].'"')->getOne();

            if( $v ){
                $v->expand();
                $variante = $v;
            }
        }


        return [
            "ecommerce/scheda-prodotto-spagnesi",[
                "prodotto"  =>  $prodotto[0],
                "attributi" =>  $attributi,
                "variante"  =>  $variante
            ]
        ];

    }


    static function _categoria( $params =[]){

        $cat = Categoria::findBySlug($params['slug']);
        if(empty($cat)){
            return false;
        }
        $categoria = $cat[0];


        $prodotti = Catalogo::search()->byCategory($categoria);

        $immagineTop = "";

        $immagini = $categoria->getImages();
        if( count($immagini) > 0 ){
            $immagineTop = $immagini[0]['permalink'];
        }
        return [
            "ecommerce/shop/category",[
                "categoria" =>  $categoria,
                "prodotti"  =>  $prodotti,
                "immagineTop" => $immagineTop
            ]
        ];
    }

    static function _checkout( $params=[]){

        if( SessionService::get(self::SESSION_USER_LOGGED)){
            RouterService::getRoute(self::ROUTE_SPEDIZIONE)->go();
        }

        return [
            "ecommerce/checkout/index",[
                "carrello"  => Carrello::get()
            ]
        ];
    }

    static function _regitrazione( $params=[], $data = null){
        if(Request::isPost()){

            $data['password'] = LoginApplication::generateHash($data['password']);

            $cliente = new Cliente($data);
            $cliente->save();

            SessionService::set(EcommerceFrontend::SESSION_USER_LOGGED,$cliente);

            RouterService::getRoute("frontend.ecommerce.checkout.spedizione")->go();
        }
        return[
            "ecommerce/checkout/registrazione",[]
        ];
    }

    static function _spedizione( $params = [],$data = null){
        $spedizioniDisponibili = Spedizione::query()->getAll();
        $provincieDisponibili = Provincia::query()->where("id_country=10")->getAll();


        $cliente = SessionService::get(self::SESSION_USER_LOGGED);

        $indirizziSpedizione = ClienteSpedizione::findById_cliente( $cliente->id );

        if( Request::isPost()){
            if( isset($data['spedizione']['id']) ){
                $spedizione = ClienteSpedizione::findById($data['spedizione']['id']);
                $spedizione->buildProperties($data["spedizione"]);
            }else{
                $spedizione = new ClienteSpedizione($data['spedizione']);
            }
            $spedizione->save();

            $carrello = Carrello::get();



            if( count($carrello->metodiDiSpedizione) > 1){

                RouterService::getRoute("frontend.ecommerce.checkout.spedizione.metodo")->go();

            }

            RouterService::getRoute("frontend.ecommerce.checkout.pagamento")->go();
        }


        return [
            "ecommerce/checkout/spedizione",[
                "cliente"   =>  SessionService::get(self::SESSION_USER_LOGGED),
                "spedizioniDisponibili" => $spedizioniDisponibili,
                "provincieDisponibili" => $provincieDisponibili,
                "indirizzoSpedizione"   =>  empty($indirizziSpedizione) ? [] : $indirizziSpedizione[0]
            ]
        ];
    }

    static function _metodoSpedizione( $params = [],$data = null){

        $carrello = Carrello::get();

        if( Request::isPost()){

            $spedizione = Spedizione::findById($data['id_spedizione']);

            $carrello->setMetodoSpedizione($spedizione);
            $carrello->save();
            RouterService::getRoute("frontend.ecommerce.checkout.pagamento")->go();
        }


        return [
            "ecommerce/checkout/metodo_spedizione",[
                "spedizioniDisponibili" => $carrello->metodiDiSpedizione,
                "spedizioneCorrente"    =>  $carrello->metodoDiSpedizione
            ]
        ];

        exit;

        if( Request::isPost()){
            if( isset($data['spedizione']['id']) ){
                $spedizione = ClienteSpedizione::findById($data['spedizione']['id']);
                $spedizione->buildProperties($data["spedizione"]);
            }else{
                $spedizione = new ClienteSpedizione($data['spedizione']);
            }
            $spedizione->save();

            $carrello = Carrello::get();

            if( count($carrello->metodiDiSpedizione) > 1){
                RouterService::getRoute("frontend.ecommerce.checkout.spedizione.metodo")->go();
            }

            RouterService::getRoute("frontend.ecommerce.checkout.pagamento")->go();
        }


        return [
            "ecommerce/checkout/spedizione",[
                "cliente"   =>  SessionService::get(self::SESSION_USER_LOGGED),
                "spedizioniDisponibili" => $spedizioniDisponibili,
                "provincieDisponibili" => $provincieDisponibili,
                "indirizzoSpedizione"   =>  empty($indirizziSpedizione) ? [] : $indirizziSpedizione[0]
            ]
        ];
    }

    static function _pagamento(){

        $braintree = new Braintree();

        $carrello = Carrello::get();


        $cliente = SessionService::get(self::SESSION_USER_LOGGED);
        $carrello->setCliente($cliente);



        $totale = $carrello->getTotal();


        $metodiDiPagamento = MetodoPagamento::query()->getAll();

        return [
            "ecommerce/checkout/pagamento",[
                "token"   =>  $braintree->generateToken( $cliente ),
                "totale"            =>  $totale,
                "metodiDiPagamento" =>  $metodiDiPagamento
            ]
        ];
    }

    static function _charge($params = [],$data){
        $carrello = Carrello::get();
        $cliente = SessionService::get(self::SESSION_USER_LOGGED);


        $email = new Email();
        $email->from= "info";
        $email->to= "phomea@gmail.com";
        $email->template = "conferma-ordine";
        $email->subject ="Conferma ordine";

        $email->setData([
            "ordine"  =>  $carrello,
            "lineitems" =>  $carrello->lineitems
        ]);



        $metodo = MetodoPagamento::findById($data['metodoDiPagamento']);



        $totale = $carrello->getTotal();



        if($metodo->type == Braintree::getType() ) {
            $braintree = new Braintree();
            $totale = number_format( (float)$totale , 2, '.', '');
            $result = $braintree->transaction($totale, $data['payment_method_nonce']);

            if ($result->success) {
                // pagamento effettuato
                $transaction = $result->transaction;

                $ordine = new Ordine([
                    "id_cliente" => $cliente->id,
                    "gateway" => "braintree",
                    "id_transaction" => $transaction->id,
                    "id_metodospedizione" => $carrello->metodoDiSpedizione->id,
                    "metodospedizione"  =>  $carrello->metodoDiSpedizione->nome." - prezzo ".Response::formatPrice($carrello->metodoDiSpedizione->prezzo),
                    "id_indirizzospedizione" => $carrello->indirizzoSpedizione->id,
                    "id_coupon" =>  empty($carrello->coupon) ? null : $carrello->coupon->id,
                    "spedizione" => $carrello->spedizione,
                    "subtotale" => $carrello->subtotale,
                    "totale" => $carrello->totale,
                    "lineitems" =>  $carrello->lineitems

                ]);
                $ordine->build();
                if( !empty($carrello->coupon) ){
                    $carrello->coupon->utilizzi += 1;
                    $carrello->coupon->save();
                }
                $ordine->save();
                $numero = $ordine->getNumeroOrdine();
                $email->data['numeroordine'] = $numero;
                $email->send();



                SessionService::delete(Carrello::SESSION_NAME);

            } else {

            }
        }
        if($metodo->type == Contrassegno::getType() ) {
            $carrello->extra = 4;
            $totale = $carrello->getTotal();

            $ordine = new Ordine([
                "id_cliente" => $cliente->id,
                "gateway" => "contrassegno",
                "id_metodospedizione" => $carrello->metodoDiSpedizione->id,
                "metodospedizione"  =>  $carrello->metodoDiSpedizione->nome." - prezzo ".Response::formatPrice($carrello->metodoDiSpedizione->prezzo),
                "id_indirizzospedizione" => $carrello->indirizzoSpedizione->id,
                "spedizione" => $carrello->spedizione,
                "id_coupon" =>  empty($carrello->coupon) ? null : $carrello->coupon->id,
                "subtotale" => $carrello->subtotale,
                "totale" => $carrello->totale,
                "lineitems" =>  $carrello->lineitems
            ]);
            $ordine->build();
            if( !empty($carrello->coupon) ){
                $carrello->coupon->utilizzi += 1;
                $carrello->coupon->save();
            }
            $ordine->save();


            $numero = $ordine->getNumeroOrdine();
            $email->data['numeroordine'] = $numero;
            $email->send();



            SessionService::delete(Carrello::SESSION_NAME);
        }

        RouterService::getRoute("frontend.ecommerce.checkout.thankyou")->go();


    }

    static function _thankyou( $params = []){
        return [
            "ecommerce/thankyou",[]
        ];
    }

    static function _login($params=[],$data){

        $user = $data['username'];
        $password = LoginApplication::generateHash($data['password']);

        $cliente= Cliente::query()->where('email="'.$user.'"')->getOne();

        if( $cliente ) {
            if ($cliente->password == $password) {
                SessionService::set(EcommerceFrontend::SESSION_USER_LOGGED, $cliente);
                $carrello = Carrello::get();
                $carrello->setCliente($cliente);
                
                RouterService::getRoute(self::ROUTE_SPEDIZIONE)->go();

            }

        }

        RouterService::getRoute(self::ROUTE_CHECKOUT)->go([
            "msg"   =>  "Non è stato possibile autenticarsi"
        ]);

    }

    static function _logout($params=[]){


        $cliente = SessionService::get(self::SESSION_USER_LOGGED);
        SessionService::delete(self::SESSION_USER_LOGGED);

        Response::go("/");



    }




    static function _ricerca( $params= [] ){
        $data = Request::getParams();

        $categoria = isset($data['tipologia']) ? $data['tipologia'] : [];
        $attributi = isset($data['attributo']) ? $data['attributo'] : [];

        $ricerca = isset($data['ricerca']) ? $data['ricerca'] : "";

        $cerca = new CatalogoSearch();


        $r = $cerca->setQuery($ricerca)->setAttributes($attributi)->setCategories($categoria)
            ->search();


        return [
            "ecommerce/shop/list",[
                "prodotti"  =>  $r
            ]
        ];
    }


    static function _aggiungiCoupon( $params=[],$data){
        $coupon = Coupon::findByNome($data['coupon']);


        if( count($coupon) > 0 ){
            if( Carrello::get()->addCoupon($coupon[0]) ) {
                RouterService::getRoute(self::ROUTE_CARRELLO)->go(["msg" => "Coupon aggiunto"]);
            }else{
                RouterService::getRoute(self::ROUTE_CARRELLO)->go(["msg" => "Coupon non valido"]);
            }
        }

        RouterService::getRoute(self::ROUTE_CARRELLO)->go(["msg"=>"Il coupon inserito non esiste"]);
        exit;
    }
    static function _rimuoviCoupon( $params=[]){

        Carrello::get()->rimuoviCoupon();

        RouterService::getRoute(self::ROUTE_CARRELLO)->go(["msg"=>"Coupon rimosso"]);
    }


    static function _userAccount($params =[],$data=null){
        if(!SessionService::get(self::SESSION_USER_LOGGED)){
            Response::go("/");
        }
        if(Request::isPost()){
            $user = SessionService::get(self::SESSION_USER_LOGGED);
            $user->buildProperties($data);
            $user->save();

            RouterService::getRoute("frontend.ecommerce.user.account")->go([
                "msg"=>"Dati del profilo salvati"
            ]);
            exit;
        }else{

            return [
                "ecommerce/user-account/index",[
                    "user"  => SessionService::get(self::SESSION_USER_LOGGED),
                    "spedizione"    =>SessionService::get(self::SESSION_USER_LOGGED)->getDefaultShippingAddress()
                ]
            ];
        }

    }
}