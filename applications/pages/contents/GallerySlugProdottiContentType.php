<?php

namespace applications\pages\contents;

use core\services\Response;

class GallerySlugProdottiContentType extends \applications\pages\contents\ContentType{

    const TYPE = "griglia-slug-prodotti";

    public $type = "griglia-slug-prodotti";
    public $label = "griglia-slug-prodotti";
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
        echo Response::getTemplateToUse("fields/select",[
            "label"=>"Colonne",
            "templateVar" =>  [
                [
                    "label" =>  "2",
                    "value" =>  2
                ],
                [
                    "label" =>  "3",
                    "value" =>  3
                ],
                [
                    "label" =>  "4",
                    "value" =>  4
                ]
            ]]
        ])->render();


        echo Response::getTemplateToUse("fields/default",[
            "label"=>"Slug prodotti"
        ])->render();
    }


}