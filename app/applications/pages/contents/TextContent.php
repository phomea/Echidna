<?php

namespace applications\pages\contents;

use core\services\Response;

class TextContent extends \applications\pages\contents\ContentType{

    const TYPE = "text";

    public $type = "text";
    public $label = "text";
    public $name;
    public $icon = "fa fa-image";
    function getStructure()
    {
        return [
            "type"      =>  self::TYPE
        ];
    }

    function renderForm()
    {

        $e = Response::getTemplateToUse("fields/default",[])->render();

        echo $e;
    }


}