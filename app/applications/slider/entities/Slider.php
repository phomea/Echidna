<?php
namespace applications\slider\entities;

class Slider{
    /**
     * @var Slide[]
     */
    public $slides = [];

    public function findByHook( $position ){
        $this->slides =Slide::findByHook( $position );
    }
}