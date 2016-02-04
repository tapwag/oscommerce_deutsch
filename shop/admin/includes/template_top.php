<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/
?>
<!DOCTYPE html>
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<meta name="robots" content="noindex,nofollow">
<title><?php echo TITLE; ?></title>
<base href="<?php echo ($request_type == 'SSL') ? HTTPS_SERVER . DIR_WS_HTTPS_ADMIN : HTTP_SERVER . DIR_WS_ADMIN; ?>" />
<!--[if IE]><script type="text/javascript" src="<?php echo tep_catalog_href_link('ext/flot/excanvas.min.js', '', 'SSL'); ?>"></script><![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo tep_catalog_href_link('ext/jquery/ui/redmond/jquery-ui-1.10.4.min.css', '', 'SSL'); ?>">
<script type="text/javascript" src="<?php echo tep_catalog_href_link('ext/jquery/jquery-1.11.1.min.js', '', 'SSL'); ?>"></script>
<script type="text/javascript" src="<?php echo tep_catalog_href_link('ext/jquery/ui/jquery-ui-1.10.4.min.js', '', 'SSL'); ?>"></script>

<?php
  if (tep_not_null(JQUERY_DATEPICKER_I18N_CODE)) {
?>
<script type="text/javascript" src="<?php echo tep_catalog_href_link('ext/jquery/ui/i18n/jquery.ui.datepicker-' . JQUERY_DATEPICKER_I18N_CODE . '.js', '', 'SSL'); ?>"></script>
<script type="text/javascript">
$.datepicker.setDefaults($.datepicker.regional['<?php echo JQUERY_DATEPICKER_I18N_CODE; ?>']);
</script>
<?php
  }
?>

<script type="text/javascript" src="<?php echo tep_catalog_href_link('ext/flot/jquery.flot.min.js', '', 'SSL'); ?>"></script>
<script type="text/javascript" src="<?php echo tep_catalog_href_link('ext/flot/jquery.flot.time.min.js', '', 'SSL'); ?>"></script>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script type="text/javascript" src="includes/general.js"></script>
<?php// MCE?>
<link rel="stylesheet" type="text/css" href="<?php echo tep_catalog_href_link('ext/jquery/ui/redmond/jquery-ui-1.10.4.min.css', '', 'SSL'); ?>">
<script type="text/javascript" src="<?php echo tep_catalog_href_link('ext/jquery/jquery-1.11.1.min.js', '', 'SSL'); ?>"></script>
<script type="text/javascript" src="<?php echo tep_catalog_href_link('ext/jquery/ui/jquery-ui-1.10.4.min.js', '', 'SSL'); ?>"></script>

<?php
  if (tep_not_null(JQUERY_DATEPICKER_I18N_CODE)) {
?>
<script type="text/javascript" src="<?php echo tep_catalog_href_link('ext/jquery/ui/i18n/jquery.ui.datepicker-' . JQUERY_DATEPICKER_I18N_CODE . '.js', '', 'SSL'); ?>"></script>
<script type="text/javascript">
$.datepicker.setDefaults($.datepicker.regional['<?php echo JQUERY_DATEPICKER_I18N_CODE; ?>']);
</script>
<?php
  }
?>

<script type="text/javascript" src="<?php echo tep_catalog_href_link('ext/flot/jquery.flot.min.js', '', 'SSL'); ?>"></script>
<script type="text/javascript" src="<?php echo tep_catalog_href_link('ext/flot/jquery.flot.time.min.js', '', 'SSL'); ?>"></script>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script type="text/javascript" src="includes/general.js"></script>
<?php // TinyMCE  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script> ?>
<script  src="./ext/tinymce/tinymce.min.js"></script>

  <?php // TinyMCE
 /* (strpos($_SERVER['PHP_SELF'],'categories.php')) || (strpos($_SERVER['PHP_SELF'],'banner_manager.php')) ) { ?>
    <script>
    tinymce.init({
      selector:'.htmleditor',
      plugins: [
        "advlist autolink lists link image anchor",
        "searchreplace visualblocks code ",
        "media table contextmenu paste wordcount"
      ],
      relative_urls: false,
      convert_urls: false,
      remove_script_host : false,
      keep_styles: false,
      element_format : "html",
      browser_spellcheck : true,
      style_formats: [
        {title: 'H2', block: 'h2'},
        {title: 'H3', block: 'h3'},
        {title: 'H4', block: 'h4'},
        {title: 'H5', block: 'h5'},
        {title: 'H6', block: 'h6'},
       ],
       toolbar : "undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | anchor link image media"
    });
    </script>
  <?php } // TinyMCE */?>

<?php // TinyMCE
 if ( (strpos($_SERVER['PHP_SELF'],'categories.php')) ||  (strpos($_SERVER['PHP_SELF'],'extra_info_pages.php'))  ||  (strpos($_SERVER['PHP_SELF'],'banner_manager.php')) ) { ?>
    <script>
    tinymce.init({
      selector:'.htmleditor',
      plugins: [
        "advlist autolink lists link image anchor",
        "searchreplace visualblocks code ",
        "media table contextmenu paste wordcount"
      ],
      relative_urls: false,
      convert_urls: false,
      remove_script_host : false,
      keep_styles: false,
      element_format : "html",
      browser_spellcheck : true,
      style_formats: [
        {title: 'H2', block: 'h2'},
        {title: 'H3', block: 'h3'},
        {title: 'H4', block: 'h4'},
        {title: 'H5', block: 'h5'},
        {title: 'H6', block: 'h6'},
       ],
       toolbar : "undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | anchor link image media"
    });
    </script>
  <?php } // TinyMCE ?>

 <?php // TinyMCE orders,mail or newsletter
  if ( (strpos($_SERVER['PHP_SELF'],'newsletters.php')) || (strpos($_SERVER['PHP_SELF'],'mail.php'))   || (strpos($_SERVER['PHP_SELF'],'orders.php')) ) { ?>
    <script>
     tinymce.init({
      selector:'.htmleditor',
      plugins: [
        "advlist autolink lists link contextmenu paste wordcount"
      ],
      menubar : false,
      relative_urls: false,
      convert_urls: false,
      remove_script_host : false,
      keep_styles: false,
      element_format : "html",
      browser_spellcheck : true,
      toolbar : "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link" 
    });
    </script>
  <?php } // TinyMCE orders,mail or newsletter?>
</head>
<body>

<?php require(DIR_WS_INCLUDES . 'header.php'); ?>

<?php
  if (tep_session_is_registered('admin')) {
    include(DIR_WS_INCLUDES . 'column_left.php');
  } else {
?>

<style>
#contentText {
  margin-left: 0;
}
</style>

<?php
  }
?>

<div id="contentText">
