<?php
/*
 $Id: invoice_pdf.php,v 1.1 2005/06/23 00:29:30 hpdl Exp $

 osCommerce, Open Source E-Commerce Solutions
 http://www.oscommerce.com

 Copyright (c) 2003 osCommerce

 Released under the GNU General Public License

 Changelog: by Infobroker
 info@cooleshops.de
 
 Updated by defiance
 defiance@rheinmoselmedia.de
 
 Update by info@oscommerce-deutsch.de
*/

define('FPDF_FONTPATH','fpdf/font/');
//require('fpdf/fpdf.php');
require('fpdf/code39.php');

require('includes/application_top.php');
require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_INVOICE_PDF);



function tep_date_short_add($raw_date, $typ, $add) {
    if ( ($raw_date == '0000-00-00 00:00:00') || ($raw_date == '') ) return false;

$year = substr($raw_date, 0, 4);
$curyear = $year;

   if ($typ == 'year') {  
   $year = $year + (int)$add;
   } 
 
    if ($typ == 'month') {  
        $month = (int)substr($raw_date, 5, 2);
 $month = $month + (int)add;
} else {
 $month = (int)substr($raw_date, 5, 2);
}
 
    if ($typ == 'day') {    
        $day = (int)substr($raw_date, 8, 2);
 $day = $day + (int)$add;
} else {
 $day = (int)substr($raw_date, 8, 2);
}
 
    $hour = (int)substr($raw_date, 11, 2);
    $minute = (int)substr($raw_date, 14, 2);
   $second = (int)substr($raw_date, 17, 2);

    if (@date('Y', mktime($hour, $minute, $second, $month, $day, $year)) == $year) {
       return date('d.m.Y', mktime($hour, $minute, $second, $month, $day, $year));
    } else {
       return ereg_replace($curyear . '$', $year, date(DATE_FORMAT, mktime($hour, $minute, $second, $month, $day, $curyear)));
    }
}

function formatAddress($address){
	$addresstext = "";
	if(!empty($address->billing['company'])){
		$addresstext .= utf8_decode($address->billing['company']) . "\n";
	}
	$addresstext .= utf8_decode($address->billing['name']) . "\n";
	$addresstext .= utf8_decode($address->billing['street_address']) . " " . $address->billing['suburb'] . "\n";
	$addresstext .= utf8_decode($address->billing['postcode']) . " " . utf8_decode($address->billing['city']) . "\n";
	return $addresstext;
}

require(DIR_WS_CLASSES . 'currencies.php');
$currencies = new currencies();

include(DIR_WS_CLASSES . 'order.php');

// Bestellummer
if(isset($_GET['oID']) && (!empty($_GET['oID']) || $_GET['oID'] == 0)  && is_numeric($_GET['oID'])) {

	$oID = $_GET['oID'];

	$order = new order($oID);
	

	
	// Kundennummer und Fax
	$the_extra_query= tep_db_query("select * from " . TABLE_ORDERS . " where orders_id = '" . tep_db_input($oID) . "'");
	$the_extra= tep_db_fetch_array($the_extra_query);
	$the_customers_id= $the_extra['customers_id'];
	$the_extra_query= tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $the_customers_id . "'");
	$the_extra= tep_db_fetch_array($the_extra_query);
	$the_customers_fax= $the_extra['customers_fax'];
	


	
    // get extra text
    
    $text_query = tep_db_query("SELECT * FROM edit_invoice where edit_invoice_id = '1' and language_id = '" . $languages_id . "'");
    $text = tep_db_fetch_array($text_query); 
 
    $text2_query = tep_db_query("SELECT * FROM edit_invoice where edit_invoice_id = '2' and language_id = '" . $languages_id . "'");
    $text2 = tep_db_fetch_array($text2_query);     
     
     
}else{

	echo "OrderId nicht &uuml;bergeben oder in falscher Form &uuml;bergeben.";
	exit;
}





class PDF extends PDF_Code39{
// Seitenheader
 function Header() {
  global $oID;
// Logo
      if (EDIT_INVOICE_LOGO_ALIGN == 'rechts' and EDIT_INVOICE_LOGO != '') {
      
      $this->Image(DIR_WS_IMAGES . EDIT_INVOICE_LOGO,140,20,60);
      } else {
       if (EDIT_INVOICE_LOGO_ALIGN == 'links' and EDIT_INVOICE_LOGO != '') {
       $this->Image(DIR_WS_IMAGES . EDIT_INVOICE_LOGO,20,20,60);
       } else {
        if (EDIT_INVOICE_LOGO_ALIGN == 'mitte' and EDIT_INVOICE_LOGO != '') {
        $this->Image(DIR_WS_IMAGES . EDIT_INVOICE_LOGO,80,20,60);
        } else {
         if (EDIT_INVOICE_LOGO == '') {
         $this->Image('images/pixel_trans.jpg',20,20,60);
        }
          }
        }
      }
 }

// Seitenfooter
  function Footer() {
      global $pdf;
      $this->SetY(-34);
  $this->SetX(20);
      $footer_color_cell=explode(",",FOOTER_CELL_BG_COLOR);
      $this->SetFillColor($footer_color_cell[0], $footer_color_cell[1], $footer_color_cell[2]);
      $this->MultiCell(0,0,"",0,'L',1);
  $x=20;
  $y=$this->GetY();
  $this->SetLineWidth(0.25);
  $this->Line($x,$y,$this->w-$this->rMargin,$y);

  $pdf->SetFont('Arial','',6);
  $this->SetY(-33);
  $pdf->SetX(30);
  $pdf->Cell(45,3,iconv('UTF-8', 'windows-1252',SHOPBETREIBER),0,0,'L',0);
  $pdf->SetX(75);
  $pdf->Cell(45,3,'HRB:' . utf8_decode(HRB),0,0,'L',0);
  $pdf->SetX(120);
  $pdf->Cell(45,3,utf8_decode(OWNER_BANK_NAME),0,0,'L',0);
  $pdf->SetX(165);
  $pdf->Cell(45,3,utf8_decode(OWNER_BANK_SWIFT),0,0,'L',0);

  $pdf->Ln();
 
  $pdf->SetFont('Arial','',6);
  $this->SetY(-30);
  $pdf->SetX(30);
  $pdf->Cell(45,3,utf8_decode(SHOPSTRASSE),0,0,'L',0);
  $pdf->SetX(75);
  $pdf->Cell(45,3,utf8_decode(AMTSGERICHT),0,0,'L',0);
  $pdf->SetX(120);
  $pdf->Cell(45,3,utf8_decode(OWNER_BANK_ACCOUNT),0,0,'L',0);
  $pdf->SetX(165);
  $pdf->Cell(45,3,utf8_decode(OWNER_BANK_IBAN),0,0,'L',0);

  $pdf->Ln();
 
  $pdf->SetFont('Arial','',6);
  $this->SetY(-27);
  $pdf->SetX(30);
  $pdf->Cell(45,3,utf8_decode(SHOPSTADT),0,0,'L',0);
  $pdf->SetX(75);
  $pdf->Cell(45,3,'',0,0,'L',0);
  $pdf->SetX(120);
  $pdf->Cell(45,3,utf8_decode(TEXT_BANK_BLZ) . ' ' . utf8_decode(STORE_OWNER_BLZ),0,0,'L',0);
  $pdf->SetX(165);
  $pdf->Cell(45,3,'',0,0,'L',0);

  $pdf->Ln();
 
  $pdf->SetFont('Arial','',6);
  $this->SetY(-24);
  $pdf->SetX(30);
  $pdf->Cell(45,3,utf8_decode(SHOPTELEFON),0,0,'L',0);
  $pdf->SetX(75);
  $pdf->Cell(45,3,utf8_decode(OWNER_BANK_FA),0,0,'L',0);
  $pdf->SetX(120);
  $pdf->Cell(45,3,utf8_decode(TEXT_BANK_KTO) . ' ' . utf8_decode(OWNER_BANK),0,0,'L',0);
  $pdf->SetX(165);
  $pdf->Cell(45,3,'',0,0,'L',0);

  $pdf->Ln();
 
  $pdf->SetFont('Arial','',6);
  $this->SetY(-21);
  $pdf->SetX(30);
  $pdf->Cell(45,3,utf8_decode(SHOPFAX),0,0,'L',0);
  $pdf->SetX(75);
  $pdf->Cell(45,3,utf8_decode(OWNER_BANK_TAX_NUMBER),0,0,'L',0);
  $pdf->SetX(120);
  $pdf->Cell(45,3,'',0,0,'L',0);
  $pdf->SetX(165);
  $pdf->Cell(45,3,'',0,0,'L',0);

  $pdf->Ln();
  
  $pdf->SetFont('Arial','',6);
  $this->SetY(-18);
  $pdf->SetX(30);
  $pdf->Cell(45,3,utf8_decode(SHOPEMAIL),0,0,'L',0);
  $pdf->SetX(75);
  $pdf->Cell(45,3,utf8_decode(OWNER_BANK_UST_NUMBER),0,0,'L',0);
  $pdf->SetX(120);
  $pdf->Cell(45,3,'',0,0,'L',0);
  $pdf->SetX(165);
  $pdf->Cell(45,3,'',0,0,'L',0);
  
  $pdf->Ln();
  $pdf->Cell(0,20,'Seite '.$this->PageNo().'/{nb}',0,0,'R');
 }

 } 
function Footer() {
// Position von 1.5 cm von unten
     $this->SetY(-19);
  }


// Übernahme class
$pdf=new PDF();
$pdf->AliasNbPages();
// Abstände auf der seite setzen
$pdf->SetMargins(4,2,4);

// Hinzufügen der 1. Seite
$pdf->AddPage();

// Adressfeld mit Absender und Rechnungsanschrift
$pdf->SetX(0);
$pdf->SetY(58);
    $pdf->SetFont('Arial','',6);
$pdf->SetTextColor(0);
$pdf->Text(20,50, utf8_decode(SHOPBETREIBER) . ' *' . utf8_decode(SHOPSTRASSE) . ' *' . utf8_decode(SHOPSTADT));
    $pdf->SetFont('Arial','',9);
$pdf->SetTextColor(0);
    $pdf->Cell(20);

$pdf->MultiCell(70, 3.3,formatAddress($order) ,0,'L');

// Lieferanschrift
/*
    $pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0);
$pdf->Text(117,71,ENTRY_SHIP_TO);
$pdf->SetX(0);
$pdf->SetY(74);
    $pdf->Cell(115);
*/

// Barcode   
/* if (BARCODE_RECHNUNG == 'ja'){
 $print_barcode = pdf_open_jpeg($pdf, 'barcodegen.php?barcode= ' . tep_db_input($oID) .);
 $pdf->Image($print_barcode,120,74,60);
}
$bar = barcodegen.php?barcode=
$pdf->Cell(120, 60, $bar,0,'L');
 $pdf->Image(barcode.php?barcode=123456,120,74,60);
$pdf->Text(20,113, $bar . tep_db_input($oID));
 $pdf-><IMG SRC="barcode.php?barcode=123456&width=320&height=200">
*/
if (BARCODE_RECHNUNG == 'ja'){
 $pdf->Code39(140, 50, tep_db_input($oID));
  }
/*
 barcodegen.php?barcode= ' . tep_db_input($oID) . ' ;
*/

// Rechnungsnummer
$temp = str_replace('&nbsp;', ' ', PRINT_INVOICE_ORDERNR);
$pdf->Text(20,95, $temp . ENTRY_INVOICE_ORDER_ID_PREFIX . tep_db_input($oID) . ENTRY_INVOICE_ORDER_ID_SUFIX);
// Rechnungsdatum
$temp = str_replace('&nbsp;', '  ', PRINT_INVOICE_DATE);
$datum = date('Y-m-d H:i:s');
$pdf->Text(160,95,$temp . date('d.m.Y'));
// Fälligkeitsdatum
$temp2 = str_replace('&nbsp;', '  ', ENTRY_INVOICE_DATE_ZAHLBAR);

$pdf->Text(172,99, utf8_decode($temp2) . tep_date_short_add($datum, 'day' , ZAHLUNGSFAELLIGKEIT)); 

// Falzmarke
$pdf->SetY(105);
$pdf->SetX(20);
$x=10;
$y=$pdf->GetY();
$pdf->SetLineWidth(0.25);
$pdf->Line($x,$y,$pdf->w-$pdf->rMargin,$y);

// Rechnungstext 1
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0);
$pdf->SetY(100);
$pdf->Cell(15);
$text['edit_invoice_text'] = str_replace("<br>",'',$text['edit_invoice_text']);
$pdf->MultiCell(200, 4,$text['edit_invoice_text'],0,'L');

$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0);

// Auftragsnummer
$temp = str_replace('&nbsp;', ' ', ENTRY_INVOICE_AUFTRAG_ID);
$pdf->Text(20,120, $temp . tep_db_input($oID)); 

// Kundenummer
$temp = str_replace('&nbsp;', ' ', ENTRY_INVOICE_COSTUMER_ID);
$pdf->Text(170,120,$temp . $the_customers_id);

// Fields Name position
$Y_Fields_Name_position = 125;
// Table position, under Fields Name
$Y_Table_Position = 131;


function output_table_heading($Y_Fields_Name_position){
     global $pdf;
// Feldnamen der Rechnung
// Hintergrundfarbe der Boxen
 $pdf->SetFillColor(232,232,232);
// Schrift der Boxen
 $pdf->SetFont('Arial','B',7);
 $pdf->SetY($Y_Fields_Name_position);
 $pdf->SetX(20); 
 $pdf->Cell(10,6,TABLE_HEADING_QUANTITY,1,0,'C',1);
 $pdf->SetX(30);
 $pdf->Cell(25,6,TABLE_HEADING_PRODUCTS_MODEL,1,0,'C',1);
 $pdf->SetX(55);
 $pdf->Cell(57,6,TABLE_HEADING_PRODUCTS,1,0,'C',1);
 $pdf->SetX(112);
 $pdf->Cell(13,6,TABLE_HEADING_TAX,1,0,'C',1);
 $pdf->SetX(125); 
 $pdf->Cell(20,6,TABLE_HEADING_PRICE_EXCLUDING_TAX,1,0,'C',1);
 $pdf->SetX(145);
 $pdf->Cell(20,6,TABLE_HEADING_PRICE_INCLUDING_TAX,1,0,'C',1);
 $pdf->SetX(165);
 $pdf->Cell(20,6,TABLE_HEADING_TOTAL_EXCLUDING_TAX,1,0,'C',1);
 $pdf->SetX(185);
 $pdf->Cell(18,6,TABLE_HEADING_TOTAL_INCLUDING_TAX,1,0,'C',1);
 $pdf->Ln();
}
output_table_heading($Y_Fields_Name_position);

// Rechnungsaufgliederung nach Positionen
for ($i = 0, $n = sizeof($order->products); $i < $n; $i++) {

 	$pdf->SetFont('Arial','',7);
 	$pdf->SetY($Y_Table_Position);
 	$pdf->SetX(20);
 
 	//Build product attributes string
 	$prodattrstr ='';
 	$lineheight = 3.5;
 	$rowheight = $lineheight;
 
 	if (isset($order->products[$i]['attributes']) && (($k = sizeof($order->products[$i]['attributes'])) > 0)) {
	    for ($j = 0; $j < $k; $j++) {
    	    $prodattrstr .= chr(10) . '     - ' . $order->products[$i]['attributes'][$j]['option'] . ': ' . $order->products[$i]['attributes'][$j]['value'];
       		if ($order->products[$i]['attributes'][$j]['price'] != '0') {
          		$prodattrstr .= chr(10) . '       (' . $order->products[$i]['attributes'][$j]['prefix'] . $currencies->format($order->products[$i]['attributes'][$j]['price'] * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value']) . ')';
	  			$rowheight += $lineheight;
       		}
       		$rowheight += $lineheight;
    	}
 	}
 
 //$temp = str_replace('&nbsp;', ' ');
 	$pdf->MultiCell(10,$rowheight,$order->products[$i]['qty'] . 'x',1,'C');
 	$pdf->SetY($Y_Table_Position);
 	$pdf->SetX(55);
 	if (strlen($order->products[$i]['name']) > 40 && strlen($order->products[$i]['name']) < 45) {
  		$pdf->SetFont('Arial','',7);
  		$order->products[$i]['name'] = str_replace("<br>",'',$order->products[$i]['name']);
  		$order->products[$i]['name'] = str_replace("<b>",'',$order->products[$i]['name']);
  		$order->products[$i]['name'] = str_replace("</b>",'',$order->products[$i]['name']);
  		$pdf->MultiCell(57,$lineheight,iconv('UTF-8', 'windows-1252', $order->products[$i]['name'].$prodattrstr),1,'L');
 	}else if (strlen($order->products[$i]['name']) > 45) {
  		$pdf->SetFont('Arial','',7);
  		$order->products[$i]['name'] = str_replace("<br>",'',$order->products[$i]['name']);
  		$order->products[$i]['name'] = str_replace("<b>",'',$order->products[$i]['name']);
  		$order->products[$i]['name'] = str_replace("</b>",'',$order->products[$i]['name']);
  		$pdf->MultiCell(57,$lineheight,substr(iconv('UTF-8', 'windows-1252', $order->products[$i]['name'].$prodattrstr),0,45),1,'L');
 	}else{
  		$order->products[$i]['name'] = str_replace("<br>",'',$order->products[$i]['name']);
  		$order->products[$i]['name'] = str_replace("<b>",'',$order->products[$i]['name']);
  		$order->products[$i]['name'] = str_replace("</b>",'',$order->products[$i]['name']);
  		$pdf->MultiCell(57,$lineheight,iconv('UTF-8', 'windows-1252', $order->products[$i]['name'].$prodattrstr),1,'L');
 	}
 
 	$pdf->SetFont('Arial','',7);
 	$pdf->SetY($Y_Table_Position);
 	$pdf->SetX(112);
 	$pdf->MultiCell(13,$rowheight,tep_display_tax_value($order->products[$i]['tax']) . '%',1,'C');
 	$pdf->SetY($Y_Table_Position);
 	$pdf->SetX(30);
    $pdf->SetFont('Arial','',7);
 	$pdf->MultiCell(25,$rowheight,$order->products[$i]['model'],1,'C');
 	$pdf->SetY($Y_Table_Position);
 	$pdf->SetX(125);
    $pdf->SetFont('Arial','',7);
 	$pdf->MultiCell(20,$rowheight,iconv('UTF-8', 'windows-1252',$currencies->format($order->products[$i]['final_price'], true, $order->info['currency'], $order->info['currency_value'])),1,'C');
 	$pdf->SetY($Y_Table_Position);
 	$pdf->SetX(145);
 	$pdf->MultiCell(20,$rowheight,iconv('UTF-8', 'windows-1252',$currencies->format(tep_add_tax($order->products[$i]['final_price'], $order->products[$i]['tax']), true, $order->info['currency'], $order->info['currency_value'])),1,'C');
 	$pdf->SetY($Y_Table_Position);
 	$pdf->SetX(165);
 	$pdf->MultiCell(20,$rowheight,iconv('UTF-8', 'windows-1252',$currencies->format($order->products[$i]['final_price'] * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value'])),1,'C');
 	$pdf->SetY($Y_Table_Position);
 	$pdf->SetX(185);
	$pdf->MultiCell(18,$rowheight,iconv('UTF-8', 'windows-1252',$currencies->format(tep_add_tax($order->products[$i]['final_price'], $order->products[$i]['tax']) * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value'])),1,'C'); 	

 
 

 
 $Y_Table_Position += $rowheight;

//Check for product line overflow
     $item_count++;
    if ((is_long($item_count / 32) && $i >= 20) || ($i == 20)){
        $pdf->AddPage();
        //Fields Name position
        $Y_Fields_Name_position = 125;
        //Table position, under Fields Name
        $Y_Table_Position = 70;
        output_table_heading($Y_Table_Position-$rowheight);
        if ($i == 20) $item_count = 1;
    }
}

$Y_Table_Position += 4;

if ( $Y_Table_Position > 240 ) {
 $pdf->AddPage();
 $Y_Table_Position = 70;         
}

for ($i = 0, $n = sizeof($order->totals); $i < $n; $i++) {
 if ($i == 0) {
// Text Zahlungsweise
  $pdf->SetFont('Arial','B',8);
  $pdf->SetTextColor(0); 
  $temp = substr ($order->info['payment_method'] , 0, 23);
  $pdf->Text(20,$Y_Table_Position+4,ENTRY_PAYMENT_METHOD . ' ' . $temp); 
  $pdf->SetFont('Arial','',8);
 }
 $pdf->SetY($Y_Table_Position);
 // Position Feld Beschreibung Endbeträge Wert ändern proportionanl zum Wert $pdf->MultiCell(40
 $pdf->SetX(138);
 // Breite Feld Beschreibung Endbeträge Wert ändern proportionanl zum Wert $pdf->MultiCell(40
 $pdf->MultiCell(40,4,$order->totals[$i]['title'],0,'L'); 
 $pdf->SetY($Y_Table_Position);
 $pdf->SetX(178);
 $pdf->MultiCell(25,4,iconv('UTF-8', 'windows-1252',strip_tags($order->totals[$i]['text'])),0,'R');
 $Y_Table_Position += 4; 
}
$Y_Table_Position += 4; 
// Strich unter den Rechnungsbeträgen
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0);
   $pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(0,0,"",1,'L',1);
   $Y_Table_Position += 4;
$x=10;
$y=$pdf->GetY();
$pdf->SetLineWidth(0.25);
$pdf->Line($x,$y,$pdf->w-$pdf->rMargin,$y);

if ( $Y_Table_Position > 240 ) {
 $pdf->AddPage();
 $Y_Table_Position = 70;         
}

// Rechnungstext 2 
   $pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0); 
$pdf->SetX(0); 
$pdf->SetY($Y_Table_Position);
   $pdf->Cell(15);
  $text2['edit_invoice_text'] = str_replace("<br>",'',$text2['edit_invoice_text']);
$pdf->MultiCell(250, 4,$text2['edit_invoice_text'],0,'L'); 


$pdf->Output();
?>