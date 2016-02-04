<?php
/*
  $Id: extra_info_pages.php 4.50 2003/06/29 22:50:51 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  $action = (isset($_GET['action']) ? $_GET['action'] : '');

  $languages = tep_get_languages();

// Sets the status of a page
  function tep_set_page_status($pages_id, $status) {
    if ($status == '1') {
      return tep_db_query("update " . TABLE_PAGES . " set status = '1'  where pages_id = '" . $pages_id . "'");
    } elseif ($status == '0') {
      return tep_db_query("update " . TABLE_PAGES . " set status = '0'  where pages_id = '" . $pages_id . "'");
    } else {
      return -1;
    }
  }

  if (tep_not_null($action)) {
    switch ($action) {
      case 'setflag':
        if ( ($_GET['flag'] == '0') || ($_GET['flag'] == '1') ) {
          tep_set_page_status($_GET['bID'], $_GET['flag']);

          $messageStack->add_session(SUCCESS_PAGE_STATUS_UPDATED, 'success');
        } else {
          $messageStack->add_session(ERROR_UNKNOWN_STATUS_FLAG, 'error');
        }

        tep_redirect(tep_href_link(FILENAME_PAGE_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $_GET['bID']));
        break;
      case 'insert':
      case 'update':
        if (isset($_POST['pages_id'])) $pages_id = tep_db_prepare_input($_POST['pages_id']);
        $pages_title = tep_db_prepare_input($_POST['pages_title']);
        $pages_html_text = tep_db_prepare_input($_POST['pages_html_text']);
        $sort_order = tep_db_prepare_input($_POST['sort_order']);

        $intorext = tep_db_prepare_input($_POST['intorext']);

		if($intorext == 1)  {
			   $externallink = tep_db_prepare_input($_POST['externallink']);
		}else{
			$externallink="";
		}
		$page_error = false;

		for ($i=0, $n=sizeof($languages); $i<$n; $i++) {

			$title_field_name=$_POST['pages_title_'.$languages[$i]['id']];
	        if (empty($title_field_name)) {
				$messageStack->add(ERROR_PAGE_TITLE_REQUIRED, 'error');
				$page_error = true;
			}
		}
        if (empty($pages_html_text)) {
        }
        if ($page_error == false) {
			 if ($action == 'insert') {

			   if($page_type == "1" || $page_type == "2" || $page_type == "3" || $page_type == "4" || $page_type == "5" || $page_type == "6" || $page_type == "7" || $page_type == "8" || $page_type == "9")  {
				 $selectquery=tep_db_query("select count(*) as count from ". TABLE_PAGES ." where page_type=\"$page_type\"");
				 $exists = tep_db_fetch_array($selectquery);

					if($exists['count'] >= 1)  {
					   $updateall=tep_db_query("update ". TABLE_PAGES ." set page_type=\"9\" where page_type=\"$page_type\"");
					}
			   }
			}


			 if ($action == 'update') {

			   if($page_type == "1" || $page_type == "2" || $page_type == "3" || $page_type == "4" || $page_type == "5" || $page_type == "6" || $page_type == "7" || $page_type == "8" || $page_type == "9")  {
				 $selectquery=tep_db_query("select count(*) as count from ". TABLE_PAGES ." where page_type=\"$page_type\" and pages_id != \"(int)$pages_id\"");
				 $exists = tep_db_fetch_array($selectquery);

					if($exists['count'] >= 1)  {
					   $updateall=tep_db_query("update ". TABLE_PAGES ." set page_type=\"9\" where page_type=\"$page_type\"");
					}

			   }
			}

			for ($i=0, $n=sizeof($languages); $i<$n; $i++) {


			$pages_titlem=$_POST['pages_title_'.$languages[$i]['id']];
			$pages_html_textm=$_POST['pages_html_text_'.$languages[$i]['id']];
			$intorextm=$_POST['intorext_'.$languages[$i]['id']];
			$externallinkm=$_POST['externallink_'.$languages[$i]['id']];
			$link_targetm=$_POST['link_target_'.$languages[$i]['id']];
			$language_idm='language_id_'.$languages[$i]['id'];



					  $sql_data_array_pages = array('sort_order' => $sort_order,
													'status' => '1',
													'page_type'   => $_POST['page_type']);

					  $sql_data_array_pages_description = array('pages_title' => $pages_titlem,
																'pages_html_text' => stripslashes($pages_html_textm),
																'intorext'   => $intorextm,
																'externallink' => $externallinkm,
																'link_target' => $link_targetm);



					 if ($action == 'insert') {

			$bID="";


					 if ($i == 0)  {

						tep_db_perform(TABLE_PAGES, $sql_data_array_pages);

						$pages_id = tep_db_insert_id();

					 }

						$pageid_merge= array('pages_id' => $pages_id,
											 'language_id' => $languages[$i]['id']);

						$sql_data_array_pages_desc = array_merge($sql_data_array_pages_description, $pageid_merge);

						tep_db_perform(TABLE_PAGES_DESCRIPTION, $sql_data_array_pages_desc);

						$messageStack->add_session(SUCCESS_PAGE_INSERTED, 'success');


					  } elseif ($action == 'update') {


					  if ($i == 0)  {
						tep_db_perform(TABLE_PAGES, $sql_data_array_pages, 'update', "pages_id = '" . (int)$pages_id . "'");
					  }


					  $selectexists=tep_db_query("select count( * ) as `countrecords` from `".TABLE_PAGES_DESCRIPTION."` where pages_id='" . (int)$pages_id . "' and language_id='".$languages[$i]['id']."'");
					  $recordexists = tep_db_fetch_array($selectexists);



					  if($recordexists['countrecords'] >= 1 )  {
					  tep_db_perform(TABLE_PAGES_DESCRIPTION, $sql_data_array_pages_description, 'update', "pages_id = '" . (int)$pages_id . "' and language_id='".$languages[$i]['id']."'");
					  }
					  else  {

							$pageid_merge= array('pages_id' => $pages_id,
						   'language_id' => $languages[$i]['id']);

					  $sql_data_array_pages_desc = array_merge($sql_data_array_pages_description, $pageid_merge);
					  tep_db_perform(TABLE_PAGES_DESCRIPTION, $sql_data_array_pages_desc);
					  }


					   $messageStack->add_session(SUCCESS_PAGE_UPDATED, 'success');

					  }

			} //for




          tep_redirect(tep_href_link(FILENAME_PAGE_MANAGER, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . 'bID=' . $pages_id));
        } else {
          $action = 'new';
        }

        break;


      case 'deleteconfirm':
        $pages_id = tep_db_prepare_input($_GET['bID']);

        tep_db_query("delete from " . TABLE_PAGES . " where pages_id = '" . (int)$pages_id . "'");
        tep_db_query("delete from " . TABLE_PAGES_DESCRIPTION . " where pages_id = '" . (int)$pages_id . "'");

        $messageStack->add_session(SUCCESS_PAGE_REMOVED, 'success');

        tep_redirect(tep_href_link(FILENAME_PAGE_MANAGER, 'page=' . $_GET['page']));
        break;
    }

  }
require(DIR_WS_INCLUDES . 'template_top.php');
?>
<script language="javascript">
	function disableIt(a){
		document.getElementById(a).disabled=true;
	}

	function enableIt(a){
		document.getElementById(a).disabled=false;
	}
</script>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
<?php


  if ($action == 'new') {
    $form_action = 'insert';

    $parameters = array('pages_title' => '',
                        'pages_html_text' => '',
                        'sort_order' =>'',
                        'status' =>'');

    $bInfo = new objectInfo($parameters);

    if (isset($_GET['bID'])) {
      $form_action = 'update';

      $bID = tep_db_prepare_input($_GET['bID']);



      $page_query = tep_db_query("select
                                    s.status,
                                    s.sort_order,
                                    s.page_type,
                                    p.pages_title,
                                    p.pages_html_text,
                                    p.intorext,
                                    p.externallink,
                                    p.link_target,
                                    p.language_id
                                  from
                                    " . TABLE_PAGES . " s left join " . TABLE_PAGES_DESCRIPTION . " p on s.pages_id=p.pages_id
                                  where
                                    s.pages_id = '" . (int)$bID . "'");

						while($page = tep_db_fetch_array($page_query))  {
							$languageid=$page['language_id'];
							$page_type=$page['page_type'];

							$pagetitle[$languageid]= $page['pages_title'];
							$sortorder=$page['sort_order'];
							$pages_html_text[$languageid]=$page['pages_html_text'];
							$intorext[$languageid]=$page['intorext'];
							$externallink[$languageid]=$page['externallink'];
							$link_target[$languageid]=$page['link_target'];
						}

    } elseif (tep_not_null($_POST)) {
      $bInfo->objectInfo($_POST);
    }

	$bIDif="";
	if(!empty($bID) && $bID != "")  {
		$bIDif='&bID='.$bID;
	}
?>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr><?php echo tep_draw_form('new_page', FILENAME_PAGE_MANAGER, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . 'action=' . $form_action.$bIDif, 'post', 'enctype="multipart/form-data"'); if ($form_action == 'update') echo tep_draw_hidden_field('pages_id', $bID); ?>
        <td><table border="0" cellspacing="0" cellpadding="2">

		<tr>
            <td class="main"><?php echo TEXT_PAGES_TYPE; ?></td>
            <td class="main"><?echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;'?><select name="page_type" size=1>
                                 <option value="1" <?php if($page_type == 1) { echo 'selected="selected"'; } ?>>1 - Index</option>
                                 <option value="2" <?php if($page_type == 2) { echo 'selected="selected"'; } ?>>2 - Contact Us</option>
 								 <option value="3" <?php if($page_type == 3) { echo 'selected="selected"'; } ?>>3 - Shipping</option>
                                 <option value="4" <?php if($page_type == 4) { echo 'selected="selected"'; } ?>>4 - Privacy</option>
                                 <option value="5" <?php if($page_type == 5) { echo 'selected="selected"'; } ?>>5 - Conditions</option>
                                 <option value="6" <?php if($page_type == 6) { echo 'selected="selected"'; } ?>>6 - Content</option>
								 <option value="7" <?php if($page_type == 7) { echo 'selected="selected"'; } ?>>7 - Other</option>
								 <option value="8" <?php if($page_type == 8) { echo 'selected="selected"'; } ?>>8 - Widerruf</option>

                                 </select></td>
						  </tr>


					<?php
					 for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
					?>
							  <tr>
								<td class="main"><?php if ($i == 0) echo TEXT_PAGES_TITLE; ?></td>
								<td class="main">

					<?php
					echo tep_image(DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']). '&nbsp;'.tep_draw_input_field('pages_title_'.$languages[$i]['id'], $pagetitle[$languages[$i]['id']], '', true);
					}

					?>
					</td>
          </tr>

          <tr>
            <td class="main"><?php echo TEXT_PAGES_SORT_ORDER; ?></td>
            <td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' .  tep_draw_input_field('sort_order', $sortorder, '', false); ?></td>
          </tr>

          <tr>
            <td class="main">&nbsp;</td>
            <td class="main">&nbsp;</td>
          </tr>

<?php
			 for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
			?>


			<?php if(empty($intorext[$languages[$i]['id']]) or $intorext[$languages[$i]['id']] == "0")  {
			$internalchecked="checked";
			$externalchecked="";
			$disabledlinkbox="disabled";
			}
			else {
			$internalchecked="";
			$externalchecked="checked";
			$disabledlinkbox="";
			}

			?>


 <tr>
            <td class="main"><?php echo TEXT_PAGES_INTEXT; ?></td>
            <td class="main">
          <?php  echo tep_image(DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']) ?><input type="radio" value="0" name="intorext_<?php echo $languages[$i]['id']; ?>" <?php echo $internalchecked; ?> onClick='disableIt("<?php echo 'externallink_'.$languages[$i]['id']; ?>");'><?php echo TEXT_TARGET_INTERNAL; ?>
            &nbsp;&nbsp;
            <?php echo tep_draw_separator('pixel_trans.gif', '24', '15'); ?><input type="radio" value="1" name="intorext_<?php echo $languages[$i]['id']; ?>" <?php echo $externalchecked;?> onClick='enableIt("<?php echo 'externallink_'.$languages[$i]['id']; ?>");'><?php echo TEXT_TARGET_EXTERNAL; ?>
</td>
          </tr>

  <tr>
            <td class="main"><?php echo TEXT_PAGES_EXTERNAL_LINK; ?></td>
            <td class="main"><?php echo tep_image(DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']).'&nbsp;'.tep_draw_input_field('externallink_'.$languages[$i]['id'], $externallink[$languages[$i]['id']], 'id='.'"externallink_'.$languages[$i]['id'].'"'. $disabledlinkbox, false); ?></td>
          </tr>
	<?php if(empty($link_target[$languages[$i]['id']]) or $link_target[$languages[$i]['id']] == "0")  {
		$samewindowchecked="checked";
		$newwindowchecked="";
	}else {
		$samewindowchecked="";
		$newwindowchecked="checked";
	}
	?>

	<tr>
            <td class="main"><?php echo TEXT_TARGET; ?></td>

            <td class="main">

	<?php echo tep_image(DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']);?><input type="radio" value="0" name="link_target_<?php echo $languages[$i]['id']; ?>" <?php echo $samewindowchecked; ?>><?php echo TEXT_TARGET_SAMEWINDOW; ?>

<input type="radio" value="1" name="link_target_<?php echo $languages[$i]['id']; ?>" <?php echo $newwindowchecked; ?>><?php echo TEXT_TARGET_NEWWINDOW; ?>
</td>
          </tr>
<tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
<?php
}
?>

<?php
 for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
?>

          <tr>
           <td valign="top" class="main"><br>
<td class="main"><?php echo tep_image(DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']). '&nbsp;'.tep_draw_textarea_tinymce('pages_html_text_'.$languages[$i]['id'],'soft','50','10', $pages_html_text[$languages[$i]['id']]); ?>
</td>
</tr>

<?php
}
?>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td class="main" align="center"><?php echo TEXT_PAGES_PAGE_NOTE . '<br>'; ?></td>
            <td class="main" align="right" valign="top" nowrap><?php echo (($form_action == 'insert') ? tep_image_submit('button_insert.gif', IMAGE_INSERT) : tep_image_submit('button_update.gif', IMAGE_UPDATE)). '&nbsp;&nbsp;<a href="' . tep_href_link(FILENAME_PAGE_MANAGER, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . (!empty($bID) and $bID != "" ? 'bID=' . $bID : '')) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
          </tr>
        </table>
<input type="hidden" name="bID" value="<?php echo $bID; ?>">
</td>
      </form></tr>
<?php
  } else {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow" width="100%">
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_PAGES; ?></td>
                <td class="dataTableHeadingContent"><?php echo TEXT_PAGES_TYPE; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_SORT_ORDER; ?></td>
                <td class="dataTableHeadingContent" align="center"><?php echo TABLE_HEADING_STATUS; ?></td>
                <td class="dataTableHeadingContent"></td>
                <td class="dataTableHeadingContent"></td>
              </tr>
<?php
    $pages_query_raw = "select p.pages_id, p.status, p.page_type, p.sort_order, s.pages_title from " . TABLE_PAGES . " p LEFT JOIN " .TABLE_PAGES_DESCRIPTION . " s on p.pages_id = s.pages_id where s.language_id='" . (int)$languages_id . "' order by p.sort_order, s.pages_title";

    $pages_split = new splitPageResults($_GET['page'], MAX_DISPLAY_SEARCH_RESULTS, $pages_query_raw, $pages_query_numrows);
    $pages_query = tep_db_query($pages_query_raw);
    while ($pages = tep_db_fetch_array($pages_query)) {

      if ((!isset($_GET['bID']) || (isset($_GET['bID']) && ($_GET['bID'] == $pages['pages_id']))) && !isset($bInfo) && (substr($action, 0, 3) != 'new')) {
        $bInfo_array = array_merge($pages, (array) $info);
        $bInfo = new objectInfo($bInfo_array);
      }

      if (isset($bInfo) && is_object($bInfo) && ($pages['pages_id'] == $bInfo->pages_id)) {
        echo '              <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_PAGE_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $pages['pages_id']) . '\'">' . "\n";
      } else {
        echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_PAGE_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $pages['pages_id']) . '\'">' . "\n";
      }
?>
                    <td class="dataTableContent"><?php echo '<a href="javascript:popupImageWindow(\'' . FILENAME_POPUP_IMAGE . '?page=' . $pages['pages_id'] . '\')">' . tep_image(DIR_WS_IMAGES . 'icon_popup.gif', 'View Page') . '</a>&nbsp;' . $pages['pages_title']; ?></td>
                    <td class="dataTableContent"><?php echo $pages['page_type']; ?></td>
                    <td class="dataTableContent"><?php echo $pages['sort_order']; ?></td>
                    <td class="dataTableContent" align="center"> 
                      <?php
      if ($pages['status'] == '1') {
        echo tep_image(DIR_WS_IMAGES . 'icon_status_green.gif', 'Active', 10, 10) . '&nbsp;&nbsp;<a href="' . tep_href_link(FILENAME_PAGE_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $pages['pages_id'] . '&action=setflag&flag=0') . '">' . tep_image(DIR_WS_IMAGES . 'icon_status_red_light.gif', 'Set Inactive', 10, 10) . '</a>';
      } else {
        echo '<a href="' . tep_href_link(FILENAME_PAGE_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $pages['pages_id'] . '&action=setflag&flag=1') . '">' . tep_image(DIR_WS_IMAGES . 'icon_status_green_light.gif', 'Set Active', 10, 10) . '</a>&nbsp;&nbsp;' . tep_image(DIR_WS_IMAGES . 'icon_status_red.gif', 'Inactive', 10, 10);
      }
?>
                    </td>
                    <td class="dataTableContent" align="right"></td>
                    <td class="dataTableContent" align="right"></td>
              </tr>
<?php
    }
?>
              <tr>
                <td colspan="5"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="smallText" valign="top"><?php //echo $pages_split->display_count($pages_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, $_GET['page'], TEXT_DISPLAY_NUMBER_OF_PAGES); ?></td>
                    <td class="smallText" align="right"><?php echo $pages_split->display_links($pages_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $_GET['page']); ?></td>
                  </tr>
                  <tr>
                    <td align="right" colspan="2"><?php echo '<a href="' . tep_href_link(FILENAME_PAGE_MANAGER, 'action=new') . '">' . tep_image_button('button_new_file.gif', IMAGE_NEW_PAGE) . '</a>'; ?></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
<?php
  $heading = array();
  $contents = array();
  switch ($action) {
    case 'delete':
      $heading[] = array('text' => '<b>' . $bInfo->pages_title . '</b>');

      $contents = array('form' => tep_draw_form('pages', FILENAME_PAGE_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $bInfo->pages_id . '&action=deleteconfirm'));
      $contents[] = array('text' => TEXT_INFO_DELETE_INTRO);
      $contents[] = array('text' => '<br><b>' . $bInfo->pages_title . '</b>');
      if ($bInfo->pages_image) $contents[] = array('text' => '<br>' . tep_draw_checkbox_field('delete_image', 'on', true) . ' ' . TEXT_INFO_DELETE_IMAGE);
      $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_delete.gif', IMAGE_DELETE) . '&nbsp;<a href="' . tep_href_link(FILENAME_PAGE_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $_GET['bID']) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
      break;
    default:
      if (is_object($bInfo)) {
        $heading[] = array('text' => '<b>' . $bInfo->pages_title . '</b>');

        $contents[] = array('align' => 'center', 'text' => '<br><br><a href="' . tep_href_link(FILENAME_PAGE_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $bInfo->pages_id . '&action=new') . '">' . tep_image_button('button_edit.gif', IMAGE_EDIT) . '</a> <a href="' . tep_href_link(FILENAME_PAGE_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $bInfo->pages_id . '&action=delete') . '">' . tep_image_button('button_delete.gif', IMAGE_DELETE) . '</a><br><br><br>');

        if ($bInfo->date_scheduled) $contents[] = array('text' => '<br>' . sprintf(TEXT_PAGES_SCHEDULED_AT_DATE, tep_date_short($bInfo->date_scheduled)));

        if ($bInfo->expires_date) {
          $contents[] = array('text' => '<br>' . sprintf(TEXT_PAGES_EXPIRES_AT_DATE, tep_date_short($bInfo->expires_date)));
        } elseif ($bInfo->expires_impressions) {
          $contents[] = array('text' => '<br>' . sprintf(TEXT_PAGES_EXPIRES_AT_IMPRESSIONS, $bInfo->expires_impressions));
        }

        if ($bInfo->date_status_change) $contents[] = array('text' => '<br>' . sprintf(TEXT_PAGES_STATUS_CHANGE, tep_date_short($bInfo->date_status_change)));
      }
      break;
  }

  if ( (tep_not_null($heading)) && (tep_not_null($contents)) ) {
    echo '            <td width="25%" valign="top">' . "\n";

    $box = new box;
    echo $box->infoBox($heading, $contents);

    echo '            </td>' . "\n";
  }
?>
          </tr>
        </table></td>
      </tr>
<?php
  }
?>
</table>
<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>