<?php
namespace console\commands;

class BaseCommand{


    function title( $s ){
        echo "==========\n";
        echo $s;
        echo "\n";
        echo "==========\n";
    }

    function step( $m ){
        echo " • ".$m;
        echo "\n";
    }

    function success( $m ){
        echo " * * ".$m." * *\n";
    }

    function error($m,$die = false){
        echo " !!! ".$m." !!!\n";
        if($die) die("Processo interrotto");
    }
}