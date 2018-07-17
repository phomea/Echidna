<?php

namespace applications\pages\contents;

use core\Model;
use core\services\Response;

class EntityContentType extends \applications\pages\contents\ContentType{

    const TYPE = "entity";

    /**
     * @var Model
     */
    public $entity ="";
    public $fieldLabel = "";
    public $field = "";
    public $type ="entity";
    public $name = "entity";

    function setEntity($e){
        $this->entity = $e;
        return $this;
    }

    function setFieldLabel($f){
        $this->fieldLabel = $f;
        return $this;
    }

    function setField($f){
        $this->field = $f;
        return $this;
    }

    function getStructure()
    {
        return [
            "type"      =>  self::TYPE,
            "entity"    => $this->entity,
            "label"     =>  $this->label,
            "fiellabel" =>  $this->fieldLabel,
            "field"     =>  $this->field,
            "name"      =>  $this->name
        ];
    }

    function renderForm()
    {

        $entities = $this->entity::query()->getAll();

        $options = [];

        foreach ($entities as $entity){
            $options[] = [
                "label" =>  $entity->{$this->fieldLabel},
                "value" =>  $entity->{$this->field}
            ];
        }



        echo Response::getTemplateToUse("fields/select",[
            "options"   =>  $options,
            "property"  =>  $this->label
        ])->render();
    }


}