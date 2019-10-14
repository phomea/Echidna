<?php
namespace applications\media\entities;

class AttachmentText{
    static function convertFromDb( $data ){

        $r = [];
        foreach ($data as $key=>$value){
            $r[] = $value->value;
        }
        return $r;
        return $data;
    }
    static function convertToDb( $data ){
        return $data;
    }
}