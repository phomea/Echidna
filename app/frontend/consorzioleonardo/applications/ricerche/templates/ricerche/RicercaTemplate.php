<?php

namespace frontend\consorzioleonardo\applications\ricerche\templates\ricerche;


class RicercaTemplate {
    public $ricerca;
    public $risultati;

    function __construct( $ricerca, $risultati)
    {

        $this->ricerca = $ricerca;
        $this->risultati = $risultati;
    }


    function render(){


        return [
            "list", [
                "data" => $this->risultati,
                "title" => $this->ricerca->nome
            ]
        ];
    }
}