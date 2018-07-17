<?php
namespace applications\ecommerce\gateway;


use applications\ecommerce\entities\Cliente;

class Braintree{

    public $merchant_id = "djw36g88h746hxnw";
    public $public_key = "3b6tm77rqq82nty6";
    public $private_key = "8ae8054f68e179b6c8529945c5a86b71";

    public $gateway = null;


    public function __construct()
    {
        $this->gateway = new \Braintree_Gateway([
            'environment' => 'sandbox',
            'merchantId' => $this->merchant_id,
            'publicKey' => $this->public_key,
            'privateKey' => $this->private_key
        ]);
    }

    /**
     * @param $cliente Cliente
     * @return string
     */
    public function generateToken( $cliente ){


        if( empty($cliente->id_braintree)) {
            $result = $this->gateway->customer()->create([
                'firstName' => $cliente->nome,
                'lastName' => $cliente->cognome,
                'company' => "",
                'email' => $cliente->email
            ]);

            if ($result->success) {
                $cliente->id_braintree = $result->customer->id;
                $cliente->save();
            }
        }

        return $this->gateway->clientToken()->generate([
            "customerId" => $cliente->id_braintree
        ]);
    }


    public function transaction($amount, $nonce){
        $result = $this->gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        return $result;
    }
}