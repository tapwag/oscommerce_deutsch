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

  /**
  * General
  * Default text to add to meta titles that are too short. Leave blank if not needed. you can inlude %s to place your shop name in there.
  */
  define( 'KISSMT_TITLE_PADDING', 'buy from %s' );

  /**
  * Homepage
  * Note: The %s is where your shop name will go in the text
  */
  define( 'KISSMT_HOMEPAGE_TITLE', 'Our Product Range' );
  define( 'KISSMT_HOMEPAGE_DESCRIPTION', 'Yet another Online Store' );
  // Brand text ( manufacturer )
  define( 'KISSMT_BRAND_TEXT', 'by %s' );
  // Manufacturers page (index.php)
  define( 'KISSMT_MANUFACTURERS_TEXT', 'Products by %s at ' . STORE_NAME );

  // specials.php
  define( 'KISSMT_SPECIALS_TEXT', '%s at ' . STORE_NAME );
  // products_new.php
  define( 'KISSMT_PRODUCTS_NEW_TEXT', '%s at ' . STORE_NAME );
  // reviews.php
  define( 'KISSMT_REVIEWS_TEXT', '%s from customers at ' . STORE_NAME );
  // product_reviews.php  
  define( 'KISSMT_PRODUCT_REVIEWS_TEXT', 'Customer reviews on %s' );
  // product_reviews_info.php
  define( 'KISSMT_PRODUCT_REVIEWS_INFO_TEXT', 'Product review by %s' );
  
  /**
  * Generic pages
  * Here you can build meta tags for any of the peripheral pages simply by creating two defines
  * KISSMT_XXXXX_TITLE_TEXT and KISSMT_XXXXX_DESCRIPTION_TEXT
  * the XXXXX must be the name of the file ( less the .php ) in capitals
  * If there is a %s in the KISSMT_XXXXX_TITLE_TEXT this is replaced with the page HEADING_TITLE
  */
  // privacy.php
  define( 'KISSMT_PRIVACY_TITLE_TEXT', '%s privacy statement from ' . STORE_NAME );
  define( 'KISSMT_PRIVACY_DESCRIPTION_TEXT', 'We take all possible measures to ensure the safety of your privacy and information.' );
  // conditions.php
  define( 'KISSMT_CONDITIONS_TITLE_TEXT', '%s conditions statement from ' . STORE_NAME );
  define( 'KISSMT_CONDITIONS_DESCRIPTION_TEXT', 'Information about conditions of usage.' );
  // shipping.php
  define( 'KISSMT_SHIPPING_TITLE_TEXT', '%s information at ' . STORE_NAME );
  define( 'KISSMT_SHIPPING_DESCRIPTION_TEXT', 'Shipping, packaging and handling.' );
  // contact_us.php
  define( 'KISSMT_CONTACT_US_TITLE_TEXT', '%s if you need assistance from ' . STORE_NAME );
  define( 'KISSMT_CONTACT_US_DESCRIPTION_TEXT', 'Should you have any questions or queries, please don\'t hesitate to contact us..' );
?>
