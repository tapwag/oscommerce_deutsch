<?php
/*
  $Id: shipping.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Payment - and shipping information');
define('HEADING_TITLE', 'Payment- and  shipping information');

define('HEADING_VERSANDKOSTEN', 'shipping costs');
define('TEXT_VERSANDKOSTEN_1', '(*) The shipment of products up to 31 kg is usually done as a parcel with insurance as shown on the list above, if allowed by size (120x60x60 cm) and weight (max. 31 kg).<br>
The shipping costs for dissenting sizes and weights, as well as parcels to non-EU-countries are calculated in each case.');
define('TEXT_VERSANDKOSTEN_2', 'Small parts can be shipped via letter starting at <your price > Euro on demand. Please note: the letter has no insurance and we assume no liability for damage/loss.');
define('TEXT_VERSANDKOSTEN_3', 'If the customer specified a wrong/incomplete address (e.g. wrong city code, wrong house number, etc.), the additional costs for the delivery will be charged at the expense of the customer.');
define('TEXT_VERSANDKOSTEN_4', '');

define('TABLE_VERSANDKOSTEN_HEAD', 'shipping costs per parcel (incl. tax and in Euro) *');
define('TABLE_VERSANDKOSTEN_LAND', 'country');
define('TABLE_VERSANDKOSTEN_ZUST', 'delivery from shipment<br>in workdays');
define('TABLE_VERSANDKOSTEN_D', 'Germany');
define('TABLE_VERSANDKOSTEN_EU', 'EU:<br>A, B, BG, CZ, CY (besides northern part), DK (besides Faroese, Greenland), E (besides Canaries, Ceuta and Melilla), EST,
        F (besides oversea and Departments), FIN (besides  Alandisland), GB (besides channel island),
        GR (besides mount Athos), H, HR, IRL, I (besides  Livigno and Campione dItalia), LV, LT, L, M, NL (besides non-EU), PL, P, RO, S, SK, SLO');
define('TABLE_IBC_HEAD', 'IBC shipping costs in Germany without islands (incl. tax and in Euro)');

define('HEADING_LIEFERZEIT', 'delivery period');
define('TEXT_LIEFERZEIT_1', 'The shipment will take place inbetween <your delivery period> workdays (monday-friday, holidays excluded) after issuing the payment order at the transferring bank (payment in advance) and accordingly after making a contract (purchase on account).');
define('TEXT_LIEFERZEIT_2', 'The estimated delivery period depends on several parameters, like delivery address, mode of shipment, etc.
To calculate the estimated delivery period we add the duration of the bank transfer and the regular shipping time by our carrier. Please take account of the addition of weekends and holidays.');
define('TEXT_LIEFERZEIT_3', 'The shipment of your order is carried out by <your carrier> or <your carrier>.');
define('TEXT_LIEFERZEIT_4', 'You can see the estimated delivery period on the last page of your order.');
define('HEADING_ZAHLUNG', 'payment');
define('TEXT_ZAHLUNG_1', 'You can pay via bank transfer or <your payment methods>.');

?>