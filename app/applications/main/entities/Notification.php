<?php


namespace applications\main\entities;
use core\Model;
use core\db\Field;

class Notification extends Model {
    const TYPE_DEFAULT = "notification.default";

    static function schema()
    {
        return[
            "id"    =>  Field::primaryIndex()->unique(),
            "type"  =>  Field::text(),
            "created_at"    => Field::date(),
            "message"   =>  Field::text(),
            "data"  => Field::text(),
            "readed"  =>  Field::boolean()
        ];
    }

    static function notify($message,$data=[]){
        $notification = new static([
            "type"  =>  self::TYPE_DEFAULT,
            "message"   =>  $message,
            "data" => json_encode($data),
            "created_at" => date("Y-m-d H:i:s")
        ]);

        $notification->save();
    }
}