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
* @Id $Id:: newsdesk_reviews_info.php 58 2010-01-18 09:40:30Z Rob     $:  Full Details   
*/

  final class KissMT_Module extends KissMT_Modules {

    private $query;
    protected $noindex_follow = array();
    
    public function __construct() {
      $this->query =   $query = "SELECT nr.customers_name AS name, LEFT( nrd.reviews_text, 300 ) AS description, nd.newsdesk_article_name as newsdesk_name FROM " . NEWSDESK_REVIEWS . " nr INNER JOIN " . NEWSDESK_REVIEWS_DESCRIPTION . " nrd ON nrd.reviews_id = nr.reviews_id AND nrd.languages_id = :languages_id INNER JOIN " . TABLE_NEWSDESK_DESCRIPTION . " nd ON nd.newsdesk_id = nr.newsdesk_id AND nd.language_id = :languages_id WHERE nr.reviews_id = :reviews_id";
    } // end constructor
    
    public function process() {
      // Do we have a reviews_id
      if ( array_key_exists( 'reviews_id', $_GET ) && tep_not_null( $_GET['reviews_id'] ) ) {
        $this->get_value = $this->parsePath( $_GET['reviews_id'] );
        $this->original_get = (int)$_GET['reviews_id'];
        $this->cache_name = $this->setCacheString( __FILE__, 'ndesk_rev_info', $this->original_get );
        if ( false !== $this->retrieve( $this->cache_name ) ) {  
          KissMT::init()->setCanonical( $this->checkCanonical( 'newsPath' ) );
          return;
        } 
        $query_replacements = array( ':reviews_id' => (int)$this->get_value, ':languages_id' => (int)KissMT::init()->retrieve( 'languages_id' ) );
        $query = str_replace( array_keys( $query_replacements ), array_values( $query_replacements ), $this->query );
        $result = KissMT::init()->query( $query );
        $description = '';
        $name = '';
        $details = tep_db_fetch_array( $result );
        $name = trim( $details['name'] );
        $description .= trim( $details['description'] );
        $newsdesk_name = trim( $details['newsdesk_name'] );
        tep_db_free_result( $result );
        $description = ( isset( $description ) && tep_not_null( $description ) ) ? $description : false;
        $name = ( isset( $name ) && tep_not_null( $name ) ) ? $name  : '';
        $newsdesk_name = ( isset( $newsdesk_name ) && tep_not_null( $newsdesk_name ) ) ? $newsdesk_name  : '';
        $breadcrumb = array_flip( KissMT::init()->retrieve( 'breadcrumb' ) );
        if ( array_key_exists( $name, $breadcrumb ) ) {
          unset( $breadcrumb[$name] );
        }
        if ( tep_not_null( $breadcrumb ) ) { // Is there still something in the breadcrumb array?
          $breadcrumb = array_flip( $breadcrumb );
          $leading_values = ( implode( '[-separator-]', $breadcrumb ) ) . ( tep_not_null( $newsdesk_name ) ? '[-separator-]' . $newsdesk_name : '' ) . ( tep_not_null( $name ) ? '[-separator-]' . $name : '' );
        } else { // Nothing in the breadcrumb array
          $leading_values = ( tep_not_null( $newsdesk_name ) ? '[-separator-]' . $newsdesk_name : '' ) . ( tep_not_null( $name ) ? $name : HEADING_TITLE );
        }
      } else { // No reviews_id so we'll work with what we have
        $leading_values = implode( '[-separator-]', KissMT::init()->retrieve( 'breadcrumb' ) ); 
        $description = false;
      }
      KissMT::init()->setCanonical( $this->checkCanonical( 'reviews_id' ) );
      $this->parse( KissMT::init()->entities( $leading_values, $decode = true ), KissMT::init()->entities( trim( $description ), $decode = true ) );
    } // end method

  } // End class
?>