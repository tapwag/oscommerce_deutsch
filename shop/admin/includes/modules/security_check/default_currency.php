<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  class securityCheck_default_currency {
    var $type = 'error';
    var $title;

    function securityCheck_default_currency() {
      global $language;

      include(DIR_FS_ADMIN . 'includes/languages/' . $language . '/modules/security_check/default_currency.php');
      
      $this->title = MODULE_SECURITY_CHECK_DEFAULT_CURRENCY_TITLE;
      
    }

    function pass() {
      return defined('DEFAULT_CURRENCY');
    }

    function getMessage() {
      return ERROR_NO_DEFAULT_CURRENCY_DEFINED;
    }
  }
?>
