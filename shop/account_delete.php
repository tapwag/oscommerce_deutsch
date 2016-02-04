<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  
  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }
  
  if ($_POST['action'] == 'process'){
  
    tep_db_query(" delete from " . TABLE_CUSTOMERS . " where customers_id = '" . (Int)$customer_id ."'");
    tep_db_query(" delete from " . TABLE_CUSTOMERS_BASKET . " where customers_id = '" . (Int)$customer_id ."'");
    tep_db_query(" delete from " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES ." where customers_id = '" . (Int)$customer_id ."'");
    tep_db_query(" delete from " . TABLE_CUSTOMERS_INFO . " where customers_info_id = '" . (Int)$customer_id ."'");
    
    tep_session_unregister('customer_id');
    
	$messageStack->add_session('header', TEXT_ACCOUNT_DELETED);
	
	tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL')); 
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ACCOUNT_DELETE);

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_ACCOUNT_DELETE));

  require(DIR_WS_INCLUDES . 'template_top.php');
?>

<h1><?php echo HEADING_TITLE; ?></h1>

<?php echo tep_draw_form('delete_account', tep_href_link(FILENAME_ACCOUNT_DELETE, '', 'SSL'), 'post') . tep_draw_hidden_field('action', 'process'); ?>

<div class="contentContainer">
  <div class="contentText">
    <?php echo TEXT_INFORMATION; ?>
  </div>

  <div class="buttonSet">
    <span class="buttonAction"><?php echo tep_draw_button(IMAGE_BUTTON_CONTINUE, 'person', null, 'primary'); ?></span>
  </div>
</div>

</form>

<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
