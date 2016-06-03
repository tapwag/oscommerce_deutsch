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
  <h1>Willkommen bei osCommerce Deutsche Version <?php echo osc_get_version(); ?>!</h1>

 <p>osCommerce hilft Ihnen Produkte weltweit in Ihrem eigenen Shop zu verkaufen. Im Administrationsbereich k&ouml;nnen Sie Produkte, Kunden, Bestellungen, Newsletter, Spezialangebote und mehr verwalten, um einen erfolgreichen Online-Shop aufzubauen.</p>
  <p>osCommerce hat eine gro&szlig;e Gemeinde an Shopbesitzern und Entwicklern und bietet &uuml;ber 6000 freie Zusatzmodule um Ihren Shop zu erweitern und erfolgreicher zu machen.</p>
</div>

<div class="contentBlock">
  <div class="infoPane">
    <h3>Servereinstellungen</h3>

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
          <td colspan="2"><strong>Ben&ouml;tigte PHP Erweiterungen</strong></td>
        </tr>
        <tr>
          <td>MySQL</td>
          <td align="right"><img src="images/<?php echo (extension_loaded('mysql') || extension_loaded('mysqli') ? 'success.gif' : 'failed.gif'); ?>" width="16" height="16" /></td>
        </tr>
      </table>

      <br />

      <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr>
          <td colspan="2"><strong>Optionale PHP Erweiterungen</strong></td>
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
      $warning_array['register_globals'] = 'Compatibility with register_globals is supported from PHP 4.3+. This setting <u>must be enabled</u> due to an older PHP version being used.';
    }
  }

  if (!extension_loaded('mysql')) {
    $warning_array['mysql'] = 'Das MySQL-Modul ist f&uuml;r PHP ist nicht installiert.Btite installieren Sie das Modul, bevor Sie mit der Installation fortfahren.';
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

     <p>Es ist nicht m&ouml;glich die Installationsparameter in einer Datei zu speichern.</p>
      <p>Folgende Dateien m&uuml;ssen Schreibrechte besitzen (Auf UNIX-Systemen das Writeable-Bit per chmod a+w auf die folgenden Dateien setzen):</p>
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

     <p>Bitte korrigieren Sie die Fehler und versuchen Sie die Installation erneut auszuf&uuml;hren.</p>

<?php
    if (sizeof($warning_array) > 0) {
     echo '    <p><i>Wenn Sie Parameter des Webservers &auml;ndern, muss der Webserver neu gestartet werden.</i></p>' . "\n";
    }
?>

    <p><?php echo osc_draw_button('Nochmals versuchen', 'arrowrefresh-1-e', 'index.php', 'primary'); ?></p>

<?php
  } else {
?>

	<p>Die f&uuml;r die Installation von osCommerce ben&ouml;tigten Einstellungen sind vorhanden.</p>

    <div id="jsOn" style="display: none;">
       <p>Dr&uuml;cken Sie auf Start um die Installation zu starten.</p>
      <p><?php echo osc_draw_button('Start', 'triangle-1-e', 'install.php', 'primary'); ?></p>
    </div>

    <div id="jsOff">
      <p>Bitte aktivieren Sie Javascript in Ihrem Browser, damit die Installation gestartet werden kann.</p>
      <p><?php echo osc_draw_button('erneut Versuchen', 'arrowrefresh-1-e', 'index.php', 'primary'); ?></p>
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
