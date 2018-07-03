<?php

namespace applications\pages\contents;

class ContentType implements \JsonSerializable {
    public $label;
    public $type;
    public $name;

    function jsonSerialize()
    {
        return [
            "label" =>  $this->label,
            "type"  =>  $this->type,
            "name"  =>  $this->name,
            "content" =>  $this->getStructure()
        ];
    }


    function getStructure(){
        return [];
    }

    function renderForm(){
        foreach ($this->getStructure() as $item) {
            if(is_a($item,ContentType::class)) {
                $item->renderForm();
            }
        }
    }

}