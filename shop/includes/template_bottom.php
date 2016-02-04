<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/
?>

</div> <!-- bodyContent //-->

<?php
  if ($oscTemplate->hasBlocks('boxes_column_left')) {
?>

<div id="columnLeft" class="grid_<?php echo $oscTemplate->getGridColumnWidth(); ?> pull_<?php echo $oscTemplate->getGridContentWidth(); ?>">
  <?php echo $oscTemplate->getBlocks('boxes_column_left'); ?>
</div>

<?php
  }

  if ($oscTemplate->hasBlocks('boxes_column_right')) {
?>

<div id="columnRight" class="grid_<?php echo $oscTemplate->getGridColumnWidth(); ?>">
  <?php echo $oscTemplate->getBlocks('boxes_column_right'); ?>
</div>

<?php
  }
// osc-support-edition BOF  
?>   
    <div id="popupShipping" title="<?php echo HEADING_POPUP_SHIPPING; ?>">
<?php
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_SHIPPING);
?>
<?php
// ExtraInfoPages
#################
$page_query = tep_db_query("select p.pages_id, p.sort_order, p.status, s.pages_title, s.pages_html_text from " . TABLE_PAGES . " p LEFT JOIN " .TABLE_PAGES_DESCRIPTION . " s on p.pages_id = s.pages_id where p.status = 1 and s.language_id = '" . (int)$languages_id . "' and p.page_type = 3");
$page_check = tep_db_fetch_array($page_query);

$pagetext=stripslashes($page_check[pages_html_text]);

#####################
?>
     <?php// osc-support-edition BOF 
     // echo TEXT_POPUP_SHIPPING; ?>


<?php
// ExtraInfoPages
?>
 <p><?php echo $pagetext; ?> <p>

<?php// echo TEXT_POPUP_SHIPPING; ?>
    </div>
 
     

<script type="text/javascript">
$('#popupShipping').dialog({
  autoOpen: false,
  width: 600,
  height: 400,
  buttons: {
    Ok: function() {
      $(this).dialog('close');
    }
  }
});
</script>

<?php 
// osc-support-edition EOF
?>

<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>

</div> <!-- bodyWrapper //-->

<?php echo $oscTemplate->getBlocks('footer_scripts'); ?>

</body>
</html>
