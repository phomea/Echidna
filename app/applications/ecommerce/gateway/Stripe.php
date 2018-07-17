<?php
namespace applications\ecommerce\gateway;


class Stripe{

    public $secret_key = "sk_test_qZetIRLOLfQPfDxBHAKBnK4f";
    public $publishable_key = "pk_test_dd2F4UToQQ3EGiAix7Eollue";

    public function __construct()
    {
        \Stripe\Stripe::setApiKey($this->secret_key);
    }

}