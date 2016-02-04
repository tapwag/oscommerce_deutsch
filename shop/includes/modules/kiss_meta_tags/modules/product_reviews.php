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
* @Id $Id:: product_reviews.php 56 2010-01-17 18:13:00Z Rob           $:  Full Details   
*/

  final class KissMT_Module extends KissMT_Modules {

    private $products_query;
    protected $noindex_follow = array( 'page' );
    
    public function __construct() {
      $this->products_query = "SELECT p.products_model, pd.products_name, m.manufacturers_name, left(rd.reviews_text, 100) AS reviews_text FROM " . TABLE_PRODUCTS . " p INNER JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd ON pd.products_id = p.products_id AND pd.language_id = :languages_id LEFT JOIN " . TABLE_MANUFACTURERS . " m ON m.manufacturers_id = p.manufacturers_id LEFT JOIN " . TABLE_REVIEWS . " r ON r.products_id = p.products_id LEFT JOIN " . TABLE_REVIEWS_DESCRIPTION . " rd ON rd.reviews_id = r.reviews_id AND rd.languages_id = :languages_id WHERE p.products_id = :products_id LIMIT " . (int)KISSMT_CATEGORIES_PRODUCTS_LIMIT . "";
    } // end constructor
    
    public function process() {

      $this->get_value = $this->parsePath( $_GET['products_id'] );
      $this->original_get = (int)$_GET['products_id'];
      $this->cache_name = $this->setCacheString( __FILE__, 'reviews_id', $this->original_get );
      if ( false !== $this->retrieve( $this->cache_name ) ) {
        $reviews_string = ( isset( $_GET['reviews_id'] ) && is_numeric( $_GET['reviews_id'] ) ) ? '&reviews_id=' . $_GET['reviews_id'] : '';  
        KissMT::init()->setCanonical( $this->checkCanonical( 'products_id', $reviews_string ) );
        return;
      } 
      $query_replacements = array( ':products_id' => (int)$this->get_value, ':languages_id' => (int)KissMT::init()->retrieve( 'languages_id' ) );
      $query = str_replace( array_keys( $query_replacements ), array_values( $query_replacements ), $this->products_query );
      $result = KissMT::init()->query( $query );
      $reviews_text = '';
      $products_model = '';
      $products_name = '';
      $manufacturers_name = '';
      while ( $product_results = tep_db_fetch_array( $result ) ) {
        if ( tep_not_null( $product_results['products_model'] ) ) {
        $products_model = trim( $product_results['products_model'] );
        }
        if ( tep_not_null( $product_results['products_name'] ) ) {
        $products_name =  trim( $product_results['products_name'] );
        }
        if ( tep_not_null( $product_results['manufacturers_name'] ) ) {
        $manufacturers_name = trim( $product_results['manufacturers_name'] );
        }
        if ( tep_not_null( $product_results['reviews_text'] ) ) {
          $reviews_text .= trim( rtrim( $product_results['reviews_text'], '.' ) . '.' ) . '[-separator-]';
        }
      }
      tep_db_free_result( $result );
      $breadcrumb = array_flip( KissMT::init()->retrieve( 'breadcrumb' ) ); 
      if ( array_key_exists( $products_model, $breadcrumb ) ) {
        unset( $breadcrumb[$products_model] );
      }
      if ( array_key_exists( $products_name, $breadcrumb ) ) {
        unset( $breadcrumb[$products_name] );
      }
      if ( array_key_exists( NAVBAR_TITLE, $breadcrumb ) ) {
        unset( $breadcrumb[NAVBAR_TITLE] );
      }
      $breadcrumb = array_flip( $breadcrumb );
      $leading_values = $products_name;
      if ( tep_not_null( $products_model ) ) {  
         $leading_values .= '[-separator-]' . $products_model;
      } 
      $leading_values .= '[-separator-]' . implode( '[-separator-]', $breadcrumb );
      if ( tep_not_null( $manufacturers_name ) ) { 
        $leading_values .= '[-separator-]' . sprintf( KISSMT_BRAND_TEXT, $manufacturers_name );
      }
      $reviews_string = ( isset( $_GET['reviews_id'] ) && is_numeric( $_GET['reviews_id'] ) ) ? '&reviews_id=' . $_GET['reviews_id'] : '';  
      KissMT::init()->setCanonical( $this->checkCanonical( 'products_id', $reviews_string ) );
      $this->parse( KissMT::init()->entities( sprintf( KISSMT_PRODUCT_REVIEWS_TEXT, $leading_values ), $decode = true ), KissMT::init()->entities( $reviews_text, $decode = true )  );
    } // end method

  } // End class
?>