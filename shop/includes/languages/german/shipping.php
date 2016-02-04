<?php
/*
  $Id: shipping.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Zahlungs- und Versandinformationen');
define('HEADING_TITLE', 'Zahlungs- und Versandinformationen');

define('HEADING_VERSANDKOSTEN', 'Versandkosten');
define('TEXT_VERSANDKOSTEN_1', '(*) Der Versand von Ware bis 31 kg erfolgt in der Regel - wenn Abmessungen (120x60x60 cm) und Gewichte (max. 31 kg) dies zulassen - als versichertes Paket lt. Tabelle.<br>
Abweichende Abmessungen und Gewichte, sowie Sendungen ins non-EU-Ausland werden zu den jeweils anfallenden Kosten berechnet.');
define('TEXT_VERSANDKOSTEN_2', 'Kleinteile k&ouml;nnen auf Kundenwunsch auch per unversichertem Brief/Warensendung f&uuml;r 2.95 Euro innerhalb Deutschlandes verschickt werden; f&uuml;r unversicherte Sendungen k&ouml;nnen wir bei Besch&auml;digung/Verlust keine Haftung &uuml;bernehmen.');
define('TEXT_VERSANDKOSTEN_3', 'Bei fehlerhaften/unvollst&auml;ndigen Angaben zur Liefer-/Rechnungsanschrift (z.B. falsche PLZ, falsche Hausnummer,
nicht zustellbare Adresse wegen fehlendem Namensschild, etc.) kann es zu Mehrkosten bei der Versandabwicklung kommen.
Diese Mehrkosten (Zuschl&auml;ge des Kurierdienstes f&uuml;r Adressermittlung, PLZ-Korrektur, etc) gehen zu Lasten des Kunden.');
define('TEXT_VERSANDKOSTEN_4', '');

define('TABLE_VERSANDKOSTEN_HEAD', 'Versandkosten pro Lieferung (inkl. MwSt und in Euro) *');
define('TABLE_VERSANDKOSTEN_LAND', 'Land');
define('TABLE_VERSANDKOSTEN_ZUST', 'Zustellung ab Versand<br>in Werktagen');
define('TABLE_VERSANDKOSTEN_D', 'Deutschland');
define('TABLE_VERSANDKOSTEN_EU', 'EU:<br>A, B, BG, CZ, CY (au&szlig;er Nordteil), DK (au&szlig;er Far&ouml;er, Gr&ouml;nland), E (au&szlig;er Kanaren, Ceuta und Melilla), EST,
        F (au&szlig;er &Uuml;bersee und Departments), FIN (au&szlig;er Alandinseln), GB (au&szlig;er Kanalinseln),
        GR (au&szlig;er Berg Athos), H, HR, IRL, I (au&szlig;er Livigno und Campione dItalia), LV, LT, L, M, NL (au&szlig;er non-EU), PL, P, RO, S, SK, SLO');
define('TABLE_IBC_HEAD', 'IBC Versandkosten innerhalb D ohne Inseln (inkl. MwSt und in Euro)');

define('HEADING_LIEFERZEIT', 'Lieferzeit');
define('TEXT_LIEFERZEIT_1', 'Die Lieferung erfolgt sp&auml;testens innerhalb von <Ihre Lieferzeit> Arbeitstagen (Montag bis Freitag, Feiertage ausgenommen) nach Erteilung des Zahlungsauftrags an das &uuml;berweisende Kreditinstitut (bei Vorkasse) bzw. nach Vertragsschluss (bei Nachnahme oder Rechnungskauf).');
define('TEXT_LIEFERZEIT_2', 'Das voraussichtliche Lieferdatum h&auml;ngt von mehreren Faktoren ab, wie Lieferadresse, Versandart und Verf&uuml;gbarkeit.
Zur Berechnung des voraussichtlichen Lieferdatums addieren wir die Dauer einer Bank&uuml;berweisung mit der Zeit, die das Paket von
unserem Lager bis zu einer Adresse in Deutschland im Regelfall ben&ouml;tigt. Bitte ber&uuml;cksichtigen Sie dabei, dass Wochenend- und Feiertage hinzugerechnet werden m&uuml;ssen.');
define('TEXT_LIEFERZEIT_3', 'Die Auslieferung Ihrer Bestellung erfolgt &uuml;ber einen unserer Logistikpartner <Ihre Paketdienste> oder <Ihre Paketdienste>.');
define('TEXT_LIEFERZEIT_4', 'Sie sehen das voraussichtliche Lieferdatum (oder einen entsprechenden Zeitrahmen) auf der letzten Seite des Bestellformulars.');
define('HEADING_ZAHLUNG', 'Zahlung');
define('TEXT_ZAHLUNG_1', 'Sie k&ouml;nnen bei uns per &Uuml;berweisung oder <Ihre Zahlungsarten> bezahlen.');

// Wenn Sie dieses Formular anpassen, muß das parallel zu der catalog/shipping-Datei gemacht werden, und dann für die Anzeige der Daten die jeweilige Sprache ebenso

?>