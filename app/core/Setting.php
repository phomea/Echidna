<?php
 namespace core;

 use core\db\Field;

 class Setting extends Model{

     static function getTable()
     {
         return "settings";
     }

     static function schema()
     {
         return [
             "id"   =>  Field::primaryIndex(),
             "setting_key"=>    Field::varchar("30")->index(),
             "setting_value"    =>  Field::varchar("30"),
             "active"   =>  Field::boolean()
         ];
     }


     static function findByKey($key,$default = ""){
         if($setting = Setting::query()->where('setting_key="'.$key.'"')->getOne() ){
             return $setting->setting_value;
         }else{
             return $default;
         }
     }

     static function setByKey($key,$value){
         if($setting = Setting::query()->where('setting_key="'.$key.'"')->getOne() ){
             $setting->setting_value=$value;
             $setting->save();
         }else {
             $setting = new Setting([
                 "setting_key" => $key,
                 "setting_value" => $value,
                 "active" => 1
             ]);
             $setting->save();
         }
     }
 }
