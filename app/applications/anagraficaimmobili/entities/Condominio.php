<?php

namespace applications\anagraficaimmobili\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

use applications\anagraficaimmobili\entities\Fornitore;
use applications\anagraficaimmobili\entities\AmministratoreCondominio;
use applications\anagraficaimmobili\entities\ResponsabileImpianto;
use applications\anagraficaimmobili\entities\LayoutProspettoMillesimale;
use core\services\RouterService;

class Condominio extends Model{

    static function schema()
    {
        return array_merge([

            "id"    =>  Field::primaryIndex(),

            "codice"  =>  Field::varchar(30)->editable()->setPlaceholder("Codice univoco condominio")->setFieldsize("small")->setLabel("Codice")->setMaxlength(30)->required(),
            "denominazione"  =>  Field::varchar(512)->editable()->setPlaceholder("Denominazione condominio")->setMaxlength(255)->required()->setLabel("Denominazione"),


            "idFornitore"  =>  Field::int()->editable()->inlist(true)->setTemplate("select-entity")->setTemplateVar(function(){
                return [
                    "list"  =>  Fornitore::getForSelect("nome_cognome","id")(),
                    "entity"    =>  Fornitore::class,
                    "fieldlabel"    =>  "nome_cognome",
                    "fieldid"   =>  "id"
                ];

                })->setLabel("Gestore")->setFieldsize("medium"),

            /*"idAmministratoreCondominio"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(AmministratoreCondominio::getForSelect("nome_cognome","id"))->setLabel("Amministratore di condominio")->setFieldsize("medium")


                                               ->setAppendAction("",RouterService::getRoute(AmministratoreCondominio::getEntity().".add"),"eye"),*/

            // ->setAppendAction("",RouterService::getRoute(AmministratoreCondominio::getEntity().".preview"),"eye"),


            "idAmministratoreCondominio"   =>  Field::int()->editable()->inlist(false)->setLabel("Amministratore di condominio")->setFieldsize("medium")->setTemplate("select-entity")->setTemplateVar(function(){
                return [
                    "fieldid"   =>  "id",
                    "fieldlabel"    =>  "nome|cognome",
                    "entity"    =>  AmministratoreCondominio::class,
                    "list"  =>   AmministratoreCondominio::getForSelect("nome_cognome","id")()
                ];
            }),

            "idResponsabileImpianto"   =>  Field::int()->editable()->inlist(false)->setLabel("Amministratore di condominio")->setFieldsize("medium")->setTemplate("select-entity")->setTemplateVar(function(){
                return [
                    "fieldid"   =>  "id",
                    "fieldlabel"    =>  "nome|cognome",
                    "entity"    =>  ResponsabileImpianto::class,
                    "list"  =>   ResponsabileImpianto::getForSelect("nome_cognome","id")()
                ];
            }),

          //  "idResponsabileImpianto"  =>  Field::int()->editable()->inlist(false)->setTemplate("select")->setTemplateVar(ResponsabileImpianto::getForSelect("nome_cognome","id"))->setLabel("Responsabile impianto")->setFieldsize("medium"),

            "codiceFiscale"  =>  Field::varchar(512)->editable()->setPlaceholder("Inserisci codice fiscale")->setFieldsize("medium")->setMaxlength(16)->setLabel("Codice Fiscale")->setFieldsize("medium"),
            //"partitaIva"  =>  Field::varchar(512)->editable()->setPlaceholder("Inserisci partita iva")->setFieldsize("medium")->setMaxlength(13)->setLabel("Partita IVA"),


            /*
            // INIZIO GRUPPO
            "gruppo_fiscale" =>   Field::startGroup(true)->setLabel("Informazioni fiscali")->setHint("Partita iva, codice fiscale"),


            "gruppo_fiscale_fine" =>   Field::endGroup(),
            */


            // INIZIO GRUPPO
            "gruppo_indirizzo" =>   Field::startGroup(true)->setLabel("Informazioni indirizzo")->setHint("Inserisci indirizzo, città e provincia"),

                "indirizzo"    =>Field::varchar(512)->editable()->setTemplate("ricerca-indirizzo")->setLabel("Indirizzo")->setHint("Inizia a scrivere l'indirizzo e scegli tra i suggerimenti"),
               // "indirizzo"  =>  Field::varchar(512)->editable()->inlist(false)->setPlaceholder("Indirizzo e numero civico"),
                "cap"  =>  Field::varchar(512)->editable()->setTemplate("cap")->inlist(false)->setPlaceholder("CAP")->setFieldsize("small")->setMaxlength(5),
                "citta"  =>  Field::varchar(512)->editable()->inlist(false)->setPlaceholder("Inserisci città")->setFieldsize("medium")->setMaxlength(512),
                "provincia"  =>  Field::varchar(512)->editable()->inlist(false)->setPlaceholder("Provincia")->setFieldsize("small")->setMaxlength(2),
                "paese"  =>  Field::varchar(512)->editable()->inlist(false)->setPlaceholder("Inserisci nazione")->setFieldsize("medium")->setMaxlength(512),

            "gruppo_indirizzo_fine" =>   Field::endGroup(),


            "attivo"  =>  Field::int()->inlist(false),

            "gruppo_extra" =>   Field::startGroup(true)->setLabel("Impostazioni condominio")->setHint("Inserisci indirizzo, città e provincia"),
            "perditeClimatizzazioneInvernale"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setMaxlength(50)->setLabel("Perdite Climatizzazione Invernale")->setHint("Q.inv.cli - Kwh"),
            //"perditeAcquaCaldaSanitaria"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setMaxlength(50)->setLabel("Perdite per ACS")->setHint("Q.inv.cli - Kwh"),
            //"perditeClimatizzazioneEstiva"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setMaxlength(50)->setLabel("Perdite Climatizzazione Estiva")->setHint("Q.inv.cli - Kwh"),

            "meseDiReset"	=> Field::int()->editable()->setTemplate("select")->setTemplateVar([
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
            ])->setFieldsize("small")->inlist(false)->setLabel("Mese di Reset")->setHint("Mese di Reset di Default per i contatori importati")->setDefaultValue(10),

            //"fabbisognoEnergiaTermicaCLI"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setMaxlength(50)->setLabel("Fabbisogno Energia Termica CLI"),
            //"fabbisognoEnergiaTermicaACS"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setMaxlength(50)->setLabel("Fabbisogno Energia Termica AcS"),
            //"fabbisognoEnergiaTermicaCLE"  =>  Field::float()->editable()->inlist(false)->setTemplate("float")->setFieldsize("small")->setMaxlength(50)->setLabel("Fabbisogno Energia Termica CLE"),


            /*
			"tipologiaContabilizzazioneCLI"	=> Field::int()->editable()->inlist(false)->setFieldsize("small")->setTemplate("select")->setTemplateVar([
            	["label" => "Contatore di Calore", "value" => 1],
            	["label" => "Contatore Volumetrico", "value" => 2],
            	["label" => "Ripartitore", "value" => 3],
            ])->setLabel("Tipologia Contabilizzazione CLI"),
            */
            /*
            "ripartitoreSpeseCLI"  =>  Field::boolean()->editable()->inlist(false)->setTemplate("checkbox")->setLabel("Ripartitore Spese CLI")->setPlaceholder("Attiva"),
            "ripartitoreSpeseACS"  =>  Field::boolean()->editable()->inlist(false)->setTemplate("checkbox")->setLabel("Ripartitore Spese ACS")->setPlaceholder("Attiva"),
            "ripartitoreSpeseCLE"  =>  Field::boolean()->editable()->inlist(false)->setTemplate("checkbox")->setLabel("Ripartitore Spese CLE")->setPlaceholder("Attiva"),
            */

			/*"PeriodoContabilizzazione"	=> Field::int()->editable()->inlist(false)->setFieldsize("small")->setTemplate("select")->setTemplateVar([
            	["label" => "Mensile", "value" => 1],
            	["label" => "Semestrale", "value" => 2],
            	["label" => "Annuale", "value" => 3],
            ])->setLabel("Periodo Contabilizzazione"),*/
            "idLayoutProspettoMillesimale"  =>  Field::int()->editable()->inlist(false)->setFieldsize("medium")->setTemplate("select")->setTemplateVar(LayoutProspettoMillesimale::getForSelect("descrizione","id"))->setLabel("Layout Prospetto Millesimale"),
            "gruppo_extra_fine" =>   Field::endGroup()
        ],parent::schema());
    }


    function displayValue($key)
    {
        switch ($key){
            case "idFornitore":
                if( $this->idFornitore ) {
                    $f = Fornitore::findById($this->idFornitore);

                    if ($f) {
                        return $f->user->nome . " " . $f->user->cognome;
                    }
                }
                break;
            case "idAmministratoreCondominio":
                if( $this->idAmministratoreCondominio ) {
                    $f = AmministratoreCondominio::findById($this->idAmministratoreCondominio);
                    if ($f) {
                        return $f->user->nome . " " . $f->user->cognome;
                    }
                }
                break;
        }
        return parent::displayValue($key); // TODO: Change the autogenerated stub
    }


    static function query($rawResult = false)
    {
        $query = parent::query($rawResult); // TODO: Change the autogenerated stub

        $query->setOrderBy("codice","ASC");
        return $query;
    }
}
