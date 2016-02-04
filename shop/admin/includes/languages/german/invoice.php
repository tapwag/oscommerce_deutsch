<?php

/*

 $Id: invoice.php,v 1.2 2005/05/21 12:45:05 harley_vb Exp $



 osCommerce, Open Source E-Commerce Solutions

 http://www.oscommerce.com



 Copyright (c) 2002 osCommerce



 Released under the GNU General Public License

*/



define('TABLE_HEADING_COMMENTS', 'Kommentar');

define('TABLE_HEADING_PRODUCTS_MODEL', 'Artikel-Nr.');

define('TABLE_HEADING_PRODUCTS', 'Artikel');

define('TABLE_HEADING_TAX', 'MwSt.');

define('TABLE_HEADING_TOTAL', 'Summe');

define('TABLE_HEADING_PRICE_EXCLUDING_TAX', 'Preis (exkl.)');

define('TABLE_HEADING_PRICE_INCLUDING_TAX', 'Preis (inkl.)');

define('TABLE_HEADING_PRICE_INCLUDING_TAX_UST', 'Einzelpreis'); // Added: Invoice & Packingslip


define('TABLE_HEADING_TOTAL_EXCLUDING_TAX', 'Summe (exkl.)');

define('TABLE_HEADING_TOTAL_INCLUDING_TAX', 'Summe (inkl.)');

define('TABLE_HEADING_TOTAL_INCLUDING_TAX_UST', 'Summe');

define('UST_FREI', 'Diese Rechnung bleibt gem&auml;&szlig; § 19(1)UStG umsatzsteuerfrei.');

define('ENTRY_SOLD_TO', 'Rechnungsanschrift:');

define('ENTRY_SHIP_TO', 'Lieferanschrift:');

define('ENTRY_PAYMENT_METHOD', 'Zahlungsweise:');

define('ENTRY_SUB_TOTAL', 'Zwischensumme:');

define('ENTRY_TAX', 'MwSt.:');

define('ENTRY_SHIPPING', 'Versandkosten:');

define('ENTRY_TOTAL', 'Gesamtsumme:');

// BOF Invoice & Packingslip
define('TITLE_PRINT_ORDER', 'Rechnung');



define('ENTRY_INVOICE_COSTUMER_EMAIL', 'eMail:');

define('ENTRY_INVOICE_COSTUMER_FON', 'Tel:');

define('ENTRY_INVOICE_COSTUMER_ID', 'Kunden-Nr.:');

define('ENTRY_INVOICE_DATE_PURCHASED', 'Rechnungsdatum:');

define('ENTRY_INVOICE_DATE_ZAHLBAR', 'F&auml;llig am:');


define('ENTRY_INVOICE_ORDER_ID', 'Rechnungsnummer:');

define('ENTRY_INVOICE_AUFTRAG_ID', 'Auftragsnummer:');


define('ENTRY_INVOICE_CUSTOMER_ACCOUNT', 'Kunden Online Konto');



define('BILLING_DATE','Rechnungsdatum'); 

define('STORE_ADDRESS','Hausanschrift'); 

define('TEXT_TAX_NUMBER','Steuernummern');

define('TEXT_BANK','Bankverbindung');

define('TEXT_BIC_SWIFT','SWIFT/IBAN');

define('TEXT_BANK_BLZ','BLZ:');

define('TEXT_BANK_KTO','Kto.-Nr.:');

define('IMAGE_BUTTON_PRINT', 'Drucken');

// EOF Invoice & Packingslip



?>