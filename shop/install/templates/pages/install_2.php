<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2013 osCommerce

  Released under the GNU General Public License
*/

  $www_location = 'http://' . $HTTP_SERVER_VARS['HTTP_HOST'];

  if (isset($HTTP_SERVER_VARS['REQUEST_URI']) && !empty($HTTP_SERVER_VARS['REQUEST_URI'])) {
    $www_location .= $HTTP_SERVER_VARS['REQUEST_URI'];
  } else {
    $www_location .= $HTTP_SERVER_VARS['SCRIPT_FILENAME'];
  }

  $www_location = substr($www_location, 0, strpos($www_location, 'install'));

  $dir_fs_www_root = osc_realpath(dirname(__FILE__) . '/../../../') . '/';
?>

<div class="mainBlock">
  <div class="stepsBox">
    <ol>
      <li>Datenbankserver</li>
      <li style="font-weight: bold;">Webserver</li>
      <li>Onlineshop - Einstellungen</li>
      <li>Fertig!</li>
    </ol>
  </div>

  <h1>Neue Installation</h1>

  <p>Diese webbasierte Installation konfiguriert osCommerce Online Merchant f&uuml;r Ihren Server.</p>
  <p>Bitte folgen Sie den Installationsanweisungen f&uuml;r den Datenbankserver, den Webserver und den Konfigurationseinstellungen f&uuml;r den Shop. Wenn Sie an einer Stelle Hilfe ben&ouml;tigen, nutzen Sie die Dokumentation, oder suchen sie Hilfe in den Onlineforen von osCommerce.</p>
</div>

<div class="contentBlock">
  <div class="infoPane">
    <h3>Schritt 2: Webserver</h3>

    <div class="infoPaneContents">
      <p>Der Webserver liefert die Seiten ihres Shops an die Kunden. Die Parameter stellen sicher, dass die Verweise auf den Seiten korrekt sind. Eine &Auml;nderung der Parameter ist in der Regel nicht n&ouml;tig.</p>
    </div>
  </div>

  <div class="contentPane">
    <h2>Webserver</h2>

    <form name="install" id="installForm" action="install.php?step=3" method="post">

    <table border="0" width="99%" cellspacing="0" cellpadding="5" class="inputForm">
      <tr>
        <td class="inputField"><?php echo 'Internetadresse<br />' . osc_draw_input_field('HTTP_WWW_ADDRESS', $www_location, 'class="text"'); ?></td>
        <td class="inputDescription">Die Internetadresse ihres Onlineshops.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'Webserver Verzeichnis<br />' . osc_draw_input_field('DIR_FS_DOCUMENT_ROOT', $dir_fs_www_root, 'class="text"'); ?></td>
        <td class="inputDescription">Das Verzeichnis, in dem der Onlineshop auf dem Webserver installiert wird.</td>
      </tr>
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
