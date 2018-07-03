<?php

namespace core\template;

use core\services\Request;

class JsonTemplate extends BaseTemplate {

    public function render(){
        echo json_encode($this->response['data']);
    }

}