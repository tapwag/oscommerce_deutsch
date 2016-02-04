<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2013 osCommerce

  Released under the GNU General Public License
*/

  $dir_fs_document_root = $HTTP_POST_VARS['DIR_FS_DOCUMENT_ROOT'];
  if ((substr($dir_fs_document_root, -1) != '\\') && (substr($dir_fs_document_root, -1) != '/')) {
    if (strrpos($dir_fs_document_root, '\\') !== false) {
      $dir_fs_document_root .= '\\';
    } else {
      $dir_fs_document_root .= '/';
    }
  }
?>

<div class="mainBlock">
  <div class="stepsBox">
    <ol>
      <li>Datenbankserver</li>
      <li>Webserver</li>
      <li style="font-weight: bold;">Onlineshop - Einstellungen</li>
      <li>Fertig!</li>
    </ol>
  </div>

  <h1>Neue Installation</h1>

   <p>Diese webbasierte Installation konfiguriert osCommerce f&uuml;r den Einsatz auf Ihrem Webserver.</p>
  <p>Bitte folgen Sie den Installationsanweisungen f&uuml;r den Datenbankserver, den Webserver und den Konfigurationseinstellungen f&uuml;r den Shop. Wenn Sie an einer Stelle Hilfe ben&ouml;tigen, nutzen Sie die Dokumentation, oder suchen sie Hilfe in den Onlineforen von osCommerce.</p>
</div>

<div class="contentBlock">
  <div class="infoPane">
    <h3>Schritt 3: Onlineshop - Einstellungen</h3>

   <div class="infoPaneContents">
      <p>Hier k&ouml;nnen Sie den Namen Ihres Shops und die Kotaktinformationen hinterlegen.</p>
      <p>Den Administratornamen und das Passwort ben&ouml;tigen Sie um sich im Administrationsbereich des Shops anzumelden.</p>
    </div>
  </div>

  <div class="contentPane">
    <h2>Onlineshop - Einstellungen</h2>

    <form name="install" id="installForm" action="install.php?step=4" method="post">

    <table border="0" width="99%" cellspacing="0" cellpadding="5" class="inputForm">
      <tr>
        <td class="inputField"><?php echo 'Name des Shops<br />' . osc_draw_input_field('CFG_STORE_NAME', null, 'class="text"'); ?></td>
        <td class="inputDescription">Der Name des Shops, den die Kunden sehen.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'Besitzer des Shops<br />' . osc_draw_input_field('CFG_STORE_OWNER_NAME', null, 'class="text"'); ?></td>
        <td class="inputDescription">Der Name des Shopbesitzers, den die Kunden sehen.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'E-Mailadresse des Shops<br />' . osc_draw_input_field('CFG_STORE_OWNER_EMAIL_ADDRESS', null, 'class="text"'); ?></td>
        <td class="inputDescription">Die E-Mailadresse, &uuml;ber die die Kunden mit den Shopbesitzer in Kontakt treten k&ouml;nnen.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'Name Administrator<br />' . osc_draw_input_field('CFG_ADMINISTRATOR_USERNAME', null, 'class="text"'); ?></td>
        <td class="inputDescription">Der Name des Administrators f&uuml;r das Anmelden an den Administrationsbereich.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'Passwort Administrator<br />' . osc_draw_input_field('CFG_ADMINISTRATOR_PASSWORD', null, 'class="text"'); ?></td>
        <td class="inputDescription">Das Passwort des Administrators f&uuml;r das Anmelden an den Administrationsbereich.</td>
      </tr>

<?php
  if (osc_is_writable($dir_fs_document_root) && osc_is_writable($dir_fs_document_root . 'admin')) {
?>
      <tr>
        <td class="inputField"><?php echo 'Verzeichnis Administrationsbereich<br />' . osc_draw_input_field('CFG_ADMIN_DIRECTORY', 'admin', 'class="text"'); ?></td>
<td class="inputDescription">Das Verzeichnis, in dem der Administrationsbereich installiert wird. Aus Sicherheitsgr&uuml;nden sollte das Verzeichnis unbedingt ge&auml;ndert werden.</td>
      </tr>
<?php
  }

  if (PHP_VERSION >= '5.2') {
?>
      <tr>
        <td class="inputField"><?php echo 'Zeitzone<br />' . osc_draw_time_zone_select_menu('CFG_TIME_ZONE'); ?></td>
        <td class="inputDescription">Zeitzone</td>
      </tr>
<?php
  }
?>

    </table>

    <p><?php echo osc_draw_button('Weiter', 'triangle-1-e', null, 'primary'); ?></p>

<?php
  foreach ( $HTTP_POST_VARS as $key => $value ) {
    if (($key != 'x') && ($key != 'y')) {
      echo osc_draw_hidden_field($key, $value);
    }
  }
?>

    </form>
  </div>
</div>
