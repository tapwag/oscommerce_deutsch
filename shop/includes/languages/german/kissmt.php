<?php 
/**
*
* KISS Dynamic SEO Meta Tags
* KISS = (Keep It Simple Stupid!) 
* 
* @package KISS Meta Tags SEO v1.0
* @license http://www.opensource.org/licenses/gpl-2.0.php GNU Public License
* @link http://www.fwrmedia.co.uk
* @copyright Copyright 2008-2009 FWR Media
* @author Robert Fisher, FWR Media, http://www.fwrmedia.co.uk 
* @lastdev $Author:: Rob                                              $:  Author of last commit
* @lastmod $Date:: 2010-01-09 18:17:57 +0000 (Sat, 09 Jan 2010)       $:  Date of last commit
* @version $Rev:: 39                                                  $:  Revision of last commit
* @Id $Id:: kissmt.php 39 2010-01-09 18:17:57Z Rob                    $:  Full Details   
*/

/*
  Credits: Thanks to Daniel Kölsch aka Morpheus1979 for this translation
*/

  /**
  * General
  * Default text to add to meta titles that are too short. Leave blank if not needed. you can inlude %s to place your shop name in there.
  */
  define( 'KISSMT_TITLE_PADDING', 'buy from %s' );

  /**
  * Homepage
  * Note: The %s is where your shop name will go in the text. The original version had Tischtennisshop (table tennis shop) inside it. 
  * If you would like to add meta tags please write them below in the brackets after %s or %s - 
  */
  define( 'KISSMT_HOMEPAGE_TITLE', '%s ' );
  define( 'KISSMT_HOMEPAGE_DESCRIPTION', '%s - ' );

  // Brand text ( manufacturer )
  define( 'KISSMT_BRAND_TEXT', 'bei %s' );
  // Manufacturers page (index.php)
  define( 'KISSMT_MANUFACTURERS_TEXT', 'Produkte von %s bei ' . STORE_NAME );

  // specials.php
  define( 'KISSMT_SPECIALS_TEXT', '%s bei ' . STORE_NAME );
  // products_new.php
  define( 'KISSMT_PRODUCTS_NEW_TEXT', '%s bei ' . STORE_NAME );
  // reviews.php
  define( 'KISSMT_REVIEWS_TEXT', '%s von Kunden bei ' . STORE_NAME );
  // product_reviews.php  
  define( 'KISSMT_PRODUCT_REVIEWS_TEXT', 'Kundenmeinungen bei %s' );
  // product_reviews_info.php
  define( 'KISSMT_PRODUCT_REVIEWS_INFO_TEXT', 'Produktbeurteilungen bei %s' );
  
  /**
  * Generic pages
  * Here you can build meta tags for any of the peripheral pages simply by creating two defines
  * KISSMT_XXXXX_TITLE_TEXT and KISSMT_XXXXX_DESCRIPTION_TEXT
  * the XXXXX must be the name of the file ( less the .php ) in capitals
  * If there is a %s in the KISSMT_XXXXX_TITLE_TEXT this is replaced with the page HEADING_TITLE
  */
  // privacy.php
  define( 'KISSMT_PRIVACY_TITLE_TEXT', '%s Datenschutzbestimmungen von ' . STORE_NAME );
  define( 'KISSMT_PRIVACY_DESCRIPTION_TEXT', 'Wir ergreifen alle m&ouml;glichen Ma&szlig;nahmen, um die Sicherheit Ihrer Privatsph&auml;re und Informationen zu gew&auml;hrleisten.' );
  // conditions.php
  define( 'KISSMT_CONDITIONS_TITLE_TEXT', '%s Erkl&auml;rung der Nutzungsbedingungen von ' . STORE_NAME );
  define( 'KISSMT_CONDITIONS_DESCRIPTION_TEXT', 'Informationen &uuml;ber die Nutzungsbedingungen.' );
  // shipping.php
  define( 'KISSMT_SHIPPING_TITLE_TEXT', '%s Versandinformationen bei ' . STORE_NAME );
  define( 'KISSMT_SHIPPING_DESCRIPTION_TEXT', 'Versand, Verpackung und Handling' );
  // contact_us.php
  define( 'KISSMT_CONTACT_US_TITLE_TEXT', '%s Wenn Sie Hilfe ben&ouml;tigen von ' . STORE_NAME );
  define( 'KISSMT_CONTACT_US_DESCRIPTION_TEXT', 'Sollten Sie Fragen oder Anregungen haben, z&ouml;gern Sie nicht.' );
?>
