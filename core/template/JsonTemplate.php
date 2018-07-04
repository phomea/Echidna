<?php

namespace core\template;

use core\services\Request;

class JsonTemplate extends BaseTemplate {

    public function render(){
        header("Content-Type: application/json", true);
        echo json_encode($this->response['data']);
    }

    static function getBaseDirectory()
    {
        return __DIR__;
    }

}