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
* @lastmod $Date:: 2010-01-18 09:40:30 +0000 (Mon, 18 Jan 2010)       $:  Date of last commit
* @version $Rev:: 58                                                  $:  Revision of last commit
* @Id $Id:: newsdesk_index.php 58 2010-01-18 09:40:30Z Rob            $:  Full Details   
*/

  final class KissMT_Module extends KissMT_Modules {

    private $query;
    protected $noindex_follow = array( 'newsPath' );
    
    public function __construct() {
      $this->query = $query ="SELECT nd.newsdesk_article_name AS description FROM " . NEWSDESK_TO_CATEGORIES . " n2c
      INNER JOIN " . TABLE_NEWSDESK_DESCRIPTION . " nd ON nd.newsdesk_id = n2c.newsdesk_id
      AND nd.language_id = :languages_id
      WHERE n2c.categories_id = :newsPath";
    } // end constructor
    
    public function process() {
      // Do we have an info_id
      if ( array_key_exists( 'newsPath', $_GET ) && tep_not_null( $_GET['newsPath'] ) ) {
        $this->get_value = $this->parsePath( $_GET['newsPath'] );
        $this->original_get = (int)$_GET['newsPath'];
        $this->cache_name = $this->setCacheString( __FILE__, 'ndesk_index', $this->original_get );
        if ( false !== $this->retrieve( $this->cache_name ) ) {  
          KissMT::init()->setCanonical( $this->checkCanonical( 'newsPath' ) );
          return;
        } 
        $query_replacements = array( ':newsPath' => (int)$this->get_value, ':languages_id' => (int)KissMT::init()->retrieve( 'languages_id' ) );
        $query = str_replace( array_keys( $query_replacements ), array_values( $query_replacements ), $this->query );
        $result = KissMT::init()->query( $query );
        $description = '';
        while ( $details = tep_db_fetch_array( $result ) ) {
          $description .= trim( $details['description'] ) . '[-separator-]';
        }
        tep_db_free_result( $result );
        $description = ( isset( $description ) && tep_not_null( $description ) ) ? $description : false;
        $breadcrumb = array_flip( KissMT::init()->retrieve( 'breadcrumb' ) );
        if ( array_key_exists( $name, $breadcrumb ) ) {
          unset( $breadcrumb[$name] );
        }
        if ( tep_not_null( $breadcrumb ) ) { // Is there still something in the breadcrumb array?
          $breadcrumb = array_flip( $breadcrumb );
          $leading_values = ( implode( '[-separator-]', $breadcrumb ) );
        } else { // Nothing in the breadcrumb array
          $leading_values = ( tep_not_null( $name ) ? $name : HEADING_TITLE );
        }
      } else { // No info_id so we'll work with what we have
        $leading_values = implode( '[-separator-]', KissMT::init()->retrieve( 'breadcrumb' ) ); 
        $description = false;
      }
      KissMT::init()->setCanonical( $this->checkCanonical( 'newsPath' ) );
      $this->parse( KissMT::init()->entities( $leading_values, $decode = true ), KissMT::init()->entities( trim( $description ), $decode = true ) );
    } // end method

  } // End class
?>