<?php
namespace applications\slider\entities;

use core\Config;

class Slider{
    /**
     * @var Slide[]
     */
    public $slides = [];

    static function findByHook( $position ){
        $i = new Slider();
        $i->hook = $position;
        $i->slides =Slide::query()->where('hook="'.$position.'"')->getAll();

        return $i;
    }

    public function render(){

        if( count($this->slides)>0) {
            return [
                "slider/default", [
                    "slider" => $this
                ]
            ];
        }
        return false;
    }


    static function getHooks(){
        $c = Config::getFile("slider");


        return $c;
    }

    static function getPositions(){
        $c = self::getHooks();

        $p=[];
        foreach ($c['positions'] as $key=>$value){
            $p[]=[
                "value"=>$key,
                "label"=>$value
            ];
        }

        return $p;

    }

}