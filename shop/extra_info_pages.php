<?php
require('includes/application_top.php');

$infopageid = (int)$HTTP_GET_VARS['pages_id'];
$page_query = tep_db_query("select p.pages_id, p.status, s.pages_title, s.pages_html_text from " . TABLE_PAGES . " p LEFT JOIN " .TABLE_PAGES_DESCRIPTION . " s on p.pages_id = s.pages_id where s.language_id = '" . (int)$languages_id . "' and p.pages_id = '".$infopageid."'");

$page_check = tep_db_fetch_array($page_query);
$breadcrumb->add($page_check[pages_title], tep_href_link('info_pages.php?pages_id=' . $infopageid));
require(DIR_WS_INCLUDES . 'template_top.php');
?>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo $page_check[pages_title]; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td class="main"><?php echo stripslashes("$page_check[pages_html_text]"); ?></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2">
          <tr>
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td align="right"><div class="buttonSet">
						<span class="buttonAction"><?php echo tep_draw_button(IMAGE_BUTTON_CONTINUE, 'triangle-1-e', tep_href_link(FILENAME_DEFAULT)); ?></span>
					  </div>
					 </td>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>