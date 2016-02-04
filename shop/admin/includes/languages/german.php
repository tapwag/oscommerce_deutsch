<?php
/*
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/

// look in your $PATH_LOCALE/locale directory for available locales..
// on RedHat6.0 I used 'en_US'
// on FreeBSD 4.0 I use 'en_US.ISO_8859-1'
// this may not work under win32 environments..
setlocale(LC_TIME, 'de_DE.ISO_8859-1');
define('DATE_FORMAT_SHORT', '%d/%m/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B, %Y'); // this is used for strftime()
define('DATE_FORMAT', 'd/m/Y'); // this is used for date()
define('PHP_DATE_TIME_FORMAT', 'd/m/Y H:i:s'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');
define('JQUERY_DATEPICKER_I18N_CODE', ''); // leave empty for en_US; see http://jqueryui.com/demos/datepicker/#localization
define('JQUERY_DATEPICKER_FORMAT', 'dd/mm/yy'); // see http://docs.jquery.com/UI/Datepicker/formatDate

////
// Return date in raw format
// $date should be in format mm/dd/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
function tep_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 3, 2) . substr($date, 0, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 0, 2) . substr($date, 3, 2);
  }
}

// Global entries for the <html> tag
define('HTML_PARAMS','dir="ltr" lang="de"');

// charset for web pages and emails
define('CHARSET', 'utf-8');
//define('CHARSET', 'iso-8859-1');

// page title
define('TITLE', 'osCommerce Online Merchant Administration Tool');

// header text in includes/header.php
define('HEADER_TITLE_TOP', 'Administration');
define('HEADER_TITLE_SUPPORT_SITE', 'Supportseite');
define('HEADER_TITLE_ONLINE_CATALOG', 'Online Katalog');
define('HEADER_TITLE_ADMINISTRATION', 'Administration');

// text for gender
define('MALE', 'Herr');
define('FEMALE', 'Frau');

// text for date of birth example
define('DOB_FORMAT_STRING', 'dd/mm/jjjj');

// configuration box text in includes/boxes/configuration.php
define('BOX_HEADING_CONFIGURATION', 'Konfiguration');
define('BOX_CONFIGURATION_MYSTORE', 'Mein Shop');
define('BOX_CONFIGURATION_LOGGING', 'Login');
define('BOX_CONFIGURATION_CACHE', 'Cache');
define('BOX_CONFIGURATION_ADMINISTRATORS', 'Administratoren');
define('BOX_CONFIGURATION_STORE_LOGO', 'Shop Logo');

// modules box text in includes/boxes/modules.php
define('BOX_HEADING_MODULES', 'Module');
define('BOX_MODULES_PAYMENT', 'Zahlungsweise');
define('BOX_MODULES_SHIPPING', 'Versandart');
define('BOX_MODULES_ORDER_TOTAL', 'Zusammenfassung');

// categories box text in includes/boxes/catalog.php
define('BOX_HEADING_CATALOG', 'Katalog');
define('BOX_CATALOG_CATEGORIES_PRODUCTS', 'Kategorien / Artikel');
define('BOX_CATALOG_CATEGORIES_PRODUCTS_ATTRIBUTES', 'Produktmerkmale');
define('BOX_CATALOG_MANUFACTURERS', 'Hersteller');
define('BOX_CATALOG_REVIEWS', 'Produktbewertungen');
define('BOX_CATALOG_SPECIALS', 'Sonderangebote');
define('BOX_CATALOG_PRODUCTS_EXPECTED', 'erwartete Artikel');

// customers box text in includes/boxes/customers.php
define('BOX_HEADING_CUSTOMERS', 'Kunden');
define('BOX_CUSTOMERS_CUSTOMERS', 'Kunden');
define('BOX_CUSTOMERS_ORDERS', 'Bestellungen');

// taxes box text in includes/boxes/taxes.php
define('BOX_HEADING_LOCATION_AND_TAXES', 'Land / Steuer');
define('BOX_TAXES_COUNTRIES', 'Land');
define('BOX_TAXES_ZONES', 'Bundesl&auml;nder');
define('BOX_TAXES_GEO_ZONES', 'Steuerzonen');
define('BOX_TAXES_TAX_CLASSES', 'Steuerklassen');
define('BOX_TAXES_TAX_RATES', 'Steuers&auml;tze');

// reports box text in includes/boxes/reports.php
define('BOX_HEADING_REPORTS', 'Berichte');
define('BOX_REPORTS_PRODUCTS_VIEWED', 'Besuchte Artikel');
define('BOX_REPORTS_PRODUCTS_PURCHASED', 'Gekaufte Artikel');
define('BOX_REPORTS_ORDERS_TOTAL', 'Kunden-Bestellstatistik');

// reports box text in includes/boxes/orders.php
define('BOX_HEADING_ORDERS', 'Bestellungen');
define('BOX_ORDERS_ORDERS', 'Bestellungen');

// reports box text in includes/boxes/orders.php
define('BOX_HEADING_ORDERS', 'Bestellungen');
define('BOX_ORDERS_ORDERS', 'Bestellungen');

// reports box text in includes/boxes/extra_info_pages.php
define('BOX_HEADING_EXTRAINFOPAGES','Zusatzseiten');
define('BOX_TOOLS_PAGE_MANAGER', 'Seiten verwalten');

// tools text in includes/boxes/tools.php
define('BOX_HEADING_TOOLS', 'Hilfsprogramme');
define('BOX_TOOLS_ACTION_RECORDER', 'Action Recorder');
define('BOX_TOOLS_BACKUP', 'Datenbanksicherung');
define('BOX_TOOLS_BANNER_MANAGER', 'Bannerverwaltung');
define('BOX_TOOLS_CACHE', 'Cache Steuerung');
define('BOX_TOOLS_DEFINE_LANGUAGE', 'Sprachen definieren');
define('BOX_TOOLS_FILE_MANAGER', 'Datei-Manager');
define('BOX_TOOLS_MAIL', 'Email versenden');
define('BOX_TOOLS_NEWSLETTER_MANAGER', 'Rundschreiben Manager');
define('BOX_TOOLS_SEC_DIR_PERMISSIONS', 'Verzeichnis Sicherheit/Lesezugriffsrecht');
define('BOX_TOOLS_SERVER_INFO', 'Server Information');
define('BOX_TOOLS_VERSION_CHECK', 'Version pr&uuml;fen');
define('BOX_TOOLS_WHOS_ONLINE', 'Wer ist online');

// localizaion box text in includes/boxes/localization.php
define('BOX_HEADING_LOCALIZATION', 'Sprachen/W&auml;hrungen');
define('BOX_LOCALIZATION_CURRENCIES', 'W&auml;hrungen');
define('BOX_LOCALIZATION_LANGUAGES', 'Sprachen');
define('BOX_LOCALIZATION_ORDERS_STATUS', 'Bestellstatus');

// javascript messages
define('JS_ERROR', 'Während der Eingabe sind Fehler aufgetreten!\nBitte korrigieren Sie folgendes:\n\n');

define('JS_OPTIONS_VALUE_PRICE', '* Sie m&uuml;ssen diesem Wert einen Preis zuordnen\n');
define('JS_OPTIONS_VALUE_PRICE_PREFIX', '* Sie m&uuml;ssen ein Vorzeichen für den Preis angeben (+/-)\n');

define('JS_PRODUCTS_NAME', '* Der neue Artikel muss einen Namen haben\n');
define('JS_PRODUCTS_DESCRIPTION', '* Der neue Artikel muss eine Beschreibung haben\n');
define('JS_PRODUCTS_PRICE', '* Der neue Artikel muss einen Preis haben\n');
define('JS_PRODUCTS_WEIGHT', '* Der neue Artikel muss eine Gewichtsangabe haben\n');
define('JS_PRODUCTS_QUANTITY', '* Sie m&uuml;ssen dem neuen Artikel eine verfügbare Anzahl zuordnen\n');
define('JS_PRODUCTS_MODEL', '* Sie m&uuml;ssen dem neuen Artikel eine Artikel-Nr. zuordnen\n');
define('JS_PRODUCTS_IMAGE', '* Sie m&uuml;ssen dem Artikel ein Bild zuordnen\n');

define('JS_SPECIALS_PRODUCTS_PRICE', '* Es muss ein neuer Preis für diesen Artikel festgelegt werden\n');

define('JS_GENDER', '* Die \'Anrede\' muss ausgew&auml;hlt werden.\n');
define('JS_FIRST_NAME', '* Der \'Vorname\' muss mindestens aus ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_LAST_NAME', '* Der \'Nachname\' muss mindestens aus ' . ENTRY_LAST_NAME_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_DOB', '* Das \'Geburtsdatum\' muss folgendes Format haben: xx.xx.xxxx (Tag/Jahr/Monat).\n');
define('JS_EMAIL_ADDRESS', '* Die \'eMail-Adresse\' muss mindestens aus ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_ADDRESS', '* Die \'Strasse\' muss mindestens aus ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_POST_CODE', '* Die \'Postleitzahl\' muss mindestens aus ' . ENTRY_POSTCODE_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_CITY', '* Die \'Stadt\' muss mindestens aus ' . ENTRY_CITY_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_STATE', '* Das \'Bundesland\' muss ausgew&auml;hlt werden.\n');
define('JS_STATE_SELECT', '-- W&auml;hlen Sie oberhalb --');
define('JS_ZONE', '* Das \'Bundesland\' muss aus der Liste f&uuml;r dieses Land ausgew&auml;hlt werden.');
define('JS_COUNTRY', '* Das \'Land\' muss ausgew&auml;hlt werden.\n');
define('JS_TELEPHONE', '* Die \'Telefonnummer\' muss aus mindestens ' . ENTRY_TELEPHONE_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_PASSWORD', '* Das \'Passwort\' sowie die \'Passwortbest&auml;tigung\' m&uuml;ssen &uuml;bereinstimmen und aus mindestens ' . ENTRY_PASSWORD_MIN_LENGTH . ' Zeichen bestehen.\n');

define('JS_ORDER_DOES_NOT_EXIST', 'Auftragsnummer %s existiert nicht!');

define('CATEGORY_PERSONAL', 'Pers&ouml;nliche Daten');
define('CATEGORY_ADDRESS', 'Adresse');
define('CATEGORY_CONTACT', 'Kontakt');
define('CATEGORY_COMPANY', 'Firma');
define('CATEGORY_OPTIONS', 'Optionen');

define('ENTRY_GENDER', 'Anrede:');
define('ENTRY_GENDER_ERROR', '&nbsp;<span class="errorText">notwendige Eingabe</span>');
define('ENTRY_FIRST_NAME', 'Vorname:');
define('ENTRY_FIRST_NAME_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' Buchstaben</span>');
define('ENTRY_LAST_NAME', 'Nachname:');
define('ENTRY_LAST_NAME_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_LAST_NAME_MIN_LENGTH . ' Buchstaben</span>');
define('ENTRY_DATE_OF_BIRTH', 'Geburtsdatum:');
define('ENTRY_DATE_OF_BIRTH_ERROR', '&nbsp;<span class="errorText">(z.B. 21/05/1970)</span>');
define('ENTRY_EMAIL_ADDRESS', 'eMail Adresse:');
define('ENTRY_EMAIL_ADDRESS_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' Buchstaben</span>');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '&nbsp;<span class="errorText">ung&uuml;ltige eMail-Adresse!</span>');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '&nbsp;<span class="errorText">Diese eMail-Adresse existiert schon!</span>');
define('ENTRY_COMPANY', 'Firmenname:');
define('ENTRY_STREET_ADDRESS', 'Strasse:');
define('ENTRY_STREET_ADDRESS_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' Buchstaben</span>');
define('ENTRY_SUBURB', 'weitere Anschrift:');
define('ENTRY_POST_CODE', 'Postleitzahl:');
define('ENTRY_POST_CODE_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_POSTCODE_MIN_LENGTH . ' Zahlen</span>');
define('ENTRY_CITY', 'Stadt:');
define('ENTRY_CITY_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_CITY_MIN_LENGTH . ' Buchstaben</span>');
define('ENTRY_STATE', 'Bundesland:');
define('ENTRY_STATE_ERROR', '&nbsp;<span class="errorText">notwendige Eingabe</font></small>');
define('ENTRY_COUNTRY', 'Land:');
define('ENTRY_TELEPHONE_NUMBER', 'Telefonnummer:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_TELEPHONE_MIN_LENGTH . ' Zahlen</span>');
define('ENTRY_FAX_NUMBER', 'Telefaxnummer:');
define('ENTRY_NEWSLETTER', 'Rundschreiben:');
define('ENTRY_NEWSLETTER_YES', 'abonniert');
define('ENTRY_NEWSLETTER_NO', 'nicht abonniert');

// images
define('IMAGE_ANI_SEND_EMAIL', 'Email versenden');
define('IMAGE_BACK', 'Zur&uuml;ck');
define('IMAGE_BACKUP', 'Datensicherung');
define('IMAGE_CANCEL', 'Abbruch');
define('IMAGE_CONFIRM', 'Best&auml;tigen');
define('IMAGE_COPY', 'Kopieren');
define('IMAGE_COPY_TO', 'Kopieren nach');
define('IMAGE_DETAILS', 'Details');
define('IMAGE_DELETE', 'L&ouml;schen');
define('IMAGE_EDIT', 'Bearbeiten');
define('IMAGE_EMAIL', 'Email versenden');
define('IMAGE_FILE_MANAGER', 'Datei-Manager');
define('IMAGE_ICON_STATUS_GREEN', 'Aktiv');
define('IMAGE_ICON_STATUS_GREEN_LIGHT', 'Aktivieren');
define('IMAGE_ICON_STATUS_RED', 'Inaktiv');
define('IMAGE_ICON_STATUS_RED_LIGHT', 'Deaktivieren');
define('IMAGE_ICON_INFO', 'Information');
define('IMAGE_INSERT', 'Einf&uuml;gen');
define('IMAGE_LOCK', 'Sperren');
define('IMAGE_MODULE_INSTALL', 'Module Installieren');
define('IMAGE_MODULE_REMOVE', 'Module Entfernen');
define('IMAGE_MOVE', 'Verschieben');
define('IMAGE_NEW_BANNER', 'Neuen Banner aufnehmen');
define('IMAGE_NEW_CATEGORY', 'Neue Kategorie erstellen');
define('IMAGE_NEW_COUNTRY', 'Neues Land aufnehmen');
define('IMAGE_NEW_CURRENCY', 'Neue W&auml;hrung einf&uuml;gen');
define('IMAGE_NEW_FILE', 'Neue Datei');
define('IMAGE_NEW_FOLDER', 'Neues Verzeichnis');
define('IMAGE_NEW_LANGUAGE', 'Neue Sprache anlegen');
define('IMAGE_NEW_NEWSLETTER', 'Neues Rundschreiben');
define('IMAGE_NEW_PRODUCT', 'Neuen Artikel aufnehmen');
define('IMAGE_NEW_TAX_CLASS', 'Neue Steuerklasse erstellen');
define('IMAGE_NEW_TAX_RATE', 'Neuen Steuersatz anlegen');
define('IMAGE_NEW_TAX_ZONE', 'Neue Steuerzone erstellen');
define('IMAGE_NEW_ZONE', 'Neues Bundesland einf&uuml;gen');
define('IMAGE_ORDERS', 'Bestellungen');
define('IMAGE_ORDERS_INVOICE', 'Rechnung HTML');
define('IMAGE_ORDERS_PACKINGSLIP', 'Lieferschein HTML');
define('IMAGE_ORDERS_INVOICE_PDF', 'Rechnung PDF');
define('IMAGE_ORDERS_PACKINGSLIP_PDF', 'Lieferschein PDF');
define('IMAGE_PREVIEW', 'Vorschau');
define('IMAGE_RESET', 'Zur&uuml;cksetzen');
define('IMAGE_RESTORE', 'Zur&uuml;cksichern');
define('IMAGE_SAVE', 'Speichern');
define('IMAGE_SEARCH', 'Suchen');
define('IMAGE_SELECT', 'Ausw&auml;hlen');
define('IMAGE_SEND', 'Versenden');
define('IMAGE_SEND_EMAIL', 'eMail versenden');
define('IMAGE_UNLOCK', 'Entsperren');
define('IMAGE_UPDATE', 'Aktualisieren');
define('IMAGE_UPDATE_CURRENCIES', 'Wechselkurse aktualisieren');
define('IMAGE_UPLOAD', 'Hochladen');

define('ICON_CROSS', 'Falsch');
define('ICON_CURRENT_FOLDER', 'aktueller Ordner');
define('ICON_DELETE', 'L&ouml;schen');
define('ICON_ERROR', 'Fehler');
define('ICON_FILE', 'Datei');
define('ICON_FILE_DOWNLOAD', 'Herunterladen');
define('ICON_FOLDER', 'Ordner');
define('ICON_LOCKED', 'Gesperrt');
define('ICON_PREVIOUS_LEVEL', 'Vorherige Ebene');
define('ICON_PREVIEW', 'Vorschau');
define('ICON_STATISTICS', 'Statistik');
define('ICON_SUCCESS', 'Erfolg');
define('ICON_TICK', 'Wahr');
define('ICON_UNLOCKED', 'Entsperrt');
define('ICON_WARNING', 'Warnung');

// constants for use in tep_prev_next_display function
define('TEXT_RESULT_PAGE', 'Seite %s von %d');
define('TEXT_DISPLAY_NUMBER_OF_BANNERS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Bannern)');
define('TEXT_DISPLAY_NUMBER_OF_COUNTRIES', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> L&auml;ndern)');
define('TEXT_DISPLAY_NUMBER_OF_CUSTOMERS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Kunden)');
define('TEXT_DISPLAY_NUMBER_OF_CURRENCIES', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> W&auml;hrungen)');
define('TEXT_DISPLAY_NUMBER_OF_ENTRIES','Angezeigt werden %d bis %d (von insgesamt %d Eintr&auml;gen)');
define('TEXT_DISPLAY_NUMBER_OF_LANGUAGES', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Sprachen)');
define('TEXT_DISPLAY_NUMBER_OF_MANUFACTURERS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Herstellern)');
define('TEXT_DISPLAY_NUMBER_OF_NEWSLETTERS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Rundschreiben)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Bestellungen)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS_STATUS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Bestellstatus)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Artikeln)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_EXPECTED', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> erwarteten Artikeln)');
define('TEXT_DISPLAY_NUMBER_OF_REVIEWS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Bewertungen)');
define('TEXT_DISPLAY_NUMBER_OF_SPECIALS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Sonderangeboten)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_CLASSES', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Steuerklassen)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_ZONES', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Steuerzonen)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_RATES', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Steuers&auml;tzen)');
define('TEXT_DISPLAY_NUMBER_OF_ZONES', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Bundesl&auml;ndern)');

define('PREVNEXT_BUTTON_PREV', '&lt;&lt;');
define('PREVNEXT_BUTTON_NEXT', '&gt;&gt;');

define('TEXT_DEFAULT', 'Standard');
define('TEXT_SET_DEFAULT', 'Als Standard definieren');
define('TEXT_FIELD_REQUIRED', '&nbsp;<span class="fieldRequired">* erforderlich</span>');

define('ERROR_NO_DEFAULT_CURRENCY_DEFINED', 'Fehler: Es wurde keine Standardw&auml;hrung definiert. Bitte definieren Sie unter Adminstration -> Sprachen/W&auml;hrungen -> W&auml;hrungen eine Standardw&auml;hrung.');

define('TEXT_CACHE_CATEGORIES', 'Kategorien Box');
define('TEXT_CACHE_MANUFACTURERS', 'Hersteller Box');
define('TEXT_CACHE_ALSO_PURCHASED', 'Modul f&uuml;r ebenfalls gekaufte Artikel');

define('TEXT_NONE', '--keine--');
define('TEXT_TOP', 'Top');


define('ERROR_DESTINATION_DOES_NOT_EXIST', 'Fehler: Zielverzeichnis existiert nicht.');
define('ERROR_DESTINATION_NOT_WRITEABLE', 'Fehler: Zielverzeichnis ist nicht beschreibbar.');
define('ERROR_FILE_NOT_SAVED', 'Fehler: Datei nach hochladen nicht gespeichert.');
define('ERROR_FILETYPE_NOT_ALLOWED', 'Fehler: Dateien von diesem Typ d&uuml;rfen nicht hochgeladen werden.');
define('SUCCESS_FILE_SAVED_SUCCESSFULLY', 'Erfolg : Datei erfolgreich gespeichert.');
define('WARNING_NO_FILE_UPLOADED', 'Warnung: keine Datei hochgeladen.');
define('WARNING_FILE_UPLOADS_DISABLED', 'Warnung: Datei uploads sind in der php.ini deaktiviert.');


//Tabelle configuration_group
define('CONFIGURATION_GROUP_1_TITLE','Shop');
define('CONFIGURATION_GROUP_1_DESCRIPTION','Allgemeine Informationen zum Shop');
define('CONFIGURATION_GROUP_2_TITLE','Untere Werte');
define('CONFIGURATION_GROUP_2_DESCRIPTION','Die unteren Werte f&uuml;r Fuktionen und Daten');
define('CONFIGURATION_GROUP_3_TITLE','Obere Werte');
define('CONFIGURATION_GROUP_3_DESCRIPTION','obere Werte f&uuml;r Fuktionen und Daten');
define('CONFIGURATION_GROUP_4_TITLE','Bilder');
define('CONFIGURATION_GROUP_4_DESCRIPTION','Parameter f&uuml;r Bilder');
define('CONFIGURATION_GROUP_5_TITLE','Kunden');
define('CONFIGURATION_GROUP_5_DESCRIPTION','Konfiguration der Kundendetails');
define('CONFIGURATION_GROUP_6_TITLE','Module');
define('CONFIGURATION_GROUP_6_DESCRIPTION','In Konfiguration nicht sichtbar');
define('CONFIGURATION_GROUP_7_TITLE','Versand/Verpackung');
define('CONFIGURATION_GROUP_7_DESCRIPTION','Konfiguration der Versandoptionen');
define('CONFIGURATION_GROUP_8_TITLE','Produktlisten');
define('CONFIGURATION_GROUP_8_DESCRIPTION','Konfiguration der angezeigten Produktlisten');
define('CONFIGURATION_GROUP_9_TITLE','Lager');
define('CONFIGURATION_GROUP_9_DESCRIPTION','Konfiguration des Lagerbestandes');
define('CONFIGURATION_GROUP_10_TITLE','Protokoll');
define('CONFIGURATION_GROUP_10_DESCRIPTION','Konfiguration des Protokolls');
define('CONFIGURATION_GROUP_11_TITLE','Zwischenspeicher');
define('CONFIGURATION_GROUP_11_DESCRIPTION','Konfiguration des Zwischenspeichers');
define('CONFIGURATION_GROUP_12_TITLE','E-Mail Optionen');
define('CONFIGURATION_GROUP_12_DESCRIPTION','Einstellungen f&uuml;r E-Mail Transport und HTML E-Mails');
define('CONFIGURATION_GROUP_13_TITLE','Download');
define('CONFIGURATION_GROUP_13_DESCRIPTION','Optionen f&uuml;r herunterladbare Produkte, wie z.B. Software');
define('CONFIGURATION_GROUP_14_TITLE','GZip Kompression');
define('CONFIGURATION_GROUP_14_DESCRIPTION','Konfiguration GZip Kompression ');
define('CONFIGURATION_GROUP_15_TITLE','Sessions');
define('CONFIGURATION_GROUP_15_DESCRIPTION','Session Optionen');


// Tabelle configuration
define('STORE_NAME_TITLE','Name');
define('STORE_NAME_DESCRIPTION','Name des Shops');
define('STORE_OWNER_TITLE','Besitzer');
define('STORE_OWNER_DESCRIPTION','Besitzer des Shops');
define('STORE_OWNER_EMAIL_ADDRESS_TITLE','E-Mail Addresse');
define('STORE_OWNER_EMAIL_ADDRESS_DESCRIPTION','Die E-Mail Addresse des Shopbesitzers');
define('EMAIL_FROM_TITLE','E-Mail von');
define('EMAIL_FROM_DESCRIPTION','Die E-Mail Addresse, die in versendeten E-Mails angezeigt wird.');
define('STORE_COUNTRY_TITLE','Land');
define('STORE_COUNTRY_DESCRIPTION','Das Land in dem der Shop gef&uuml;hrt wird.<br/>Achtung: Vergessen Sie nicht die Zone zu aktualisieren.');
define('STORE_ZONE_TITLE','Bundesland');
define('STORE_ZONE_DESCRIPTION','Bundesland');
define('EXPECTED_PRODUCTS_SORT_TITLE','Sortierreihenfolge');
define('EXPECTED_PRODUCTS_SORT_DESCRIPTION','Sortierreihenfolge der Produkte');
define('EXPECTED_PRODUCTS_FIELD_TITLE','sortiert nach:');
define('EXPECTED_PRODUCTS_FIELD_DESCRIPTION','Das Merkmal, nach dem die Produkte sortiert werden sollen');
define('USE_DEFAULT_LANGUAGE_CURRENCY_TITLE','W&auml;hrung bei Sprachwechsel anpassen');
define('USE_DEFAULT_LANGUAGE_CURRENCY_DESCRIPTION','bei einem Sprachwechsel automatisch zu der entsprechende W&auml;hrung wechseln ');
define('SEND_EXTRA_ORDER_EMAILS_TO_TITLE','Bestell E-Mails senden');
define('SEND_EXTRA_ORDER_EMAILS_TO_DESCRIPTION','zus&auml;tzliche Bestell E-Mails an folgende Adressen senden<br/>Format: Name 1 <email@addresse1>, Name 2 <email@addresse2>');
define('SEARCH_ENGINE_FRIENDLY_URLS_TITLE','suchmaschinenfreundliche URLs');
define('SEARCH_ENGINE_FRIENDLY_URLS_DESCRIPTION','suchmaschinenfreundliche URLs im Shop verwenden');
define('DISPLAY_CART_TITLE','Warenkorb nach neuem Produkt anzeigen');
define('DISPLAY_CART_DESCRIPTION','Nach dem hizuf&uuml;gen eines neuen Produktes wird der Warenkorb angezeigt (true), oder der Kunden bekonnt die Artikelseite wieder angezeigt (false).');
define('ALLOW_GUEST_TO_TELL_A_FRIEND_TITLE','G&auml;sten erlauben Artikel zu empfehlen');
define('ALLOW_GUEST_TO_TELL_A_FRIEND_DESCRIPTION','G&auml;sten erlauben Artikel per E-Mail Freunden und bekannten zu empfehlen');
define('ADVANCED_SEARCH_DEFAULT_OPERATOR_TITLE','Standard Suchoperator');
define('ADVANCED_SEARCH_DEFAULT_OPERATOR_DESCRIPTION','Standard Suchoperator');
define('STORE_NAME_ADDRESS_TITLE','Adresse und Telefonnummer');
define('STORE_NAME_ADDRESS_DESCRIPTION','Name, Addresse and Telefonnummer, die in Dokumenten benutzt und online angezeigt wird.');
define('SHOW_COUNTS_TITLE','Anzahl der Produkte in Kategorie anzeigen');
define('SHOW_COUNTS_DESCRIPTION','Zeigt die Anzahl der Produkte einer Kategorie in der Box "Kategorien" in Klammern hinter dem Kategorienamen an');
define('TAX_DECIMAL_PLACES_TITLE','Dezimalstellen MwSt');
define('TAX_DECIMAL_PLACES_DESCRIPTION','Gibt an, wieviele Stellen hinter dem Komma bei der Steuerberechnung ber&uuml;cksichtigt werden sollen. in Deutschland ist der Wert 2. ');
define('DISPLAY_PRICE_WITH_TAX_TITLE','Preise inkluive MwSt anzeigen');
define('DISPLAY_PRICE_WITH_TAX_DESCRIPTION','zeigt Preise inkluive MwSt an(true) oder addiert die mwSt am Ende hinzu (false)');
define('ENTRY_FIRST_NAME_MIN_LENGTH_TITLE','Vorname');
define('ENTRY_FIRST_NAME_MIN_LENGTH_DESCRIPTION','minimale L&auml;ge des Vornamens');
define('ENTRY_LAST_NAME_MIN_LENGTH_TITLE','Nachname');
define('ENTRY_LAST_NAME_MIN_LENGTH_DESCRIPTION','minimale L&auml;ge des Nachnamens');
define('ENTRY_DOB_MIN_LENGTH_TITLE','Geburtsdatum');
define('ENTRY_DOB_MIN_LENGTH_DESCRIPTION','minimale L&auml;ge des Geburtsdatums');
define('ENTRY_EMAIL_ADDRESS_MIN_LENGTH_TITLE','E-Mail Adresse');
define('ENTRY_EMAIL_ADDRESS_MIN_LENGTH_DESCRIPTION','minimale L&auml;ge der E-Mail Adresse');
define('ENTRY_STREET_ADDRESS_MIN_LENGTH_TITLE','Strasse');
define('ENTRY_STREET_ADDRESS_MIN_LENGTH_DESCRIPTION','minimale L&auml;ge des Strassennamens');
define('ENTRY_COMPANY_MIN_LENGTH_TITLE','Firma');
define('ENTRY_COMPANY_MIN_LENGTH_DESCRIPTION','minimale L&auml;ge des Firmennamens');
define('ENTRY_POSTCODE_MIN_LENGTH_TITLE','PLZ');
define('ENTRY_POSTCODE_MIN_LENGTH_DESCRIPTION','minimale L&auml;ge der Postleitzahl');
define('ENTRY_CITY_MIN_LENGTH_TITLE','Stadt');
define('ENTRY_CITY_MIN_LENGTH_DESCRIPTION','minimale L&auml;ge des St&auml;dtenamens');
define('ENTRY_STATE_MIN_LENGTH_TITLE','Bundesland');
define('ENTRY_STATE_MIN_LENGTH_DESCRIPTION','minimale L&auml;ge des Bundeslandnamens');
define('ENTRY_TELEPHONE_MIN_LENGTH_TITLE','Telefonnummer');
define('ENTRY_TELEPHONE_MIN_LENGTH_DESCRIPTION','minimale L&auml;ge der Telefonnummer');
define('ENTRY_PASSWORD_MIN_LENGTH_TITLE','Passwort');
define('ENTRY_PASSWORD_MIN_LENGTH_DESCRIPTION','minimale L&auml;ge des Passworts');
define('CC_OWNER_MIN_LENGTH_TITLE','Name Kreditkartenbesitzer');
define('CC_OWNER_MIN_LENGTH_DESCRIPTION','minimale L&auml;ge des Namen des Kreditkartenbesitzers');
define('CC_NUMBER_MIN_LENGTH_TITLE','Kreditkartennummer');
define('CC_NUMBER_MIN_LENGTH_DESCRIPTION','minimale L&auml;ge der Kreditkartennummer');
define('REVIEW_TEXT_MIN_LENGTH_TITLE','Bewertungstext');
define('REVIEW_TEXT_MIN_LENGTH_DESCRIPTION','minimale L&auml;ge des Bewertungstextes');
define('MIN_DISPLAY_BESTSELLERS_TITLE','meist verkaufte Produkte');
define('MIN_DISPLAY_BESTSELLERS_DESCRIPTION','Anzahl von Bestellungen, damit ein Produkt in der Liste "meist verkaufte Produkte" erscheint.');
define('MIN_DISPLAY_ALSO_PURCHASED_TITLE','auch gekaufte Produkte');
define('MIN_DISPLAY_ALSO_PURCHASED_DESCRIPTION','Anzahl von Bestellungen, damit ein Produkt in der Liste "auch gekaufte Produkte" erscheint.');
define('MAX_ADDRESS_BOOK_ENTRIES_TITLE','Eintr&auml;ge Adressbuch');
define('MAX_ADDRESS_BOOK_ENTRIES_DESCRIPTION','Maximale Anzahl der Eintr&auml;ge im Adressbuch eines Kunden');
define('MAX_DISPLAY_SEARCH_RESULTS_TITLE','Anzahl Produkte');
define('MAX_DISPLAY_SEARCH_RESULTS_DESCRIPTION','Maximale Anzahl der Produkte, die auf einer Zeite angezeigt werden');
define('MAX_DISPLAY_PAGE_LINKS_TITLE','Seiten');
define('MAX_DISPLAY_PAGE_LINKS_DESCRIPTION','Anzahl der Seiten vor "weitere Seiten".<br/> z.B.: 2 -> "Seiten 1 2 [n&auml;chste >>]" ');
define('MAX_DISPLAY_SPECIAL_PRODUCTS_TITLE','Angebote');
define('MAX_DISPLAY_SPECIAL_PRODUCTS_DESCRIPTION','Maximale Anzahl der Angebote, die auf einer Seite angezeigt werden. Wenn mehr Angebote vorhanden sind, wird eine Seitennavigation eingeblendet.');
define('MAX_DISPLAY_NEW_PRODUCTS_TITLE','neue Produkte');
define('MAX_DISPLAY_NEW_PRODUCTS_DESCRIPTION','Maximale Anzahl der neuen Produkte, die in einer Kategorie angezeigt werden.');
define('MAX_DISPLAY_UPCOMING_PRODUCTS_TITLE','erwartete Produkte');
define('MAX_DISPLAY_UPCOMING_PRODUCTS_DESCRIPTION','Maximale Anzahl der "erwarteten Produkte", die angezeigt werden.');
define('MAX_DISPLAY_MANUFACTURERS_IN_A_LIST_TITLE','Herstellerliste');
define('MAX_DISPLAY_MANUFACTURERS_IN_A_LIST_DESCRIPTION','Wenn die Anzahl der Hersteller gr&ouml;&szlig;er ist, als die hier angegebene Zahl, wir eine DropDown-Box statt einer Liste beim Produkt angezeigt.');
define('MAX_MANUFACTURERS_LIST_TITLE','Anzeige Hersteller in Box "Hersteller"');
define('MAX_MANUFACTURERS_LIST_DESCRIPTION','Bei einem Wert von 1, wird weine Drop-Down Box angezeigt. Ansonsten wird eine List Box mit der dem Wert entsprechenden Anzahl von Herstellern angezeigt.');
define('MAX_DISPLAY_MANUFACTURER_NAME_LEN_TITLE','L&auml;nge des Herstellernamens');
define('MAX_DISPLAY_MANUFACTURER_NAME_LEN_DESCRIPTION','Maximale L&auml;nge des Herstellernamens, die angezeigt wird.');
define('MAX_DISPLAY_NEW_REVIEWS_TITLE','Bewertungen');
define('MAX_DISPLAY_NEW_REVIEWS_DESCRIPTION','Maximale Anzahl der neuen Berwertungen, die angezeigt werden');
define('MAX_RANDOM_SELECT_REVIEWS_TITLE','Auswahl Box "Produktbewertung"');
define('MAX_RANDOM_SELECT_REVIEWS_DESCRIPTION','Anzahl der Datens&auml;tze, aus denen per Zufall eine Produktebewertung ausgew&auml;hlt wird.');
define('MAX_RANDOM_SELECT_NEW_TITLE','Auswahl Box "neue Produkte"');
define('MAX_RANDOM_SELECT_NEW_DESCRIPTION','Anzahl der Datens&auml;tze, aus denen per Zufall ein neues Produkt ausgew&auml;hlt wird.');
define('MAX_RANDOM_SELECT_SPECIALS_TITLE','Auswahl "Box Angebote"');
define('MAX_RANDOM_SELECT_SPECIALS_DESCRIPTION','Anzahl der Datens&auml;tze, aus denen per Zufall ein Angebot ausgew&auml;hlt wird.');
define('MAX_DISPLAY_CATEGORIES_PER_ROW_TITLE','Kategorien pro Zeile');
define('MAX_DISPLAY_CATEGORIES_PER_ROW_DESCRIPTION','Anzahl der Kategorie, die in einer Zeile angezeigt werden.');
define('MAX_DISPLAY_PRODUCTS_NEW_TITLE','Anzahl neuer Produkte');
define('MAX_DISPLAY_PRODUCTS_NEW_DESCRIPTION','Anzahl der Produkte, die auf der Seite "neue Produkte" angezeigt wird.<br/><br/>Wenn die Anzahl der vorhandenen neuen Produkte gr&ouml;sser ist, als der hier eingetragene Wert, wird eine Seitennavigation (Seiten: 1 2 3) eingeblendet.');
define('MAX_DISPLAY_BESTSELLERS_TITLE','meistverkaufte Produkte');
define('MAX_DISPLAY_BESTSELLERS_DESCRIPTION','Maximale Anzahl der "meistverkauften Produkte", die angezeigt werden.');
define('MAX_DISPLAY_ALSO_PURCHASED_TITLE','auch gekaufte Produkte');
define('MAX_DISPLAY_ALSO_PURCHASED_DESCRIPTION','Maximale Anzahl der "auch gekauften Produkte", die anzgezeigt werden.');
define('MAX_DISPLAY_PRODUCTS_IN_ORDER_HISTORY_BOX_TITLE','Bestellhistorie Kunde');
define('MAX_DISPLAY_PRODUCTS_IN_ORDER_HISTORY_BOX_DESCRIPTION','Maximale Anzahl von Produkten, die in der Bestellhistorie des Kunden angezeigt wird.');
define('MAX_DISPLAY_ORDER_HISTORY_TITLE','Bestell&uuml;bersicht');
define('MAX_DISPLAY_ORDER_HISTORY_DESCRIPTION','Maximale Anzahl der Bestellungen eines Kunden f&uuml;r ein Produkt.');
define('MAX_QTY_IN_CART_TITLE','Produktmenge im Warenkorb');
define('MAX_QTY_IN_CART_DESCRIPTION','Maximale Anzahl, die ein K&auml;fer von einem Produkt bestellen kann.(0 f&uuml;r unbegrenzte Anzahl.)');
define('SMALL_IMAGE_WIDTH_TITLE','Breite kleines Bild');
define('SMALL_IMAGE_WIDTH_DESCRIPTION','Breite in Pixel eines kleinen Bildes');
define('SMALL_IMAGE_HEIGHT_TITLE','H&ouml;he kleines Bild');
define('SMALL_IMAGE_HEIGHT_DESCRIPTION','H&ouml;he in Pixeln eines kleinen Bildes');
define('HEADING_IMAGE_WIDTH_TITLE','Breite Bild Hauptkategorie');
define('HEADING_IMAGE_WIDTH_DESCRIPTION','Breite in Pixel eines Bildes einer Hauptkategorie');
define('HEADING_IMAGE_HEIGHT_TITLE','H&ouml;he Bild Hauptkategorie');
define('HEADING_IMAGE_HEIGHT_DESCRIPTION','H&ouml;he in Pixel eines Bildes einer Hauptkategorie');
define('SUBCATEGORY_IMAGE_WIDTH_TITLE','Breite Bild Unterkategorie');
define('SUBCATEGORY_IMAGE_WIDTH_DESCRIPTION','Breite in Pixel eines Bildes einer Unterkategorie');
define('SUBCATEGORY_IMAGE_HEIGHT_TITLE','H&ouml;he Bild Unterkategorie');
define('SUBCATEGORY_IMAGE_HEIGHT_DESCRIPTION','H&ouml;he in Pixel eines Bildes einer Unterkategorie');
define('CONFIG_CALCULATE_IMAGE_SIZE_TITLE','Bildgr&ouml;&szlig;e anpassen');
define('CONFIG_CALCULATE_IMAGE_SIZE_DESCRIPTION','Gr&ouml;�ere Bilder werden automatisch angepasst.');
define('IMAGE_REQUIRED_TITLE','Bilder sind Pflicht');
define('IMAGE_REQUIRED_DESCRIPTION','Einschalten um fehlende Bilder zu sehen. Gut f&uuml;r die Entwicklung..');
define('ACCOUNT_GENDER_TITLE','Geschlecht');
define('ACCOUNT_GENDER_DESCRIPTION','Geschlecht beim Neukunde anzeigen');
define('ACCOUNT_DOB_TITLE','Geburtsdatum');
define('ACCOUNT_DOB_DESCRIPTION','Geburtsdatum beim Neukunde anzeigen ');
define('ACCOUNT_COMPANY_TITLE','Firma');
define('ACCOUNT_COMPANY_DESCRIPTION','Firma beim Neukunde anzeigen');
define('ACCOUNT_SUBURB_TITLE','Stadtteil');
define('ACCOUNT_SUBURB_DESCRIPTION','Stadtteil beim Neukunde anzeigen');
define('ACCOUNT_STATE_TITLE','Bundesland');
define('ACCOUNT_STATE_DESCRIPTION','Bundesland beim Neukunde anzeigen');
define('DEFAULT_CURRENCY_TITLE','W&auml;hrung');
define('DEFAULT_CURRENCY_DESCRIPTION','Standardw&auml;hrung');
define('DEFAULT_LANGUAGE_TITLE','Sprache');
define('DEFAULT_LANGUAGE_DESCRIPTION','Sprache');
define('DEFAULT_ORDERS_STATUS_ID_TITLE','Auftragsstatus f&uuml;r neue Bestellungen');
define('DEFAULT_ORDERS_STATUS_ID_DESCRIPTION','Bei einer neuen Bestellung wird sie automatisch auf diesen Status gesetzt.');
define('SHIPPING_ORIGIN_COUNTRY_TITLE','Herstellungsland');
define('SHIPPING_ORIGIN_COUNTRY_DESCRIPTION','Das Land, aus dem die Ware versendet wird.');
define('SHIPPING_ORIGIN_ZIP_TITLE','PLZ');
define('SHIPPING_ORIGIN_ZIP_DESCRIPTION','Postleitzahl des Shops f&uuml;r Versandangaben');
define('SHIPPING_MAX_WEIGHT_TITLE','Maximales Paketgewicht');
define('SHIPPING_MAX_WEIGHT_DESCRIPTION','Das maximale Paketgewicht, das versendet wird.');
define('SHIPPING_BOX_WEIGHT_TITLE','Nettogewicht Verpackung');
define('SHIPPING_BOX_WEIGHT_DESCRIPTION','Das Nettogewicht der Verpackung');
define('SHIPPING_BOX_PADDING_TITLE','Prozentualer Aufpreis f&uuml;r gro&szlig;e Pakete');
define('SHIPPING_BOX_PADDING_DESCRIPTION','F&uuml;r 10% 10 eingeben. ');
define('SHIPPING_ALLOW_UNDEFINED_ZONES_TITLE','Bestellungen aus nicht definierten Zonen erlauben');
define('SHIPPING_ALLOW_UNDEFINED_ZONES_DESCRIPTION','Sollen Bestellungen aus L&auml;ndern erlaubt werden, die nicht im Versandmodul definiert sind?');
define('PRODUCT_LIST_IMAGE_TITLE','Produktbild in Produktlisten anzeigen');
define('PRODUCT_LIST_IMAGE_DESCRIPTION','1 -> Produktbild anzeigen <br/> 0 -> Produktbild nicht anzeigen');
define('PRODUCT_LIST_MANUFACTURER_TITLE','Hersteller in Produktlisten anzeigen');
define('PRODUCT_LIST_MANUFACTURER_DESCRIPTION','1 -> Hersteller anzeigen <br/> 0 -> Hersteller nicht anzeigen');
define('PRODUCT_LIST_MODEL_TITLE','Modell in Produktlisten anzeigen');
define('PRODUCT_LIST_MODEL_DESCRIPTION','1 -> Modell anzeigen <br/> 0 -> Modell nicht anzeigen');
define('PRODUCT_LIST_NAME_TITLE','Name in Produktlisten anzeigen');
define('PRODUCT_LIST_NAME_DESCRIPTION','1 -> Name anzeigen <br/> 0 -> Name nicht anzeigen');
define('PRODUCT_LIST_PRICE_TITLE','Preis in Produktlisten anzeigen');
define('PRODUCT_LIST_PRICE_DESCRIPTION','1 -> Preis anzeigen <br/> 0 -> Preis nicht anzeigen');
define('PRODUCT_LIST_QUANTITY_TITLE','verf&uuml;gbare Menge in Produktlisten anzeigen');
define('PRODUCT_LIST_QUANTITY_DESCRIPTION','1 -> Menge anzeigen <br/> 0 -> Menge nicht anzeigen');
define('PRODUCT_LIST_WEIGHT_TITLE','Gewicht in Produktlisten anzeigen');
define('PRODUCT_LIST_WEIGHT_DESCRIPTION','1 -> Gewicht anzeigen <br/> 0-> Gewicht nicht anzeigen');
define('PRODUCT_LIST_BUY_NOW_TITLE','Spalte "jetzt kaufen" in Produktlisten anzeigen');
define('PRODUCT_LIST_BUY_NOW_DESCRIPTION','Wollen Sie die Spalte "jetzt Kaufen" anzeigen?');
define('PRODUCT_LIST_FILTER_TITLE','Kategoriefilter/Herstellerfilter in Produktlisten anzeigen ');
define('PRODUCT_LIST_FILTER_DESCRIPTION','Wollen Sie den Kategoriefilter/Herstellefilter anzeigen? <br/> 0=nein <br/> 1=ja');
define('PREV_NEXT_BAR_LOCATION_TITLE','Darstellungsort n&auml;chste/vorhergehende Seite in Produktlisten (1-oben, 2-unten, 3-unten und oben)');
define('PREV_NEXT_BAR_LOCATION_DESCRIPTION','Darstellungsort n&auml;chste/vorhergehende Seite <br/> 1=oben <br/> 2=unten <br/> 3=unten und oben');
define('STOCK_CHECK_TITLE','"Lagermenge pr&uuml;fen"');
define('STOCK_CHECK_DESCRIPTION','Pr&uuml;fen, ob von einem Produkt bei einer Bestellung eine gen&uuml;gende Menge vorhanden ist. Wenn nicht, wird das dem Kunden angezeigt. ');
define('STOCK_LIMITED_TITLE','Bestellung von Lagermenge abziehen');
define('STOCK_LIMITED_DESCRIPTION','Bestellte Produkte werden von der Lagermenge abgezogen');
define('STOCK_ALLOW_CHECKOUT_TITLE','Artikel ohne Lagerbestand verkaufen');
define('STOCK_ALLOW_CHECKOUT_DESCRIPTION','Erlaubt es dem Kunden auch Artikel zu bestellen, deren Lagerbestand 0 ist.');
define('STOCK_MARK_PRODUCT_OUT_OF_STOCK_TITLE','Produkte ohne Lagerbestand ');
define('STOCK_MARK_PRODUCT_OUT_OF_STOCK_DESCRIPTION','Markierung f&uuml;r Produkte ohne Lagerbestand. ');
define('STOCK_REORDER_LEVEL_TITLE','Nachbestellungsmenge');
define('STOCK_REORDER_LEVEL_DESCRIPTION','Anzahl, ab der ein Artikel nachbestellt werden soll. Noch nicht im System implementiert.');
define('STORE_PAGE_PARSE_TIME_TITLE','Zeit Seitenaufbau speichern');
define('STORE_PAGE_PARSE_TIME_DESCRIPTION','Speichert die Zeit, die das System braucht um die Seite aufzubauen');
define('STORE_PAGE_PARSE_TIME_LOG_TITLE','Protokolldatei f&uuml;r Zeit Seitenaufbau');
define('STORE_PAGE_PARSE_TIME_LOG_DESCRIPTION','Verzeichnis und Dateiname, in der die Zeiten f&uuml;r den Seitenaufbau gespeichert werden soll.');
define('STORE_PARSE_DATE_TIME_FORMAT_TITLE','Datumsformat');
define('STORE_PARSE_DATE_TIME_FORMAT_DESCRIPTION','Das Datumsformat');
define('DISPLAY_PAGE_PARSE_TIME_TITLE','Zeit f&uuml;r Seitenaufbau anzeigen');
define('DISPLAY_PAGE_PARSE_TIME_DESCRIPTION','Zeigt die Zeit f&uuml;r den Seitenaufbau online an ("Zeit Seitenaufbau speichern" muss aktiviert sein)');
define('STORE_DB_TRANSACTIONS_TITLE','Datenbankabfragen speichern');
define('STORE_DB_TRANSACTIONS_DESCRIPTION','Datenbankabfragen mit in Log-Datei speichern');
define('USE_CACHE_TITLE','Zwischenspeichern benutzen');
define('USE_CACHE_DESCRIPTION','Zwischenspeicher wird benutzt, um Seitenaufbau zu beschleunigen.');
define('DIR_FS_CACHE_TITLE','Verzeichnis Zwischenspeicher');
define('DIR_FS_CACHE_DESCRIPTION','Das Verzeichnis in dem die Dateien f&uuml;r den Zwischenspeicher abgelegt werden.');
define('EMAIL_TRANSPORT_TITLE','E-Mail Transportmethode');
define('EMAIL_TRANSPORT_DESCRIPTION','Definiert die Methode, wie E-Mails versendet werden. Die Einstellung "sendmail" versendet die E-Mails &uuml;ber den lokalen Sendmail-Dienst. Alternativ k&ouml;nnen mit dem Wert "SMTP" die E-Mails &uuml;ber TCP/IP per SMTP versendet werden.');
define('EMAIL_LINEFEED_TITLE','E-Mail Zeilenumbruch');
define('EMAIL_LINEFEED_DESCRIPTION','Definiert die Zeichne, die in den E-Mails als Zeilenumruch verwendet werden.');
define('EMAIL_USE_HTML_TITLE','E-Mails als MIME HTML versenden');
define('EMAIL_USE_HTML_DESCRIPTION','E-Mails im HTML-Format versenden');
define('ENTRY_EMAIL_ADDRESS_CHECK_TITLE','E-Mail Adresse mit DNS verifizieren');
define('ENTRY_EMAIL_ADDRESS_CHECK_DESCRIPTION','E-Mail Adressen mittles eine DNS-Servers verifizieren. ');
define('SEND_EMAILS_TITLE','E-Mails bei Bestellung versenden');
define('SEND_EMAILS_DESCRIPTION','Sendet automatische E-Mails bei einer Produktbestellung.');
define('DOWNLOAD_ENABLED_TITLE','Download erm&ouml;glichen');
define('DOWNLOAD_ENABLED_DESCRIPTION','Erm&ouml;glicht es Produkte als Download anzubieten.');
define('DOWNLOAD_BY_REDIRECT_TITLE','Download &uuml;ber Umleitung');
define('DOWNLOAD_BY_REDIRECT_DESCRIPTION','Benutzt eine Browserumleitung f&uuml;r den Download. Abgeschaltet bei Unix-Systemen.');
define('DOWNLOAD_MAX_DAYS_TITLE','Zeitspanne (Tage)');
define('DOWNLOAD_MAX_DAYS_DESCRIPTION','Gibt die Zeitspanne in Tagen an, bis wann der Download erfolgen kann.. 0 bedeutet keine Begrenzung.');
define('DOWNLOAD_MAX_COUNT_TITLE','Maximale Anzahl von Downloads');
define('DOWNLOAD_MAX_COUNT_DESCRIPTION','Gibt die maimale Anzahl der Downloads f&uuml;r ein Produkt an. 0 bedeutet keine Begrenzung.');
define('GZIP_COMPRESSION_TITLE','GZip Kompression benutzen');
define('GZIP_COMPRESSION_DESCRIPTION','Dateien werden vom Server GZip komprimiert an den Browser gesendet. Wenn der Browser die Funktion nicht unterst&uuml;tzt, werden die Seiten normal versendet.');
define('GZIP_LEVEL_TITLE','Kompressionsstufe');
define('GZIP_LEVEL_DESCRIPTION','Kompressionsstufe 0-9 (0 = Minimum, 9 = Maximum).');
define('SESSION_WRITE_DIRECTORY_TITLE','Session Verzeichnis');
define('SESSION_WRITE_DIRECTORY_DESCRIPTION','Dateibasierte Sessions werden in diesem Verzeichnis gespeichert.');
define('SESSION_FORCE_COOKIE_USE_TITLE','Cookies benutzen');
define('SESSION_FORCE_COOKIE_USE_DESCRIPTION','Cookies f&uuml;r den Shop benutzen.');
define('SESSION_CHECK_SSL_SESSION_ID_TITLE','SSL Session ID &uuml;berpr&uuml;fen');
define('SESSION_CHECK_SSL_SESSION_ID_DESCRIPTION','Die SSL_SESSION_ID bei jeder HTTPS-Verbindung &uuml;berpr&uuml;fen.');
define('SESSION_CHECK_USER_AGENT_TITLE','User Agent &uuml;berpr&uum;fen');
define('SESSION_CHECK_USER_AGENT_DESCRIPTION','Die Browserversion des Kunden bei jedem Seitenaufruf &uuml;berpr&uuml;fen. ');
define('SESSION_CHECK_IP_ADDRESS_TITLE','IP-Addresse pr&uuml;fen');
define('SESSION_CHECK_IP_ADDRESS_DESCRIPTION','Die IP-Addresse des Kunden bei jedem Seitenaufruf &uuml;berpr&uuml;fen.');
define('SESSION_BLOCK_SPIDERS_TITLE','Spider Sessions ablehnen');
define('SESSION_BLOCK_SPIDERS_DESCRIPTION','Verhindert das starten von Sessions f&uuml;r bekannte Spider.');
define('SESSION_RECREATE_TITLE','neue Session erstellen');
define('SESSION_RECREATE_DESCRIPTION','Erstellt eine neue Session, wenn der Kunde sich anmeldet oder ein neues Kundenkoto erstellt. (ben&ouml;tigt PHP >=4.1).');
define('LAST_UPDATE_CHECK_TIME_TITLE','zuletzt auf Updates gepr&uuml;ft');
define('LAST_UPDATE_CHECK_TIME_DESCRIPTION','Der letzte Zeitpunkt, als auf eine neuer Version von osCommerce gep&uuml;ft wurde.');

// modules action recorder
define('MODULE_ACTION_RECORDER_CONTACT_US_EMAIL_MINUTES_TITLE','Anzahl Minuten zwischen zwei E-Mails pro IP-Adresse');
define('MODULE_ACTION_RECORDER_CONTACT_US_EMAIL_MINUTES_DESCRIPTION','Zeitspanne, in der es erlaubt ist, eine E-Mail pro IP-Adresse zu senden. (z.B.: 15 f&uuml;r eine E-Mail alle 15 Minuten)');
define('MODULE_ACTION_RECORDER_TELL_A_FRIEND_EMAIL_MINUTES_TITLE','Anzahl Minuten zwischen zwei E-Mails pro IP-Adresse');
define('MODULE_ACTION_RECORDER_TELL_A_FRIEND_EMAIL_MINUTES_DESCRIPTION','Zeitspanne, in der es erlaubt ist, eine E-Mail pro IP-Adresse zu senden. (z.B.: 15 f&uuml;r eine E-Mail alle 15 Minuten)');
define('MODULE_ACTION_RECORDER_ADMIN_LOGIN_ATTEMPTS_TITLE','erlaubte Versuche');
define('MODULE_ACTION_RECORDER_ADMIN_LOGIN_ATTEMPTS_DESCRIPTION','Anzahl der erlaubten Fehlversuche in der angegebenen Zeitspanne.');
define('MODULE_ACTION_RECORDER_ADMIN_LOGIN_MINUTES_TITLE','Anzahl Minuten');
define('MODULE_ACTION_RECORDER_ADMIN_LOGIN_MINUTES_DESCRIPTION','Zeitspanne, in der die unten angegebene Anzahl von Fehlversuchen erlaubt ist.');
define('MODULE_ACTION_RECORDER_INSTALLED_TITLE','installierte Module');
define('MODULE_ACTION_RECORDER_INSTALLED_DESCRIPTION','Liste von action recorder Modulen, getrennt durch ein Semikolon. Diese Liste wird automatisch aktualisiert. Bitte nicht bearbeiten.');


// modules boxes
define('MODULE_BOXES_INSTALLED_TITLE','installierte Module');
define('MODULE_BOXES_INSTALLED_DESCRIPTION','Liste von Modulen f&uuml;r den Shop, getrennt durch ein Semikolon. Diese Liste wird automatisch aktuallisiert. Bitte nicht bearbeiten.');
define('MODULE_BOXES_BEST_SELLERS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_BOXES_BEST_SELLERS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert zuerst.');
define('MODULE_BOXES_CATEGORIES_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_BOXES_CATEGORIES_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert zuerst.');
define('MODULE_BOXES_CATEGORIES_CONTENT_PLACEMENT_TITLE','Anordnung');
define('MODULE_BOXES_CATEGORIES_CONTENT_PLACEMENT_DESCRIPTION','Soll die Box in der linken oder der rechten Spalte erscheinen?');
define('MODULE_BOXES_CATEGORIES_STATUS_TITLE','Box "Kategorien" anzeigen');
define('MODULE_BOXES_CATEGORIES_STATUS_DESCRIPTION','Soll die Box "Kategorien" im Shop angezeigt werden?');
define('MODULE_BOXES_CURRENCIES_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_BOXES_CURRENCIES_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert zuerst.');
define('MODULE_BOXES_CURRENCIES_CONTENT_PLACEMENT_TITLE','Anordnung');
define('MODULE_BOXES_CURRENCIES_CONTENT_PLACEMENT_DESCRIPTION','Soll die Box in der linken oder der rechten Spalte erscheinen?');
define('MODULE_BOXES_CURRENCIES_STATUS_TITLE','Box "W&auml;hrungen" anzeigen');
define('MODULE_BOXES_CURRENCIES_STATUS_DESCRIPTION','Soll die Box "W&auml;hrungen" im Shop angezeigt werden?');
define('MODULE_BOXES_INFORMATION_CONTENT_PLACEMENT_TITLE','Anordnung');
define('MODULE_BOXES_INFORMATION_CONTENT_PLACEMENT_DESCRIPTION','Soll die Box in der linken oder der rechten Spalte erscheinen?');
define('MODULE_BOXES_INFORMATION_STATUS_TITLE','Box "Informationen" anzeigen');
define('MODULE_BOXES_INFORMATION_STATUS_DESCRIPTION','Soll die Box "Informationen" im Shop angezeigt werden?');
define('MODULE_BOXES_LANGUAGES_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_BOXES_LANGUAGES_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert zuerst.');
define('MODULE_BOXES_LANGUAGES_CONTENT_PLACEMENT_TITLE','Anordnung');
define('MODULE_BOXES_LANGUAGES_CONTENT_PLACEMENT_DESCRIPTION','Soll die Box in der linken oder der rechten Spalte erscheinen?');
define('MODULE_BOXES_LANGUAGES_STATUS_TITLE','Box "Sprachen" anzeigen');
define('MODULE_BOXES_LANGUAGES_STATUS_DESCRIPTION','Soll die Box "Sprachen" im Shop angezeigt werden?');
define('MODULE_BOXES_MANUFACTURER_INFO_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_BOXES_MANUFACTURER_INFO_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert zuerst.');
define('MODULE_BOXES_MANUFACTURER_INFO_CONTENT_PLACEMENT_TITLE','Anordnung');
define('MODULE_BOXES_MANUFACTURER_INFO_CONTENT_PLACEMENT_DESCRIPTION','Soll die Box in der linken oder der rechten Spalte erscheinen?');
define('MODULE_BOXES_MANUFACTURER_INFO_STATUS_TITLE','Box "Herstellerinformationen" anzeigen');
define('MODULE_BOXES_MANUFACTURER_INFO_STATUS_DESCRIPTION','Soll die Box "Herstellerinformationen" im Shop angezeigt werden?');
define('MODULE_BOXES_MANUFACTURERS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_BOXES_MANUFACTURERS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert zuerst.');
define('MODULE_BOXES_MANUFACTURERS_CONTENT_PLACEMENT_TITLE','Anordnung');
define('MODULE_BOXES_MANUFACTURERS_CONTENT_PLACEMENT_DESCRIPTION','Soll die Box in der linken oder der rechten Spalte erscheinen?');
define('MODULE_BOXES_MANUFACTURERS_STATUS_TITLE','Box "Hersteller" anzeigen');
define('MODULE_BOXES_MANUFACTURERS_STATUS_DESCRIPTION','Soll die Box "Hersteller" im Shop angezeigt werden?');
define('MODULE_BOXES_ORDER_HISTORY_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_BOXES_ORDER_HISTORY_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert zuerst.');
define('MODULE_BOXES_ORDER_HISTORY_STATUS_TITLE','Box "Bestellhistorie" angezeigen');
define('MODULE_BOXES_ORDER_HISTORY_STATUS_DESCRIPTION','Soll die Box "Bestellhistorie" im Shop angezeigt werden?');
define('MODULE_BOXES_ORDER_HISTORY_CONTENT_PLACEMENT_TITLE','Anordnung');
define('MODULE_BOXES_ORDER_HISTORY_CONTENT_PLACEMENT_DESCRIPTION','Soll die Box in der linken oder der rechten Spalte erscheinen?');
define('MODULE_BOXES_PRODUCT_NOTIFICATIONS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_BOXES_PRODUCT_NOTIFICATIONS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert zuerst.');
define('MODULE_BOXES_PRODUCT_NOTIFICATIONS_STATUS_TITLE','Box "Produktbenachrichtigung" angezeigen');
define('MODULE_BOXES_PRODUCT_NOTIFICATIONS_STATUS_DESCRIPTION','Soll die Box "Produktbenachrichtigung" im Shop angezeigt werden?');
define('MODULE_BOXES_PRODUCT_NOTIFICATIONS_CONTENT_PLACEMENT_TITLE','Anordnung');
define('MODULE_BOXES_PRODUCT_NOTIFICATIONS_CONTENT_PLACEMENT_DESCRIPTION','Soll die Box in der linken oder der rechten Spalte erscheinen?');
define('MODULE_BOXES_PRODUCT_SOCIAL_BOOKMARKS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_BOXES_PRODUCT_SOCIAL_BOOKMARKS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert zuerst.');
define('MODULE_BOXES_PRODUCT_SOCIAL_BOOKMARKS_STATUS_TITLE','Box "Facebook & Co" angezeigen');
define('MODULE_BOXES_PRODUCT_SOCIAL_BOOKMARKS_STATUS_DESCRIPTION','Soll die Box "Facebook & Co" im Shop angezeigt werden?');
define('MODULE_BOXES_PRODUCT_SOCIAL_BOOKMARKS_CONTENT_PLACEMENT_TITLE','Anordnung');
define('MODULE_BOXES_PRODUCT_SOCIAL_BOOKMARKS_CONTENT_PLACEMENT_DESCRIPTION','Soll die Box in der linken oder der rechten Spalte erscheinen?');
define('MODULE_BOXES_REVIEWS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_BOXES_REVIEWS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert zuerst.');
define('MODULE_BOXES_REVIEWS_CONTENT_PLACEMENT_TITLE','Anordnung');
define('MODULE_BOXES_REVIEWS_CONTENT_PLACEMENT_DESCRIPTION','Soll die Box in der linken oder der rechten Spalte erscheinen?');
define('MODULE_BOXES_REVIEWS_STATUS_TITLE','Box "Bewertungen" angezeigen');
define('MODULE_BOXES_REVIEWS_STATUS_DESCRIPTION','Soll die Box "Bewertungen" im Shop angezeigt werden?');
define('MODULE_BOXES_SEARCH_CONTENT_PLACEMENT_TITLE','Anordnung');
define('MODULE_BOXES_SEARCH_CONTENT_PLACEMENT_DESCRIPTION','Soll die Box in der linken oder der rechten Spalte erscheinen?');
define('MODULE_BOXES_SEARCH_STATUS_TITLE','Box "Schnellsuche" angezeigen');
define('MODULE_BOXES_SEARCH_STATUS_DESCRIPTION','Soll die Box "Schnellsuche" im Shop angezeigt werden?');
define('MODULE_BOXES_SHOPPING_CART_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_BOXES_SHOPPING_CART_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert zuerst.');
define('MODULE_BOXES_SHOPPING_CART_CONTENT_PLACEMENT_TITLE','Anordnung');
define('MODULE_BOXES_SHOPPING_CART_CONTENT_PLACEMENT_DESCRIPTION','Soll die Box in der linken oder der rechten Spalte erscheinen?');
define('MODULE_BOXES_SHOPPING_CART_STATUS_TITLE','Box "Einkaufswagen" angezeigen');
define('MODULE_BOXES_SHOPPING_CART_STATUS_DESCRIPTION','Soll die Box "Einkaufswagen" im Shop angezeigt werden?');
define('MODULE_BOXES_SPECIALS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_BOXES_SPECIALS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert zuerst.');
define('MODULE_BOXES_SPECIALS_CONTENT_PLACEMENT_TITLE','Anordnung');
define('MODULE_BOXES_SPECIALS_CONTENT_PLACEMENT_DESCRIPTION','Soll die Box in der linken oder der rechten Spalte erscheinen?');
define('MODULE_BOXES_SPECIALS_STATUS_TITLE','Box "Angebote" angezeigen');
define('MODULE_BOXES_SPECIALS_STATUS_DESCRIPTION','Soll die Box "Angebote" im Shop angezeigt werden?');
define('MODULE_BOXES_WHATS_NEW_CONTENT_PLACEMENT_TITLE','Anordnung');
define('MODULE_BOXES_WHATS_NEW_CONTENT_PLACEMENT_DESCRIPTION','Soll die Box in der linken oder der rechten Spalte erscheinen?');
define('MODULE_BOXES_WHATS_NEW_STATUS_TITLE','Box "neue Produkte" angezeigen');
define('MODULE_BOXES_WHATS_NEW_STATUS_DESCRIPTION','Soll die Box "neue Produkte" im Shop angezeigt werden?');
define('TEMPLATE_BLOCK_GROUPS_TITLE','installierte Template Gruppen');
define('TEMPLATE_BLOCK_GROUPS_DESCRIPTION','Diese Liste wird automatisch aktualisiert. Bitte nicht bearbeiten.');
define('MODULE_BOXES_BEST_SELLERS_STATUS_TITLE','Box "meistgekaufte Produkte" anzeigen');
define('MODULE_BOXES_BEST_SELLERS_STATUS_DESCRIPTION','Soll die Box "meistgekaufte Produkte" im Shop angezeigt werden?');
define('MODULE_BOXES_BEST_SELLERS_CONTENT_PLACEMENT_TITLE','Anordnung');
define('MODULE_BOXES_BEST_SELLERS_CONTENT_PLACEMENT_DESCRIPTION','Soll die Box in der linken oder der rechten Spalte erscheinen?');
define('MODULE_BOXES_INFORMATION_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_BOXES_INFORMATION_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert zuerst.');
define('MODULE_BOXES_SEARCH_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_BOXES_SEARCH_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert zuerst.');
define('MODULE_BOXES_WHATS_NEW_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_BOXES_WHATS_NEW_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert zuerst.');

//modules dashboard
define('MODULE_ADMIN_DASHBOARD_INSTALLED_TITLE','installierte Dashboardmodule');
define('MODULE_ADMIN_DASHBOARD_INSTALLED_DESCRIPTION','Liste der installierten Dashboard Module, getrennt durch ein Semikolon. Dieser Wert wird automatisch aktuallisiert. Bitte nicht bearbeiten.');
define('MODULE_ADMIN_DASHBOARD_ADMIN_LOGINS_STATUS_TITLE','Anmeldungen Administrator anzeigen');
define('MODULE_ADMIN_DASHBOARD_ADMIN_LOGINS_STATUS_DESCRIPTION','Sollen die letzten Anmeldungen des Administrators im Dashboard angezeigt werden?');
define('MODULE_ADMIN_DASHBOARD_ADMIN_LOGINS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_ADMIN_LOGINS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_CUSTOMERS_STATUS_TITLE','Kunden auf Dashboard anzeigen ');
define('MODULE_ADMIN_DASHBOARD_CUSTOMERS_STATUS_DESCRIPTION','Sollen neue Kunden auf den Dashboard angezeigt werden?');
define('MODULE_ADMIN_DASHBOARD_CUSTOMERS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_CUSTOMERS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_LATEST_ADDONS_STATUS_TITLE','neuste Module auf Dashboard anzeigen ');
define('MODULE_ADMIN_DASHBOARD_LATEST_ADDONS_STATUS_DESCRIPTION','Sollen die neusten Module auf den Dashboard angezeigt werden? ');
define('MODULE_ADMIN_DASHBOARD_LATEST_ADDONS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_LATEST_ADDONS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_LATEST_NEWS_STATUS_TITLE','aktuelle Meldungen auf Dashboard anzeigen');
define('MODULE_ADMIN_DASHBOARD_LATEST_NEWS_STATUS_DESCRIPTION','Sollen aktuelle Meldungen auf den Dashboard angezeigt werden?');
define('MODULE_ADMIN_DASHBOARD_LATEST_NEWS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_LATEST_NEWS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_ORDERS_STATUS_TITLE','Bestellungen auf Dashboard anzeigen');
define('MODULE_ADMIN_DASHBOARD_ORDERS_STATUS_DESCRIPTION','Sollen die letzten Bestellungen auf dem Dashboard angezeigt werden?');
define('MODULE_ADMIN_DASHBOARD_ORDERS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_ORDERS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_SECURITY_CHECKS_STATUS_TITLE','Sicherheits&uuml;berpr&uuml;fung auf Dashboard anzeigen');
define('MODULE_ADMIN_DASHBOARD_SECURITY_CHECKS_STATUS_DESCRIPTION','Soll die Sicherheits&uuml;berpr&uuml;fung auf dem Dashboard angezeigt werden?');
define('MODULE_ADMIN_DASHBOARD_SECURITY_CHECKS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_SECURITY_CHECKS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_TOTAL_CUSTOMERS_STATUS_TITLE','Kundenchart auf Dashboard anzeigen ');
define('MODULE_ADMIN_DASHBOARD_TOTAL_CUSTOMERS_STATUS_DESCRIPTION','Soll die Chart &uuml;ber die Kunden auf dem Dashboard angezeigt werden?');
define('MODULE_ADMIN_DASHBOARD_TOTAL_CUSTOMERS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_TOTAL_CUSTOMERS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_TOTAL_REVENUE_STATUS_TITLE','Umsatzchart auf Dashboard anzeigen');
define('MODULE_ADMIN_DASHBOARD_TOTAL_REVENUE_STATUS_DESCRIPTION','Soll das Umsatzchart auf den Dashboard angezeigt werden?');
define('MODULE_ADMIN_DASHBOARD_TOTAL_REVENUE_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_TOTAL_REVENUE_SORT_ORDER_DESCRIPTION','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_VERSION_CHECK_STATUS_TITLE','Versions&uuml;berpr&uuml;fung auf Dashboard anzeigen');
define('MODULE_ADMIN_DASHBOARD_VERSION_CHECK_STATUS_DESCRIPTION','Soll die versions&uuml;berpr&uuml;fung auf dem Dashboard angezeigt werden?');
define('MODULE_ADMIN_DASHBOARD_VERSION_CHECK_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_VERSION_CHECK_SORT_ORDER_DESCRIPTION','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_REVIEWS_STATUS_TITLE','Bewertungen auf dem Dashboard anzeigen');
define('MODULE_ADMIN_DASHBOARD_REVIEWS_STATUS_DESCRIPTION','Sollen die letzte Bewertungen auf den Dashboard angezeigt werden?');
define('MODULE_ADMIN_DASHBOARD_REVIEWS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_ADMIN_DASHBOARD_REVIEWS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge');

//module header tags
define('MODULE_HEADER_TAGS_INSTALLED_TITLE','installierte Module');
define('MODULE_HEADER_TAGS_INSTALLED_DESCRIPTION','Liste von installierten Modulen, getrennt durch ein Semikolon. Nicht &auml;ndern..');
define('MODULE_HEADER_TAGS_CATEGORY_TITLE_STATUS_TITLE','Kategoriename im Seitentitel');
define('MODULE_HEADER_TAGS_CATEGORY_TITLE_STATUS_DESCRIPTION','Sollen die Kategoriename im Seitentitel erscheinen?');
define('MODULE_HEADER_TAGS_CATEGORY_TITLE_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_HEADER_TAGS_CATEGORY_TITLE_SORT_ORDER_DESCRIPTION','Sortierreihenfolge');
define('MODULE_HEADER_TAGS_MANUFACTURER_TITLE_STATUS_TITLE','Herstellername im Seitentitel');
define('MODULE_HEADER_TAGS_MANUFACTURER_TITLE_STATUS_DESCRIPTION','Sollen die Herstellername im Seitentitel erscheinen?');
define('MODULE_HEADER_TAGS_MANUFACTURER_TITLE_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_HEADER_TAGS_MANUFACTURER_TITLE_SORT_ORDER_DESCRIPTION','Sortierreihenfolge');
define('MODULE_HEADER_TAGS_PRODUCT_TITLE_STATUS_TITLE','Produktname im Seitentitel');
define('MODULE_HEADER_TAGS_PRODUCT_TITLE_STATUS_DESCRIPTION','Soll der Produktname im Seitentitel erscheinen?');
define('MODULE_HEADER_TAGS_PRODUCT_TITLE_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_HEADER_TAGS_PRODUCT_TITLE_SORT_ORDER_DESCRIPTION','Sortierreihenfolge');
define('MODULE_HEADER_TAGS_GOOGLE_ANALYTICS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_HEADER_TAGS_GOOGLE_ANALYTICS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigste zuerst.');
define('MODULE_HEADER_TAGS_GOOGLE_ANALYTICS_JS_PLACEMENT_TITLE','Ort Javascript');
define('MODULE_HEADER_TAGS_GOOGLE_ANALYTICS_JS_PLACEMENT_DESCRIPTION','Soll das Google Analytics Javascript im Kopf oder im Fu� der Seite geladen werden?');
define('MODULE_HEADER_TAGS_GOOGLE_ANALYTICS_ID_TITLE','Google Analytics ID');
define('MODULE_HEADER_TAGS_GOOGLE_ANALYTICS_ID_DESCRIPTION','Die Google Analytics Profil-ID, die Ihnen von Google zugewiesen wird.');
define('MODULE_HEADER_TAGS_GOOGLE_ANALYTICS_EC_TRACKING_TITLE','E-Commerce Transaktionen erfassen');
define('MODULE_HEADER_TAGS_GOOGLE_ANALYTICS_EC_TRACKING_DESCRIPTION','Wollen Sie auch E-Commerce Transaktionen erfassen? (E-Commerce tracking muss auch im Google Analytics Profil aktiviert sein.)');
define('MODULE_HEADER_TAGS_GOOGLE_ANALYTICS_STATUS_TITLE','Google Analytics aktivieren');
define('MODULE_HEADER_TAGS_GOOGLE_ANALYTICS_STATUS_DESCRIPTION','Soll Google Analytics aktiviert werden?');

//module order
define('MODULE_ORDER_TOTAL_LOWORDERFEE_TAX_CLASS_TITLE','Steuerklasse');
define('MODULE_ORDER_TOTAL_LOWORDERFEE_TAX_CLASS_DESCRIPTION','Folgede Steuerklasse f&uuml;r Mindermengenzuschlag benutzen.');
define('MODULE_ORDER_TOTAL_LOWORDERFEE_DESTINATION_TITLE','Mindermengenzuschlag f&uuml;r Bestellungen aus Inland/Ausland');
define('MODULE_ORDER_TOTAL_LOWORDERFEE_DESTINATION_DESCRIPTION','Mindermengenzuschlag zu Bestellungen aus folgender Region hinzuf&uuml;gen.');
define('MODULE_ORDER_TOTAL_LOWORDERFEE_FEE_TITLE','Mindermengenzuschlag von x Euro');
define('MODULE_ORDER_TOTAL_LOWORDERFEE_FEE_DESCRIPTION','Mindermengenzuschlag von x Euro');
define('MODULE_ORDER_TOTAL_LOWORDERFEE_LOW_ORDER_FEE_TITLE','Mindermengenzuschlag erlauben');
define('MODULE_ORDER_TOTAL_LOWORDERFEE_LOW_ORDER_FEE_DESCRIPTION','Sind Mindermengenzuschl&auml;ge im Shop erlaubt?');
define('MODULE_ORDER_TOTAL_LOWORDERFEE_ORDER_UNDER_TITLE','Mindermengenzuschlag f&uuml;r Bestellungen unter ..');
define('MODULE_ORDER_TOTAL_LOWORDERFEE_ORDER_UNDER_DESCRIPTION','Mindermengenzuschlag f&uuml;r Bestellungen unter x Euro hinzuf&uuml;gen.');
define('MODULE_ORDER_TOTAL_LOWORDERFEE_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_ORDER_TOTAL_LOWORDERFEE_SORT_ORDER_DESCRIPTION','Sortierreihenfolge.');
define('MODULE_ORDER_TOTAL_LOWORDERFEE_STATUS_TITLE','Mindermengenzuschlag anzeigen');
define('MODULE_ORDER_TOTAL_LOWORDERFEE_STATUS_DESCRIPTION','Soll ein Mindermengenzuschlag im Shop angezeigt werden?');
define('MODULE_ORDER_TOTAL_SHIPPING_DESTINATION_TITLE','Keine Versandkosten bei Lieferung in das Inland/Ausland');
define('MODULE_ORDER_TOTAL_SHIPPING_DESTINATION_DESCRIPTION','F&uuml;r welche Region wollen Sie den freien Versand anbieten?');
define('MODULE_ORDER_TOTAL_SHIPPING_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_ORDER_TOTAL_SHIPPING_SORT_ORDER_DESCRIPTION','Sortierreihenfolge.');
define('MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_TITLE','kostenloser Versand');
define('MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_DESCRIPTION','Wollen Sie kostenlosen Versand im Shop anbieten?');
define('MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER_TITLE','Keine Versandkosten bei Bestellungen &uuml;ber mehr als x Euro.');
define('MODULE_ORDER_TOTAL_SHIPPING_FREE_SHIPPING_OVER_DESCRIPTION','keine Versandkosten bei Bestellungen über mehr als x Euro.');
define('MODULE_ORDER_TOTAL_SHIPPING_STATUS_TITLE','Versandkosten anzeigen');
define('MODULE_ORDER_TOTAL_SHIPPING_STATUS_DESCRIPTION','Sollen die Versandkosten im Shop angezeigt werden?');
define('MODULE_ORDER_TOTAL_SUBTOTAL_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_ORDER_TOTAL_SUBTOTAL_SORT_ORDER_DESCRIPTION','Sortierreihenfolge.');
define('MODULE_ORDER_TOTAL_SUBTOTAL_STATUS_TITLE','Zwischensumme anzeigen');
define('MODULE_ORDER_TOTAL_SUBTOTAL_STATUS_DESCRIPTION','Soll die Zwischensumme bei Bestellungen angezeigt werden?');
define('MODULE_ORDER_TOTAL_TAX_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_ORDER_TOTAL_TAX_SORT_ORDER_DESCRIPTION','Sortierreihenfolge.');
define('MODULE_ORDER_TOTAL_TAX_STATUS_TITLE','Mehrwertsteuer anzeigen');
define('MODULE_ORDER_TOTAL_TAX_STATUS_DESCRIPTION','Soll die Mehrwertsteuer im Shop angezeigt werden?');
define('MODULE_ORDER_TOTAL_TOTAL_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_ORDER_TOTAL_TOTAL_SORT_ORDER_DESCRIPTION','Sortierreihenfolge.');
define('MODULE_ORDER_TOTAL_TOTAL_STATUS_TITLE','Gesamtsumme anzeigen');
define('MODULE_ORDER_TOTAL_TOTAL_STATUS_DESCRIPTION','Soll die Gesamtsumme der Bestellung im Shop angezeigt werden?');
define('MODULE_ORDER_TOTAL_INSTALLED_TITLE','installierte Bestellmodule');
define('MODULE_ORDER_TOTAL_INSTALLED_DESCRIPTION','Liste der installierten Bestellmodule, getrennt duch ein Semikolon. Diese Liste wird automatisch aktualisiert. Bitte nicht bearbeiten.');


//module MODULE_PAYMENT
define('MODULE_PAYMENT_INSTALLED_TITLE','installierte Zahlungsmodule');
define('MODULE_PAYMENT_INSTALLED_DESCRIPTION','Liste von Zahlungsmodulen, getrennt durch ein Semikolon. Diese Liste wird automatisch aktualisiert. Bitte nicht bearbeiten.');

//module MODULE_PAYMENT_AUTHORIZENET_CC_AIM
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_STATUS_TITLE','Zahlung per Authorize.net Credit Card AIM akzeptiert');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_STATUS_DESCRIPTION','Akzeptieren Sie Zahlungen per Authorize.net Credit Card AIM. ');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_LOGIN_ID_TITLE','Benutzer ID');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_LOGIN_ID_DESCRIPTION','Die Benuter ID f&uuml;r Authorize.net.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TRANSACTION_KEY_TITLE','Transaktionsschl&uuml;ssel');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TRANSACTION_KEY_DESCRIPTION','Der Transaktionsschl&uuml;ssel f&uuml;r die Datenverschl&uuml;sselung.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_MD5_HASH_TITLE','MD5 Hash');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_MD5_HASH_DESCRIPTION','Der MD5 Hash um die Daten zu &uuml;berpr&uuml;fen.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TRANSACTION_SERVER_TITLE','Transaktionsserver');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TRANSACTION_SERVER_DESCRIPTION','Der Transaktionsserver f&uuml;r die Daten&uuml;bertragung.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TRANSACTION_MODE_TITLE','&Uuml;bertragungsmodus');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TRANSACTION_MODE_DESCRIPTION','Der &Uuml;bertragungsmodus zum Transaktionsserver.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TRANSACTION_METHOD_TITLE','&Uuml;bertragungsmethode');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_TRANSACTION_METHOD_DESCRIPTION','Die &Uuml;bertragungsmethode zum Transaktionsserver.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ZONE_DESCRIPTION','Die Zone, auf die die Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ORDER_STATUS_ID_TITLE','Status Bestellung');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ORDER_STATUS_ID_DESCRIPTION','Der Status der Bestellung, wenn als Zahlungsmethode Authorize.net Credit Card AIM gew&auml;hlt wurde.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_ZONE_DESCRIPTION','Die Zone, auf die die Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_CURL_TITLE','CURL Programm');
define('MODULE_PAYMENT_AUTHORIZENET_CC_AIM_CURL_DESCRIPTION','Der Pfad zum CURL-Programm.');

//module MODULE_PAYMENT_AUTHORIZENET_CC_SIM
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_STATUS_TITLE','Zahlung per Authorize.net Credit Card SIM akzeptiert');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_STATUS_DESCRIPTION','Akzeptieren Sie Zahlungen per Authorize.net Credit Card AIM. ');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_LOGIN_ID_TITLE','Benutzer ID');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_LOGIN_ID_DESCRIPTION','Die Benuter ID f&uuml;r Authorize.net.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_TRANSACTION_KEY_TITLE','Transaktionsschl&uuml;ssel');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_TRANSACTION_KEY_DESCRIPTION','Der Transaktionsschl&uuml;ssel f&uuml;r die Datenverschl&uuml;sselung.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_MD5_HASH_TITLE','MD5 Hash');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_MD5_HASH_DESCRIPTION','Der MD5 Hash um die Daten zu &uuml;berpr&uuml;fen.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_TRANSACTION_SERVER_TITLE','Transaktionsserver');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_TRANSACTION_SERVER_DESCRIPTION','Der Transaktionsserver f&uuml;r die Daten&uuml;bertragung.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_TRANSACTION_MODE_TITLE','&Uuml;bertragungsmodus');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_TRANSACTION_MODE_DESCRIPTION','Der &Uuml;bertragungsmodus zum Transaktionsserver.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_TRANSACTION_METHOD_TITLE','&Uuml;bertragungsmethode');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_TRANSACTION_METHOD_DESCRIPTION','Die &Uuml;bertragungsmethode zum Transaktionsserver.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_ZONE_DESCRIPTION','Die Zone, auf die die Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_ORDER_STATUS_ID_TITLE','Status Bestellung');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_ORDER_STATUS_ID_DESCRIPTION','Der Status der Bestellung, wenn als Zahlungsmethode Authorize.net Credit Card SIM gew&auml;hlt wurde.');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_AUTHORIZENET_CC_SIM_ZONE_DESCRIPTION','Die Zone, auf die die Zahlungart beschr&auml;nkt ist.');

//module MODULE_PAYMENT_CHRONOPAY
define('MODULE_PAYMENT_CHRONOPAY_STATUS_TITLE','Zahlung per ChronoPay akzeptiert');
define('MODULE_PAYMENT_CHRONOPAY_STATUS_DESCRIPTION','Akzeptieren Sie Zahlungen per ChronoPay. ');
define('MODULE_PAYMENT_CHRONOPAY_PRODUCT_ID_TITLE','ChronoPay Product ID');
define('MODULE_PAYMENT_CHRONOPAY_PRODUCT_ID_DESCRIPTION','Die ChronoPay Product ID. ');
define('MMODULE_PAYMENT_CHRONOPAY_MD5_HASH_TITLE','MD5 Hash');
define('MODULE_PAYMENT_CHRONOPAY_MD5_HASH_DESCRIPTION','Der MD5 Hash um die Daten zu &uuml;berpr&uuml;fen.');
define('MODULE_PAYMENT_CHRONOPAY_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_CHRONOPAY_ZONE_DESCRIPTION','Die Zone, auf die die Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_CHRONOPAY_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_CHRONOPAY_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Der Status der Bestellung, wenn als Zahlungsmethode ChronoPay gew&auml;hlt wurde, und die Zahlung noch nicht best&auml;tigt wurde.');
define('MODULE_PAYMENT_CHRONOPAY_ORDER_STATUS_ID_TITLE','Status bezahlte Bestellung');
define('MODULE_PAYMENT_CHRONOPAY_ORDER_STATUS_ID_DESCRIPTION','Der Status der Bestellung, wenn als Zahlungsmethode ChronoPay gew&auml;hlt wurde, und die Zahlung best&auml;tigt wurde.');
define('MODULE_PAYMENT_CHRONOPAY_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_CHRONOPAY_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_COD
define('MODULE_PAYMENT_COD_STATUS_TITLE','Nachnahme aktiviert');
define('MODULE_PAYMENT_COD_STATUS_DESCRIPTION','Akzeptieren Sie die Bezahlung per Nachnahme?');
define('MODULE_PAYMENT_COD_ZONE_TITLE','Versandzone');
define('MODULE_PAYMENT_COD_ZONE_DESCRIPTION','Die Zone, auf die die Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_COD_ORDER_STATUS_ID_TITLE','Bestellstatus');
define('MODULE_PAYMENT_COD_ORDER_STATUS_ID_DESCRIPTION','Der Status, der bei einer Bestellung mit Bezahlung per Nachnahme gesetzt wird.');
define('MODULE_PAYMENT_COD_SORT_ORDER_TITLE','Sortierreihenfolge.');
define('MODULE_PAYMENT_COD_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');



// MODULE_PAYMENT_INPAY

define('MODULE_PAYMENT_INPAY_STATUS_TITLE','Zahlungsart inpay aktivert');
define('MODULE_PAYMENT_INPAY_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart impay akzeptieren?');
define('MODULE_PAYMENT_INPAY_GATEWAY_SERVER_TITLE','inpay Gatewayserver');
define('MODULE_PAYMENT_INPAY_GATEWAY_SERVER_DESCRIPTION','Name des inpay Gatewayservers?');
define('MODULE_PAYMENT_INPAY_MERCHANT_ID_TITLE','inpay unique identifier');
define('MODULE_PAYMENT_INPAY_MERCHANT_ID_DESCRIPTION','Ihr inpay unique identifier, den Sie von inpay erhalten haben.');
define('MODULE_PAYMENT_INPAY_SECRET_KEY_TITLE','geheimer Schl&uuml;ssel');
define('MODULE_PAYMENT_INPAY_SECRET_KEY_DESCRIPTION','Ihr geheimer Schl&uuml;ssel, den Sie von inpay erhalten haben.');
define('MOODULE_PAYMENT_INPAY_FLOW_LAYOUT_TITLE','Layout');
define('MODULE_PAYMENT_INPAY_FLOW_LAYOUT_DESCRIPTION','Layout f&uuml;r die Kaufabwicklung.');
define('MODULE_PAYMENT_INPAY_DECREASE_STOCK_ON_TITLE','Lagerbestand anpassen');
define('MODULE_PAYMENT_INPAY_DECREASE_STOCK_ON_DESCRIPTION','Wollen Sie den Lagerbestand w&auml;hrend der Kaufabwicklung anpassen?');
define('MODULE_PAYMENT_INPAY_DEBUG_EMAIL_TITLE','E-Mail Adresse f&uuml;r Fehlermeldungen');
define('MODULE_PAYMENT_INPAY_DEBUG_EMAIL_DESCRIPTION','E-Mail Adresse, an die Fehler w&auml;hrend der Kaufabwicklung gesendet werden.');
define('MODULE_PAYMENT_INPAY_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_INPAY_ZONE_DESCRIPTION','Die Zone, auf die die Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_INPAY_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_INPAY_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');

// MODULE_PAYMENT_IPAYMENT_CC

define('MODULE_PAYMENT_IPAYMENT_CC_STATUS_TITLE','Zahlungsart ipayment per Kreditkarte aktivert');
define('MODULE_PAYMENT_IPAYMENT_CC_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart ipayment per Kreditkarte akzeptieren?');
define('MODULE_PAYMENT_IPAYMENT_CC_ID_TITLE','Zugangsnummer');
define('MODULE_PAYMENT_IPAYMENT_CC_ID_DESCRIPTION','Die Zugangsnummer f&uuml;r den ipayment-Service');
define('MODULE_PAYMENT_IPAYMENT_CC_USER_ID_TITLE','Benutzer ID');
define('MODULE_PAYMENT_IPAYMENT_CC_USER_ID_DESCRIPTION','Die Benutzer ID f&uuml;r den ipayment-Service .');
define('MODULE_PAYMENT_IPAYMENT_CC_PASSWORD_TITLE','Passwort');
define('MODULE_PAYMENT_IPAYMENT_CC_PASSWORD_DESCRIPTION','Das Passwort f&uuml;r den ipayment-Service.');
define('MODULE_PAYMENT_IPAYMENT_CC_TRANSACTION_METHOD_TITLE','&Uuml;bertragungsmethode');
define('MODULE_PAYMENT_IPAYMENT_CC_TRANSACTION_METHOD_DESCRIPTION','Die &Uuml;bertragungsmethode f&uuml;r die Daten.');
define('MODULE_PAYMENT_IPAYMENT_CC_SECRET_HASH_PASSWORD_TITLE','Hash Passwort');
define('MODULE_PAYMENT_IPAYMENT_CC_SECRET_HASH_PASSWORD_DESCRIPTION','Das Hash Passwort, um &Uuml;bertragungen zu validieren?');
define('MODULE_PAYMENT_IPAYMENT_CC_DEBUG_EMAIL_TITLE','E-Mail Adresse f&uuml;r Fehlermeldungen');
define('MODULE_PAYMENT_IPAYMENT_CC_DEBUG_EMAIL_DESCRIPTION','E-Mail Adresse, an die Fehler w&auml;hrend der Kaufabwicklung gesendet werden.');
define('MODULE_PAYMENT_IPAYMENT_CC_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_IPAYMENT_CC_ZONE_DESCRIPTION','Die Zone, auf die die Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_IPAYMENT_CC_ORDER_STATUS_ID_TITLE','Status Bestellung');
define('MODULE_PAYMENT_IPAYMENT_CC_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart ipayment per Kreditkarte ist.');
define('MODULE_PAYMENT_IPAYMENT_CC_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_IPAYMENT_CC_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_IPAYMENT_ELV

define('MODULE_PAYMENT_IPAYMENT_ELV_STATUS_TITLE','Zahlungsart ipayment (ELV) aktivert');
define('MODULE_PAYMENT_IPAYMENT_ELV_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart ipayment per ELV akzeptieren?');
define('MODULE_PAYMENT_IPAYMENT_ELV_ID_TITLE','Zugangsnummer');
define('MODULE_PAYMENT_IPAYMENT_ELV_ID_DESCRIPTION','Die Zugangsnummer f&uuml;r den ipayment-Service');
define('MODULE_PAYMENT_IPAYMENT_ELV_USER_ID_TITLE','Benutzer ID');
define('MODULE_PAYMENT_IPAYMENT_ELV_USER_ID_DESCRIPTION','Die Benutzer ID f&uuml;r den ipayment-Service .');
define('MODULE_PAYMENT_IPAYMENT_ELV_PASSWORD_TITLE','Passwort');
define('MODULE_PAYMENT_IPAYMENT_ELV_PASSWORD_DESCRIPTION','Das Passwort f&uuml;r den ipayment-Service.');
define('MODULE_PAYMENT_IPAYMENT_ELV_TRANSACTION_METHOD_TITLE','&Uuml;bertragungsmethode');
define('MODULE_PAYMENT_IPAYMENT_ELV_TRANSACTION_METHOD_DESCRIPTION','Die &Uuml;bertragungsmethode f&uuml;r die Daten.');
define('MODULE_PAYMENT_IPAYMENT_ELV_SECRET_HASH_PASSWORD_TITLE','Hash Passwort');
define('MODULE_PAYMENT_IPAYMENT_ELV_SECRET_HASH_PASSWORD_DESCRIPTION','Das Hash Passwort, um &Uuml;bertragungen zu validieren?');
define('MODULE_PAYMENT_IPAYMENT_ELV_DEBUG_TITLE','E-Mail Adresse f&uuml;r Fehlermeldungen');
define('MODULE_PAYMENT_IPAYMENT_ELV_DEBUG_DESCRIPTION','E-Mail Adresse, an die Fehler w&auml;hrend der Kaufabwicklung gesendet werden.');
define('MODULE_PAYMENT_IPAYMENT_ELV_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_IPAYMENT_ELV_ZONE_DESCRIPTION','Die Zone, auf die die Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_IPAYMENT_ELV_ORDER_STATUS_ID_TITLE','Status Bestellung');
define('MODULE_PAYMENT_IPAYMENT_ELV_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart ipayment per Kreditkarte ist.');
define('MODULE_PAYMENT_IPAYMENT_ELV_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_IPAYMENT_ELV_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_IPAYMENT_PP

define('MODULE_PAYMENT_IPAYMENT_PP_STATUS_TITLE','Zahlungsart ipayment (Prepaid) aktivert');
define('MODULE_PAYMENT_IPAYMENT_PP_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart ipayment (prepaid) akzeptieren?');
define('MODULE_PAYMENT_IPAYMENT_PP_ID_TITLE','Zugangsnummer');
define('MODULE_PAYMENT_IPAYMENT_PP_ID_DESCRIPTION','Die Zugangsnummer f&uuml;r den ipayment-Service');
define('MODULE_PAYMENT_IPAYMENT_PP_USER_ID_TITLE','Benutzer ID');
define('MODULE_PAYMENT_IPAYMENT_PP_USER_ID_DESCRIPTION','Die Benutzer ID f&uuml;r den ipayment-Service .');
define('MODULE_PAYMENT_IPAYMENT_PP_PASSWORD_TITLE','Passwort');
define('MODULE_PAYMENT_IPAYMENT_PP_PASSWORD_DESCRIPTION','Das Passwort f&uuml;r den ipayment-Service.');
define('MODULE_PAYMENT_IPAYMENT_PP_TRANSACTION_METHOD_TITLE','&Uuml;bertragungsmethode');
define('MODULE_PAYMENT_IPAYMENT_PP_TRANSACTION_METHOD_DESCRIPTION','Die &Uuml;bertragungsmethode f&uuml;r die Daten.');
define('MODULE_PAYMENT_IPAYMENT_PP_SECRET_HASH_PASSWORD_TITLE','Hash Passwort');
define('MODULE_PAYMENT_IPAYMENT_PP_SECRET_HASH_PASSWORD_DESCRIPTION','Das Hash Passwort, um &Uuml;bertragungen zu validieren?');
define('MODULE_PAYMENT_IPAYMENT_PP_DEBUG_TITLE','E-Mail Adresse f&uuml;r Fehlermeldungen');
define('MODULE_PAYMENT_IPAYMENT_PP_DEBUG_DESCRIPTION','E-Mail Adresse, an die Fehler w&auml;hrend der Kaufabwicklung gesendet werden.');
define('MODULE_PAYMENT_IPAYMENT_PP_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_IPAYMENT_PP_ZONE_DESCRIPTION','Die Zone, auf die die Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_IPAYMENT_PP_ORDER_STATUS_ID_TITLE','Status Bestellung');
define('MODULE_PAYMENT_IPAYMENT_PP_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart ipayment per Kreditkarte ist.');
define('MODULE_PAYMENT_IPAYMENT_PP_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_IPAYMENT_PP_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS

define('MODULE_PAYMENT_MONEYBOOKERS_STATUS_TITLE','Zahlungsart Moneybookers eWallet aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers eWallet akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_PAY_TO_TITLE','E-Mail Adresse');
define('MODULE_PAYMENT_MONEYBOOKERS_PAY_TO_DESCRIPTION','Die E-Mailadresse des Verk&auml;fers bei Moneybooker');
define('MODULE_PAYMENT_MONEYBOOKERS_MERCHANT_ID_TITLE','Benutzer ID');
define('MODULE_PAYMENT_MONEYBOOKERS_MERCHANT_ID_DESCRIPTION','Die ID des Verk&auml;fers bei Moneybooker.');
define('MODULE_PAYMENT_MONEYBOOKERS_SECRET_WORD_TITLE','Passwort');
define('MODULE_PAYMENT_MONEYBOOKERS_SECRET_WORD_DESCRIPTION','Das Passwort bei Moneybooker.');
define('MODULE_PAYMENT_MONEYBOOKERS_STORE_IMAGE_TITLE','Bild');
define('MODULE_PAYMENT_MONEYBOOKERS_STORE_IMAGE_DESCRIPTION','Die URL des Bildes, das auf der Transaktionsseite angezeigt wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_IFRAME_TITLE','iFrame');
define('MODULE_PAYMENT_MONEYBOOKERS_IFRAME_DESCRIPTION','Soll die Seite von Moneybookers in einem iFrame angezeigt werden?');
define('MODULE_PAYMENT_MONEYBOOKERS_DEBUG_EMAIL_TITLE','E-Mail Adresse f&uuml;r Fehlermeldungen');
define('MODULE_PAYMENT_MONEYBOOKERS_DEBUG_EMAIL_DESCRIPTION','E-Mail Adresse, an die Fehler w&auml;hrend der Kaufabwicklung gesendet werden.');
define('MODULE_PAYMENT_MONEYBOOKERS_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status abgschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_CURL_TITLE','CURL');
define('MODULE_PAYMENT_MONEYBOOKERS_CURL_DESCRIPTION','Pfad zu CURL.');
define('MODULE_PAYMENT_MONEYBOOKERS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_ACC

define('MODULE_PAYMENT_MONEYBOOKERS_ACC_STATUS_TITLE','Zahlungsart Moneybookers per Kreditkarte aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_ACC_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers per Kreditkarte akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_ACC_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_ACC_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_ACC_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_ACC_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_ACC_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_ACC_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_ACC_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_ACC_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_ACC_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_ACC_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_BWI

define('MODULE_PAYMENT_MONEYBOOKERS_BWI_STATUS_TITLE','Zahlungsart Moneybookers per Banktransfer aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_BWI_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers per Banktransfer akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_BWI_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_BWI_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_BWI_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_BWI_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_BWI_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_BWI_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_BWI_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_BWI_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_BWI_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_BWI_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_CSI

define('MODULE_PAYMENT_MONEYBOOKERS_CSI_STATUS_TITLE','Zahlungsart Moneybookers per CartaSi aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_CSI_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers per CartaSi akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_CSI_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_CSI_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_CSI_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_CSI_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_CSI_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_CSI_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_CSI_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_CSI_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_CSI_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_CSI_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_DID

define('MODULE_PAYMENT_MONEYBOOKERS_DID_STATUS_TITLE','Zahlungsart Moneybookers per Lastschrift aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_DID_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers per Lastschrift akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_DID_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_DID_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_DID_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_DID_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_DID_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_DID_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_DID_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_DID_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_DID_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_DID_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');

// MODULE_PAYMENT_MONEYBOOKERS_DNK

define('MODULE_PAYMENT_MONEYBOOKERS_DNK_STATUS_TITLE','Zahlungsart Moneybookers Dankort aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_DNK_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers Dankort akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_DNK_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_DNK_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_DNK_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_DNK_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_DNK_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_DNK_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_DNK_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_DNK_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_DNK_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_DNK_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_EBT

define('MODULE_PAYMENT_MONEYBOOKERS_EBT_STATUS_TITLE','Zahlungsart Moneybookers Nordea Solo aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_EBT_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers Nordeua Solo akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_EBT_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_EBT_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_EBT_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_EBT_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_EBT_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_EBT_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_EBT_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_EBT_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_EBT_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_EBT_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_ENT

define('MODULE_PAYMENT_MONEYBOOKERS_ENT_STATUS_TITLE','Zahlungsart Moneybookers eNETS aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_ENT_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers eNETS akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_ENT_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_ENT_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_ENT_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_ENT_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_ENT_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_ENT_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_ENT_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_ENT_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_ENT_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_ENT_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_GCB

define('MODULE_PAYMENT_MONEYBOOKERS_GCB_STATUS_TITLE','Zahlungsart Moneybookers Carte Bleue aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_GCB_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers Carte Bleue akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_GCB_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_GCB_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_GCB_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_GCB_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_GCB_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_GCB_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_GCB_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_GCB_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_GCB_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_GCB_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_GIR

define('MODULE_PAYMENT_MONEYBOOKERS_GIR_STATUS_TITLE','Zahlungsart Moneybookers Giropay aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_GIR_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers Giropay akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_GIR_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_GIR_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_GIR_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_GIR_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_GIR_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_GIR_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_GIR_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_GIR_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_GIR_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_GIR_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');

// MODULE_PAYMENT_MONEYBOOKERS_IDL

define('MODULE_PAYMENT_MONEYBOOKERS_IDL_STATUS_TITLE','Zahlungsart Moneybookers iDeal aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_IDL_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers iDeal akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_IDL_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_IDL_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_IDL_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_IDL_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_IDL_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_IDL_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_IDL_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_IDL_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_IDL_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_IDL_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_LSR

define('MODULE_PAYMENT_MONEYBOOKERS_LSR_STATUS_TITLE','Zahlungsart Moneybookers Laser aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_LSR_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers Laser akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_LSR_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_LSR_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_LSR_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_LSR_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_LSR_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_LSR_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_LSR_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_LSR_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_LSR_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_LSR_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');

// MODULE_PAYMENT_MONEYBOOKERS_MAE

define('MODULE_PAYMENT_MONEYBOOKERS_MAE_STATUS_TITLE','Zahlungsart Moneybookers Maestro aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_MAE_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers Maestro akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_MAE_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_MAE_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_MAE_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_MAE_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_MAE_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_MAE_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_MAE_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_MAE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_MAE_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_MAE_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
             
// MODULE_PAYMENT_MONEYBOOKERS_NGP

define('MODULE_PAYMENT_MONEYBOOKERS_NGP_STATUS_TITLE','Zahlungsart Moneybookers OnlineBank Transfer aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_NGP_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers OnlineBank Transfer akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_NGP_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_NGP_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_NGP_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_NGP_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_NGP_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_NGP_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_NGP_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_NGP_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_NGP_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_NGP_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_NPY

define('MODULE_PAYMENT_MONEYBOOKERS_NPY_STATUS_TITLE','Zahlungsart Moneybookers EPS aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_NPY_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers EPS akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_NPY_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_NPY_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_NPY_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_NPY_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_NPY_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_NPY_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_NPY_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_NPY_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_NPY_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_NPY_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');

// MODULE_PAYMENT_MONEYBOOKERS_PLI

define('MODULE_PAYMENT_MONEYBOOKERS_PLI_STATUS_TITLE','Zahlungsart Moneybookers POLi aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_PLI_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers POLi akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_PLI_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_PLI_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_PLI_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_PLI_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_PLI_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_PLI_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_PLI_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_PLI_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_PLI_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_PLI_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_PSP

define('MODULE_PAYMENT_MONEYBOOKERS_PSP_STATUS_TITLE','Zahlungsart Moneybookers Postepay aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_PSP_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers Postepay akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_PSP_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_PSP_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_PSP_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_PSP_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_PSP_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_PSP_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_PSP_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_PSP_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_PSP_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_PSP_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_PWY

define('MODULE_PAYMENT_MONEYBOOKERS_PWY_STATUS_TITLE','Zahlungsart Moneybookers Przelewy aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_PWY_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers Przelewy akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_PWY_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_PWY_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_PWY_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_PWY_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_PWY_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_PWY_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_PWY_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_PWY_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_PWY_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_PWY_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_SFT

define('MODULE_PAYMENT_MONEYBOOKERS_SFT_STATUS_TITLE','Zahlungsart Moneybookers Sofort&uuml;berweisung aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers Sofort&uuml;berweisung akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_SFT_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_SLO

define('MODULE_PAYMENT_MONEYBOOKERS_SLO_STATUS_TITLE','Zahlungsart Moneybookers Solo aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_SLO_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers Solo akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_SLO_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_SLO_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_SLO_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_SLO_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_SLO_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_SLO_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_SLO_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_SLO_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_SLO_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_SLO_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_SO2

define('MODULE_PAYMENT_MONEYBOOKERS_SO2_STATUS_TITLE','Zahlungsart Moneybookers Nordea Solo (FI) aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_SO2_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers Nordea Solo (FI) akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_SO2_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_SO2_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_SO2_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_SO2_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_SO2_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_SO2_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_SO2_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_SO2_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_SO2_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_SOw_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYBOOKERS_VSA

define('MODULE_PAYMENT_MONEYBOOKERS_VSA_STATUS_TITLE','Zahlungsart Moneybookers Visa (Euro 6000) aktivert');
define('MODULE_PAYMENT_MONEYBOOKERS_VSA_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Moneybookers Visa (Euro 6000) akzeptieren?');
define('MODULE_PAYMENT_MONEYBOOKERS_VSA_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYBOOKERS_VSA_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_VSA_PREPARE_ORDER_STATUS_ID_TITLE','Status offene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_VSA_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlung mit Moneybookers vorbereitet wird.');
define('MODULE_PAYMENT_MONEYBOOKERS_VSA_TRANSACTIONS_ORDER_STATUS_ID_TITLE','Status best&auml;tigte Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_VSA_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers best&auml;tigt wurde.');
define('MODULE_PAYMENT_MONEYBOOKERS_VSA_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_MONEYBOOKERS_VSA_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart mit Moneybookers abgeschlossen ist.');
define('MODULE_PAYMENT_MONEYBOOKERS_VSA_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYBOOKERS_VSA_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


// MODULE_PAYMENT_MONEYORDER_STATUS

define('MODULE_PAYMENT_MONEYORDER_STATUS_TITLE','Zahlungsart Check/Money Order aktivert');
define('MODULE_PAYMENT_MONEYORDER_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart Check/Money Order akzeptieren?');
define('MODULE_PAYMENT_MONEYORDER_PAYTO_TITLE','Zahlung an');
define('MODULE_PAYMENT_MONEYORDER_PAYTO_DESCRIPTION','Wer soll die Zahlung erhalten?');
define('MODULE_PAYMENT_MONEYORDER_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_MONEYORDER_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_MONEYORDER_ORDER_STATUS_ID_TITLE','Status');
define('MODULE_PAYMENT_MONEYORDER_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart Check/Money Order ist.');
define('MODULE_PAYMENT_MONEYORDER_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_MONEYORDER_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');



// MODULE_PAYMENT_NOCHEX

define('MODULE_PAYMENT_NOCHEX_STATUS_TITLE','Zahlungsart NOCHEX aktivert');
define('MODULE_PAYMENT_NOCHEX_STATUS_DESCRIPTION','Wollen Sie die Zahlungsart NOCHEX akzeptieren?');
define('MODULE_PAYMENT_NOCHEX_ID_TITLE','E-Mail Adresse');
define('MODULE_PAYMENT_NOCHEX_ID_DESCRIPTION','Die E-Mail Adresse f&uuml;r den NOCHEX Service');
define('MODULE_PAYMENT_NOCHEX_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_NOCHEX_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_NOCHEX_ORDER_STATUS_ID_TITLE','Status');
define('MODULE_PAYMENT_NOCHEX_ORDER_STATUS_ID_DESCRIPTION','Status einer Bestellung, wenn die Zahlungsart NOCHEX ist.');
define('MODULE_PAYMENT_NOCHEX_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_NOCHEX_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');


//module MODULE_PAYMENT_PAYPAL_EXPRESS
define('MODULE_PAYMENT_PAYPAL_EXPRESS_STATUS_TITLE','Zahlungsart PayPal Express akzeptieren');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_STATUS_DESCRIPTION','Erm&ouml;glicht den PayPal Express Checkout. ');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_SELLER_ACCOUNT_TITLE','Paypal E-Mail Adresse');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_SELLER_ACCOUNT_DESCRIPTION','Die E-Mail Adresse f&uumL,r den PayPal Account, wenn die APi nicht genutzt wird.credentials has been setup.');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_API_USERNAME_TITLE','PayPal API Benutzername');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_API_USERNAME_DESCRIPTION','Der Benutzername f&uuml;r die PayPal API.');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_API_PASSWORD_TITLE','Paypal API Passwort');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_API_PASSWORD_DESCRIPTION','Das Passwort f&uuml;r die PayPal API.');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_API_SIGNATURE_TITLE','Paypal API Signatur');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_API_SIGNATURE_DESCRIPTION','Die Signatur f&uuml;r die PayPal API.');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_TRANSACTION_SERVER_TITLE','Transaktionsserver');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_TRANSACTION_SERVER_DESCRIPTION','Der Servername (Liveserver oder Testserver) von Paypal um Transaktionen zu t&auml;tigen');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_TRANSACTION_METHOD_TITLE','Transaktionsmethode');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_TRANSACTION_METHOD_DESCRIPTION','Die Transaktionsmethode f&uuml;r PalPal-Bezahlungen <br/>Authorization <br/>Sale');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_ACCOUNT_OPTIONAL_TITLE','PayPal Account optional');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_ACCOUNT_OPTIONAL_DESCRIPTION','Diese Option mu&szlig; auch bei PayPal unter in Profil > Verk&auml;fer/H&auml;ndler > ... aktiviert sein.');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_INSTANT_UPDATE_TITLE','PayPal Instant Update');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_INSTANT_UPDATE_DESCRIPTION','Unterst&uuml;tzt PayPal Versand- und Mehrwertsteuerberechnung bei Express Checkout.');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_CHECKOUT_IMAGE_TITLE','PayPal Checkout Bild');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_CHECKOUT_IMAGE_DESCRIPTION','W&auml;hlen Sie static oder dynamic Express Checkout Bilder. Dynamische Bilder werden bei PayPal Kampagnen genutzt.');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_DEBUG_EMAIL_TITLE','Debug E-Mail Address f&uuml;r Fehlermeldungen');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_DEBUG_EMAIL_DESCRIPTION','E-Mail Adresse, an die Fehler w&auml;hrend der Kaufabwicklung gesendet werden.');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_ORDER_STATUS_ID_TITLE','Bestelltstatus');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_ORDER_STATUS_ID_DESCRIPTION','Bestellstatus f&uuml;r Bestellungen, die &uuml;ber Paypal get&auml;tigt wurden.');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_TRANSACTIONS_ORDER_STATUS_ID_TITLE','PayPal Transactions Order Status Level');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_TRANSACTIONS_ORDER_STATUS_ID_DESCRIPTION','Bestellstatus mit PayPal Transaktionsinformationen f&uuml;r Bestellungen, die &uuml;ber Paypal Express get&auml;tigt wurden.');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_CURL_TITLE','cURL Programm');
define('MODULE_PAYMENT_PAYPAL_EXPRESS_CURL_DESCRIPTION','Der Pfad zum cURL Programm.');


//module MODULE_PAYMENT_PAYPAL_PRO_DP
define('MODULE_PAYMENT_PAYPAL_PRO_DP_STATUS_TITLE','Zahlungsart PayPal Direkt akzeptieren');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_STATUS_DESCRIPTION','Erm&ouml;glicht die Zahlung mit PayPal Direkt. ');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_API_USERNAME_TITLE','PayPal API Benutzername');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_API_USERNAME_DESCRIPTION','Der Benutzername f&uuml;r die PayPal API.');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_API_PASSWORD_TITLE','Paypal API Passwort');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_API_PASSWORD_DESCRIPTION','Das Passwort f&uuml;r die PayPal API.');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_API_SIGNATURE_TITLE','Paypal API Signatur');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_API_SIGNATURE_DESCRIPTION','Die Signatur f&uuml;r die PayPal API.');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_TRANSACTION_SERVER_TITLE','Transaktionsserver');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_TRANSACTION_SERVER_DESCRIPTION','Der Servername (Liveserver oder Testserver) von Paypal um Transaktionen zu t&auml;tigen');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_TRANSACTION_METHOD_TITLE','Transaktionsmethode');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_TRANSACTION_METHOD_DESCRIPTION','Die Transaktionsmethode f&uuml;r PalPal-Bezahlungen <br/>Authorization <br/>Sale');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CARD_INPUT_PAGE_TITLE','Seite f&uuml;r Karten&uuml;berpr&uuml;fung');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CARD_INPUT_PAGE_DESCRIPTION','?????.');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_ORDER_STATUS_ID_TITLE','Bestelltstatus');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_ORDER_STATUS_ID_DESCRIPTION','Bestellstatus f&uuml;r Bestellungen, die &uuml;ber Paypal get&auml;tigt wurden.');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CURL_TITLE','cURL Programm');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CURL_DESCRIPTION','Der Pfad zum cURL Programm.');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CARDTYPE_VISA_TITLE','VISA Karte akzeptieren');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CARDTYPE_VISA_DESCRIPTION','Werden VISA Karten als Zahlungsmittel akzeptiert?');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CARDTYPE_VISA_DEBIT_TITLE','VISA Debit Karte akzeptieren');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CARDTYPE_VISA_DEBIT_DESCRIPTION','Werden VISA Debit Karten als Zahlungsmittel akzeptiert?');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CARDTYPE_DISCOVER_TITLE','Discover Karte akzeptieren');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CARDTYPE_DISCOVER_DESCRIPTION','Werden Discover Karten als Zahlungsmittel akzeptiert?');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CARDTYPE_AMEX_TITLE','American Express Karte akzeptieren');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CARDTYPE_AMEX_DESCRIPTION','Werden American Express Karten als Zahlungsmittel akzeptiert?');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CARDTYPE_SWITCH_TITLE','Maestro Karte akzeptieren');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CARDTYPE_SWITCH_DESCRIPTION','Werden Maestro Karten als Zahlungsmittel akzeptiert?');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CARDTYPE_SOLO_TITLE','Solo Karte akzeptieren');
define('MODULE_PAYMENT_PAYPAL_PRO_DP_CARDTYPE_SOLO_DESCRIPTION','Werden Solo Karten als Zahlungsmittel akzeptiert?');


//module MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_STATUS_TITLE','Zahlungsart PayPal Direkt (UK) akzeptieren');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_STATUS_DESCRIPTION','Erm&ouml;glicht die Zahlung mit PayPal Direkt (UK). ');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_VENDOR_TITLE','Anbieter ID');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_VENDOR_DESCRIPTION','Ihre Anbieter ID, die sie beim Anlegen des Website Payments Pro accounts erhalten haben.');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_USERNAME_TITLE','Benutzername');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_USERNAME_DESCRIPTION','?????.');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_PASSWORD_TITLE','Passwort');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_PASSWORD_DESCRIPTION','?????.');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_PARTNER_TITLE','Partner');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_PARTNER_DESCRIPTION','?????');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_TRANSACTION_SERVER_TITLE','Transaktionsserver');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_TRANSACTION_SERVER_DESCRIPTION','Der Servername (Liveserver oder Testserver) von Paypal um Transaktionen zu t&auml;tigen');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_TRANSACTION_METHOD_TITLE','Transaktionsmethode');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_TRANSACTION_METHOD_DESCRIPTION','Die Transaktionsmethode f&uuml;r PalPal-Bezahlungen <br/>Authorization <br/>Sale');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_CARD_INPUT_PAGE_TITLE','Seite f&uuml;r Karten&uuml;berpr&uuml;fung');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_CARD_INPUT_PAGE_DESCRIPTION','?????.');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_ORDER_STATUS_ID_TITLE','Bestelltstatus');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_ORDER_STATUS_ID_DESCRIPTION','Bestellstatus f&uuml;r Bestellungen, die &uuml;ber Paypal get&auml;tigt wurden.');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_CURL_TITLE','cURL Programm');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_CURL_DESCRIPTION','Der Pfad zum cURL Programm.');


//module MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_STATUS_TITLE','Zahlungsart PayPal Express (UK) akzeptieren');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_STATUS_DESCRIPTION','Erm&ouml;glicht die Zahlung mit PayPal Express (UK). ');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_VENDOR_TITLE','Anbieter ID');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_VENDOR_DESCRIPTION','Ihre Anbieter ID, die sie beim Anlegen des Website Payments Pro accounts erhalten haben.');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_USERNAME_TITLE','Benutzername');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_USERNAME_DESCRIPTION','?????.');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_PASSWORD_TITLE','Passwort');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_PASSWORD_DESCRIPTION','?????.');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_PARTNER_TITLE','Partner');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_PARTNER_DESCRIPTION','?????');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_TRANSACTION_SERVER_TITLE','Transaktionsserver');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_TRANSACTION_SERVER_DESCRIPTION','Der Servername (Liveserver oder Testserver) von Paypal um Transaktionen zu t&auml;tigen');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_TRANSACTION_METHOD_TITLE','Transaktionsmethode');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_TRANSACTION_METHOD_DESCRIPTION','Die Transaktionsmethode f&uuml;r PalPal-Bezahlungen <br/>Authorization <br/>Sale');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_ORDER_STATUS_ID_TITLE','Bestelltstatus');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_ORDER_STATUS_ID_DESCRIPTION','Bestellstatus f&uuml;r Bestellungen, die &uuml;ber Paypal get&auml;tigt wurden.');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_CURL_TITLE','cURL Programm');
define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_EC_CURL_DESCRIPTION','Der Pfad zum cURL Programm.');

//module MODULE_PAYMENT_PAYPAL_STANDARD
define('MODULE_PAYMENT_PAYPAL_STANDARD_STATUS_TITLE','Zahlungsart PayPal Standard akzeptieren');
define('MODULE_PAYMENT_PAYPAL_STANDARD_STATUS_DESCRIPTION','Erm&ouml;glicht die Zahlung mit PayPal Standard. ');
define('MODULE_PAYMENT_PAYPAL_STANDARD_ID_TITLE','E-Mail Adresse');
define('MODULE_PAYMENT_PAYPAL_STANDARD_ID_DESCRIPTION','Die E-Mail Adresse des H&auml;nderls bei PayPal.');
define('MODULE_PAYMENT_PAYPAL_STANDARD_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_PAYPAL_STANDARD_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_PAYMENT_PAYPAL_STANDARD_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_PAYPAL_STANDARD_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_PAYPAL_STANDARD_PREPARE_ORDER_STATUS_ID_TITLE','Bestelltstatus vorbereitet');
define('MODULE_PAYMENT_PAYPAL_STANDARD_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Der Bestellstatus, wenn eine Bezahlung per PayPal Standard vorbereitet wird.');
define('MODULE_PAYMENT_PAYPAL_STANDARD_ORDER_STATUS_ID_TITLE','Bestelltstatus best&auml;tigt');
define('MODULE_PAYMENT_PAYPAL_STANDARD_ORDER_STATUS_ID_DESCRIPTION','Der Bestellstatus, wenn eine Bezahlung per PayPal Standard best&auml;tigt wurde.');
define('MODULE_PAYMENT_PAYPAL_STANDARD_GATEWAY_SERVER_TITLE','Gatewayserver');
define('MODULE_PAYMENT_PAYPAL_STANDARD_GATEWAY_SERVER_DESCRIPTION','Der PayPal Gatewayserver.<br/> Test -> "sandbox" <br/> reale Transaktionen -> "live".');
define('MODULE_PAYMENT_PAYPAL_STANDARD_TRANSACTION_METHOD_TITLE','&Uuml;bertragungsmethode');
define('MODULE_PAYMENT_PAYPAL_STANDARD_TRANSACTION_METHOD_DESCRIPTION','Die &Uuml;bertragungsmethode, die f&uuml;r die Transaktionen genutzt werden soll.');
define('MODULE_PAYMENT_PAYPAL_STANDARD_PAGE_STYLE_TITLE','Seitenlayout');
define('MODULE_PAYMENT_PAYPAL_STANDARD_PAGE_STYLE_DESCRIPTION','Das Seitenlayout, das f&uuml;r die Transaktion genutzt werden soll.');
define('MODULE_PAYMENT_PAYPAL_STANDARD_DEBUG_EMAIL_TITLE','E-Mailadresse Fehler');
define('MODULE_PAYMENT_PAYPAL_STANDARD_DEBUG_EMAIL_DESCRIPTION','E-Mail Adresse an die Fehler w&auml;hrend der Transaktion gesendet werden.');
define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_STATUS_TITLE','verschl&uuml;sselte Zahlung');
define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_STATUS_DESCRIPTION','?????.');
define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_PRIVATE_KEY_TITLE','privater Schl&uuml;ssel');
define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_PRIVATE_KEY_DESCRIPTION','Der private Schl&uuml;ssel f&uuml;r die verschl&uuml;sselte &Uuml;bertragung.');
define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_PUBLIC_KEY_TITLE','&ouml;ffentlicher Schl&uuml;ssel');
define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_PUBLIC_KEY_DESCRIPTION','Der &ouml;ffentliche Schl&uuml;ssel f&uuml;r die verschl&uuml;sselte &Uuml;bertragung.');
define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_PAYPAL_KEY_TITLE','Zertifikat von Paypal');
define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_PAYPAL_KEY_DESCRIPTION','Das Zertifikat von PayPal.');
define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_CERT_ID_TITLE','Your PayPal Public Certificate ID');
define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_CERT_ID_DESCRIPTION','?????.');
define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_WORKING_DIRECTORY_TITLE','Arbeitsverzeichnis');
define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_WORKING_DIRECTORY_DESCRIPTION','Das lokale Arbeitsverzeichnis, das f&uuml;r die Ablage von tempor&auml;ren Dateien benutzt wird.');
define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_OPENSSL_TITLE','OpenSSL Programm');
define('MODULE_PAYMENT_PAYPAL_STANDARD_EWP_OPENSSL_DESCRIPTION','Pfad zum OpenSSL Programm.');



//module MODULE_PAYMENT_PAYPOINT_SECPAY
define('MODULE_PAYMENT_PAYPOINT_SECPAY_STATUS_TITLE','Zahlungsart PayPoint.net SECPay akzeptieren');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_STATUS_DESCRIPTION','Erm&ouml;glicht die Zahlung mit PayPoint.net SECPay. ');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_MERCHANT_ID_TITLE','H&auml;ndler ID');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_MERCHANT_ID_DESCRIPTION','Die H&auml;ndler ID bei PayPoint.net.');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_CURRENCY_TITLE','W&auml;hrung');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_CURRENCY_DESCRIPTION','Die W&auml;hrung f&uuml;r Transaktionen &uuml;ber PayPoint.net.');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_TEST_STATUS_TITLE','Transaktionsmodus');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_TEST_STATUS_DESCRIPTION','Der Transaktionsmodus f&uuml;r Transaktionen &uuml;ber PayPoint.net.');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_ORDER_STATUS_ID_TITLE','Bestellungsstatus');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_ORDER_STATUS_ID_DESCRIPTION','Der Bestellungsstatus, der bei einer Bestellung &uuml;ber PayPoint.net gesetzt wird.');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_REMOTE_TITLE','Passwort');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_REMOTE_DESCRIPTION','?????.');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_READERS_DIGEST_TITLE','Digest');
define('MODULE_PAYMENT_PAYPOINT_SECPAY_READERS_DIGEST_DESCRIPTION','?????.');

//module MODULE_PAYMENT_2CHECKOUT
define('MODULE_PAYMENT_2CHECKOUT_STATUS_TITLE','Zahlungsart 2Checkout akzeptieren');
define('MODULE_PAYMENT_2CHECKOUT_STATUS_DESCRIPTION','Erm&ouml;glicht die Zahlung mit 2Checkout. ');
define('MODULE_PAYMENT_2CHECKOUT_LOGIN_TITLE','Login');
define('MODULE_PAYMENT_2CHECKOUT_LOGIN_DESCRIPTION','?????.');
define('MODULE_PAYMENT_2CHECKOUT_TESTMODE_TITLE','Transaktionsmodus');
define('MODULE_PAYMENT_2CHECKOUT_TESTMODE_DESCRIPTION','Der Transaktionsmodus, der f&uuml;r 2Checkout genutzt werden soll.');
define('MODULE_PAYMENT_2CHECKOUT_SECRET_WORD_TITLE','Passwort');
define('MODULE_PAYMENT_2CHECKOUT_SECRET_WORD_DESCRIPTION','Das Passwort, um Transaktionen zu best&auml;tigen.');
define('MODULE_PAYMENT_2CHECKOUT_ROUTINE_TITLE','Payment Routine');
define('MODULE_PAYMENT_2CHECKOUT_ROUTINE_DESCRIPTION','?????.');
define('MODULE_PAYMENT_2CHECKOUT_CURRENCY_TITLE','W&auml;hrung');
define('MODULE_PAYMENT_2CHECKOUT_CURRENCY_DESCRIPTION','Die W&auml;hrung f&uuml;r Transaktionen &uuml;ber 2Checkout.');
define('MODULE_PAYMENT_2CHECKOUT_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_2CHECKOUT_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_PAYMENT_2CHECKOUT_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_2CHECKOUT_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_2CHECKOUT_ORDER_STATUS_ID_TITLE','Status Bestellung');
define('MODULE_PAYMENT_2CHECKOUT_ORDER_STATUS_ID_DESCRIPTION','Der Status einer Bestellung &uuml;ber PayPoint.net.');

//module MODULE_PAYMENT_PSIGATE
define('MODULE_PAYMENT_PSIGATE_STATUS_TITLE','Zahlungsart PSiGate akzeptieren');
define('MODULE_PAYMENT_PSIGATE_STATUS_DESCRIPTION','Erm&ouml;glicht die Zahlung mit PSiGate. ');
define('MODULE_PAYMENT_PSIGATE_MERCHANT_ID_TITLE','H&auml;ndler ID');
define('MODULE_PAYMENT_PSIGATE_MERCHANT_ID_DESCRIPTION','Ihre H&auml;ndler ID bei PSiGate.');
define('MODULE_PAYMENT_PSIGATE_TRANSACTION_MODE_TITLE','Transaktionsmodus');
define('MODULE_PAYMENT_PSIGATE_TRANSACTION_MODE_DESCRIPTION','Der Transaktionsmodus, der f&uuml;r PSiGate genutzt werden soll.');
define('MODULE_PAYMENT_PSIGATE_TRANSACTION_TYPE_TITLE','Transaktionstyp');
define('MODULE_PAYMENT_PSIGATE_TRANSACTION_TYPE_DESCRIPTION','Der Transaktionstyp, der f&uuml;r PSiGate genutzt werden soll.');
define('MODULE_PAYMENT_PSIGATE_INPUT_MODE_TITLE','Kartendetails speichern');
define('MODULE_PAYMENT_PSIGATE_INPUT_MODE_DESCRIPTION','Sollen Kartendetails lokal oder bei PSiGate gespeichert werden?');
define('MODULE_PAYMENT_PSIGATE_CURRENCY_TITLE','W&auml;hrung');
define('MODULE_PAYMENT_PSIGATE_CURRENCY_DESCRIPTION','Die W&auml;hrung f&uuml;r Transaktionen &uuml;ber PSiGate.');
define('MODULE_PAYMENT_PSIGATE_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_PSIGATE_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_PAYMENT_PSIGATE_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_PSIGATE_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_PSIGATE_ORDER_STATUS_ID_TITLE','Status Bestellung');
define('MODULE_PAYMENT_PSIGATE_ORDER_STATUS_ID_DESCRIPTION','Der Status einer Bestellung &uuml;ber PayPoint.net.');


//module MODULE_PAYMENT_RBSWORLDPAY_HOSTED
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_STATUS_TITLE','Zahlungsart RBS WorldPay Hosted akzeptieren');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_STATUS_DESCRIPTION','Erm&ouml;glicht die Zahlung mitRBS WorldPay Hosted. ');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_INSTALLATION_ID_TITLE','Installation ID');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_INSTALLATION_ID_DESCRIPTION','Ihre Installation ID bei RBS WorldPay Hosted.');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_CALLBACK_PASSWORD_TITLE','Passwort R&uuml;ckruf');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_CALLBACK_PASSWORD_DESCRIPTION','Das Passwort, dass in der R&uuml;ckantwort gesendet wird.');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_MD5_PASSWORD_TITLE','Passwort MD5');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_MD5_PASSWORD_DESCRIPTION','Das MD5 Passwort, um Transaktionen zu validieren.');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_TRANSACTION_METHOD_TITLE','Transaktionsmethode');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_TRANSACTION_METHOD_DESCRIPTION','Die Transaktionsmethode, die f&uuml;r Transaktionen genutzt wird.');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_TESTMODE_TITLE','Testmodus');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_TESTMODE_DESCRIPTION','Sollen Trtansaktionen im testmodus durchgef&uuml;hrt werden?');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_PREPARE_ORDER_STATUS_ID_TITLE','Status vorbereitete Bestellung');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Der Status einer vorbereiteten Bestellung &uuml;berRBS WorldPay Hosted.');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_ORDER_STATUS_ID_TITLE','Status abgeschlossene Bestellung');
define('MODULE_PAYMENT_RBSWORLDPAY_HOSTED_ORDER_STATUS_ID_DESCRIPTION','Der Status einer abgeschlossenen Bestellung &uuml;berRBS WorldPay Hosted.');


//module MODULE_PAYMENT_SAGE_PAY_DIRECT
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_STATUS_TITLE','Zahlungsart Sage Pay Direct akzeptieren');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_STATUS_DESCRIPTION','Erm&ouml;glicht die Zahlung mit Sage Pay Direct. ');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_VENDOR_LOGIN_NAME_TITLE','Login Name');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_VENDOR_LOGIN_NAME_DESCRIPTION','Ihr Login Name bei Sage Pay.');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_VERIFY_WITH_CVC_TITLE','Kreditkarte &uuml;berpr&uuml;fen');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_VERIFY_WITH_CVC_DESCRIPTION','Soll die Kreditkarte mit CVC &uuml;berpr&uuml;ft werden?');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_TRANSACTION_METHOD_TITLE','Transaktionsmethode');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_TRANSACTION_METHOD_DESCRIPTION','Die Transaktionsmethode, die f&uuml;r Transaktionen genutzt wird.');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_TRANSACTION_SERVER_TITLE','Transaktionsserver');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_TRANSACTION_SERVER_DESCRIPTION','Der Transaktionsserver, der f&uuml;r Transaktionen genutzt wird.');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ORDER_STATUS_ID_TITLE','Status Bestellung');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ORDER_STATUS_ID_DESCRIPTION','Der Status einer abgeschlossenen Bestellung &uuml;ber Sage Pay Direct.');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_CURL_TITLE','cURL Programm');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_CURL_DESCRIPTION','Der Pfad zum cURL Programm.');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_VISA_TITLE','VISA Karte akzeptieren');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_VISA_DESCRIPTION','Werden VISA Karten als Zahlungsmittel akzeptiert?');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_MC_TITLE','Masterkarte akzeptieren');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_MC_DESCRIPTION','Werden Masterkarten als Zahlungsmittel akzeptiert?');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_DELTA_TITLE','VISA Delta/Debit Karte akzeptieren');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_DELTA_DESCRIPTION','Werden VISA Delta/Debit Karten als Zahlungsmittel akzeptiert?');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_SOLO_TITLE','Solo Karte akzeptieren');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_SOLO_DESCRIPTION','Werden Solo Karten als Zahlungsmittel akzeptiert?');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_MAESTRO_TITLE','Maestro Karte akzeptieren');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_MAESTRO_DESCRIPTION','Werden Maestro Karten als Zahlungsmittel akzeptiert?');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_UKE_TITLE','VISA Electron UK Debit Karte akzeptieren');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_UKE_DESCRIPTION','Werden VISA Electron UK Debit Karten als Zahlungsmittel akzeptiert?');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_AMEX_TITLE','American Express Karte akzeptieren');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_AMEX_DESCRIPTION','Werden American Express Karten als Zahlungsmittel akzeptiert?');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_DC_TITLE','Diners Club Karte akzeptieren');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_DC_DESCRIPTION','Werden Diners Club Karten als Zahlungsmittel akzeptiert?');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_JCB_TITLE','Diners Japan Credit Bureau akzeptieren');
define('MODULE_PAYMENT_SAGE_PAY_DIRECT_ALLOW_JCB_DESCRIPTION','Werden Japan Credit Bureau Karten als Zahlungsmittel akzeptiert?');


//module MODULE_PAYMENT_SAGE_PAY_FORM
define('MODULE_PAYMENT_SAGE_PAY_FORM_STATUS_TITLE','Zahlungsart Sage Pay Form akzeptieren');
define('MODULE_PAYMENT_SAGE_PAY_FORM_STATUS_DESCRIPTION','Erm&ouml;glicht die Zahlung mit Sage Pay Form. ');
define('MODULE_PAYMENT_SAGE_PAY_FORM_VENDOR_LOGIN_NAME_TITLE','Login Name');
define('MODULE_PAYMENT_SAGE_PAY_FORM_VENDOR_LOGIN_NAME_DESCRIPTION','Ihr Login Name bei Sage Pay.');
define('MODULE_PAYMENT_SAGE_PAY_FORM_ENCRYPTION_PASSWORD_TITLE','Passwort');
define('MODULE_PAYMENT_SAGE_PAY_FORM_ENCRYPTION_PASSWORD_DESCRIPTION','Ihr Passwort, um Transaktionen zu verschl&uuml;sseln.');
define('MODULE_PAYMENT_SAGE_PAY_FORM_TRANSACTION_METHOD_TITLE','Transaktionsmethode');
define('MODULE_PAYMENT_SAGE_PAY_FORM_TRANSACTION_METHOD_DESCRIPTION','Die Transaktionsmethode, die f&uuml;r Transaktionen genutzt wird.');
define('MODULE_PAYMENT_SAGE_PAY_FORM_TRANSACTION_SERVER_TITLE','Transaktionsserver');
define('MODULE_PAYMENT_SAGE_PAY_FORM_TRANSACTION_SERVER_DESCRIPTION','Der Transaktionsserver, der f&uuml;r Transaktionen genutzt wird.');
define('MODULE_PAYMENT_SAGE_PAY_FORM_VENDOR_EMAIL_TITLE','E-Mail Adresse H&auml;ndler');
define('MODULE_PAYMENT_SAGE_PAY_FORM_VENDOR_EMAIL_DESCRIPTION','Die E-Mailadresse des H&auml;ndlers.');
define('MODULE_PAYMENT_SAGE_PAY_FORM_SEND_EMAIL_TITLE','E-Mails senden an');
define('MODULE_PAYMENT_SAGE_PAY_FORM_SEND_EMAIL_DESCRIPTION','An wen sollen E-Mails gesendet werden?');
define('MODULE_PAYMENT_SAGE_PAY_FORM_CUSTOMER_EMAIL_MESSAGE_TITLE','Nachricht Kunde');
define('MODULE_PAYMENT_SAGE_PAY_FORM_CUSTOMER_EMAIL_MESSAGE_DESCRIPTION','Nachricht, die bei einer erfolgreichen Transaktion an den Kunden gesendet wird.');
define('MODULE_PAYMENT_SAGE_PAY_FORM_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_SAGE_PAY_FORM_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_PAYMENT_SAGE_PAY_FORM_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_SAGE_PAY_FORM_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist..');
define('MODULE_PAYMENT_SAGE_PAY_FORM_ORDER_STATUS_ID_TITLE','Status Bestellung');
define('MODULE_PAYMENT_SAGE_PAY_FORM_ORDER_STATUS_ID_DESCRIPTION','Der Status einer abgeschlossenen Bestellung &uuml;ber Sage Pay Form.');


//module MODULE_PAYMENT_SAGE_PAY_SERVER
define('MODULE_PAYMENT_SAGE_PAY_SERVER_STATUS_TITLE','Zahlungsart Sage Pay Server akzeptieren');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_STATUS_DESCRIPTION','Erm&ouml;glicht die Zahlung mit Sage Pay Server. ');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_VENDOR_LOGIN_NAME_TITLE','Login Name');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_VENDOR_LOGIN_NAME_DESCRIPTION','Ihr Login Name bei Sage Pay.');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_PROFILE_PAGE_TITLE','Profile Payment Page');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_PROFILE_PAGE_DESCRIPTION','?????.');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_TRANSACTION_METHOD_TITLE','Transaktionsmethode');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_TRANSACTION_METHOD_DESCRIPTION','Die Transaktionsmethode, die f&uuml;r Transaktionen genutzt wird.');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_TRANSACTION_SERVER_TITLE','Transaktionsserver');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_TRANSACTION_SERVER_DESCRIPTION','Der Transaktionsserver, der f&uuml;r Transaktionen genutzt wird.');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_ORDER_STATUS_ID_TITLE','Status Bestellung');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_ORDER_STATUS_ID_DESCRIPTION','Der Status einer abgeschlossenen Bestellung &uuml;ber Sage Pay Form.');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_CURL_TITLE','cURL Programm');
define('MODULE_PAYMENT_SAGE_PAY_SERVER_CURL_DESCRIPTION','Der Pfad zum cURL Programm.');



//module MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_STATUS_TITLE','Zahlungsart Sofort&uuml;berweisung akzeptieren');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_STATUS_DESCRIPTION','Erm&ouml;glicht die Zahlung per Sofort&uuml;berweisung. ');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_KDNR','Kundennummer');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_KDNR','Ihre Kundennummer bei der Sofort&uuml;berweisung.');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_PROJEKT_TITLE','Projektnummer');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_PROJEKT_DESCRIPTION','Die verantwortliche Projektnummer bei der Sofort&uuml;berweisung, zu der die Zahlung geh&ouml;rt.');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_INPUT_PASSWORT_TITLE','Input-Passwort');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_INPUT_PASSWORT_DESCRIPTION','Das Input-Passwort (unter Nicht &auml;nderbare Parameter / Input-Passwort).');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_BNA_PASSWORT_TITLE','Benachrichtigung-Passwort');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_BNA_PASSWORT_DESCRIPTION','Das Benachrichtigung-Passwort (unter Benachrichtigungen festlegen).');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_CNT_PASSWORT_TITLE','Contentpasswort');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_CNT_PASSWORT_DESCRIPTION','Das Contentpasswort (unter Content-Passwort).');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_ZONE_TITLE','Zone');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_ZONE_DESCRIPTION','Die Zone, auf die diese Zahlungart beschr&auml;nkt ist.');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_PREPARE_ORDER_STATUS_ID_TITLE','Status vorbereitete Bestellung');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_PREPARE_ORDER_STATUS_ID_DESCRIPTION','Der Status einer vorbereiteten Bestellung.');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_ORDER_STATUS_ID_TITLE','Status vorbereitete Bestellung');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_ORDER_STATUS_ID_DESCRIPTION','Der Status einer abgeschlossenen Bestellung.');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_STORE_TRANSACTION_DETAILS_TITLE','Transaktionsdetails speichern');
define('MODULE_PAYMENT_SOFORTUEBERWEISUNG_DIRECT_STORE_TRANSACTION_DETAILS_DESCRIPTION','Transaktionsdetails bei Benachrichtigung in das Kommentarfeld speichern (zum debuggen, ist f&uuml;rr Kunden im Konto sichtbar).');


// MODULE_SHIPPING
define('MODULE_SHIPPING_INSTALLED_TITLE','installierte Versandmodule');
define('MODULE_SHIPPING_INSTALLED_DESCRIPTION','Liste von installierten Versandmodulen, getrennt durch ein Semikolon. Diese Liste wird automatisch aktualisiert. Bitte nicht bearbeiten.');

//MODULE_SHIPPING_ITEM
define('MODULE_SHIPPING_ITEM_STATUS_TITLE','Versandkosten pro Artikel ');
define('MODULE_SHIPPING_ITEM_STATUS_DESCRIPTION','Sollen Versandkosten pro Artikel im Shop aktiviert werden?');
define('MODULE_SHIPPING_ITEM_COST_TITLE','Versandkosten');
define('MODULE_SHIPPING_ITEM_COST_DESCRIPTION','Diese Versandkosten werden mit der Anzahl der Artikel pro Bestellung multipliziert.');
define('MODULE_SHIPPING_ITEM_HANDLING_TITLE','Geb&uuml;hr');
define('MODULE_SHIPPING_ITEM_HANDLING_DESCRIPTION','Geb&uuml;hr f&uuml;r diese Versandmethode.');
define('MODULE_SHIPPING_ITEM_TAX_CLASS_TITLE','Steuerklasse');
define('MODULE_SHIPPING_ITEM_TAX_CLASS_DESCRIPTION','Steuerklasse, die bei Versandkosten pro Artikel benutzt wird.');
define('MODULE_SHIPPING_ITEM_ZONE_TITLE','Versandzone');
define('MODULE_SHIPPING_ITEM_ZONE_DESCRIPTION','Die Zone, auf die diese Versandart beschr&auml;nkt ist.');
define('MODULE_SHIPPING_ITEM_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_SHIPPING_ITEM_SORT_ORDER_DESCRIPTION','Sortierreihenfolge.Der niedrigste Wert wird zuerst angezeigt.');

//MODULE_SHIPPING_TABLE
define('MODULE_SHIPPING_TABLE_STATUS_TITLE','variable Versandkosten aktiviert');
define('MODULE_SHIPPING_TABLE_STATUS_DESCRIPTION','Sollen variable Versandkosten im Shop aktiviert werden?');
define('MODULE_SHIPPING_TABLE_COST_TITLE','Versandkosten');
define('MODULE_SHIPPING_TABLE_COST_DESCRIPTION','Die Versandkosten basierend auf dem Preis oder dem Gewicht der Artikel. Beispiel: 25:8.50,50:5.50,etc.. Bis 25kg 8.50€, von 25 kg bis 50kg 5.50€, ...');
define('MODULE_SHIPPING_TABLE_MODE_TITLE','Methode');
define('MODULE_SHIPPING_TABLE_MODE_DESCRIPTION','Die Versandkosten werden nach dem Gesamtpreis oder dem Gesamtgewicht der Bestellung berechnet.');
define('MODULE_SHIPPING_TABLE_HANDLING_TITLE','Geb&uuml;hr');
define('MODULE_SHIPPING_TABLE_HANDLING_DESCRIPTION','Geb&uuml;hr f&uuml;r diese Versandmethode.');
define('MODULE_SHIPPING_TABLE_TAX_CLASS_TITLE','Steuerklasse');
define('MODULE_SHIPPING_TABLE_TAX_CLASS_DESCRIPTION','Steuerklasse, die bei Versandkosten pro Artikel benutzt wird.');
define('MODULE_SHIPPING_TABLE_ZONE_TITLE','Versandzone');
define('MODULE_SHIPPING_TABLE_ZONE_DESCRIPTION','Die Zone, auf die diese Versandart beschr&auml;nkt ist.');
define('MODULE_SHIPPING_TABLE_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_SHIPPING_TABLE_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');

// MODULE_SHIPPING_ZONES
define('MODULE_SHIPPING_ZONES_STATUS_TITLE','Versandkosten nach Zone aktiviert');
define('MODULE_SHIPPING_ZONES_STATUS_DESCRIPTION','Soll Versandkosten nach Zone im Shop aktiviert werden?');
define('MODULE_SHIPPING_ZONES_TAX_CLASS_TITLE','Steuerklasse');
define('MODULE_SHIPPING_ZONES_TAX_CLASS_DESCRIPTION','Steuerklasse, die bei Versandkosten nach Zone benutzt wird.');
define('MODULE_SHIPPING_ZONES_COUNTRIES_1_TITLE','L&auml;nder Zone 1');
define('MODULE_SHIPPING_ZONES_COUNTRIES_1_DESCRIPTION','Durch Komma getrennte Liste der L&auml;nder, die in Zone 1 liegen.');
define('MODULE_SHIPPING_ZONES_COST_1_TITLE','Versandtabelle Zone 1');
define('MODULE_SHIPPING_ZONES_COST_1_DESCRIPTION','Versankosten f&uuml;r Zone 1. Durch Komma getrennte Liste mit dem Gewicht und den Kosten beinhaltet. Beispiel: 3:8.50,7:10.50,... Bis 3kg kosten der Versand 8,50&euro;, von 3,1kg bis 7kg kostet der Versand 10,50&euro.');
define('MODULE_SHIPPING_ZONES_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_SHIPPING_ZONES_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');
define('MODULE_SHIPPING_ZONES_HANDLING_1_TITLE','Geb&uuml;hr f&uuml;r Zone 1');
define('MODULE_SHIPPING_ZONES_HANDLING_1_DESCRIPTION','Geb&uuml;hr, die f&uuml;r einen Vesand nach Zone 1 erhoben wird.');


//MODULE_SHIPPING_FLAT
define('MODULE_SHIPPING_FLAT_STATUS_TITLE','Versand zu Pauschalpreis aktiviert');
define('MODULE_SHIPPING_FLAT_STATUS_DESCRIPTION','Sollen Produkte zu einem Pauschalpreis versendet werden k&ouml;nnen?');
define('MODULE_SHIPPING_FLAT_COST_TITLE','Versandkosten');
define('MODULE_SHIPPING_FLAT_COST_DESCRIPTION','Die Versandkosten f&uuml;r alle Bestellungen, die die Versandmethode Pauschalpreis nutzen.');
define('MODULE_SHIPPING_FLAT_TAX_CLASS_TITLE','Steuerklasse Versandgeb&uuml;hren');
define('MODULE_SHIPPING_FLAT_TAX_CLASS_DESCRIPTION','Steuerklasse, die bei einem Versand zu einem Pauschalpreis benutzt wird.');
define('MODULE_SHIPPING_FLAT_ZONE_TITLE','Versandzone');
define('MODULE_SHIPPING_FLAT_ZONE_DESCRIPTION','Die Zone, auf die diese Versandart beschr&auml;nkt ist.');
define('MODULE_SHIPPING_FLAT_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_SHIPPING_FLAT_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');

//MODULE_SHIPPING_USPS
define('MODULE_SHIPPING_USPS_STATUS_TITLE','Versand mit United States Postal Service aktiviert');
define('MODULE_SHIPPING_USPS_STATUS_DESCRIPTION','Sollen Produkte &uuml;ber United States Postal Service versendet werden k&ouml;nnen?');
define('MODULE_SHIPPING_USPS_USERID_TITLE','USPS Benutzername');
define('MODULE_SHIPPING_USPS_USERID_DESCRIPTION','Geben Sie ihren USPS Benutzername ein.');
define('MODULE_SHIPPING_USPS_PASSWORD_TITLE','USPS Passwort');
define('MODULE_SHIPPING_USPS_PASSWORD_DESCRIPTION','Geben Sie ihr USPS Passwort ein.');
define('MODULE_SHIPPING_USPS_HANDLING_TITLE','USPS Geb&uuml;hr');
define('MODULE_SHIPPING_USPS_HANDLING_DESCRIPTION','Die Geb&uuml;hr, die f&uuml;r einen Versand &uuml;ber USPS erhoben wird.');
define('MODULE_SHIPPING_USPS_TAX_CLASS_TITLE','Steuerklasse');
define('MODULE_SHIPPING_USPS_TAX_CLASS_DESCRIPTION','Steuerklasse, die bei einem Versand &uuml;ber USPS benutzt wird.');
define('MODULE_SHIPPING_USPS_ZONE_TITLE','Versandzone');
define('MODULE_SHIPPING_USPS_ZONE_DESCRIPTION','Die Zone, auf die diese Versandart beschr&auml;nkt ist.');
define('MODULE_SHIPPING_USPS_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_SHIPPING_USPS_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigste Wert wird zuerst angezeigt.');



// MODULE_SOCIAL_BOOKMARKS

//MODULE_SOCIAL_BOOKMARKS_INSTALLED
define('MODULE_SOCIAL_BOOKMARKS_INSTALLED_TITLE','installierte Social Bookmark Module');
define('MODULE_SOCIAL_BOOKMARKS_INSTALLED_DESCRIPTION','Liste von installierten Social Bookmark Modulen, getrennt duch ein Semikolon. Diese Liste wird automatisch aktualisiert. Bitte nicht bearbeiten.');

// MODULE_SOCIAL_BOOKMARKS_TWITTER
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_STATUS_TITLE','Twitter Modul aktiviert');
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_STATUS_DESCRIPTION','Sollen Artikel &uuml;ber Twitter empfohlen werden k&ouml;nnen?'); 
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert wird zuerst angezeigt.');

// MODULE_SOCIAL_BOOKMARKS_TWITTER_BUTTON
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_BUTTON_STATUS_TITLE','Twitter-Button Modul aktiviert');
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_BUTTON_STATUS_DESCRIPTION','Sollen Artikel &uuml;ber den Twitter Button empfohlen werden k&ouml;nnen?');
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_BUTTON_ACCOUNT_TITLE','Twitter Account des Shopbesitzers');
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_BUTTON_ACCOUNT_DESCRIPTION','Der Twitter Account des Shopbesitzers');
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_BUTTON_RELATED_ACCOUNT_TITLE','Zugeh&ouml;riger Twitter Account');
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_BUTTON_RELATED_ACCOUNT_DESCRIPTION','Zugeh&ouml;riger Twitter Account');
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_BUTTON_RELATED_ACCOUNT_DESC_TITLE','Beschreibung des zugeh&ouml;riger Twitter Accounts');
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_BUTTON_RELATED_ACCOUNT_DESC_DESCRIPTION','Beschreibung des zugeh&ouml;riger Twitter Accounts');
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_BUTTON_COUNT_POSITION_TITLE','Position Z&auml;hler');
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_BUTTON_COUNT_POSITION_DESCRIPTION','Position des Z&auml;hlers');
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_BUTTON_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_SOCIAL_BOOKMARKS_TWITTER_BUTTON_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Der niedrigiste Wert wird zuerst angezeigt.');

// MODULE_SOCIAL_BOOKMARKS_GOOGLE_BUZZ 
define('MODULE_SOCIAL_BOOKMARKS_GOOGLE_BUZZ_STATUS_TITLE','Artikel &uuml;ber Google Buzz Modul empfehlen');
define('MODULE_SOCIAL_BOOKMARKS_GOOGLE_BUZZ_STATUS_DESCRIPTION','Sollen Artikel &uuml;ber Google Buzz empfohlen werden k&ouml;nnen?');
define('MODULE_SOCIAL_BOOKMARKS_GOOGLE_BUZZ_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_SOCIAL_BOOKMARKS_GOOGLE_BUZZ_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert wird zuerst angezeigt.');

//MODULE_SOCIAL_BOOKMARKS_FACEBOOK
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_STATUS_TITLE','Artikel &uuml;ber Facebook empfehlen');
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_STATUS_DESCRIPTION','Sollen Artikel &uuml;ber Facebook empfohlen werden k&ouml;nnen?');
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert wird zuerst angezeigt.');

// MODULE_SOCIAL_BOOKMARKS_FACEBOOK_LIKE
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_LIKE_STATUS_TITLE','Artikel &uuml;ber Facebook "Gef&auml;llt mir Button" empfehlen');
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_LIKE_STATUS_DESCRIPTION','Sollen Artikel &uuml;ber Facebook "Gef&auml;llt mir Button" empfohlen werden k&ouml;nnen?');
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_LIKE_STYLE_TITLE','Aussehen');
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_LIKE_STYLE_DESCRIPTION','Das Aussehen des Facebook "Gef&auml;llt mir Buttons"?');
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_LIKE_FACES_TITLE','Profilbild');
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_LIKE_FACES_DESCRIPTION','Das Profilbild unter dem Facebook "Gef&auml;llt mir Button" anzeigen?');
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_LIKE_VERB_TITLE','Text');
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_LIKE_VERB_DESCRIPTION','Der Text unter dem Facebook "Gef&auml;llt mir Button". Z.B.: "gef&auml;llt mir".');
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_LIKE_SCHEME_TITLE','Farbschema');
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_LIKE_SCHEME_DESCRIPTION','Das Farbschema des Facebook "Gef&auml;llt mir Buttons".');
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_LIKE_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_SOCIAL_BOOKMARKS_FACEBOOK_LIKE_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert wird zuerst angezeigt.');


// modul digg
define('MODULE_SOCIAL_BOOKMARKS_DIGG_STATUS_TITLE','Artikel &uuml;ber Digg empfehlen');
define('MODULE_SOCIAL_BOOKMARKS_DIGG_STATUS_DESCRIPTION','Sollen Artikel &uuml;ber Digg empfohlen werden k&ouml;nnen?');
define('MODULE_SOCIAL_BOOKMARKS_DIGG_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_SOCIAL_BOOKMARKS_DIGG_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert wird zuerst angezeigt.');

// modul email
define('MODULE_SOCIAL_BOOKMARKS_EMAIL_STATUS_TITLE','Artikel &uuml;ber E-Mail empfehlen');
define('MODULE_SOCIAL_BOOKMARKS_EMAIL_STATUS_DESCRIPTION','Sollen Artikel &uuml;ber E-Mail empfohlen werden k&ouml;nnen?');
define('MODULE_SOCIAL_BOOKMARKS_EMAIL_SORT_ORDER_TITLE','Sortierreihenfolge');
define('MODULE_SOCIAL_BOOKMARKS_EMAIL_SORT_ORDER_DESCRIPTION','Sortierreihenfolge. Niedrigster Wert wird zuerst angezeigt.');


// Modul SEO URLS 5
define('USU5_ENABLED_TITLE','SEO URLs 5 einschalten');
define('USU5_ENABLED_DESCRIPTION','Soll f&uuml;r den Shop SEO URLs 5 genutzt werden?');
define('USU5_CACHE_ON_TITLE','Cache benutzen');
define('USU5_CACHE_ON_DESCRIPTION','Soll der Cache f&uuml;r SEO URLs 5 genutzt werden?');
define('USU5_MULTI_LANGUAGE_SEO_SUPPORT_TITLE','multilinguale Unterst&uuml;tzung');
define('USU5_MULTI_LANGUAGE_SEO_SUPPORT_DESCRIPTION','Sollen f&uuml;r verschiedene Sprachen verschiedene URLs generiert werden?');
define('USU5_USE_W3C_VALID_TITLE','URL nach W3C Spezifikation');
define('USU5_USE_W3C_VALID_DESCRIPTION','Sollen die URLs nach der W3C Spezifikation generiert werden?');
define('USU5_CACHE_SYSTEM_TITLE','Cachesystem');
define('USU5_CACHE_SYSTEM_DESCRIPTION','Welches System soll f&uuml;r den Cache genutzt werden?');
define('USU5_CACHE_DAYS_TITLE','Aufbewahrungszeit Cache');
define('USU5_CACHE_DAYS_DESCRIPTION','Wie lange sollen die Informationen im Cache gehalten werden?');
define('USU5_URLS_TYPE_TITLE','Typ URL');
define('USU5_URLS_TYPE_DESCRIPTION','W&auml;hlen Sie das Format der URL?');
define('USU5_PRODUCTS_LINK_TEXT_ORDER_TITLE','Produkttext');
define('USU5_PRODUCTS_LINK_TEXT_ORDER_DESCRIPTION','Text, der im Link angezeigt werden soll. p=Produktname, c=Kategorie, b=Hersteller, m=Model. Beispiel: cp');
define('USU5_FILTER_SHORT_WORDS_TITLE','kurze Worte ausfiltern');
define('USU5_FILTER_SHORT_WORDS_DESCRIPTION','Kurze Worte werden f&uuml;r die URL ausgefiltert.<br/>1 = Worte mit einem Zeichen ausfiltern<br/>2 = Worte mit zwei Zeichen oder k&uuml;rzer ausfiltern<br/>3 = Worte mit drei Zeichen oder k&uuml;rzer ausfiltern<br/>...');
define('USU5_ADD_CAT_PARENT_TITLE','&uuml;bergeordnete Kategorie einbeziehen');
define('USU5_ADD_CAT_PARENT_DESCRIPTION','Sollen die &uuml;bergeordneten Kategorien in der URL erscheinen?');
define('USU5_REMOVE_ALL_SPEC_CHARS_TITLE','nicht alphanumerische Zeichen entfernen');
define('USU5_REMOVE_ALL_SPEC_CHARS_DESCRIPTION','Entfernt alle Zeichen, die keine Zahl und kein Buchstabe sind, aus der URL');
define('USU5_ADD_CPATH_TO_PRODUCT_URLS_TITLE','cPath in URL');
define('USU5_ADD_CPATH_TO_PRODUCT_URLS_DESCRIPTION','Soll die osCommerce Variable cPaht in der URL erscheinen?');
define('USU5_CHAR_CONVERT_SET_TITLE','spezielle Zeichen ersetzen');
define('USU5_CHAR_CONVERT_SET_DESCRIPTION','Hier k&ouml;nnen spezielle Zeichen in der URL ersetzt werden<br/><br/>Format:<br/>Zeichen1=>Ersetzung1,Zeichen2=>Ersetzung2');
define('USU5_OUPUT_PERFORMANCE_TITLE','Verarbeitungszeit anzeigen');
define('USU5_OUPUT_PERFORMANCE_DESCRIPTION','<span style="color: red;">Das Anzeigen der Verarbeitungszeit sollte nicht bei einem aktiven Shop eingeschaltet werden.</span><br>Es dient zur Fehlersuche, un zeigt die internen Variablen von SEO URLs 5 am Ende der Seite an.');
define('USU5_DEBUG_OUPUT_VARS_TITLE','Variablen anzeigen');
define('USU5_DEBUG_OUPUT_VARS_DESCRIPTION','<span style="color: red;">Das Anzeigen von Variablen sollte nicht bei einem aktiven Shop eingeschaltet werden.</span><br>Es dient zur Fehlersuche, un zeigt die internen Variablen von SEO URLs 5 am Ende der Seite an. ');
define('USU5_HOME_PAGE_REDIRECT_TITLE','URL f&uuml;r Startseite umschreiben');
define('USU5_HOME_PAGE_REDIRECT_DESCRIPTION','Soll die URL f&uuml;r die Startseite von http://www.meineseite.de/index.php auf http://www.meineseite.de umgeschrieben werden?');
define('USU5_RESET_CACHE_TITLE','Cache leeren');
define('USU5_RESET_CACHE_DESCRIPTION','Soll der Cache geleert werden?');

// Edit Invoice
define('BOX_HEADING_EDIT_INVOICE', 'Rechnungen/Lieferschein bearbeiten');
define('BOX_TOOLS_EDIT_INVOICE', 'Rechnungstext(e)');
define('BOX_TOOLS_EDIT_INVOICE_CONFIG', 'Rechnungslayout');
define('ICON_ORDERS_INVOICE', 'Word-Rechnung');
define('ICON_ORDERS_PACKINGSLIP', 'Word-Lieferschein');
define('ICON_ORDERS_PDF', 'PDF-Rechnung');
define('ICON_ORDERS_PACKINGSLIP_PDF', 'PDF-Lieferschein');

define('MODULE_BOXES_CARD_ACCEPTANCE_STATUS_TITLE', 'Soll die Box im Shop angezeigt werden?');
define('MODULE_BOXES_CARD_ACCEPTANCE_STATUS_DESCRIPTION', 'Box angezeigen');
define('MODULE_BOXES_CARD_ACCEPTANCE_LOGOS_TITLE', 'Logos');
define('MODULE_BOXES_CARD_ACCEPTANCE_LOGOS_DESCRIPTION', 'Logos, die angezeigt werden sollen');
define('MODULE_BOXES_CARD_ACCEPTANCE_CONTENT_PLACEMENT_TITLE', 'Anordnung');
define('MODULE_BOXES_CARD_ACCEPTANCE_CONTENT_PLACEMENT_DESCRIPTION', 'Soll das Modul in der linken oder rechten Spalte angezeigt werden?');
define('MODULE_BOXES_CARD_ACCEPTANCE_SORT_ORDER_TITLE', 'Sortierreihenfolge');
define('MODULE_BOXES_CARD_ACCEPTANCE_SORT_ORDER_DESCRIPTION', 'Sortierreihenfolge. Niedrigster Wert zuerst.');

define('MODULE_BOXES_EXTRAINFOPAGE_STATUS_TITLE', 'Soll die Box im Shop angezeigt werden?');
define('MODULE_BOXES_EXTRAINFOPAGE_STATUS_DESCRIPTION', 'Box angezeigen');
define('MODULE_BOXES_EXTRAINFOPAGE_CONTENT_PLACEMENT_TITLE', 'Anordnung');
define('MODULE_BOXES_EXTRAINFOPAGE_CONTENT_PLACEMENT_DESCRIPTION', 'Soll das Modul in der linken oder rechten Spalte angezeigt werden?');
define('MODULE_BOXES_EXTRAINFOPAGE_SORT_ORDER_TITLE', 'Sortierreihenfolge');
define('MODULE_BOXES_EXTRAINFOPAGE_SORT_ORDER_DESCRIPTION', 'Sortierreihenfolge. Niedrigster Wert zuerst.');

define('MODULE_CONTENT_CHECKOUT_SUCCESS_PRODUCT_NOTIFICATIONS_STATUS_TITLE', 'Soll die Box im Shop angezeigt werden?');
define('MODULE_CONTENT_CHECKOUT_SUCCESS_PRODUCT_NOTIFICATIONS_STATUS_DESCRIPTION', 'Sollen die Produktbenachrichtigungen nach einem Einkauf angezeigt werden?');
define('MODULE_CONTENT_CHECKOUT_SUCCESS_PRODUCT_NOTIFICATIONS_SORT_ORDER_TITLE', 'Sortierreihenfolge');
define('MODULE_CONTENT_CHECKOUT_SUCCESS_PRODUCT_NOTIFICATIONS_SORT_ORDER_DESCRIPTION', 'Sortierreihenfolge. Niedrigster Wert zuerst.');

define('MODULE_CONTENT_CREATE_ACCOUNT_LINK_STATUS_TITLE', 'Soll die Box im Shop angezeigt werden?');
define('MODULE_CONTENT_CREATE_ACCOUNT_LINK_STATUS_DESCRIPTION', 'Sollen die Box "Kundenkonto erstellen" auf der Login Seite angezeigt werden?');
define('MODULE_CONTENT_CREATE_ACCOUNT_LINK_CONTENT_WIDTH_TITLE', 'Breite');
define('MODULE_CONTENT_CREATE_ACCOUNT_LINK_CONTENT_WIDTH_DESCRIPTION', 'Volle Breite order halbe Breite');
define('MODULE_CONTENT_CREATE_ACCOUNT_LINK_SORT_ORDER_TITLE', 'Sortierreihenfolge');
define('MODULE_CONTENT_CREATE_ACCOUNT_LINK_SORT_ORDER_DESCRIPTION', 'Sortierreihenfolge. Niedrigster Wert zuerst.');

define('MODULE_CONTENT_CHECKOUT_SUCCESS_REDIRECT_OLD_ORDER_STATUS_TITLE', 'Soll die Box im Shop angezeigt werden?');
define('MODULE_CONTENT_CHECKOUT_SUCCESS_REDIRECT_OLD_ORDER_STATUS_DESCRIPTION', 'Soll der Kunde beim Aufruf alter bestellungen weitergeleitet werden?');
define('MODULE_CONTENT_CHECKOUT_SUCCESS_REDIRECT_OLD_ORDER_MINUTES_TITLE', 'Minuten');
define('MODULE_CONTENT_CHECKOUT_SUCCESS_REDIRECT_OLD_ORDER_MINUTES_DESCRIPTION', '');
define('MODULE_CONTENT_CHECKOUT_SUCCESS_REDIRECT_OLD_ORDER_SORT_ORDER_TITLE', 'Sortierreihenfolge');
define('MODULE_CONTENT_CHECKOUT_SUCCESS_REDIRECT_OLD_ORDER_SORT_ORDER_DESCRIPTION', 'Sortierreihenfolge. Niedrigster Wert zuerst.');

define('MODULE_CONTENT_LOGIN_FORM_STATUS_TITLE', 'Soll die Box im Shop angezeigt werden?');
define('MODULE_CONTENT_LOGIN_FORM_STATUS_DESCRIPTION', 'Soll der Kunde sich im Shop anmelden k&ouml;nnen?');
define('MODULE_CONTENT_LOGIN_FORM_CONTENT_WIDTH_TITLE', 'Breite');
define('MODULE_CONTENT_LOGIN_FORM_CONTENT_WIDTH_DESCRIPTION', 'Volle Breite order halbe Breite');
define('MODULE_CONTENT_LOGIN_FORM_SORT_ORDER_TITLE', 'Sortierreihenfolge');
define('MODULE_CONTENT_LOGIN_FORM_SORT_ORDER_DESCRIPTION', 'Sortierreihenfolge. Niedrigster Wert zuerst.');

define('MODULE_CONTENT_CHECKOUT_SUCCESS_DOWNLOADS_STATUS_TITLE', 'Sollen die Downloads nach einem Kauf angezeigt werden?');
define('MODULE_CONTENT_CHECKOUT_SUCCESS_DOWNLOADS_STATUS_DESCRIPTION', 'Sollen die Produkte, die aus dem Shop heruntergeladen werden k&ouml;nnen, dem K&auml;ufer nach einem Einkauf angezeigt werden?');
define('MODULE_CONTENT_CHECKOUT_SUCCESS_DOWNLOADS_SORT_ORDER_TITLE', 'Sortierreihenfolge');
define('MODULE_CONTENT_CHECKOUT_SUCCESS_DOWNLOADS_SORT_ORDER_DESCRIPTION', 'Sortierreihenfolge. Niedrigster Wert zuerst.');


define('MODULE_CONTENT_CHECKOUT_SUCCESS_THANK_YOU_STATUS_TITLE', 'Danke Block anzeigen?');
define('MODULE_CONTENT_CHECKOUT_SUCCESS_THANK_YOU_STATUS_DESCRIPTION', 'Soll der Danke Block nach einem Einkauf angezeigt werden?');
define('MODULE_CONTENT_CHECKOUT_SUCCESS_THANK_YOU_SORT_ORDER_TITLE', 'Sortierreihenfolge');
define('MODULE_CONTENT_CHECKOUT_SUCCESS_THANK_YOU_SORT_ORDER_DESCRIPTION', 'Sortierreihenfolge. Niedrigster Wert zuerst.');

define('MODULE_CONTENT_ACCOUNT_SET_PASSWORD_STATUS_TITLE', 'Modul aktivieren?');
define('MODULE_CONTENT_ACCOUNT_SET_PASSWORD_STATUS_DESCRIPTION', 'Soll das Modul aktiviert werden?');
define('MODULE_CONTENT_ACCOUNT_SET_PASSWORD_ALLOW_PASSWORD_TITLE', 'Lokale Passw&ouml;rter erlauben');
define('MODULE_CONTENT_ACCOUNT_SET_PASSWORD_ALLOW_PASSWORD_DESCRIPTION', 'Sollen lokale Passw&ouml;rter erlaubt werden?');
define('MODULE_CONTENT_ACCOUNT_SET_PASSWORD_SORT_ORDER_TITLE', 'Sortierreihenfolge');
define('MODULE_CONTENT_ACCOUNT_SET_PASSWORD_SORT_ORDER_DESCRIPTION', 'Sortierreihenfolge. Niedrigster Wert zuerst.');
?>
