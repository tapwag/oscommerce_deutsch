<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
 require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_SHIPPING);

// Extrainfopages
#################
$page_query = tep_db_query("select p.pages_id, p.sort_order, p.status, s.pages_title, s.pages_html_text from " . TABLE_PAGES . " p LEFT JOIN " .TABLE_PAGES_DESCRIPTION . " s on p.pages_id = s.pages_id where p.status = 1 and s.language_id = '" . (int)$languages_id . "' and p.page_type = 3");
$page_check = tep_db_fetch_array($page_query);

$pagetext=stripslashes($page_check[pages_html_text]);

#################

  $navigation->remove_current_page();

  require_once(DIR_WS_LANGUAGES . $language . '/' . FILENAME_SHIPPING);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>" />
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>" />
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body>

<div id="bodyWrapper">
  <div id="bodyContent">
    <h1><?php echo HEADING_TITLE; ?></h1>

  <div class="contentContainer">
      <div class="contentText">
        <?php//  echo TEXT_INFORMATION; */
<div><?php echo $pagetext; ?></div>
      </div>

      <div style="float: right;">
        <?php echo '<a href="#" onclick="window.close(); return false;">' . TEXT_CLOSE_WINDOW . '</a>'; ?>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<?php require('includes/application_bottom.php'); ?>
