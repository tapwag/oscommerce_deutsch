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
* @Id $Id:: specials.php 56 2010-01-17 18:13:00Z Rob                  $:  Full Details   
*/

  final class KissMT_Module extends KissMT_Modules {

    private $specials_query;
    protected $noindex_follow = array( 'page' );
    
    public function __construct() {
      $this->specials_query = "SELECT pd.products_name FROM " . TABLE_SPECIALS . " s INNER JOIN " . TABLE_PRODUCTS . " p ON p.products_id = s.products_id AND p.products_status = 1 INNER JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd ON pd.products_id = p.products_id AND pd.language_id = :languages_id WHERE s.status = 1 LIMIT " . (int)KISSMT_CATEGORIES_PRODUCTS_LIMIT . "";
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
      $query = str_replace( array_keys( $query_replacements ), array_values( $query_replacements ), $this->specials_query );
      $result = KissMT::init()->query( $query );
      $list_string = '';
      while ( $specials_results = tep_db_fetch_array( $result ) ) {
        if ( tep_not_null( $specials_results['products_name'] ) ) {
          $list_string .= trim( $specials_results['products_name'] ) . '[-separator-]';
        }
      }
      tep_db_free_result( $result );
      $list_string = tep_not_null( $list_string ) ? $list_string : false; 
      $leading_values = implode( '[-separator-]', KissMT::init()->retrieve( 'breadcrumb' ) );
      
      KissMT::init()->setCanonical( $this->checkCanonical() ); 
      $this->parse( KissMT::init()->entities( sprintf( KISSMT_SPECIALS_TEXT, $leading_values ), $decode = true ), KissMT::init()->entities( $list_string, $decode = true ) );

    } // end method

  } // End class
?>