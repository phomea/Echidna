<?php

namespace frontend\consorzioleonardo\applications\progetti\entities;


use core\db\Field;
use core\Model;
use frontend\consorzioleonardo\applications\imprese\entities\Impresa;

class Progetto extends Model{
    static function schema()
    {
       return [
           "id" =>  Field::primaryIndex(),
           "nome"   =>  Field::varchar(512)->editable(),
           "riferimento"    =>  Field::varchar(64)->editable(),
           "cig"    =>  Field::varchar(64)->editable(),
           "scadenza"   =>  Field::date()->editable(),
           "importo"    =>  Field::varchar(512)->editable(),
           "e"  =>  Field::date()->editable(),
           "note"   =>  Field::text()->editable(),
           "active" =>  Field::int(2)->editable()->setDefault(0)->setLabel("Stato")
       ];
    }

    function insert()
    {
        parent::insert();

        $imprese = Impresa::query()->getAll();

        foreach ($imprese as $key => $value ){
            $aziendaprogetto = new AziendaProgetto([
                "azienda_id"    =>  $value->id,
                "progetto_id"   =>  $this->id,
                "risposta"  =>  AziendaProgetto::RISPOSTA_NON_RISPOSTO
            ]);

            $aziendaprogetto->save();
        }

    }


}