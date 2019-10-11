<?php

namespace core\template;

use core\services\Request;

class JsonTemplate extends BaseTemplate {

    static function utf8ize($mixed) {
        if (is_array($mixed)) {
            foreach ($mixed as $key => $value) {
                $mixed[$key] = self::utf8ize($value);
            }
        } else if (is_string ($mixed)) {
            return utf8_encode($mixed);
        }
        return $mixed;
    }

    public function render(){


        if(isset($this->response['data'])){
            $return = json_encode($this->response['data'],JSON_UNESCAPED_UNICODE);
        }else{
            $return = json_encode($this->response,JSON_UNESCAPED_UNICODE);
        }


        if(!$return && json_last_error() == JSON_ERROR_UTF8){
            $return = json_encode(self::utf8ize($this->response['data']));

            var_dump(json_last_error());
        }
        header("Content-Type: application/json", true);
        echo $return;
        exit;
        //header("Content-Type: application/json", true);
        echo json_encode($this->response['data']);
    }

    static function getBaseDirectory()
    {
        return __DIR__;
    }

}