<?php
namespace applications\reports\applicazioni;

use core\Environment;
use Fpdf\Fpdf;
use \DateTime;

define('FPDF_FONTPATH', Environment::$ROOT . '/applications/reports/applicazioni/fonts/');


class PDF extends FPDF
{




    const MAXSALTOPAGINA = 260;

    public $currentFontSize;
    public $currentFontFamily;
    public $currentFontStyle;

    public static function EURO(){
        return "[[EURO]]";
    }

    function setTitolo($titolo){
        $this->titolo = $titolo;
    }
    function getTitolo(){
        return $this->titolo;
    }
    function setFooter($testo){
        $this->txtfooter = $testo;
    }
    function getFooter(){
        return $this->txtfooter;
    }
    function setLogo($logoURL){
        $this->logo = $logoURL;
    }
    function getLogo(){
        return $this->logo;
    }
    function setMioMargine($margine){
        $this->margine = $margine;
    }
    function getMioMargine(){
        return $this->margine;
    }
    function setPariDispari($val){
        $this->pari = $val;
    }
    function getPariDispari(){
        return $this->pari;
    }
    function setColore($colore){
        $this->colore = $colore;
        $this->colori = $this->hex2RGB($colore);
        //var_dump($this->colori);
        if($this->lightness($this->colori["red"],$this->colori["green"],$this->colori["blue"])>=.7){
            //E' un colore chiaro
            $this->colore_testo = "#000000";
            $this->colori_testo = $this->hex2RGB($this->colore_testo);
            //var_dump("chiaro");
        }else{
            //E' un colore scuro
            $this->colore_testo = "#FFFFFF";
            $this->colori_testo = $this->hex2RGB($this->colore_testo);
            //var_dump("scuro");
        }
        //var_dump($this->colori_testo);


    }
    function getColore(){
        return $this->colore;
    }

    function setColoreTitoli(){
        //var_dump($this->colori);
        $this->SetTextColor($this->colori_testo["red"],$this->colori_testo["green"],$this->colori_testo["blue"]);
        $this->SetFillColor($this->colori["red"],$this->colori["green"],$this->colori["blue"]);
        $this->SetDrawColor($this->colori["red"],$this->colori["green"],$this->colori["blue"]);

    }
    function setColorePrincipaleTesti(){
        $this->SetTextColor($this->colori["red"],$this->colori["green"],$this->colori["blue"]);
    }
    function setColorePrincipaleFondo(){
        $this->SetFillColor($this->colori["red"],$this->colori["green"],$this->colori["blue"]);
        $this->SetDrawColor($this->colori["red"],$this->colori["green"],$this->colori["blue"]);
    }
    function setColoreBase(){
        $this->SetTextColor(0,0,0);
        $this->SetFillColor(255,255,255);
        $this->SetDrawColor(255,255,255);
    }
    function setColoreBasePari(){
        $this->setPariDispari(1);
        $this->SetTextColor(0,0,0);
        $this->SetFillColor(244,244,244);
        $this->SetDrawColor(244,244,244);
    }
    function setColoreBaseDispari(){
        $this->setPariDispari(0);
        $this->SetTextColor(0,0,0);
        $this->SetFillColor(233,233,233);
        $this->SetDrawColor(233,233,233);
    }
    function setColoreInverso(){
        if($this->getPariDispari()==1)
            $this->setColoreBaseDispari();
        else
            $this->setColoreBasePari();
    }

    function stampaRigaComplessa($dati,$colonne,$hriga,$lameta,$margine){
        switch($colonne){
            case 2:
                $hcurr = $this->GetY();
                $this->SetX($lameta+$margine);
                $this->Cell($lameta,($hriga-1)*2, $dati[2] ,0,0,'R',1);
                if($this->GetY()<$hcurr){
                    $this->SetY( $this->GetY() - ($hriga-1)*2 );
                }else{
                    $this->SetY($hcurr);
                }
                $this->MultiCell($lameta,$hriga-1,$dati[0]."\n".$dati[1],0,'L',1);
                break;
            case 99:
                $offset = $lameta/2;
                $hcurr = $this->GetY();
                $this->SetX($lameta+$offset+$margine);
                $this->Cell($lameta-$offset,($hriga-1)*2, $dati[2] ,0,0,'R',1);
                if($this->GetY()<$hcurr){
                    $this->SetY( $this->GetY() - ($hriga-1)*2 );
                }else{
                    $this->SetY($hcurr);
                }
                $this->MultiCell($lameta+$offset,$hriga-1,$dati[0]."\n".$dati[1],0,'L',1);
                break;
            default:
                //boh?

        }

    }


    //Cell with horizontal scaling if text is too wide
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);
        //evito division by zero su stringhe vuote.
        $str_width = $str_width>0? $str_width : 1;

        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;

        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }

        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);

        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }

    //Cell with horizontal scaling only if necessary
    function CellFitScale($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,false);
    }

    //Cell with horizontal scaling always
    function CellFitScaleForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,true,true);
    }

    //Cell with character spacing only if necessary
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }

    //Cell with character spacing always
    function CellFitSpaceForce($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        //Same as calling CellFit directly
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,true);
    }

    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }

    function stampaTitolo($text,$fontsize,$hriga,$fontstyle='B',$textalign='L',$fill=0,$width=0,$newline=1){
        $this->setColoreTitoli();

        if($fill){
            $border = 0;
        }else{
            $border = 'B';
            $this->SetTextColor($this->colori["red"],$this->colori["green"],$this->colori["blue"]);
        }

        $this->SetFont('',$fontstyle,$fontsize);

        $this->Cell($width,$hriga,$text,$border,$newline,$textalign,$fill);

        $this->SetFont('','');
    }


// Page header
    function Header()
    {
        $margine = $this->getMioMargine();

        // Title
        $titolo = $this->getTitolo();
        if($titolo != ""){
            //uso la classe base per non ridefinire i valori di default
            parent::SetFontSize(7);
            $this->setXY($margine,$margine);
            $this->Cell(0,5,$titolo,0,1,'C');
        }

        /* Se lo volessi in tutte le pagine... */
        /*
        // Logo
        $logo = $this->getLogo();
        if(($logo!="")&&(file_exists($logo))){
            $this->Image($logo,$margine, $margine+5, null , 50);
        }
        */

        // Line break
        $this->Ln($margine);

        //Reimposto l'ultimo font usato
        parent::SetFont($this->currentFontFamily, $this->currentFontStyle, $this->currentFontSize);
    }

// Page footer
    function Footer()
    {
        $margine = $this->getMioMargine();

        $testo = $this->getFooter();
        $this->SetTextColor(0,0,0);
        $this->SetFillColor(244,244,244);
        $this->SetDrawColor(244,244,244);

        $this->SetX($margine);
        $this->SetY(-($margine+14));
        parent::SetFontSize(7);
        $this->MultiCell(0,4,$testo,0,'L',1);

        $this->SetY(-($margine+5));
        parent::SetFontSize(7);
        $this->Cell(0,5,'Pagina '.$this->PageNo().'/{nb}',0,0,'R');

        //reimposto i valori precedenti di font e sfondo
        parent::SetFont($this->currentFontFamily, $this->currentFontStyle, $this->currentFontSize);
    }

    function SetFont($family, $style = '', $size = 0)
    {
        $this->currentFontFamily = $family;
        $this->currentFontStyle = $style;
        $this->currentFontSize = $size;
        return parent::SetFont($family, $style, $size); // TODO: Change the autogenerated stub
    }

    function SetFontSize($size)
    {
        $this->currentFontSize = $size;
        return parent::SetFontSize($size); // TODO: Change the autogenerated stub
    }

    function lightness($R = 255, $G = 255, $B = 255) {
        return (max($R, $G, $B) + min($R, $G, $B)) / 510.0; // HSL algorithm
    }

    function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
        $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
        $rgbArray = array();
        if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
            $colorVal = hexdec($hexStr);
            $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
            $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
            $rgbArray['blue'] = 0xFF & $colorVal;
        } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
            $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
            $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
            $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
        } else {
            return false; //Invalid hex color code
        }
        return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
    }

    function RoundedRect($x, $y, $w, $h, $r, $corners = '1234', $style = '')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' || $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));

        $xc = $x+$w-$r;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));
        if (strpos($corners, '2')===false)
            $this->_out(sprintf('%.2F %.2F l', ($x+$w)*$k,($hp-$y)*$k ));
        else
            $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);

        $xc = $x+$w-$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
        if (strpos($corners, '3')===false)
            $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-($y+$h))*$k));
        else
            $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);

        $xc = $x+$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
        if (strpos($corners, '4')===false)
            $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-($y+$h))*$k));
        else
            $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);

        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
        if (strpos($corners, '1')===false)
        {
            $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$y)*$k ));
            $this->_out(sprintf('%.2F %.2F l',($x+$r)*$k,($hp-$y)*$k ));
        }
        else
            $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }

    function creaIntestazionePDF($mioFont, $fontsizebase, $layout, $margine, $unterzo, $margineTop, $colore, $footer_normativa){

        $trequinti = $unterzo*3/5*3;

        $this->AddFont('Roboto','','Roboto-Regular.php');
        $this->AddFont('Roboto','B','Roboto-Bold.php');


        //$pdf->AddFont('Roboto','I','Roboto-Italic.php');
        //$pdf->AddFont('Roboto','BI','Roboto-Regular.php');

        $this->AliasNbPages();
        $this->SetAutoPageBreak(true, $margine + 15);
        $this->SetMargins($margine,$margine);
        $this->setMioMargine($margine);

        //Imposto il font per l'intestazione
        $this->SetFont($mioFont,'',$fontsizebase);

        //Imposto header documento
        if($layout->header!=""){
            $this->setTitolo(trim($layout->header));
            $margineTop = $margine + 5;
        }

        $margineTop += 6;

        //Imposto footer documento
        $textfooter = $footer_normativa;
        if($layout->footer!=""){
            $textfooter .= " - ".trim($layout->footer);
        }
        $this->setFooter($textfooter);

        $this->setColore($colore);

        //Immagine
        $logo = $this->logo;

        $altezzaLogo = $layout->altezzaLogo;
        $hspaziologo = 40;
        $max_h_logo = (($altezzaLogo>0)&&($altezzaLogo<$hspaziologo)) ? $altezzaLogo : $hspaziologo;

        if( ($layout->logo!="") && (file_exists($logo)) )
            $this->setLogo($logo); //se voglio ripeterlo in ogni pagina

        //DA QUI INIZIO LA PAGINA 1

        $this->AddPage();

        $altezza_logo = 0;
        if( ($layout->logo!="") && (file_exists($logo)) ){

            list($x1, $y1) = getimagesize($logo);
            //Calcolo l'altezza in base alla larghezza imposta
            $x2 = $trequinti;
            $y2 = $x2 * $y1 / $x1;

            //se ha un formato troppo verticale (più di 4 cm) cambio metodo
            if($y2>$max_h_logo){
                $y2=$max_h_logo;
                $x2 = $y2 * $x1 / $y1;
            }

            //$sp_vertlogo = ($hspaziologo - $y2)/2;
            $sp_vertlogo=0;

            $this->Image($logo, $margine, $margineTop+$sp_vertlogo, $x2);
            $altezza_logo = $margineTop + $y2 + $sp_vertlogo;
        }

        $altezza_head = $margineTop;
        //Header 1 a destra
        if($layout->header_1!=""){
            $this->SetXY($margine + $unterzo*2, $altezza_head);
            $this->MultiCell($unterzo,4,$layout->header_1, 0, 'R');
            $altezza_head = $this->GetY();
        }
        $altezza_head += 5;
        if($layout->header_2!=""){
            $this->SetXY($margine + $unterzo*2, $altezza_head);
            $this->MultiCell($unterzo,4,$layout->header_2, 0, 'R');
            $altezza_head = $this->GetY();
        }

        //Salto uno spazio prima di continuare
        $altezza_max = ($altezza_logo>$altezza_head)?$altezza_logo:$altezza_head;

        $this->SetY($altezza_max+$margine+3);
        $this->SetFontSize($fontsizebase);


    }


    public function StampaLegendaFirma($layout,$datimat,$fontsizebase,$hriga,$mioFont,$unterzo,$margine,$bolletta,$filefirma){
        if($this->GetY()>210)
            $this->AddPage();

        $this->SetY($this->GetY()+$hriga/2);

        $this->stampaTitolo("LEGENDA VOCI DI SPESA",$fontsizebase,$hriga);

        $this->setColoreBasePari();
        $this->SetFontSize($fontsizebase-1);

        foreach($datimat as $key=>$val){
            $this->Cell(32,$hriga,$val[0],0,0,'L',1);
            $this->Cell(0,$hriga,$val[1],0,1,'L',1);
            $this->setColoreInverso();
        }

        $this->SetY($this->GetY()+$hriga*1);

        $this->stampaTitolo("Data di emissione del documento",$fontsizebase,$hriga+1,'B','C',0,$unterzo,0);
        $this->SetX($unterzo*2 + $margine);
        $this->stampaTitolo("Firma di chi ha eseguito il calcolo",$fontsizebase,$hriga+1,'B','C',0,$unterzo,1);

        $this->setColoreBasePari();
        $this->Cell($unterzo,$hriga+10,$this->data_a_video($bolletta->data_emissione),0,0,'C',1);
        $this->SetX($unterzo*2 + $margine);
        $yfirma = $this->GetY();
        $this->Cell(0,$hriga+10,"",0,1,'C',1);

        if( ($layout->firma!="") && (file_exists($filefirma)) ){
            $altezza_firma = 0;
            $max_h_logo = $hriga+8;

            list($x1, $y1) = getimagesize($filefirma);
            //Calcolo l'altezza in base alla larghezza imposta
            $x2 = $unterzo-4;
            $y2 = $x2 * $y1 / $x1;

            //se ha un formato troppo verticale (più di 4 cm) cambio metodo
            if($y2>$max_h_logo){
                $y2=$max_h_logo;
                $x2 = $y2 * $x1 / $y1;
            }

            $sp_vertlogo = ($max_h_logo+2 - $y2)/2;
            $sp_orizlogo = ($unterzo - $x2)/2;

            $this->Image($filefirma, $unterzo*2 + $margine + $sp_orizlogo, $yfirma+$sp_vertlogo, $x2);

        }
        $this->SetFont($mioFont,'',$fontsizebase+1);
    }


    function Cell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '')
    {
        $txt = iconv('UTF-8', 'ISO-8859-1', $txt);
        $txt = str_replace("[[EURO]]",chr(128),$txt);
        parent::Cell($w, $h, $txt, $border, $ln, $align, $fill, $link); // TODO: Change the autogenerated stub
    }
    /*
    function MultiCell($w, $h, $txt, $border = 0, $align = 'J', $fill = false)
    {
        $txt = iconv('UTF-8', 'ISO-8859-1', $txt);
        $txt = str_replace("[[EURO]]",chr(128),$txt);
        parent::MultiCell($w, $h, $txt, $border, $align, $fill); // TODO: Change the autogenerated stub
    }
    */

    public function data_a_video($data){
        $format = 'Y-m-d';
        if($data!=""){
            $myDateTime = DateTime::createFromFormat($format, $data);
            if($myDateTime && $myDateTime->format($format) === $data){
                $newDateString = $myDateTime->format('d/m/Y');
                return $newDateString;
            }
        }
        return "";
    }


}

?>