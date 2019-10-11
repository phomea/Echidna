<?php
/**
 * Created by PhpStorm.
 * User: phomea
 * Date: 14/12/2018
 * Time: 12:54
 */
namespace applications\ecommerce\entities;

use applications\main\entities\Notification;
use core\Email;

class ChargeError{
    const SESSION_KEY = "ecoomerce.charge.error";

    private $msg="C'è stato un errore nel pagamento";
    private $error;
    private $order;

    /**
     * ChargeError constructor.
     * @param string $msg
     * @param $error
     * @param $order
     */
    public function __construct($msg, $error, $order)
    {
        $this->msg = $msg;
        $this->error = $error;
        $this->order = $order;
    }

    public function report(){
        Notification::notify("Errore pagamento",["msg"=>$this->msg]);

        ob_start();
        var_dump($this->error);
        $errorstring = ob_get_clean();
        $email = new Email();
        $email->template="mail-errore";
        $email->from="info";
        $email->to="info";
        $email->subject ="Errore pagamento";
        $email->setData([
            "msg"   =>  "Errore pagamento : ".$this->msg,
            "dati"  =>  $errorstring
        ]);
        $email->send();
    }
}