<?php


namespace applications\pages\entities;
use applications\meta\entities\Meta;
use core\Model;
use core\db\Field;

/**
 * Class Pagina
 * @package models
 * @method int getId()
 * @method string getNome()
 * @method string getTesto()
 * @method \DateTime getData()
 * @method boolean isPassato()
 * @method static Pagina findById( $id )
 * @method static Pagina findBySlug( $slug )
 * @method static Pagina[] findByLayout( $layout )
 */
class Pagina extends Model {
    static function schema()
    {
        return[
            "id"    =>  Field::primaryIndex()->unique(),
            "title"  =>  Field::string()->editable()->setTemplate("title"),
            "slug" =>  Field::varchar( 100 )->unique()->editable()->setTemplate("slug")->setTemplateVar("title"),
            "description" => Field::text()->editable(),
            "content"   =>  Field::text()->editable()->setTemplate("tinymce"),
            "layout"    => Field::text()->editable()
        ];
    }


    static function findBySlug( $slug ){

        $r = parent::findBySlug( $slug );
        if(!$r) return false;
        
        $contenuti = Contenuto::query()
            ->where(Contenuto::PAGINE_ID ."=".$r->getId())
            ->getAll();






        $r->hooks = $r->getHooks( $contenuti );

        return $r;
    }

    static function findRawBySlug( $slug ){
        return parent::findBySlug( $slug );
    }

    function prepareHooks(){


        $contenuti = Contenuto::query()
            ->where(Contenuto::PAGINE_ID ."=".$this->getId())
            ->getAll();

        $this->hooks = $this->getHooks( $contenuti );
    }

    function getHooks($contenuti){
        $hooks = [];


        foreach ($contenuti as $key => $value){
            if( !isset($hooks[$value->getHook()] ) ){
                $hooks[$value->getHook()]=[];
            }



            $hooks[$value->getHook()][] = $value->render();
        }
        return $hooks;
    }

    function getContents(){
        return Contenuto::query()
            ->where(Contenuto::PAGINE_ID ."=".$this->getId())
            ->setOrderBy("ordine","ASC")
            ->getAll();
    }

    function getMeta(){

        return Meta::query()
            ->where('entity = "Pagina"')
            ->where("entity_id = ".$this->id)
            ->getOne();

    }
}