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
* @Id $Id:: index.php 56 2010-01-17 18:13:00Z Rob                     $:  Full Details   
*/

  final class KissMT_Module extends KissMT_Modules {

    private $cPath_products_query;
    private $cPath_category_query;
    private $manufacturers_query;
    private $descriptions_extension = false;
    private $description = false;
    protected $noindex_follow = array( 'page' );
    
    public function __construct() {
      $this->cPath_products_query = "SELECT pd.products_name FROM " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c LEFT JOIN " . TABLE_PRODUCTS . " p ON p.products_id = p2c.products_id AND p.products_status = 1 LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd ON pd.products_id = p.products_id AND pd.language_id = :languages_id WHERE p2c.categories_id = :categories_id LIMIT " . (int)KISSMT_CATEGORIES_PRODUCTS_LIMIT . "";
      $this->cPath_category_query = "SELECT cd.categories_name FROM " . TABLE_CATEGORIES . " c LEFT JOIN " . TABLE_CATEGORIES . " c2 ON c2.parent_id = c.categories_id LEFT JOIN " . TABLE_CATEGORIES_DESCRIPTION . " cd ON cd.categories_id = c2.categories_id AND cd.language_id = :languages_id WHERE c.categories_id = :categories_id LIMIT " . (int)KISSMT_CATEGORIES_PRODUCTS_LIMIT . "";
      $this->manufacturers_query  = "SELECT pd.products_name, m.manufacturers_name FROM " . TABLE_MANUFACTURERS . " m LEFT JOIN " . TABLE_PRODUCTS . " p ON p.manufacturers_id = m.manufacturers_id AND p.products_status = 1 LEFT JOIN " . TABLE_PRODUCTS_DESCRIPTION . " pd ON pd.products_id = p.products_id AND pd.language_id = :languages_id WHERE m.manufacturers_id = :manufacturers_id LIMIT " . (int)KISSMT_CATEGORIES_PRODUCTS_LIMIT . "";
    } // end constructor
    
    public function process() {
      global $category_depth;
      
      $this->description = false;
      $this->descriptions_extension = false;

      switch ( true ) {
        /**
        * A nested category or products listing query
        */
        case array_key_exists( 'cPath', $_GET ):
          $this->get_value = $this->parsePath( $_GET['cPath'] );
          $this->descriptionsExtension( 'category' );
          $this->original_get = is_numeric( str_replace( '_', '', $_GET['cPath'] ) ) ? $_GET['cPath']  : '';
          $this->cache_name = $this->setCacheString( __FILE__, 'cPath', $this->original_get );
          if ( false !== $this->retrieve( $this->cache_name ) ) {
            KissMT::init()->setCanonical( $this->checkCanonical( 'cPath' ) );
            return;
          }
          $list_string = false;
          if ( false === $this->descriptions_extension ) {
            if ( $category_depth == 'products' ) {
              $query_replacements = array( ':categories_id' => (int)$this->get_value, ':languages_id' => (int)KissMT::init()->retrieve( 'languages_id' ) );
              $query = str_replace( array_keys( $query_replacements ), array_values( $query_replacements ), $this->cPath_products_query );
              $result = KissMT::init()->query( $query );
              $list_string = '';
              while ( $row = tep_db_fetch_array( $result ) ) {
                if ( tep_not_null( $row['products_name'] ) ) {
                  $list_string .= trim( $row['products_name'] ) . '[-separator-]';
                }
              }
              tep_db_free_result( $result ); 
            } else {
              $query_replacements = array( ':categories_id' => (int)$this->get_value, ':languages_id' => (int)KissMT::init()->retrieve( 'languages_id' ) );
              $query = str_replace( array_keys( $query_replacements ), array_values( $query_replacements ), $this->cPath_category_query );
              $result = KissMT::init()->query( $query );
              if ( tep_db_num_rows( $result ) > 0 ) {
                $list_string = '';
                while ( $row = tep_db_fetch_array( $result ) ) {
                  if ( tep_not_null( $row['categories_name'] ) ) {
                    $list_string .= trim( $row['categories_name'] ) . '[-separator-]';
                  }
                }
              }
              tep_db_free_result( $result );
            }
          } else {
            $list_string = '';
            $list_string .= trim( $this->description['kissmt_categories_description'] );
          }
          $breadcrumb = array_flip( KissMT::init()->retrieve( 'breadcrumb' ) ); 
          $leading_values = implode( '[-separator-]', KissMT::init()->retrieve( 'breadcrumb' ) );

          KissMT::init()->setCanonical( $this->checkCanonical( 'cPath' ) );
          $this->parse( KissMT::init()->entities( $leading_values, $decode = true ), KissMT::init()->entities( $list_string, $decode = true ) );
          break;
        /**
        * A manufacturers query
        */
        case array_key_exists( 'manufacturers_id', $_GET ):
          $this->get_value = $this->parsePath( $_GET['manufacturers_id'] );
          $this->descriptionsExtension( 'manufacturer' );
          $this->original_get = (int)$_GET['manufacturers_id'];
          $this->cache_name = $this->setCacheString( __FILE__, 'manufacturers_id', (int)$this->original_get );
          if ( false !== $this->retrieve( $this->cache_name ) ) {
            KissMT::init()->setCanonical( $this->checkCanonical( 'manufacturers_id' ) );
            return;
          }
          $list_string = '';
          if ( false === $this->descriptions_extension ) {
            $query_replacements = array( ':manufacturers_id' => (int)$this->get_value, ':languages_id' => (int)KissMT::init()->retrieve( 'languages_id' ) );
            $query = str_replace( array_keys( $query_replacements ), array_values( $query_replacements ), $this->manufacturers_query );
            $result = KissMT::init()->query( $query );
            $manu_products = '';
            while ( $row = tep_db_fetch_array( $result ) ) {
              if ( !isset( $manu_name ) && tep_not_null( $row['manufacturers_name'] ) ) { 
                $manu_name = trim( $row['manufacturers_name'] );
              }
              $list_string .= trim( $row['products_name'] ) . '[-separator-]';
            }
            tep_db_free_result( $result );
          } else {
            $manu_name = trim( $this->description['manufacturers_name'] );
            $list_string = trim( $this->description['kissmt_manufacturers_description'] );
          }
          KissMT::init()->setCanonical( $this->checkCanonical( 'manufacturers_id' ) );
          $this->parse( KissMT::init()->entities( sprintf( KISSMT_MANUFACTURERS_TEXT, $manu_name ), $decode = true ), KissMT::init()->entities( $list_string, $decode = true ) );
          break;
        /**
        * Root index page
        */
        default:
          KissMT::init()->setCanonical( $this->checkCanonical() );
          $this->parse( KissMT::init()->entities( sprintf( KISSMT_HOMEPAGE_TITLE, STORE_NAME ), $decode = true ), KissMT::init()->entities( sprintf( KISSMT_HOMEPAGE_DESCRIPTION, STORE_NAME ), $decode = true ) );
          break;
      }
    } // end method
    
    private function descriptionsExtension( $type = false ) {
      if ( false === ( defined( 'KISSMT_DESCRIPTIONS_EXTENSION_ENABLE' ) && ( KISSMT_DESCRIPTIONS_EXTENSION_ENABLE == 'true' ) ) ) {
        return false;
      }
      if ( $type == 'category' ) {
        $query = "SELECT kissmt_categories_description FROM " . TABLE_CATEGORIES_DESCRIPTION . " WHERE categories_id = " . (int)$this->get_value . " AND language_id = " . (int)KissMT::init()->retrieve( 'languages_id' ) . "";
        $result = tep_db_query( $query );
        $row = tep_db_fetch_array( $result );
        tep_db_free_result( $result );
        if ( false !== ( ( false !== $row ) && tep_not_null( $row['kissmt_categories_description'] ) ) ) {
          $this->descriptions_extension = true;
          $this->description = array( 'kissmt_categories_description' => $row['kissmt_categories_description'] );
          return;
        }
      } elseif ( $type == 'manufacturer' ) {
        $query = "SELECT m.manufacturers_name, mi.kissmt_manufacturers_description FROM " . TABLE_MANUFACTURERS . " m INNER JOIN " . TABLE_MANUFACTURERS_INFO . " mi ON mi.manufacturers_id = m.manufacturers_id AND mi.languages_id = " . (int)KissMT::init()->retrieve( 'languages_id' ) . " WHERE m.manufacturers_id = " . (int)$this->get_value . "";
        $result = tep_db_query( $query );
        $row = tep_db_fetch_array( $result );
        tep_db_free_result( $result );
        if ( false !== ( ( false !== $row ) && tep_not_null( $row['kissmt_manufacturers_description'] ) ) ) {
          $this->descriptions_extension = true;
          $this->description = array( 'manufacturers_name' => $row['manufacturers_name'], 'kissmt_manufacturers_description' => $row['kissmt_manufacturers_description'] );
          return;
        }
      }
      $this->descriptions_extension = false;
      $this->description = false;
    }

  } // End class
?>
