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
* @Id $Id:: articles.php 56 2010-01-17 18:13:00Z Rob                  $:  Full Details   
*/

  final class KissMT_Module extends KissMT_Modules {

    private $all_topics_query;
    private $topics_query;
    private $authors_query;
    protected $noindex_follow = array( 'page' );
    
    public function __construct() {
      $this->all_topics_query = "SELECT topics_name as name FROM " . TABLE_TOPICS_DESCRIPTION . " WHERE language_id = :languages_id LIMIT " . (int)KISSMT_CATEGORIES_PRODUCTS_LIMIT . "";
      $this->topics_query     = "SELECT topics_name as name, topics_description as description FROM " . TABLE_TOPICS_DESCRIPTION . " WHERE topics_id = :tPath AND language_id = :languages_id";
      $this->authors_query    = "SELECT a.authors_name as name, ai.authors_description as description FROM " . TABLE_AUTHORS . " a INNER JOIN " . TABLE_AUTHORS_INFO . " ai ON ai.authors_id = a.authors_id WHERE a.authors_id = :authors_id";
    } // end constructor
    
    public function process() {
      $this->cache_name = false;
      if ( array_key_exists( 'tPath', $_GET ) ) {
        $this->get_value = $this->parsePath( $_GET['tPath'] );
        $this->original_get = is_numeric( str_replace( '_', '', $_GET['tPath'] ) ) ? $_GET['tPath'] : '1';
        $this->cache_name = $this->setCacheString( __FILE__, 'articles_topic', $this->original_get );
        $get_key = 'tPath';
        $query = $this->topics_query;
      } elseif ( array_key_exists( 'authors_id', $_GET ) ) {
        $this->get_value = $this->parsePath( $_GET['authors_id'] );
        $this->original_get = (int)$_GET['authors_id'];
        $this->cache_name = $this->setCacheString( __FILE__, 'articles_author', $this->original_get );
        $get_key = 'authors_id';
        $query = $this->authors_query;
      } else {
        $this->get_value = false;
        $this->original_get = false;
        $this->cache_name = $this->setCacheString( __FILE__, 'articles_all', 'general' );
        $get_key = false;
        $query = $this->all_topics_query;
      }
      if ( false !== ( $this->cache_name && $this->retrieve( $this->cache_name ) ) ) {  
        KissMT::init()->setCanonical( $this->checkCanonical( $get_key ) );
        return;
      }
      if ( false === $this->get_value ) {
        $query_replacements = array( ':languages_id' => (int)KissMT::init()->retrieve( 'languages_id' ) );
        $query = str_replace( array_keys( $query_replacements ), array_values( $query_replacements ), $query );
        $result = KissMT::init()->query( $query );
        $description = '';
        while ( $row = tep_db_fetch_array( $result ) ) {
          if ( tep_not_null( $row['name'] ) ) {
            $description .= trim( $row['name'] ) . '[-separator-]';
          }
        }
        $description = tep_not_null( $description ) ? $description : false;
        $name = defined( 'HEADING_TITLE' ) ? HEADING_TITLE : ucfirst( str_replace( '_', ' ', substr( KissMT::init()->retrieve( 'basename' ), 0, strlen( KissMT::init()->retrieve( 'basename' ) )-4 ) ) ); 
      } else { 
        $query_replacements = array( ':' . $get_key => $this->get_value, ':languages_id' => (int)KissMT::init()->retrieve( 'languages_id' ) );
        $query = str_replace( array_keys( $query_replacements ), array_values( $query_replacements ), $query );
        $result = KissMT::init()->query( $query );
        $detail = tep_db_fetch_array( $result );
        $name = trim( $detail['name'] );
        $description = tep_not_null( $detail['description'] ) ? trim( $detail['description'] ) : false;
      }
      tep_db_free_result( $result );
      $breadcrumb = array_flip( KissMT::init()->retrieve( 'breadcrumb' ) );
       
      if ( array_key_exists( $name, $breadcrumb ) ) {
        unset( $breadcrumb[$name] );
      }
      if ( array_key_exists( $description, $breadcrumb ) ) {
        unset( $breadcrumb[$description] );
      }

      $breadcrumb = array_flip( $breadcrumb );
      $leading_values = $name . ( !empty( $breadcrumb ) ? '[-separator-]' . implode( '[-separator-]', $breadcrumb ) : '' );
      KissMT::init()->setCanonical( $this->checkCanonical( $get_key ) );
      $this->parse( KissMT::init()->entities( $leading_values, $decode = true ), KissMT::init()->entities( $description, $decode = true ) );
    } // end method

  } // End class
?>