<?php


namespace applications\pages\entities;
use applications\banner\entities\Banner;
use applications\CLManager\includes\CLCatalog;
use applications\CLManager\includes\CLProdotto;
use applications\pages\contents\BannerContentType;
use applications\pages\contents\GallerySlugProdottiContentType;
use applications\pages\contents\TextContent;
use core\Cache;
use core\db\Field;
use core\Model;
use core\services\Response;
use applications\banner\entities\Articolo;
use applications\media\entities\Media;

/**
 * Class Contenuto
 * @package models
 * @method int getId()
 * @method string getNome()
 * @method string getTesto()
 * @method \DateTime getData()
 * @method boolean isPassato()
 */
class Contenuto extends Model {
    const ID = "id";
    const TITOLO = "titolo";
    const TIPO = "tipo";
    const CONTENUTO = "contenuto";
    const HOOK = "hook";
    const ORDINE = "ordine";
    const PAGINE_ID = "pagine_id";

    static function schema()
    {
        return[
            self::ID    =>  Field::primaryIndex(),
            self::TITOLO  =>  Field::string(),
            self::TIPO =>  Field::varchar( 100 ),
            self::CONTENUTO => Field::text(),
            self::HOOK =>  Field::text(),
            self::ORDINE    => Field::int(),
            self::PAGINE_ID    => Field::int()
        ];
    }


    function render(){

        return Response::getNewFrontendTemplate("contenuti/".$this->getTipo(),self::getContents($this))->render();
        /*return ContenutiController::render(
            $this->getTipo() ,
            ContenutiController::getContents( $this )
        );*/
    }


    static function getContentTypes(){
        return[
            BannerContentType::TYPE =>  (new BannerContentType()),
            TextContent::TYPE   =>  (new TextContent()),
            GallerySlugProdottiContentType::TYPE => (new GallerySlugProdottiContentType())

        ];
    }


    /**
     * @param $contenuto Contenuto
     */
    static function getContents( $contenuto ){
        $tipo = str_replace(".php","",$contenuto->getTipo());
        $content = json_decode( $contenuto->getContenuto(),true );

        switch ($tipo){

            case "titolo-testo" :
                return $content;
                break;

            case "gallery-5-img":

                return [
                    "contenuto" =>  $content
                ];
                break;

            case "banner":

                $banner = Banner::query()->where("id=".$content['id'])->getOne();

                $media = Media::query()->where("id=".$banner->getId_media() )->getOne();

                return [
                    "contenuto" =>  [
                        "banner"    =>  $banner,
                        "media"     =>  $media
                    ]
                ];
                break;
            default:
                return [];
        }
    }


    public function reorder(){
        $table = Contenuto::getTable();
        $back = array();
        foreach($this->rawData as $key => $id){
            $sql = "update {$table} set ordine = {$key} WHERE id={$id}";
            $r = Contenuto::query($sql);
            array_push($back,$r);
        }
        Cache::clear('echidna\\entities\\Pagina');
        return true;

    }

}
