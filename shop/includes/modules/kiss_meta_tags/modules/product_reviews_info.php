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
* @lastmod $Date:: 2010-01-18 10:45:55 +0000 (Mon, 18 Jan 2010)       $:  Date of last commit
* @version $Rev:: 59                                                  $:  Revision of last commit
* @Id $Id:: product_reviews_info.php 59 2010-01-18 10:45:55Z Rob      $:  Full Details   
*/

  final class KissMT_Module extends KissMT_Modules {

    private $products_query;
    protected $noindex_follow = array();
    
    public function __construct() {
      $this->products_query = "SELECT p.products_model, pd.products_name, m.manufacturers_name, left(rd.reviews_text, 100) AS reviews_text, r.customers_name FROM " . TABLE_REVIEWS . " r INNER JOIN " . TABLE_REVIEWS_DESCRIPTION . " rd ON rd.reviews_id = r.reviews_id AND rd.languages_id = :languages_id INNER JOIN " . TABLE_PRODUCTS . " p ON p.products_id = r.products_id INNER JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd ON pd.products_id = p.products_id AND pd.language_id = :languages_id LEFT JOIN " . TABLE_MANUFACTURERS . " m ON m.manufacturers_id = p.manufacturers_id WHERE r.reviews_id = :reviews_id";
    } // end constructor
    
    public function process() {

      $this->get_value = $this->parsePath( $_GET['reviews_id'] );
      $this->original_get = (int)$_GET['reviews_id'];
      $this->cache_name = $this->setCacheString( __FILE__, 'reviews_id', $this->original_get );
      if ( false !== $this->retrieve( $this->cache_name ) ) {
        $reviews_string = ( isset( $_GET['products_id'] ) && is_numeric( $_GET['products_id'] ) ) ? '&products_id=' . $_GET['products_id'] : '';
        KissMT::init()->setCanonical( $this->checkCanonical( 'reviews_id', $reviews_string ) );
        return;
      } 
      $query_replacements = array( ':reviews_id' => (int)$this->get_value, ':languages_id' => (int)KissMT::init()->retrieve( 'languages_id' ) );
      $query = str_replace( array_keys( $query_replacements ), array_values( $query_replacements ), $this->products_query );
      $result = KissMT::init()->query( $query );
      $product_results = tep_db_fetch_array( $result );
      tep_db_free_result( $result );
      $breadcrumb = array_flip( KissMT::init()->retrieve( 'breadcrumb' ) ); 
      if ( array_key_exists( $product_results['products_model'], $breadcrumb ) ) {
        unset( $breadcrumb[$product_results['products_model']] );
      }
      if ( array_key_exists( $product_results['products_name'], $breadcrumb ) ) {
        unset( $breadcrumb[$product_results['products_name']] );
      }
      if ( array_key_exists( NAVBAR_TITLE, $breadcrumb ) ) {
        unset( $breadcrumb[NAVBAR_TITLE] );
      }
      $breadcrumb = array_flip( $breadcrumb );
      $leading_values = KissMT::init()->entities( trim( $product_results['products_name'] ), $decode = true );
      if ( tep_not_null( $product_results['products_model'] ) ) {  
         $leading_values .= '[-separator-]' . trim( $product_results['products_model'] );
      } 
      $leading_values .= '[-separator-]' . implode( '[-separator-]', $breadcrumb );
      if ( tep_not_null( $product_results['manufacturers_name'] ) ) { 
        $leading_values .= '[-separator-]' . sprintf( KISSMT_BRAND_TEXT, trim( $product_results['manufacturers_name'] ) );
      }
      if ( tep_not_null( $product_results['reviews_text'] ) ) {
      }
      $reviews_string = ( isset( $_GET['products_id'] ) && is_numeric( $_GET['products_id'] ) ) ? '&products_id=' . $_GET['products_id'] : '';  

      KissMT::init()->setCanonical( $this->checkCanonical( 'reviews_id', $reviews_string ) );
      $this->parse( KissMT::init()->entities( sprintf( KISSMT_PRODUCT_REVIEWS_INFO_TEXT, $product_results['customers_name'] ), $decode = true ) . '[-separator-]' . KissMT::init()->entities( $leading_values, $product_results['reviews_text'], $decode = true ) );
    } // end method

  } // End class
?>