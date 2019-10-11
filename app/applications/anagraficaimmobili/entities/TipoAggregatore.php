<?php

namespace applications\anagraficaimmobili\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

use applications\anagraficaimmobili\entities\Fornitore;


class TipoAggregatore extends Model{

    static function schema()
    {
        $array_lettere = [];
        for($i='A',$j=1;$j<=50;$i++,$j++){
            $array_lettere[] = ["value"=>$j, "label"=>$j . " (" . $i . ")"];
        }

        return [
            "id"    =>  Field::primaryIndex(), //Come lo setto auto increment?
            "idFornitore"  =>  Field::int()->editable()->setLabel("Gestore")->setTemplate("select")->setTemplateVar(Fornitore::getForSelect("nome_cognome","id"))->setFieldsize("medium"),

            "nomeTipoAggregatore"  =>  Field::varchar(150)->editable()->setLabel("Nome Tipologia Aggregatore")->setPlaceholder("Inserire un nome per questo tipo di aggregatore")->setFieldsize("medium")->setMaxlength(150)->required(),

            //
            //DATI PER DEFINIRE LO SCHEMA CSV
            //

            "tipoMisurazione"	=> Field::varchar(10)->editable()->setTemplate("select")->setTemplateVar([
                ["value" => "", "label" => "Seleziona..."],
                ["value" => "ACC", "label" => "Acqua calda"],
                ["value" => "ET", "label" => "Energia Termica"],
                ["value" => "URR", "label" => "Unita' ripartizione radiatore"],
                ["value" => "OFF", "label" => "Dispositivo Offset"],
                /*
                ["value" => "1", "label" => "Frequenza"],
                ["value" => "102", "label" => "Corrente Tdhf I1"],
                ["value" => "103", "label" => "Corrente Tdhf I2"],
                ["value" => "104", "label" => "Corrente Tdhf I3"],
                ["value" => "ACC", "label" => "Acqua calda"],
                ["value" => "ACD", "label" => "Acqua diretta"],
                ["value" => "ACF", "label" => "Acqua fredda"],
                ["value" => "EA1", "label" => "Energia Attiva L1"],
                ["value" => "EA2", "label" => "Energia Attiva L2"],
                ["value" => "EA3", "label" => "Energia Attiva L3"],
                ["value" => "EEA", "label" => "Energia Attiva"],
                ["value" => "EEG", "label" => "Energia Elettrica"],
                ["value" => "EER", "label" => "Energia Reattiva"],
                ["value" => "ER1", "label" => "Energia Reattiva L1"],
                ["value" => "ER2", "label" => "Energia Reattiva L2"],
                ["value" => "ER3", "label" => "Energia Reattiva L3"],
                ["value" => "ET", "label" => "Energia Termica"],
                ["value" => "ETA", "label" => "Energia termica adibito a calcolo di ACS"],
                ["value" => "ETC", "label" => "Calorie"],
                ["value" => "ETF", "label" => "Frigorie"],
                ["value" => "ETT", "label" => "Energia Termica Giornaliera Teleriscaldamento"],
                ["value" => "GAS", "label" => "Gas"],
                ["value" => "HR", "label" => "Ore lavoro"],
                ["value" => "IL", "label" => "Corrente Trifase"],
                ["value" => "IL1", "label" => "Corrente Linea L1"],
                ["value" => "IL2", "label" => "Corrente Linea L2"],
                ["value" => "IL3", "label" => "Corrente Linea L3"],
                ["value" => "L12", "label" => "Tensione Concatenata L1-L2"],
                ["value" => "L23", "label" => "Tensione Concatenata L2-L3"],
                ["value" => "L31", "label" => "Tensione Concatenata L3-L1"],
                ["value" => "NOR", "label" => "NOREAD"],
                ["value" => "OFF", "label" => "Dispositivo Offset"],
                ["value" => "OG", "label" => "Avviamenti"],
                ["value" => "PA1", "label" => "Potenza Attiva L1"],
                ["value" => "PA2", "label" => "Potenza Attiva L2"],
                ["value" => "PA3", "label" => "Potenza Attiva L3"],
                ["value" => "PF", "label" => "Fattore Potenza"],
                ["value" => "PF1", "label" => "Fattore Potenza L1"],
                ["value" => "PF2", "label" => "Fattore Potenza L2"],
                ["value" => "PF3", "label" => "Fattore Potenza L3"],
                ["value" => "PG", "label" => "Portata Gas"],
                ["value" => "PI", "label" => "Portata Idrica"],
                ["value" => "POA", "label" => "Potenza Attiva"],
                ["value" => "POR", "label" => "Potenza Reattiva"],
                ["value" => "PR1", "label" => "Potenza Reattiva L1"],
                ["value" => "PR2", "label" => "Potenza Reattiva L2"],
                ["value" => "PR3", "label" => "Potenza Reattiva L3"],
                ["value" => "PT", "label" => "PRESSIONE"],
                ["value" => "T", "label" => "Temperatura"],
                ["value" => "TD1", "label" => "Tensione TdhF L1"],
                ["value" => "TD2", "label" => "Tensione TdhF L2"],
                ["value" => "TD3", "label" => "Tensione TdhF L3"],
                ["value" => "U", "label" => "Umidita'"],
                ["value" => "URR", "label" => "Unita' ripartizione radiatore"],
                ["value" => "V1N", "label" => "Tensione di Fase L1-N"],
                ["value" => "V2N", "label" => "Tensione di Fase L2-N"],
                ["value" => "V3N", "label" => "Tensione di Fase L3-N"],
                ["value" => "VL", "label" => "Tensione Trifase"],
                ["value" => "VN", "label" => "Tensione di Fase"],
                */
            ])->setFieldsize("medium")->setLabel("Tipologia di Misurazione"),
            "colonnaMatricola"  =>  Field::int()->editable()->inlist(false)->setLabel("Colonna Matricola Contatore")->setFieldsize("small")
                ->setTemplate("select")->setTemplateVar($array_lettere),
            "colonna"  =>  Field::int()->editable()->inlist(false)->setLabel("Colonna Dato Lettura")->setFieldsize("small")
                ->setTemplate("select")->setTemplateVar($array_lettere),
            "colonnaTimestampCampionamento"  =>  Field::int()->editable()->inlist(false)->setLabel("Colonna Timestamp Campionamento")->setFieldsize("small")
                ->setTemplate("select")->setTemplateVar($array_lettere),
            "formatoData"  =>  Field::varchar(20)->editable()->inlist(false)->setLabel("Formato data")->setFieldsize("small")->setHint("d/m/Y H:i:s"),
            "coefficienteMoltiplicazione"  =>  Field::float()->editable()->inlist(false)->setLabel("Coefficiente di Moltiplicazione")->setFieldsize("small")->setTemplate("float"),
            //
            //

            "marca"  =>  Field::varchar(100)->editable()->setPlaceholder("Marca dell'aggregatore")->setFieldsize("medium")->setMaxlength(100),
            "modello"  =>  Field::varchar(100)->editable()->setPlaceholder("Modello dell'aggregatore")->setFieldsize("medium")->setMaxlength(100),


            "is_global"  =>  Field::boolean()->editable()->inlist(false)->setTemplate("checkbox")->setLabel("Rendi Globale")->setHint("Rendere disponibile a tutti i Fornitori?"), //Da impostare automaticamente a 1 solo se supermegaadmin
            "intestazioni"  =>  Field::boolean()->editable()->inlist(false)->setTemplate("checkbox")->setLabel("Intestazione")->setHint("Contiene intestazione?"), //Da impostare automaticamente a 1 solo se supermegaadmin

            "attivo"  =>  Field::int()->inlist(false),
        ];
    }

    function displayValue($key)
    {
        switch ($key) {

            case "idFornitore":
                $f = Fornitore::findById($this->idFornitore);

                if ($f) {
                    return $f->user->nome . " " . $f->user->cognome;
                }
                break;
        }
        return parent::displayValue($key);
    }

}


