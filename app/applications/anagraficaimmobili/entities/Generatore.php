<?php

namespace applications\anagraficaimmobili\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

use applications\anagraficaimmobili\entities\Edificio;
use core\services\Request;


class Generatore extends Model{

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "idCondominio"  =>  Field::int()->editable()->setLabel("Condominio")->setTemplate("select")->setTemplateVar(function( $e , $field){
                /**
                 * @var $field Field
                 */
                if(Request::getParams("idCondominio") || $e->idCondominio) {
                    $field->setTemplate("hidden");
                    $f = Condominio::getForSelect("denominazione", "id")();
                }else {
                    $f = Condominio::getForSelect("denominazione", "id")();
                }
                return $f;
            })->setHint("Seleziona il CONDOMINIO se il Generatore controlla l'intero condominio"),

            "idEdificio"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar( function( $e,$field){
                if(Request::getParams("idCondominio") || $e->idCondominio) {
                    $idCondominio = Request::getParams("idCondominio") ? Request::getParams("idCondominio") : $e->idCondominio;

                    $query = Edificio::query(true)->where("idCondominio=".$idCondominio);
                    $f = Edificio::getForSelect("Condominio_Edificio","id",$query)();
                }else {
                    $f = Edificio::getForSelect("Condominio_Edificio","id")();
                }
                return $f;
            })->inlist()->setLabel("Condominio - Edificio")->setHint("Seleziona l'EDIFICIO se il Generatore controlla un solo Edificio"),


            "tipologiaGeneratore"	=> Field::int()->editable()->setTemplate("select")->setTemplateVar([
                ["label" => "Generatore a Combustione", "value" => 1],
                ["label" => "Pompa di Calore", "value" => 2],
                ["label" => "Solare termico", "value" => 3],

            ])->setFieldsize("medium")->setLabel("Tipologia")->setHint("Scegli il tipo di Generatore in uso"),

            "descrizione"  =>  Field::varchar(255)->editable()->setMaxlength(255)->setPlaceholder("Descrizione del generatore")->inlist(true)->required(),

            "coefficentePrestazioneMedia"  =>  Field::float()->editable()->setTemplate("float")->setFieldsize("large")->setLabel("Coefficente di prestazione media (COP)")->inlist(false),
            "coefficenteEfficienzaRefigeratore"  =>  Field::float()->editable()->setTemplate("float")->setFieldsize("large")->setLabel("Coefficente efficienza Refrigeratore (EER)")->inlist(false),

            "potereCalorificoInferiore"	=> Field::float()->editable()->setTemplate("select")->setTemplateVar([
                ["value" => "7.67", "label" => "Carbone - 7.67 "],
                ["value" => "3.4", "label" => "Cippato (30% di umidita') - 3.4"],
                ["value" => "8.2", "label" => "Coke - 8.2"],
                ["value" => "9.45", "label" => "Gas naturale - 9.45"],
                ["value" => "11.86", "label" => "Gasolio - 11.86"],
                ["value" => "32.25", "label" => "GPL 100% Butano - 32.25"],
                ["value" => "24.44", "label" => "GPL 100% Propano - 24.44"],
                ["value" => "26.78", "label" => "GPL 30% Butano e 70% Propano - 26.78"],
                ["value" => "4", "label" => "Legna da ardere (20% di umidita') - 4"],
                ["value" => "11.47", "label" => "Olio Combustibile - 11.47"],
                ["value" => "4.6", "label" => "Pellet (10% di umidita') - 4.6"],
                ["value" => "1", "label" => "Pompa di calore - 1"],
            ])->setFieldsize("large")->setLabel("Potere calorifico inferiore (PCI)")->inlist(false)->setDefaultValue("9.45"),

            "rendimentoMedio"  =>  Field::float()->editable()->setTemplate("float")->setFieldsize("large")->setLabel("Rendimento Medio")->inlist(false),

            // INIZIO GRUPPO
            "gruppo_servizi" =>   Field::startGroup(true)->setLabel("Servizi Erogati e Contatori associati")->setHint("Abilita i servizi erogato dal Generatore"),

            "fabbisognoCLI"  =>  Field::boolean()->editable()->inlist(false)->setTemplate("checkbox")->setLabel("Abilita Servizio CLI")->setPlaceholder("Attiva"),
            "matricolaContatoreCLI" => Field::varchar(255)->editable()->setMaxlength(50)->setLabel("Matricola Contatore Servizio CLI")->inlist(false)->setHint("Inserire la matricola del contatore di energia erogata per il servizio CLI, se disponibile.")->setFieldsize("medium")
                ->hideIf("fabbisognoCLI",0),
            "fabbisognoCLInominale" => Field::float()->editable()->setMaxlength(50)->setTemplate("float")->setLabel("Fabbisogno CLI nominale del Generatore")->inlist(false)->setHint("Inserire il Fabbisogno CLI del generatore da mostrare in fattura.")->setFieldsize("medium")
                ->hideIf("fabbisognoCLI",0),

            "fabbisognoACS"  =>  Field::boolean()->editable()->inlist(false)->setTemplate("checkbox")->setLabel("Abilita Servizio ACS")->setPlaceholder("Attiva"),
            "matricolaContatoreACS" => Field::varchar(255)->editable()->setMaxlength(50)->setLabel("Matricola Contatore Servizio ACS")->inlist(false)->setHint("Inserire la matricola del contatore di energia erogata per il servizio ACS, se disponibile.")->setFieldsize("medium")
                ->hideIf("fabbisognoACS",0),
            "fabbisognoACSnominale" => Field::float()->editable()->setMaxlength(50)->setTemplate("float")->setLabel("Fabbisogno ACS nominale del Generatore")->inlist(false)->setHint("Inserire il Fabbisogno ACS del generatore da mostrare in fattura.")->setFieldsize("medium")
                ->hideIf("fabbisognoACS",0),

            "fabbisognoCLE"  =>  Field::boolean()->editable()->inlist(false)->setTemplate("checkbox")->setLabel("Abilita Servizio CLE")->setPlaceholder("Attiva"),
            "matricolaContatoreCLE" => Field::varchar(255)->editable()->setMaxlength(50)->setLabel("Matricola Contatore Servizio CLE")->inlist(false)->setHint("Inserire la matricola del contatore di energia erogata per il servizio CLE, se disponibile.")->setFieldsize("medium")
                ->hideIf("fabbisognoCLE",0),
            "fabbisognoCLEnominale" => Field::float()->editable()->setMaxlength(50)->setTemplate("float")->setLabel("Fabbisogno CLE nominale del Generatore")->inlist(false)->setHint("Inserire il Fabbisogno CLE del generatore da mostrare in fattura.")->setFieldsize("medium")
                ->hideIf("fabbisognoCLE",0),

            "mese_inizio_CLE"=> Field::int()->editable()->setTemplate("select")->setTemplateVar([
                ["label" => "Gennaio", "value" => 1],
                ["label" => "Febbraio", "value" => 2],
                ["label" => "Marzo", "value" => 3],
                ["label" => "Aprile", "value" => 4],
                ["label" => "Maggio", "value" => 5],
                ["label" => "Giugno", "value" => 6],
                ["label" => "Luglio", "value" => 7],
                ["label" => "Agosto", "value" => 8],
                ["label" => "Settembre", "value" => 9],
                ["label" => "Ottobre", "value" => 10],
                ["label" => "Novembre", "value" => 11],
                ["label" => "Dicembre", "value" => 12],
            ])->setFieldsize("small")->inlist(false)->setLabel("Mese INIZIO Periodo CLE")
                ->hideIf("fabbisognoCLE",0),
            "mese_fine_CLE"=> Field::int()->editable()->setTemplate("select")->setTemplateVar([
                ["label" => "Gennaio", "value" => 1],
                ["label" => "Febbraio", "value" => 2],
                ["label" => "Marzo", "value" => 3],
                ["label" => "Aprile", "value" => 4],
                ["label" => "Maggio", "value" => 5],
                ["label" => "Giugno", "value" => 6],
                ["label" => "Luglio", "value" => 7],
                ["label" => "Agosto", "value" => 8],
                ["label" => "Settembre", "value" => 9],
                ["label" => "Ottobre", "value" => 10],
                ["label" => "Novembre", "value" => 11],
                ["label" => "Dicembre", "value" => 12],
            ])->setFieldsize("small")->inlist(false)->setLabel("Mese FINE Periodo CLE")
                ->hideIf("fabbisognoCLE",0),

            "matricolaContatoreGenerale" => Field::varchar(255)->editable()->setMaxlength(50)->setLabel("Matricola Contatore Servizi Multipli (es: CLI + ACS)")->inlist(false)->setHint("Matricola Contatore di energia erogata dal generatore (servizi multipli e contatore unico)")->setFieldsize("medium"),

            
            "gruppo_servizi_fine" =>   Field::endGroup(),



            "attivo"  =>  Field::int()->inlist(false),
        ];
    }

    function displayValue($key)
    {
        switch ($key){

            case "tipologiaGeneratore":
                switch ($this->tipologiaGeneratore){
                    case 1: return "Generatore a Combustione"; break;
                    case 2: return "Pompa di calore"; break;
                    case 3: return "Solare termico"; break;
                    default: return "-";
                }
                break;

            case "idCondominio":
                if( $this->idCondominio ) {
                    $f = Condominio::findById($this->idCondominio);
                    if ($f) {
                        return $f->denominazione;
                    }
                }
                break;

            case "idEdificio":
                if( $this->idEdificio ) {
                    $f = Edificio::findById($this->idEdificio);
                    if ($f) {
                        $c = Condominio::findById($f->idCondominio);
                        if($c){
                            return $c->denominazione." - ".$f->nomeEdificio;
                        }else{
                            return $f->nomeEdificio;
                        }
                    }
                }
                break;


            case "condominio_descrizione":
                if( $this->idCondominio ) {
                    $f = Condominio::findById($this->idCondominio);
                    if ($f) {
                        return $f->denominazione." - ".$this->descrizione;
                    }
                }
                return "Non allacciato a condominio - ".$this->descrizione;
       }
        return parent::displayValue($key); // TODO: Change the autogenerated stub
    }


    function expand()
    {
        parent::expand(); // TODO: Change the autogenerated stub
        $this->espandiVettori();
    }

    function espandiVettori(){
        $this->vettori = Vettore::findByIdGeneratore($this->id);
    }


    function findContatoriServizi(){
        $contatori = [];
        //cli
        if($this->fabbisognoCLI && !empty($this->matricolaContatoreCLI)){
            if( $contatore = Contatore::query()->where('codice="'.$this->matricolaContatoreCLI.'"')->getOne()){
                $contatori['cli'] = $contatore;
            }
        }


        if($this->fabbisognoACS && !empty($this->matricolaContatoreACS)){
            if( $contatore = Contatore::query()->where('codice="'.$this->matricolaContatoreACS.'"')->getOne()){
                $contatori['acs'] = $contatore;
            }
        }

        $this->contatoriServizi = $contatori;

    }
}


