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
* @lastmod $Date:: 2010-01-17 18:13:45 +0000 (Sun, 17 Jan 2010)       $:  Date of last commit
* @version $Rev:: 57                                                  $:  Revision of last commit
* @Id $Id:: information.php 57 2010-01-17 18:13:45Z Rob               $:  Full Details   
*/

  final class KissMT_Module extends KissMT_Modules {

    private $info_query;
    protected $noindex_follow = array();
    
    public function __construct() {
      $this->info_query = "SELECT information_title AS name, left( information_description, 255 ) AS description FROM " . TABLE_INFORMATION . " WHERE visible='1' AND language_id=:languages_id AND information_id=':info_id' ORDER BY sort_order";
    } // end constructor
    
    public function process() {
      // Do we have an info_id
      if ( array_key_exists( 'info_id', $_GET ) && tep_not_null( $_GET['info_id'] ) ) {
        $this->get_value = $this->parsePath( $_GET['info_id'] );
        $this->original_get = (int)$_GET['info_id'];
        $this->cache_name = $this->setCacheString( __FILE__, 'info_pages', $this->original_get );
        if ( false !== $this->retrieve( $this->cache_name ) ) {  
          KissMT::init()->setCanonical( $this->checkCanonical( 'info_id' ) );
          return;
        } 
        $query_replacements = array( ':info_id' => (int)$this->get_value, ':languages_id' => (int)KissMT::init()->retrieve( 'languages_id' ) );
        $query = str_replace( array_keys( $query_replacements ), array_values( $query_replacements ), $this->info_query );
        $result = KissMT::init()->query( $query );
        $info_details = tep_db_fetch_array( $result );
        tep_db_free_result( $result );
        if ( false !== $info_details ) { // If we have results from the query
          $name = trim( $info_details['name'] );
          $description = trim( $info_details['description'] );
        } 
        $description = ( isset( $description ) && tep_not_null( $description ) ) ? $description : false;
        $name = ( isset( $name ) && tep_not_null( $name ) ) ? $name : '';
        $breadcrumb = array_flip( KissMT::init()->retrieve( 'breadcrumb' ) );
        if ( array_key_exists( $name, $breadcrumb ) ) {
          unset( $breadcrumb[$name] );
        }
        if ( tep_not_null( $breadcrumb ) ) { // Is there still something in the breadcrumb array?
          $breadcrumb = array_flip( $breadcrumb );
          $leading_values = ( tep_not_null( $name ) ? $name . '[-separator-]' : '' ) . ( implode( '[-separator-]', $breadcrumb ) );
        } else { // Nothing in the breadcrumb array
          $leading_values = ( tep_not_null( $name ) ? $name : '' );
        }
      } else { // No info_id so we'll work with what we have
        $leading_values = implode( '[-separator-]', KissMT::init()->retrieve( 'breadcrumb' ) ); 
        $description = false;
      }
      KissMT::init()->setCanonical( $this->checkCanonical( 'info_id' ) );
      $this->parse( KissMT::init()->entities( $leading_values, $decode = true ), KissMT::init()->entities( trim( $description ), $decode = true ) );
    } // end method

  } // End class
?>