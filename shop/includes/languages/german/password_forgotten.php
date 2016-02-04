<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2013 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Anmelden');
define('NAVBAR_TITLE_2', 'Passwort vergessen');

define('HEADING_TITLE', 'Ich habe mein Passwort vergessen!');

define('TEXT_MAIN', 'Wenn Sie Ihr Passwort vergessen haben, geben Sie Ihre E-Mail-Adresse ein und wir senden Ihnen Anweisungen, wie sicher Ihr Passwort &auml;ndern.');

define('TEXT_PASSWORD_RESET_INITIATED', ' &uuml;berpr&uuml;fen Sie Ihre E-Mail-Anweisungen, wie Sie Ihr Passwort zu &auml;ndern. Es enth&auml;lt einen Link, der f&uuml;r 24 Stunden oder bis das Passwort wurde aktualisiert funktioniert.');

define('TEXT_NO_EMAIL_ADDRESS_FOUND', 'Fehler: Die eingegebene eMail-Adresse ist nicht registriert. Bitte versuchen Sie es noch einmal.');

define('EMAIL_PASSWORD_RESET_SUBJECT', STORE_NAME . ' - Neues Passwort');
define('EMAIL_PASSWORD_RESET_BODY', 'Ein neues Passwort f&uuml;r Ihr Konto wurde angefordert ' . STORE_NAME . '.' . "\n\n" . 'Folgen Sie diesem Link, um pers&ouml;nliche sicher Ihr Passwort &auml;ndern:' . "\n\n" . '%s' . "\n\n" . 'Dieser Link wird automatisch nach 24 Stunden oder nach Ihrem Passwort wurde ge&auml;ndert verworfen.' . "\n\n" . 'Wenn Sie Hilfe mit einem unserer Online-Dienste ben&ouml;tigen, mailen Sie an den Shopbetreiber: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");

define('ERROR_ACTION_RECORDER', ' Fehler: Ein Link zum Zur&uuml;cksetzen des Passworts wurde bereits gesendet. Versuchen Sie es in %s Minuten nochmal.');
?>
