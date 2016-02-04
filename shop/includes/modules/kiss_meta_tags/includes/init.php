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
* @lastmod $Date:: 2010-01-27 21:17:15 +0000 (Wed, 27 Jan 2010)       $:  Date of last commit
* @version $Rev:: 69                                                  $:  Revision of last commit
* @Id $Id:: init.php 69 2010-01-27 21:17:15Z Rob                      $:  Full Details   
*/

  /**
  * The number of products or categories to retrieve from the database for description/keywords.
  */
  defined( 'KISSMT_CATEGORIES_PRODUCTS_LIMIT' ) || define( 'KISSMT_CATEGORIES_PRODUCTS_LIMIT', 30 );
  /**
  * Separator for the page title words.
  */
  defined( 'KISSMT_TITLE_SEPARATOR' )           || define( 'KISSMT_TITLE_SEPARATOR', '-' );
  /**
  * Limit the meta description to X characters
  */
  defined( 'KISS_MT_META_DESCRIPTION_LENGTH' )  || define( 'KISS_MT_META_DESCRIPTION_LENGTH', 255 );
  /**
  * Limit the meta keywords to X words
  */
  defined( 'KISS_MT_META_KEYWORDS_NUMWORDS' )   || define( 'KISS_MT_META_KEYWORDS_NUMWORDS', 10 );
  /**
  * Limit the meta title to the nearest full word to X characters
  */
  defined( 'KISS_MT_META_TITLE_LENGTH' )        || define( 'KISS_MT_META_TITLE_LENGTH', 100 );
  /**
  * Limit the page title to the nearest full word to X characters
  */
  defined( 'KISS_MT_PAGE_TITLE_LENGTH' )        || define( 'KISS_MT_PAGE_TITLE_LENGTH', 40 );
  /**
  * XHTML tag output - string true / false
  */
  defined( 'KISSMT_XHTML_OUTPUT' )              || define( 'KISSMT_XHTML_OUTPUT', 'false' );
  /**
  * Output the performance info - you'll see it at the bottom of the page.
  * string true / false
  */
  defined( 'KISSMT_PERFORMANCE_OUTPUT' )        || define( 'KISSMT_PERFORMANCE_OUTPUT', 'false' );
  /**
  * Output the class properties. - you'll see it at the bottom of the page
  * Note: This will only output if KISSMT_PERFORMANCE_OUTPUT is also set to true.
  */
  defined( 'KISSMT_CLASS_OUTPUT' )              || define( 'KISSMT_CLASS_OUTPUT', 'false' );
  /**
  * Cache reset - string reset / false  
  */
  defined( 'KISSMT_CACHE_RESET' )               || define( 'KISSMT_CACHE_RESET', 'false' );
  /**
  * Cache on/off switch - string true / false  
  */
  defined( 'KISSMT_CACHE_ON' )                  || define( 'KISSMT_CACHE_ON', 'true' );
  /**
  * Show the canonical tag for relevant pages - string true / false
  */
  defined( 'KISSMT_CANONICAL_ON' )              || define( 'KISSMT_CANONICAL_ON', 'true' ); 
?>