<?php
namespace applications\ecommerce\entities;


use applications\ecommerce\gateway\Bonifico;
use applications\ecommerce\gateway\Braintree;
use applications\ecommerce\gateway\Contrassegno;
use applications\ecommerce\gateway\Stripe;
use core\db\Field;
use core\Model;
use core\services\Response;
use core\services\SessionService;

class MetodoPagamento extends Model{
    static function getTypes(){
        return [
            [
                "label" =>  "Braintree",
                "value" =>  "braintree"
            ],
            [
                "label" =>  "Stripe",
                "value" =>  "stripe"
            ],
            [
                "label" =>  "Contrassegno",
                "value" =>  "contrassegno"
            ],
            [
                "label" =>  "Bonifica",
                "value" =>  "bonifico"
            ]
        ];
    }

    public function getGateway(){
        if( $this->type == "braintree"){
            return Braintree::class;
        }
        if( $this->type == "contrassegno"){
            return Contrassegno::class;
        }
        if( $this->type == "bonifico"){
            return Bonifico::class;
        }
        if( $this->type == "stripe"){
            return Stripe::class;
        }
    }

    static function getTable()
    {
        return "ecommerce_metodopagamento";
    }

    static function schema()
    {
        return[
            "id"    =>  Field::primaryIndex(),
            "nome"  =>  Field::varchar(512)->editable(),
            "type"  =>  Field::varchar(512)->editable()->setTemplate("select")->setTemplateVar(self::getTypes()),
            "prezzo"  =>  Field::varchar(512)->editable(),
            "descrizione"   =>  Field::text()->editable()->setTemplate("tinymce")
        ];
    }


    function processOrder($cliente,$carrello,$data=null){
        $gateway = $this->getGateway();

        $pagamento = new $gateway($cliente,$carrello);
        $pagamento->data = $data;
        $ordine = $pagamento->processOrder();
        return $ordine;

        switch ($this->type){
            case "contrassegno":

                $pagamento = new Contrassegno($cliente,$carrello);
                $ordine = $pagamento->processOrder();
                return $ordine;

                /*

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
                */
                break;

            case "braintree":
                $pagamento = new Braintree($cliente,$carrello);
                $pagamento->data = $data;
                $ordine = $pagamento->processOrder();
                return $ordine;
                /*
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

                }*/
                break;

            case  "bonifico" :
                $pagamento = new Bonifico($cliente,$carrello);
                $pagamento->data = $data;
                $ordine = $pagamento->processOrder();
                return $ordine;
                break;

        }
    }

}