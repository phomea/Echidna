<?php
namespace applications\ecommerce\gateway;


class Paypal extends Gateway {

    public $sandboxclientid = "yoursandbox";
    public $prodclientid = "yourprod";
    public $secret = "yoursecret";


    public function __construct($cliente=null,$carrello=null,$id_gateway=null)
    {
        parent::__construct($cliente,$carrello,$id_gateway);

    }

    static function getType()
    {
        return "paypal";
    }



    protected function _saveOrder()
    {

        $this->ordine->id_transaction = $this->data['transaction_id'];
        $this->pagamento->id_transaction = $this->data['transaction_id'];
        return parent::_saveOrder();

    }


}