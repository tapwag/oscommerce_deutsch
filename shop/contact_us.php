<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CONTACT_US);

#################
$page_query = tep_db_query("select p.pages_id, p.sort_order, p.status, s.pages_title, s.pages_html_text from " . TABLE_PAGES . " p LEFT JOIN " .TABLE_PAGES_DESCRIPTION . " s on p.pages_id = s.pages_id where p.status = 1 and s.language_id = '" . (int)$languages_id . "' and p.page_type = 2");
$page_check = tep_db_fetch_array($page_query);

$pagetext=stripslashes($page_check[pages_html_text]);

#################

  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'send') && isset($HTTP_POST_VARS['formid']) && ($HTTP_POST_VARS['formid'] == $sessiontoken)) {
    $error = false;

    $name = tep_db_prepare_input($HTTP_POST_VARS['name']);
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email']);
    $enquiry = tep_db_prepare_input($HTTP_POST_VARS['enquiry']);

		$subject = tep_db_prepare_input($_POST['subject']);
		$phone = tep_db_prepare_input($_POST['phone']);
		$date = 'Date Sent: ' . date("d M Y H:i:s");
		$orders_id = tep_not_null($_POST['orders_id']) ? $_POST['orders_id'] : false;
		$xipaddress = $_SERVER["REMOTE_ADDR"];
		$subject = $subject ? $subject : EMAIL_SUBJECT;

	if (strlen($name) < ENTRY_LAST_NAME_MIN_LENGTH) {
	  $error = true;

	  $messageStack->add('contact', ENTRY_LAST_NAME_ERROR);
	}
	if (strlen($enquiry) < 8) {
	  $error = true;

	  $messageStack->add('contact', ENTRY_ERROR_ENQUIRY);
	}



    if (!tep_validate_email($email_address)) {
      $error = true;

      $messageStack->add('contact', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
    }

    $actionRecorder = new actionRecorder('ar_contact_us', (tep_session_is_registered('customer_id') ? $customer_id : null), $name);
    if (!$actionRecorder->canPerform()) {
      $error = true;

      $actionRecorder->record(false);

      $messageStack->add('contact', sprintf(ERROR_ACTION_RECORDER, (defined('MODULE_ACTION_RECORDER_CONTACT_US_EMAIL_MINUTES') ? (int)MODULE_ACTION_RECORDER_CONTACT_US_EMAIL_MINUTES : 15)));
    }

    if ($error == false) {
		$enquiry = MESSAGE_FROM . $name . "\n" . $date . "\n" . ($phone ? ENTRY_TELEPHONE_NUMBER .  $phone . "\n" : '' ) . ($customer_id ? MAIL_CLIENT_ID .  $customer_id . "\n" : '')  . ($orders_id ? MAIL_ORDER_ID .  $orders_id . "\n" : '') . "\n" . MAIL_IP . $xipaddress . '.' . "\n\n" . ENTRY_ENQUIRY . "\n" . $enquiry;
	  
      tep_mail(STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, EMAIL_SUBJECT, $enquiry, $name, $email_address);


      $actionRecorder->record();

      tep_redirect(tep_href_link(FILENAME_CONTACT_US, 'action=success'));
    }
  }

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_CONTACT_US));

  require(DIR_WS_INCLUDES . 'template_top.php');

	$account = array();$orders = array();$name = '';$email_address = '';$phone = '';
	if (tep_session_is_registered('customer_id')) {
			$account_query = tep_db_query("select customers_firstname, customers_lastname, customers_telephone, customers_id, customers_email_address from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "'");
			$account = tep_db_fetch_array($account_query);
			$name = $account['customers_firstname'].' '.$account['customers_lastname'] ;
			$email_address = $account['customers_email_address'] ;
			$phone = $account['customers_telephone'] ;
			$history_query = tep_db_query("select orders_id, date_purchased from " . TABLE_ORDERS . " where customers_id = '" . (int)$customer_id . "' order by orders_id DESC");
			$orders[0] = array('id' => '0', 'text' => ENTRY_ORDER_ID);
			while ($history = tep_db_fetch_array($history_query)) {
				$orders[] = array('id' => $history['orders_id'], 'text' => $history['orders_id'] . ENTRY_ORDERED . tep_date_short($history['date_purchased']));

			} 
	}
?>

<h1><?php echo HEADING_TITLE; ?></h1>

<?php
  if ($messageStack->size('contact') > 0) {
    echo $messageStack->output('contact');
  }

  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'success')) {
?>

<div class="contentContainer">
  <div class="contentText">
    <?php echo TEXT_SUCCESS; ?>
  </div>

  <div style="float: right;">
    <?php echo tep_draw_button(IMAGE_BUTTON_CONTINUE, 'triangle-1-e', tep_href_link(FILENAME_DEFAULT)); ?>
  </div>
</div>

<?php
  } else {
tep_draw_hidden_field('phone',$phone);
?>

<?php echo tep_draw_form('contact_us', tep_href_link(FILENAME_CONTACT_US, 'action=send'), 'post', '', true); ?>

<div class="contentContainer">
  <div class="contentText">

<div><?php echo $pagetext; ?></div>

    <table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td class="fieldKey"><?php echo ENTRY_NAME; ?></td>
       <td class="fieldValue"><?php echo (isset($account['customers_lastname']) ? $name . tep_draw_hidden_field('name',$name) : tep_draw_input_field('name', $name, 'size="28"')); ?></td>
				  </tr>
      <tr>
        <td class="fieldKey"><?php echo ENTRY_EMAIL; ?></td>
       <td class="fieldValue"><?php echo tep_draw_input_field('email', $email_address, 'size="28"'); ?></td>
				  </tr>
      <tr>
<td class="fieldKey"><?php echo BOX_HEADING_SUBJECT; ?></td>
					<td class="fieldValue">
						<?php echo tep_draw_input_field('subject', '', 'size="28"'); 
						/*
						if (sizeof($orders) > 1) {
							echo '&nbsp;&nbsp;&nbsp;&nbsp;' . tep_draw_pull_down_menu('orders_id', $orders); 
						}
						*/
						?>
					</td>
				  </tr>
				  <tr>
        <td class="fieldKey" valign="top"><?php echo ENTRY_ENQUIRY; ?></td>
        <td class="fieldValue"><?php echo tep_draw_textarea_field('enquiry', 'soft', 50, 15); ?></td>
      </tr>
    </table>
  </div>

  <div class="buttonSet">
    <span class="buttonAction"><?php echo tep_draw_button(IMAGE_BUTTON_CONTINUE, 'triangle-1-e', null, 'primary'); ?></span>
  </div>
</div>

</form>

<?php
  }

  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
