<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_WIDERRUF);

// Extrainfopages
#################
$page_query = tep_db_query("select p.pages_id, p.sort_order, p.status, s.pages_title, s.pages_html_text from " . TABLE_PAGES . " p LEFT JOIN " .TABLE_PAGES_DESCRIPTION . " s on p.pages_id = s.pages_id where p.status = 1 and s.language_id = '" . (int)$languages_id . "' and p.page_type = 8");
$page_check = tep_db_fetch_array($page_query);

$pagetext=stripslashes($page_check[pages_html_text]);

#################

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_WIDERRUF));

  require(DIR_WS_INCLUDES . 'template_top.php');
?>

<h1><?php echo HEADING_TITLE; ?></h1>

<div class="contentContainer">
  <div class="contentText">
    <?php// echo TEXT_INFORMATION; ?>
<div><?php echo $pagetext; ?></div>
  </div>

  <div class="buttonSet">
    <span class="buttonAction"><?php echo tep_draw_button(IMAGE_BUTTON_CONTINUE, 'triangle-1-e', tep_href_link(FILENAME_DEFAULT)); ?></span>
  </div>
</div>

<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
