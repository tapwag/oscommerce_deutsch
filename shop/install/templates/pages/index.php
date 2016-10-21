<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

  $compat_register_globals = true;

  if (function_exists('ini_get') && (PHP_VERSION < 4.3) && ((int)ini_get('register_globals') == 0)) {
    $compat_register_globals = false;
  }
?>

<div class="mainBlock">
  <h1>Willkommen bei osCommerce Online Merchant v<?php echo osc_get_version(); ?>!</h1>

  <p>osCommerce Online Merchant hilft Ihnen dabei Ihre Produkte weltweit in einem Onlinestore zu verkaufen. Sein Administrationswerkzeug verwaltet Produkte, Kunden, Bestellungen, Newsletter, Sonderangebote und vieles mehr f&uuml;r Ihren Erfolg im Onlinegesch&auml;ft.</p>
  <p>osCommerce hat eine grosse Gemeinschaft von Inhabern und Entwicklern angezogen, die sich gegenseitig unterst&uuml;tzen und &uuml;ber 7000 kostenlose Erweiterungen anbieten, die die Funktionalit&auml;t und das Potential Ihres Onlinegesch&auml;ft erweitern können.</p>
</div>

<div class="contentBlock">
  <div class="infoPane">
    <h3>Serverf&auml;higkeiten</h3>

    <div class="infoPaneContents">
      <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr>
          <td><strong>PHP Version</strong></td>
          <td align="right"><?php echo PHP_VERSION; ?></td>
          <td align="right" width="25"><img src="images/<?php echo ((PHP_VERSION >= 4) ? 'success.gif' : 'failed.gif'); ?>" width="16" height="16" /></td>
        </tr>
      </table>

<?php
  if (function_exists('ini_get')) {
?>

      <br />

      <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr>
          <td colspan="3"><strong>PHP Einstellungen</strong></td>
        </tr>
        <tr>
          <td>register_globals</td>
          <td align="right"><?php echo (((int)ini_get('register_globals') == 0) ? 'Off' : 'On'); ?></td>
          <td align="right"><img src="images/<?php echo (($compat_register_globals == true) ? 'success.gif' : 'failed.gif'); ?>" width="16" height="16" /></td>
        </tr>
        <tr>
          <td>magic_quotes</td>
          <td align="right"><?php echo (((int)ini_get('magic_quotes') == 0) ? 'Off' : 'On'); ?></td>
          <td align="right"><img src="images/<?php echo (((int)ini_get('magic_quotes') == 0) ? 'success.gif' : 'failed.gif'); ?>" width="16" height="16" /></td>
        </tr>
        <tr>
          <td>file_uploads</td>
          <td align="right"><?php echo (((int)ini_get('file_uploads') == 0) ? 'Off' : 'On'); ?></td>
          <td align="right"><img src="images/<?php echo (((int)ini_get('file_uploads') == 1) ? 'success.gif' : 'failed.gif'); ?>" width="16" height="16" /></td>
        </tr>
        <tr>
          <td>session.auto_start</td>
          <td align="right"><?php echo (((int)ini_get('session.auto_start') == 0) ? 'Off' : 'On'); ?></td>
          <td align="right"><img src="images/<?php echo (((int)ini_get('session.auto_start') == 0) ? 'success.gif' : 'failed.gif'); ?>" width="16" height="16" /></td>
        </tr>
        <tr>
          <td>session.use_trans_sid</td>
          <td align="right"><?php echo (((int)ini_get('session.use_trans_sid') == 0) ? 'Off' : 'On'); ?></td>
          <td align="right"><img src="images/<?php echo (((int)ini_get('session.use_trans_sid') == 0) ? 'success.gif' : 'failed.gif'); ?>" width="16" height="16" /></td>
        </tr>
      </table>

      <br />

      <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr>
          <td colspan="2"><strong>Erforderliche PHP Erweiterungen</strong></td>
        </tr>
        <tr>
          <td>MySQL<?php echo extension_loaded('mysqli') ? 'i' : ''; ?></td>
          <td align="right"><img src="images/<?php echo (extension_loaded('mysql') || extension_loaded('mysqli') ? 'success.gif' : 'failed.gif'); ?>" width="16" height="16" /></td>
        </tr>
      </table>

      <br />

      <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr>
          <td colspan="2"><strong>Empfohlene PHP Erweiterungen</strong></td>
        </tr>
        <tr>
          <td>GD</td>
          <td align="right"><img src="images/<?php echo (extension_loaded('gd') ? 'success.gif' : 'failed.gif'); ?>" width="16" height="16" /></td>
        </tr>
        <tr>
          <td>cURL</td>
          <td align="right"><img src="images/<?php echo (extension_loaded('curl') ? 'success.gif' : 'failed.gif'); ?>" width="16" height="16" /></td>
        </tr>
        <tr>
          <td>OpenSSL</td>
          <td align="right"><img src="images/<?php echo (extension_loaded('openssl') ? 'success.gif' : 'failed.gif'); ?>" width="16" height="16" /></td>
        </tr>
      </table>

<?php
  }
?>

    </div>
  </div>

  <div class="contentPane">
    <h2>Neue Installation</h2>

<?php
  $configfile_array = array();

  if (file_exists(osc_realpath(dirname(__FILE__) . '/../../../includes') . '/configure.php') && !osc_is_writable(osc_realpath(dirname(__FILE__) . '/../../../includes') . '/configure.php')) {
    @chmod(osc_realpath(dirname(__FILE__) . '/../../../includes') . '/configure.php', 0777);
  }

  if (file_exists(osc_realpath(dirname(__FILE__) . '/../../../admin/includes') . '/configure.php') && !osc_is_writable(osc_realpath(dirname(__FILE__) . '/../../../admin/includes') . '/configure.php')) {
    @chmod(osc_realpath(dirname(__FILE__) . '/../../../admin/includes') . '/configure.php', 0777);
  }

  if (file_exists(osc_realpath(dirname(__FILE__) . '/../../../includes') . '/configure.php') && !osc_is_writable(osc_realpath(dirname(__FILE__) . '/../../../includes') . '/configure.php')) {
    $configfile_array[] = osc_realpath(dirname(__FILE__) . '/../../../includes') . '/configure.php';
  }

  if (file_exists(osc_realpath(dirname(__FILE__) . '/../../../admin/includes') . '/configure.php') && !osc_is_writable(osc_realpath(dirname(__FILE__) . '/../../../admin/includes') . '/configure.php')) {
    $configfile_array[] = osc_realpath(dirname(__FILE__) . '/../../../admin/includes') . '/configure.php';
  }

  $warning_array = array();

  if (function_exists('ini_get')) {
    if ($compat_register_globals == false) {
	    $warning_array['register_globals'] = 'Kompatibilit&auml;t mit register_globals wird von PHP 4.3+ unterst&uuml;tzt. Diese Einstellung <u>muss aktiv sein</u> da eine &auml;tere PHP-Version verwendet wird.';
    }
  }

  if (!extension_loaded('mysql') && !extension_loaded('mysqli')) {
    $warning_array['mysql'] = 'Die MySQLi oder eine &auml;tere MySQL Erweiterung ist erforderlich aber nicht installiert. Bitte aktivieren Sie eine davon um die Installation fortzusetzen.';
  }

  if ((sizeof($configfile_array) > 0) || (sizeof($warning_array) > 0)) {
?>

    <div class="noticeBox">

<?php
    if (sizeof($warning_array) > 0) {
?>

      <table border="0" width="100%" cellspacing="0" cellpadding="2" style="background: #fffbdf; border: 1px solid #ffc20b; padding: 2px;">

<?php
      reset($warning_array);
      while (list($key, $value) = each($warning_array)) {
        echo '        <tr>' . "\n" .
             '          <td valign="top"><strong>' . $key . '</strong></td>' . "\n" .
             '          <td valign="top">' . $value . '</td>' . "\n" .
             '        </tr>' . "\n";
      }
?>

      </table>
<?php
    }

    if (sizeof($configfile_array) > 0) {
?>

      <p>Dem Webserver gelingt es nicht, die Installationsparameter in seine Konfigurationsdateien zu schreiben.</p>
      <p>Die folgenden Dateien m&uuml;ssen ein gesetztes Writable-Bit haben (chmod a+w):</p>
      <p>

<?php
      for ($i=0, $n=sizeof($configfile_array); $i<$n; $i++) {
        echo $configfile_array[$i];

        if (isset($configfile_array[$i+1])) {
          echo '<br />';
        }
      }
?>

      </p>

<?php
    }
?>

    </div>

<?php
  }

  if ((sizeof($configfile_array) > 0) || (sizeof($warning_array) > 0)) {
?>

    <p>Bitte korrigieren Sie die oben genannten Fehler und starten Sie die Installationsroutine nochmals sobald die &Auml;nderungen aktiv sind.</p>

<?php
    if (sizeof($warning_array) > 0) {
	    echo '    <p><i>&Auml;nderungen an den Webservereinstellungen machen eventuell einen Neustart des Webserverdiensts erforderlich bevor die &Auml;nderungen greifen k&ouml;nnen.</i></p>' . "\n";
    }
?>

    <p><?php echo osc_draw_button('Nochmals versuchen.', 'arrowrefresh-1-e', 'index.php', 'primary'); ?></p>

<?php
  } else {
?>

    <p>Die Umgebung Ihres Webservers wurde &uuml;berpr&uuml;ft damit mit einer erfolgreichen Installation und Konfiguration Ihres Onlineshops fortgefahren werden kann.</p>

    <div id="jsOn" style="display: none;">
      <p>Bitte fahren Sie fort um den Installationsprozess zu starten.</p>
      <p><?php echo osc_draw_button('Start', 'triangle-1-e', 'install.php', 'primary'); ?></p>
    </div>

    <div id="jsOff">
      <p>Bitte aktivieren Sie Javascript in Ihrem Browser damit Sie in der Lage sind, den Installationsprozess zu starten.</p>
      <p><?php echo osc_draw_button('Retry', 'arrowrefresh-1-e', 'index.php', 'primary'); ?></p>
    </div>

<script>
$(function() {
  $('#jsOff').hide();
  $('#jsOn').show();
});
</script>

<?php
  }
?>

  </div>
</div>
