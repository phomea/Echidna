<?php

namespace applications\anagraficaimmobili\entities;


use core\db\Field;
use core\db\Query;
use core\Model;
use core\services\Db;

use applications\anagraficaimmobili\entities\Edificio;
use applications\anagraficaimmobili\entities\TipoUnita;
use applications\anagraficaimmobili\entities\ClienteFatturazione;
use core\services\Request;

class UnitaAbitativa extends Model{

    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(),
            "codice"  =>  Field::varchar(30)->editable()->setPlaceholder("Codice univoco unità abitativa")->setFieldsize("small")->setLabel("Codice Unità")->setMaxlength(30)->required(),
            "idEdificio"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(
                function ($a, $b){



                    if( $idCondominio = Request::getParams("idCondominio") ){
                        $query = Edificio::query(true);
                        $query->where("idCondominio=".$idCondominio);
                        return Edificio::getForSelect("Condominio_Edificio","id",$query)();

                    }
                    return Edificio::getForSelect("Condominio_Edificio","id")();
                })->inlist()->setLabel("Condominio - Edificio"),


            "idTipoUnita"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(TipoUnita::getForSelect("nomeTipologia", "id")
            )->inlist(true)->setFieldsize("small")->setLabel("Tipo Unità"),
            "idClienteFatturazione"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(ClienteFatturazione::getForSelect("nome_cognome","id"))->inlist()->setFieldsize("medium")->setLabel("Proprietario"),

            "denominazione"  =>  Field::varchar(512)->editable()->setPlaceholder("Denominazione unità abitativa")->setMaxlength(255),

            "piano"  =>  Field::varchar(30)->editable()->setFieldsize("small")->setMaxlength(30)->setPlaceholder("Rif. piano"),
            "interno"  =>  Field::varchar(255)->editable()->setFieldsize("small")->setMaxlength(30)->setPlaceholder("Rif. interno")->inlist(false),
            "scala"  =>  Field::varchar(255)->editable()->setFieldsize("small")->setMaxlength(30)->setPlaceholder("Rif. scala")->inlist(false),

            // INIZIO GRUPPO
            "gruppo_valori_energetici" =>   Field::startGroup(true)->setLabel("Valori Energetici")->setHint("Millesimi, potenza, ecc.."),

                //campi da definire per utilità a livello di unità abitativa
                "millesimi"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setLabel("Millesimi di Proprietà"),

                "millesimiCLI"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setLabel("Millesimi CLI (termici nuovi)"),

                // "millesimiNuovi"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setLabel("Millesimi Nuovi"),
                "millesimiVecchi"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setLabel("Millesimi Termici Vecchi"),
                "millesimiGenerali"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setLabel("Altri Millesimi"),

                // "millesimiPortata"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setLabel("Millesimi Portata"),
                // "millesimiPotenza"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setLabel("Millesimi Potenza"),

                "millesimiACS"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setLabel("Millesimi ACS"),
                "millesimiCLE"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setLabel("Millesimi CLE"),

                "fabbisognoAlMetroQuadro"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setLabel("Fabbisogno al Metro Quadro"),


                "potenzaTermicaTotale"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setLabel("Potenza Termica Totale installata"),
                "numCertificatoPotenzaTermica"  =>  Field::varchar(100)->editable()->inlist(false)->setFieldsize("medium")->setLabel("Numero del Certificato di Potenza Termica Installata"),
                "dataEsecuzioneRilievo"  =>  Field::date()->editable()->inlist(false)->setTemplate("data")->setFieldsize("small")->setLabel("Data di Esecuzione del Rilievo"),

            // FINE GRUPPO
            "gruppo_valori_energetici_fine" =>   Field::endGroup(),

            "attivo"  =>  Field::int()->inlist(false),
        ];
    }

    function displayValue($key)
    {
        switch ($key){
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
            case "idTipoUnita":
                if( $this->idTipoUnita ) {
                    $f = TipoUnita::findById($this->idTipoUnita);
                    if ($f) {
                        return $f->nomeTipologia;
                    }
                }
                break;
            case "idClienteFatturazione":
                if( $this->idClienteFatturazione ) {
                    $f = ClienteFatturazione::findById($this->idClienteFatturazione);
                    if ($f) {
                        return $f->user->nome . " " . $f->user->cognome;
                    }
                }
                break;
            case "denominazione_completa":
                if( $this->idEdificio ) {
                    $f = Edificio::findById($this->idEdificio);
                    if ($f) {
                        $c = Condominio::findById($f->idCondominio);
                        if($c){
                            return $c->denominazione." - ".$f->nomeEdificio . " - " . $this->denominazione;
                        }
                    }
                }
                return $this->denominazione;
                break;

        }
        return parent::displayValue($key); // TODO: Change the autogenerated stub
    }


    function isUsoCollettivo(){
        if( !isset($this->tipoUnita) ){


            $this->tipoUnita = TipoUnita::query(true)->where("id=".$this->idTipoUnita)->getOne();


        }
        return $this->tipoUnita->tipoPerCalcolo == 3;
    }

}


