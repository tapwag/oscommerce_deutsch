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
* @lastmod $Date:: 2010-01-17 18:13:00 +0000 (Sun, 17 Jan 2010)       $:  Date of last commit
* @version $Rev:: 56                                                  $:  Revision of last commit
* @Id $Id:: reviews.php 56 2010-01-17 18:13:00Z Rob                   $:  Full Details   
*/

  final class KissMT_Module extends KissMT_Modules {

    private $reviews_query;
    protected $noindex_follow = array( 'page' );
    
    public function __construct() {
      $this->reviews_query = "SELECT pd.products_name FROM " . TABLE_REVIEWS . " r LEFT JOIN " . TABLE_REVIEWS_DESCRIPTION . " rd ON rd.reviews_id = r.reviews_id AND rd.languages_id = :languages_id LEFT JOIN " . TABLE_PRODUCTS . " p ON p.products_id = r.products_id AND p.products_status = 1 LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd ON pd.products_id = p.products_id AND pd.language_id = :languages_id ORDER BY r.reviews_id DESC LIMIT " . (int)KISSMT_CATEGORIES_PRODUCTS_LIMIT . "";
    } // end constructor
    
    public function process() {

      $this->get_value = '';
      $this->original_get = '';
      $this->cache_name = $this->setCacheString( __FILE__, 'listing', 'general' );
      if ( false !== $this->retrieve( $this->cache_name ) ) {
        KissMT::init()->setCanonical( $this->checkCanonical() );
        return;
      } 
      $query_replacements = array( ':languages_id' => (int)KissMT::init()->retrieve( 'languages_id' ) );
      $query = str_replace( array_keys( $query_replacements ), array_values( $query_replacements ), $this->reviews_query );
      $result = KissMT::init()->query( $query );
      $list_array = array();
      while ( $reviews_products_results = tep_db_fetch_array( $result ) ) {
        if ( tep_not_null( $reviews_products_results['products_name'] ) ) {
          $list_array[] = trim( $reviews_products_results['products_name'] );
        }
      }
      $list_string = implode( '[-separator-]', $this->removeArrayDuplicates( $list_array ) );
      tep_db_free_result( $result );
      $list_string = tep_not_null( $list_string ) ? $list_string : false; 
      $leading_values = implode( '[-separator-]', KissMT::init()->retrieve( 'breadcrumb' ) );
      
      KissMT::init()->setCanonical( $this->checkCanonical() ); 
      $this->parse( KissMT::init()->entities( sprintf( KISSMT_REVIEWS_TEXT, $leading_values ), $decode = true ), KissMT::init()->entities( $list_string, $decode = true ) );

    } // end method

  } // End class
?>