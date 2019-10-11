<?php
namespace applications\slider\contents;


use applications\ecommerce\entities\Carrello;
use applications\ecommerce\entities\LineItem;
use applications\ecommerce\entities\Prodotto;
use applications\ecommerce\entities\Variante;
use applications\ecommerce\LineItems;
use applications\slider\SliderApplication;
use core\services\Response;

class SliderContent{

    public $content = null;
    function __construct( $content )
    {
        $this->content=$content;
    }

    public function render(){

        $content = json_decode( $this->content->contenuto,true );

        $e = SliderApplication::renderSlider($content['id']);
        return Response::getFrontendTemplate()->withVars($e[0],$e[1])->render();


    }
}