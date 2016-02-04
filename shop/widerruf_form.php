<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_WIDERRUF_FORM);

  $error = false;
  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'send') && isset($HTTP_POST_VARS['formid']) && ($HTTP_POST_VARS['formid'] == $sessiontoken)) {
    $name          = tep_db_prepare_input($HTTP_POST_VARS['name']);
    $address       = tep_db_prepare_input($HTTP_POST_VARS['address']);
    $telefon       = tep_db_prepare_input($HTTP_POST_VARS['telefon']);
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email']);
    $enquiry       = tep_db_prepare_input($HTTP_POST_VARS['enquiry']);
    $dor           = $HTTP_POST_VARS['dor'];
    $dre           = $HTTP_POST_VARS['dre'];
    $betreff = TEXT_WHAT . ' ' . $name;
    $text = ENTRY_NAME . $name
           . '<br>' . ENTRY_ADDRESS       . $address
           . '<br>Telefon: '              . $telefon
           . '<br>Email:   '              . $email_address
           . '<br>' . ENTRY_DATE_ORDERED  . $dor
           . '<br>' . ENTRY_DATE_RECEIVED . $dre
           . '<br>' . ENTRY_ENQUIRY       . $enquiry;

    if (strlen($enquiry) < 1) {
      $error = true;
      $messageStack->add('wider', ENTRY_ENQUIRY_CHECK_ERROR);
    }

    if (strlen($dor) < 1) {
      $error = true;
      $messageStack->add('wider', ENTRY_DOR_CHECK_ERROR);
    }
    if (strlen($dre) < 1) {
      $error = true;
      $messageStack->add('wider', ENTRY_DRE_CHECK_ERROR);
    }
    if (strlen($name) < 1) {
      $error = true;
      $messageStack->add('wider', ENTRY_NAME_CHECK_ERROR);
    }
    if (strlen($address) < 1) {
      $error = true;
      $messageStack->add('wider', ENTRY_ADDRESS_CHECK_ERROR);
    }

    if ($error == false) {
      tep_mail(STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, $betreff, $text, $name, $email_address);
      tep_redirect(tep_href_link(FILENAME_WIDERRUF_FORM, 'action=success'));
    }
  }



  $account = array();$name = '';$email = '';$telefon = '';
  if (tep_session_is_registered('customer_id'))
  {
    $account_query = tep_db_query("select c.customers_firstname, c.customers_lastname, c.customers_telephone, c.customers_id, c.customers_default_address_id, c.customers_email_address,
    ab.entry_street_address, ab.entry_postcode, ab.entry_city"  .
     " FROM " . TABLE_CUSTOMERS . " c, " . TABLE_ADDRESS_BOOK . " ab " .
     " WHERE c.customers_id = '" . (int)$customer_id . "'" .
     " AND ab.address_book_id = c.customers_default_address_id");
    $account = tep_db_fetch_array($account_query);
    $name    = $account['customers_firstname'].' '.$account['customers_lastname'] ;
    $email   = $account['customers_email_address'] ;
    $telefon = $account['customers_telephone'] ;
    $address = $account['entry_street_address'] . ',' . $account['entry_postcode'] . " " . $account['entry_city'];
  }

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_WIDERRUF_FORM));

  require(DIR_WS_INCLUDES . 'template_top.php');
?>

<link rel="stylesheet" type="text/css" href="print-widerruf.css" media="print">
<script  type="text/javascript" language="javascript">
function printPage()
{
if (window.print) {
jetztdrucken = confirm('Seite drucken ?');
if (jetztdrucken) window.print();
   }
}
function popupWindow(url) {
  window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=100,height=100,screenX=150,screenY=150,top=150,left=150')
}


</script>

<h1><?php echo HEADING_TITLE; ?></h1>

<?php
  if ($messageStack->size('wider') > 0) {
    echo $messageStack->output('wider');
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
?>

<!--  <span class="inputRequirement" style="float: right;"><?php echo FORM_REQUIRED_INFORMATION; ?></span>-->

<?php echo tep_draw_form('widerruf_form', tep_href_link(FILENAME_WIDERRUF_FORM, 'action=send'), 'post', '', true); ?>

<div class="contentContainer">
  <div class="contentText">

    <table border="0" width="100%" cellspacing="0" cellpadding="2">

    <tr>
      <td class="main">
        <?php echo TEXT_TO; ?><br>
<b><?php echo nl2br(STORE_NAME_ADDRESS); ?></b><br>
        <?php echo /*STORE_DATA .*/ STORE_OWNER_EMAIL_ADDRESS; ?><br><br>
        <?php// echo TEXT_STORE_DATA ; ?>
    <?php    // <br><br>?>
        <?php echo TEXT_1; ?><br>
      </td>
    </tr>
    <tr>
      <td class="fieldValue"><?php echo tep_draw_textarea_field('enquiry', 'soft', 50, 6); ?><br><?php echo ENTRY_ENQUIRY; ?><br><br></td>
    </tr>
    <tr>
      <td>
        <table>
        <tr>
          <td class="fieldKey"><?php echo ENTRY_DATE_ORDERED; ?></td>
          <td class="fieldValue"><?php echo tep_draw_input_field('dor', $dor, 'size="10"'); ?>
        </tr>
        <tr>
          <td class="fieldKey"><?php echo ENTRY_DATE_RECEIVED; ?></td>
          <td class="fieldValue"><?php echo tep_draw_input_field('dre', $dre, 'size="10"'); ?>
        </tr>
        </table>
      </td>
    </tr>
    <tr><td><br><br><?php echo TEXT_2; ?></td></tr>
    <tr>
        <td class="fieldKey"><?php echo ENTRY_NAME; ?>
          <?php echo tep_draw_hidden_field('telefon', $telefon); ?>
          <?php echo tep_draw_hidden_field('email', $email); ?>
          <?php echo (isset($account['customers_lastname']) ? $name . tep_draw_hidden_field('name',$name) : tep_draw_input_field('name', $name, 'size="50"')); ?>
        </td>
    </tr>
    <tr><td class="fieldKey"><?php echo ENTRY_ADDRESS; ?></td></tr>
    <tr>
      <td class="fieldValue">
        <?php echo (isset($account['entry_street_address']) ? $address . tep_draw_hidden_field('address',$address) : tep_draw_input_field('address', $address, 'size="80"')); ?></td></tr><tr>
    </tr>
    <tr>
      <td><br><br>_____________________________________________________<br><?php echo TEXT_3; ?></td >
</tr>
    </table>
  </div>
  <div class="buttonSet">
    <span class="buttonAction"><?php echo tep_draw_button(IMAGE_BUTTON_CONTINUE, 'triangle-1-e', null, 'primary'); ?></span>
  </div>
</div>
</form>
 <div class="noprint">
    <table border="0" width="100%" cellspacing="2" cellpadding="2"><colgroup><col width=30%><col width=30%><col width=40%></colgroup>
    <tr>
      <td align="left"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_draw_button(IMAGE_BUTTON_CONTINUE_SHOPPING, 'triangle-1-w', null, 'primary') . '</a>'; ?></td>
      <td align="left">
        <a href="javascript:printPage()">
          <?php echo tep_image(DIR_WS_CATALOG . DIR_WS_IMAGES . 'button_print.png', "Print",'25','25');?>
      </td>
      <td></td>
    </tr>
    </table>
  </div>

<br><?php echo TEXT_4; ?><br>
<?php echo TEXT_5; ?><br>

<?php
  }

  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>