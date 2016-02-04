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
* @lastmod $Date:: 2009-12-16 12:10:29 +0000 (Wed, 16 Dec 2009)       $:  Date of last commit
* @version $Rev:: 10                                                  $:  Revision of last commit
* @Id $Id:: kiss_meta_tags.php 10 2009-12-16 12:10:29Z Rob            $:  Full Details   
*/


  include_once DIR_WS_MODULES . 'kiss_meta_tags/classes/kiss_meta_tags_class.php';
  
  /**
  * Set the language - load the language specific stopwords - set everything up
  */
  KissMT::init()->setup( $language, $languages_id, $breadcrumb, $request_type );
  
  /**
  * Output the meta html
  */
  KissMT::init()->output();
?>