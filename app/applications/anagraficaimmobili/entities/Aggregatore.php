<?php

namespace applications\anagraficaimmobili\entities;


use core\db\Field;
use core\Model;
use core\services\Db;

use applications\anagraficaimmobili\entities\Condominio;
use applications\anagraficaimmobili\entities\TipoAggregatore;


/**
 * Class Aggregatore
 * @package applications\anagraficaimmobili\entities
 * @method setId($id) int
 */

class Aggregatore extends Model{


    static function schema()
    {
        return [
            "id"    =>  Field::primaryIndex(), //Come lo setto auto increment?
            "idCondominio"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(Condominio::getForSelect("denominazione","id"))->setLabel("Condominio"),
            //"idTipologiaAggregatore"  =>  Field::int()->editable()->setTemplate("select")->setTemplateVar(TipoAggregatore::getForSelect("nomeTipoAggregatore","id"))->setFieldsize("medium")->setLabel("Tipo Aggregatore"),

            "idTipologiaAggregatore"   =>  Field::int()->editable()->inlist(false)->setLabel("Tipo Aggregatore")->setFieldsize("medium")->setTemplate("select-entity")->setTemplateVar(function(){
                return [
                    "fieldid"   =>  "id",
                    "fieldlabel"    =>  "username",
                    "entity"    =>  TipoAggregatore::class,
                    "list"  =>   TipoAggregatore::getForSelect("nomeTipoAggregatore","id")()
                ];
            }),
            "nomeAggregatore"  =>  Field::varchar(100)->editable()->setFieldsize("large")->setPlaceholder("Inserire un nome o un codice ad uso interno")->setLabel("Nome/Codice Aggregatore")->setMaxlength(100)->required(),

            //
            //DATI PER LETTURA CSV
            //
            "frequenzaLettura"	=> Field::int()->editable()->setTemplate("select")->setTemplateVar([
                ["label" => "Manuale", "value" => 1],
                ["label" => "Settimanale", "value" => 2],
                ["label" => "Mensile", "value" => 3],
                ["label" => "Trimestrale", "value" => 4],
                ["label" => "Semestrale", "value" => 5],
                ["label" => "Annuale", "value" => 6],
            ])->setFieldsize("large")->setLabel("Frequenza di Lettura"),
            "data_inizio_letture"    =>  Field::date()->inlist(false)->setTemplate("data")->setLabel("Data di prima lettura")->setHint("Inserisci la data della prima lettura. Le successive verranno calcolate automaticamente")->setPlaceholder("Clicca e seleziona una data")->setFieldsize("small")->setMaxlength(10),


            "metodoLettura"	=> Field::int()->editable()->setTemplate("select")->setTemplateVar([
                ["label" => "File Import", "value" => 1],
                ["label" => "FTP", "value" => 2],
                ["label" => "Email", "value" => 3],
                ["label" => "URL", "value" => 4],
            ])->setFieldsize("large")->setLabel("Metodo di Lettura")->setHint("Imposta il metodo di caricamento del file di import"),

            "ZIP_password"  =>  Field::varchar(100)->editable()->inlist(false)->setLabel("Password File Zip")->setHint("Se il file scaricato è uno zip si può impostare la password")->setFieldsize("large")->setPlaceholder("opzionale"),

            // INIZIO GRUPPO
            "gruppo_FTP" =>   Field::startGroup(false)->setLabel("Impostazioni FTP")->setHint("Dati di accesso FTP"),

            "FTP_host"  =>  Field::varchar(255)->editable()->inlist(false)->setLabel("Metodo FTP: Host"),
            "FTP_port"  =>  Field::varchar(10)->editable()->inlist(false)->setFieldsize("small")->setLabel("Metodo FTP: Porta"),
            "FTP_user"  =>  Field::varchar(50)->editable()->inlist(false)->setFieldsize("medium")->setLabel("Metodo FTP: Username"),
            "FTP_pass"  =>  Field::varchar(50)->editable()->inlist(false)->setFieldsize("medium")->setLabel("Metodo FTP: Password"),
            "FTP_path"  =>  Field::varchar(50)->editable()->inlist(false)->setFieldsize("medium")->setLabel("Metodo FTP: Path remota")->setPlaceholder("es: \\var\\folder\\"),

            "gruppo_FTP_fine" =>   Field::endGroup(),

            // INIZIO GRUPPO
            "gruppo_EMAIL" =>   Field::startGroup(false)->setLabel("Impostazioni EMAIL")->setHint("Dati di lettura Email"),

            "Email_server"  =>  Field::varchar(50)->editable()->inlist(false)->setLabel("Metodo Email: Server (POP/IMAP)"),
            "Email_port"  =>  Field::varchar(10)->editable()->inlist(false)->setFieldsize("small")->setLabel("Metodo Email: Porta"),
            "Email_SSL"  =>  Field::boolean()->editable()->inlist(false)->setTemplate("checkbox")->setLabel("Metodo Email: Attiva SSL/TLS"),
            "Email_user"  =>  Field::varchar(50)->editable()->inlist(false)->setFieldsize("small")->setLabel("Metodo Email: Username"),
            "Email_pass"  =>  Field::varchar(50)->editable()->inlist(false)->setFieldsize("small")->setLabel("Metodo Email: Password"),
            "Email_subject"  =>  Field::varchar(100)->editable()->inlist(false)->setLabel("Metodo Email: Oggetto")->setHint("Cerca solo tra le email che hanno questo specifico oggetto del messaggio")->setPlaceholder("Es: Aggregatore Dati XXX"),
            "Email_from"  =>  Field::varchar(100)->editable()->inlist(false)->setLabel("Metodo Email: Mittente")->setHint("Cerca solo tra le email ricevute da questo specifico mittente")->setFieldsize("medium")->setPlaceholder("Es: aggregatore@dominio.it"),

            "gruppo_EMAIL_fine" =>   Field::endGroup(),

            // INIZIO GRUPPO
            "gruppo_URL" =>   Field::startGroup(false)->setLabel("Impostazioni URL")->setHint("Dati di lettura via URL"),

            "URL_request"  =>  Field::varchar(255)->editable()->inlist(false)->setLabel("Metodo URL: Link")->setHint("Url completa da chiamare per ottenere il file con i dati aggregati")->setPlaceholder("es: https://www.serverprivato.it/cartella/nomefile.php?file=aggregatore.csv"),

            "gruppo_URL_fine" =>   Field::endGroup(),


            "dataLastFileImport"  =>  Field::datetime()->inlist(false),
            "nomeLastFileImport"  =>  Field::varchar(255)->inlist(false),



            "attivo"  =>  Field::int()->inlist(false),
        ];
    }

    function displayValue($key)
    {
        switch ($key){
            case "frequenzaLettura":
                switch ($this->frequenzaLettura){
                    case 1: return "Manuale"; break;
                    case 2: return "Settimanale"; break;
                    case 3: return "Mensile"; break;
                    case 4: return "Trimestrale"; break;
                    case 5: return "Semestrale"; break;
                    case 6: return "Annuale"; break;
                    default: return "-";
                }
                break;
            case "metodoLettura":
                switch ($this->metodoLettura){
                    case 1: return "File Import"; break;
                    case 2: return "FTP"; break;
                    case 3: return "Email"; break;
                    case 4: return "URL"; break;
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
            case "idTipologiaAggregatore":
                if( $this->idTipologiaAggregatore ) {
                    $f = TipoAggregatore::findById($this->idTipologiaAggregatore);
                    if ($f) {
                        return $f->nomeTipoAggregatore;
                    }
                }
                break;
        }
        return parent::displayValue($key); // TODO: Change the autogenerated stub
    }

}


