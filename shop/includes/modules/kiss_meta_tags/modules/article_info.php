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
* @Id $Id:: article_info.php 56 2010-01-17 18:13:00Z Rob              $:  Full Details   
*/

  final class KissMT_Module extends KissMT_Modules {

    private $article_query;
    protected $noindex_follow = array();
    
    public function __construct() {
      $this->article_query = "SELECT articles_name as name, articles_description as description FROM " . TABLE_ARTICLES_DESCRIPTION . "  WHERE articles_id = :articles_id AND language_id = :languages_id LIMIT 1";
    } // end constructor
    
    public function process() {

      $this->get_value = $this->parsePath( $_GET['articles_id'] );
      $this->original_get = (int)$_GET['articles_id'];
      $this->cache_name = $this->setCacheString( __FILE__, 'article_info', $this->original_get );
      if ( false !== $this->retrieve( $this->cache_name ) ) {  
        KissMT::init()->setCanonical( $this->checkCanonical( 'articles_id' ) );
        return;
      } 
      $query_replacements = array( ':articles_id' => (int)$this->get_value, ':languages_id' => (int)KissMT::init()->retrieve( 'languages_id' ) );
      $query = str_replace( array_keys( $query_replacements ), array_values( $query_replacements ), $this->article_query );
      $result = KissMT::init()->query( $query );
      $article_details = tep_db_fetch_array( $result );
      tep_db_free_result( $result );
      $name = trim( $article_details['name'] );
      $description = trim( $article_details['description'] );
      $breadcrumb = array_flip( KissMT::init()->retrieve( 'breadcrumb' ) ); 
      if ( array_key_exists( $name, $breadcrumb ) ) {
        unset( $breadcrumb[$name] );
      }
      $breadcrumb = array_flip( $breadcrumb );
      $leading_values = $name . ( !empty( $breadcrumb ) ? '[-separator-]' . implode( '[-separator-]', $breadcrumb ) : '' );
      KissMT::init()->setCanonical( $this->checkCanonical( 'articles_id' ) );
      $this->parse( KissMT::init()->entities( $leading_values, $decode  = true ), KissMT::init()->entities( $description, $decode = true ) );
    } // end method

  } // End class
?>