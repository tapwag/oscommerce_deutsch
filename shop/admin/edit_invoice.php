<?php

 /*

 $Id: edit_invoice.php,v 1.00 2004/08/04

 by Christian von den Steinen, Germany

 $Id: edit_invoice.php,v 1.01 2005/06/14

  Change for the German and english linguistic area
  by Infobroker 
  Erich Paeper - info@cooleshops.de
  Bufix line 92 , 162 , 216
  
 osCommerce, Open Source E-Commerce Solutions

 http://www.oscommerce.com



 Copyright (c) 2003 osCommerce

 

 Released under the GNU General Public License


*/

 require('includes/application_top.php');
 require(DIR_WS_INCLUDES . 'template_top.php');

// require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_EDIT_INVOICE);

?>
<table>
<tr>
<td class="pageHeading" valign="top"><?php echo HEADING_TITLE_EDIT_INVOICE; ?>

<?php

 if ($_SERVER['REQUEST_METHOD']=="POST"){
	$text_1 = $HTTP_POST_VARS['text_1'];
	mysqli_query(tep_db_connect(),'REPLACE INTO edit_invoice VALUES (1, "' . $languages_id . '", "' . $text_1 .'")');
	$text_2 = $HTTP_POST_VARS['text_2'];
	mysqli_query(tep_db_connect(),'REPLACE INTO edit_invoice VALUES (2, "' . $languages_id . '", "' . $text_2 .'")');
	$text_3 = $HTTP_POST_VARS['text_3'];
	mysqli_query(tep_db_connect(),'REPLACE INTO edit_invoice VALUES (3, "' . $languages_id . '", "' . $text_3 .'")');
 }



 $sql=mysqli_query(tep_db_connect(),"SELECT * FROM edit_invoice where edit_invoice_id = '1' and language_id = '" . $languages_id . "'")

   or die(mysqli_error());

 $row=mysqli_fetch_array($sql);



?>

  <table width="98%" align="center" border="0" cellpadding="0" cellspacing="0">

   <tr> 

    <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '25'); ?></td>

   </tr>

  <form name="text_1_form" method="Post" action="">

   <tr>

    <td width="75%" valign="top"><?php echo EORDER_TEXT_1; ?></td>

   </tr>

   <tr> 

    <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>

   </tr>

   <tr>

    <td width="75%" valign="top"><textarea name="text_1" cols="75" rows="5"><?php echo $row['edit_invoice_text'] ?></textarea></td>

   </tr>

   <tr>

    <td align="left"></td>

   </tr>

   <tr> 

    <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '25'); ?></td>

   </tr>







<?php

 

 $sql=mysqli_query(tep_db_connect(),"SELECT * FROM edit_invoice where edit_invoice_id = '2' and language_id = '" . $languages_id . "'")

   or die(mysqli_error());

 $row=mysqli_fetch_array($sql);



?>

   <tr>

    <td width="75%" valign="top"><?php echo EORDER_TEXT_2; ?></td>

   </tr>

   <tr> 

    <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>

   </tr>

   <tr>

    <td width="75%" valign="top"><textarea name="text_2" cols="75" rows="5"><?php echo $row['edit_invoice_text'] ?></textarea></td>

   </tr>

   <tr> 

    <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '25'); ?></td>

   </tr>







<?php

 



 $sql=mysqli_query(tep_db_connect(),"SELECT * FROM edit_invoice where edit_invoice_id = '3' and language_id = '" . $languages_id . "'")

   or die(mysqli_error());

 $row=mysqli_fetch_array($sql);



?>

   <tr>

    <td width="75%" valign="top"><?php echo EORDER_TEXT_3; ?></td>

   </tr>

   <tr> 

    <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>

   </tr>

   <tr>

    <td width="75%" valign="top"><textarea name="text_3" cols="75" rows="5"><?php echo $row['edit_invoice_text'] ?></textarea></td>

   </tr>





   <tr>

    <td align="left"><input type="submit" name="Save" value="Speichern" style="width: 80px"></td>

   </tr>

  </form>

  </table>

 </td>
 </tr>
 </table>

<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>