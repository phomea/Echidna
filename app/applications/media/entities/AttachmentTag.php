<?php
namespace applications\media\entities;

class AttachmentTag{
    static function convertFromDb( $data ){

        $r = [];
        foreach ($data as $value){
            $r[] = $value->value;
        }

        return implode(";",$r);
    }
    static function convertToDb( $data ){
        return explode(";",$data);
    }
}