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
* @Id $Id:: generic_module.php 56 2010-01-17 18:13:00Z Rob            $:  Full Details   
*/

  final class KissMT_Module extends KissMT_Modules {
    
    protected $noindex_follow = array();
    
    public function __construct() {
    } // end constructor
    
    public function process() {
      // filename less the .php
      $short_filename = substr( KissMT::init()->retrieve( 'basename' ), 0, strlen( KissMT::init()->retrieve( 'basename' ) )-4 );
      if ( defined( 'HEADING_TITLE' ) ) {
        $file_title = trim( HEADING_TITLE );
        if ( false !== strpos( HEADING_TITLE, '%s' ) ) {
          $file_title = trim( str_replace( '%s', '', HEADING_TITLE ) );
        }
      } else {
        $file_title = ucfirst( strtolower( str_replace( '_', ' ', $short_filename ) ) ); 
      }
      /**
      * Do we have a languages define for this page?
      */
      $poss_title_define = 'KISSMT_' . strtoupper( $short_filename ) . '_TITLE_TEXT';
      $poss_description_define = 'KISSMT_' . strtoupper( $short_filename ) . '_DESCRIPTION_TEXT';
      // If we have language defines for this page then we use these
      if ( defined( $poss_title_define ) && defined( $poss_description_define ) ) { 
        $leading_value = sprintf( constant( $poss_title_define ),  $file_title . '[-separator-]' );
        $description = constant( $poss_description_define );
      // No language defines so we use what the script found .. either HEADING_TITLE or the filename
      } else {
        $leading_value = $file_title;
        $description = false;
      }

      KissMT::init()->setCanonical( $this->checkCanonical() );
      $this->parse( KissMT::init()->entities( $leading_value, $decode = true ), KissMT::init()->entities( $description, $decode = true ) );
    } // end method

  } // End class  
?>