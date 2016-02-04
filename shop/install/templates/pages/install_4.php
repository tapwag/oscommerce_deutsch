<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

  require('../includes/database_tables.php');

  osc_db_connect(trim($HTTP_POST_VARS['DB_SERVER']), trim($HTTP_POST_VARS['DB_SERVER_USERNAME']), trim($HTTP_POST_VARS['DB_SERVER_PASSWORD']));
  osc_db_select_db(trim($HTTP_POST_VARS['DB_DATABASE']));

  osc_db_query('update ' . TABLE_CONFIGURATION . ' set configuration_value = "' . trim($HTTP_POST_VARS['CFG_STORE_NAME']) . '" where configuration_key = "STORE_NAME"');
  osc_db_query('update ' . TABLE_CONFIGURATION . ' set configuration_value = "' . trim($HTTP_POST_VARS['CFG_STORE_OWNER_NAME']) . '" where configuration_key = "STORE_OWNER"');
  osc_db_query('update ' . TABLE_CONFIGURATION . ' set configuration_value = "' . trim($HTTP_POST_VARS['CFG_STORE_OWNER_EMAIL_ADDRESS']) . '" where configuration_key = "STORE_OWNER_EMAIL_ADDRESS"');

  if (!empty($HTTP_POST_VARS['CFG_STORE_OWNER_NAME']) && !empty($HTTP_POST_VARS['CFG_STORE_OWNER_EMAIL_ADDRESS'])) {
    osc_db_query('update ' . TABLE_CONFIGURATION . ' set configuration_value = "\"' . trim($HTTP_POST_VARS['CFG_STORE_OWNER_NAME']) . '\" <' . trim($HTTP_POST_VARS['CFG_STORE_OWNER_EMAIL_ADDRESS']) . '>" where configuration_key = "EMAIL_FROM"');
  } else {
    osc_db_query('update ' . TABLE_CONFIGURATION . ' set configuration_value = "' . trim($HTTP_POST_VARS['CFG_STORE_OWNER_EMAIL_ADDRESS']) . '" where configuration_key = "EMAIL_FROM"');
  }

  if ( !empty($HTTP_POST_VARS['CFG_ADMINISTRATOR_USERNAME']) ) {
    $check_query = osc_db_query('select user_name from ' . TABLE_ADMINISTRATORS . ' where user_name = "' . trim($HTTP_POST_VARS['CFG_ADMINISTRATOR_USERNAME']) . '"');

    if (osc_db_num_rows($check_query)) {
      osc_db_query('update ' . TABLE_ADMINISTRATORS . ' set user_password = "' . osc_encrypt_password(trim($HTTP_POST_VARS['CFG_ADMINISTRATOR_PASSWORD'])) . '" where user_name = "' . trim($HTTP_POST_VARS['CFG_ADMINISTRATOR_USERNAME']) . '"');
    } else {
      osc_db_query('insert into ' . TABLE_ADMINISTRATORS . ' (user_name, user_password) values ("' . trim($HTTP_POST_VARS['CFG_ADMINISTRATOR_USERNAME']) . '", "' . osc_encrypt_password(trim($HTTP_POST_VARS['CFG_ADMINISTRATOR_PASSWORD'])) . '")');
    }
  }

  osc_db_query('update ' . TABLE_CONFIGURATION . ' set configuration_value = "' . trim($HTTP_POST_VARS['CFG_STORE_OWNER_EMAIL_ADDRESS']) . '" where configuration_key = "MODULE_PAYMENT_PAYPAL_EXPRESS_SELLER_ACCOUNT"');
?>

<div class="mainBlock">
  <div class="stepsBox">
    <ol>
      <li>Datenbankserver</li>
      <li>Webserver</li>
      <li>Onlineshop - Einstellungen</li>
      <li style="font-weight: bold;">Fertig!</li>
    </ol>
  </div>

  <h1>Neue Installation</h1>

  <p>Diese webbasierte Installtion konfiguriert osCommerce Online Merchant f&uuml;r Ihren Server.</p>
  <p>Bitte folgen Sie den Installationsanweisungen f&uuml;r den Datenbankserver, den Webserver und den Konfigurationseinstellungen f&uuml;r den Shop. Wenn Sie an einer Stelle Hilfe ben&ouml;tigen, nutzen Sie die Dokumentation, oder suchen sie Hilfe in den Onlineforen von osCommerce.</p>
</div>

<div class="contentBlock">
  <div class="infoPane">
    <h3>Schritt 4: Fertig!</h3>

     <div class="infoPaneContents">
      <p>Herzlichen Gl&uuml;ckwunsch. osCommerce wurde erfolgreich auf Ihrem Webserver installiert!</p>
      <p>Wir w&uuml;nschen Ihnen viel Erfolg mit Ihren Onlineshop und hei&szlig;en Sie in der osCommerce - Gemeinschaft herzlich willkommen.</p>
      <p align="right">- Das osCommerce Team</p>
    </div>
  </div>

  <div class="contentPane">
    <h2>Fertig!</h2>

<?php
  $dir_fs_document_root = $HTTP_POST_VARS['DIR_FS_DOCUMENT_ROOT'];
  if ((substr($dir_fs_document_root, -1) != '\\') && (substr($dir_fs_document_root, -1) != '/')) {
    if (strrpos($dir_fs_document_root, '\\') !== false) {
      $dir_fs_document_root .= '\\';
    } else {
      $dir_fs_document_root .= '/';
    }
  }

  osc_db_query('update ' . TABLE_CONFIGURATION . ' set configuration_value = "' . $dir_fs_document_root . 'includes/work/" where configuration_key = "DIR_FS_CACHE"');
  osc_db_query('update ' . TABLE_CONFIGURATION . ' set configuration_value = "' . $dir_fs_document_root . 'includes/work/" where configuration_key = "SESSION_WRITE_DIRECTORY"');

  if ($handle = opendir($dir_fs_document_root . 'includes/work/')) {
    while (false !== ($filename = readdir($handle))) {
      if (substr($filename, strrpos($filename, '.')) == '.cache') {
        @unlink($dir_fs_document_root . 'includes/work/' . $filename);
      }
    }

    closedir($handle);
  }

  $http_url = parse_url($HTTP_POST_VARS['HTTP_WWW_ADDRESS']);
  $http_server = $http_url['scheme'] . '://' . $http_url['host'];
  $http_catalog = $http_url['path'];
  if (isset($http_url['port']) && !empty($http_url['port'])) {
    $http_server .= ':' . $http_url['port'];
  }

  if (substr($http_catalog, -1) != '/') {
    $http_catalog .= '/';
  }

  $admin_folder = 'admin';
  if (isset($HTTP_POST_VARS['CFG_ADMIN_DIRECTORY']) && !empty($HTTP_POST_VARS['CFG_ADMIN_DIRECTORY']) && osc_is_writable($dir_fs_document_root) && osc_is_writable($dir_fs_document_root . 'admin')) {
    $admin_folder = preg_replace('/[^a-zA-Z0-9]/', '', trim($HTTP_POST_VARS['CFG_ADMIN_DIRECTORY']));

    if (empty($admin_folder)) {
      $admin_folder = 'admin';
    }
  }

  $file_contents = '<?php' . "\n" .
                   '  define(\'HTTP_SERVER\', \'' . $http_server . '\');' . "\n" .
                   '  define(\'HTTPS_SERVER\', \'' . $http_server . '\');' . "\n" .
                   '  define(\'ENABLE_SSL\', false);' . "\n" .
                   '  define(\'HTTP_COOKIE_DOMAIN\', \'\');' . "\n" .
                   '  define(\'HTTPS_COOKIE_DOMAIN\', \'\');' . "\n" .
                   '  define(\'HTTP_COOKIE_PATH\', \'' . $http_catalog . '\');' . "\n" .
                   '  define(\'HTTPS_COOKIE_PATH\', \'' . $http_catalog . '\');' . "\n" .
                   '  define(\'DIR_WS_HTTP_CATALOG\', \'' . $http_catalog . '\');' . "\n" .
                   '  define(\'DIR_WS_HTTPS_CATALOG\', \'' . $http_catalog . '\');' . "\n" .
                   '  define(\'DIR_WS_IMAGES\', \'images/\');' . "\n" .
                   '  define(\'DIR_WS_ICONS\', DIR_WS_IMAGES . \'icons/\');' . "\n" .
                   '  define(\'DIR_WS_INCLUDES\', \'includes/\');' . "\n" .
                   '  define(\'DIR_WS_FUNCTIONS\', DIR_WS_INCLUDES . \'functions/\');' . "\n" .
                   '  define(\'DIR_WS_CLASSES\', DIR_WS_INCLUDES . \'classes/\');' . "\n" .
                   '  define(\'DIR_WS_MODULES\', DIR_WS_INCLUDES . \'modules/\');' . "\n" .
                   '  define(\'DIR_WS_LANGUAGES\', DIR_WS_INCLUDES . \'languages/\');' . "\n\n" .
                   '  define(\'DIR_WS_DOWNLOAD_PUBLIC\', \'pub/\');' . "\n" .
                   '  define(\'DIR_FS_CATALOG\', \'' . $dir_fs_document_root . '\');' . "\n" .
                   '  define(\'DIR_FS_DOWNLOAD\', DIR_FS_CATALOG . \'download/\');' . "\n" .
                   '  define(\'DIR_FS_DOWNLOAD_PUBLIC\', DIR_FS_CATALOG . \'pub/\');' . "\n\n" .
                   '  define(\'DB_SERVER\', \'' . trim($HTTP_POST_VARS['DB_SERVER']) . '\');' . "\n" .
                   '  define(\'DB_SERVER_USERNAME\', \'' . trim($HTTP_POST_VARS['DB_SERVER_USERNAME']) . '\');' . "\n" .
                   '  define(\'DB_SERVER_PASSWORD\', \'' . trim($HTTP_POST_VARS['DB_SERVER_PASSWORD']) . '\');' . "\n" .
                   '  define(\'DB_DATABASE\', \'' . trim($HTTP_POST_VARS['DB_DATABASE']) . '\');' . "\n" .
                   '  define(\'USE_PCONNECT\', \'false\');' . "\n" .
                   '  define(\'STORE_SESSIONS\', \'mysql\');' . "\n";

  if (isset($HTTP_POST_VARS['CFG_TIME_ZONE'])) {
    $file_contents .= '  define(\'CFG_TIME_ZONE\', \'' . trim($HTTP_POST_VARS['CFG_TIME_ZONE']) . '\');' . "\n";
  }

  $file_contents .= '?>';

  $fp = fopen($dir_fs_document_root . 'includes/configure.php', 'w');
  fputs($fp, $file_contents);
  fclose($fp);

  @chmod($dir_fs_document_root . 'includes/configure.php', 0644);

  $file_contents = '<?php' . "\n" .
                   '  define(\'HTTP_SERVER\', \'' . $http_server . '\');' . "\n" .
                   '  define(\'HTTPS_SERVER\', \'' . $http_server . '\');' . "\n" .
                   '  define(\'ENABLE_SSL\', false);' . "\n" .
                   '  define(\'HTTP_COOKIE_DOMAIN\', \'\');' . "\n" .
                   '  define(\'HTTPS_COOKIE_DOMAIN\', \'\');' . "\n" .
                   '  define(\'HTTP_COOKIE_PATH\', \'' . $http_catalog . $admin_folder . '\');' . "\n" .
                   '  define(\'HTTPS_COOKIE_PATH\', \'' . $http_catalog . $admin_folder . '\');' . "\n" .
                   '  define(\'HTTP_CATALOG_SERVER\', \'' . $http_server . '\');' . "\n" .
                   '  define(\'HTTPS_CATALOG_SERVER\', \'' . $http_server . '\');' . "\n" .
                   '  define(\'ENABLE_SSL_CATALOG\', \'false\');' . "\n" .
                   '  define(\'DIR_FS_DOCUMENT_ROOT\', \'' . $dir_fs_document_root . '\');' . "\n" .
                   '  define(\'DIR_WS_ADMIN\', \'' . $http_catalog .  $admin_folder . '/\');' . "\n" .
                   '  define(\'DIR_WS_HTTPS_ADMIN\', \'' . $http_catalog .  $admin_folder . '/\');' . "\n" .
                   '  define(\'DIR_FS_ADMIN\', \'' . $dir_fs_document_root .  $admin_folder . '/\');' . "\n" .
                   '  define(\'DIR_WS_CATALOG\', \'' . $http_catalog . '\');' . "\n" .
                   '  define(\'DIR_WS_HTTPS_CATALOG\', \'' . $http_catalog . '\');' . "\n" .
                   '  define(\'DIR_FS_CATALOG\', \'' . $dir_fs_document_root . '\');' . "\n" .
                   '  define(\'DIR_WS_IMAGES\', \'images/\');' . "\n" .
                   '  define(\'DIR_WS_ICONS\', DIR_WS_IMAGES . \'icons/\');' . "\n" .
                   '  define(\'DIR_WS_CATALOG_IMAGES\', DIR_WS_CATALOG . \'images/\');' . "\n" .
                   '  define(\'DIR_WS_INCLUDES\', \'includes/\');' . "\n" .
                   '  define(\'DIR_WS_BOXES\', DIR_WS_INCLUDES . \'boxes/\');' . "\n" .
                   '  define(\'DIR_WS_FUNCTIONS\', DIR_WS_INCLUDES . \'functions/\');' . "\n" .
                   '  define(\'DIR_WS_CLASSES\', DIR_WS_INCLUDES . \'classes/\');' . "\n" .
                   '  define(\'DIR_WS_MODULES\', DIR_WS_INCLUDES . \'modules/\');' . "\n" .
                   '  define(\'DIR_WS_LANGUAGES\', DIR_WS_INCLUDES . \'languages/\');' . "\n" .
                   '  define(\'DIR_WS_CATALOG_LANGUAGES\', DIR_WS_CATALOG . \'includes/languages/\');' . "\n" .
                   '  define(\'DIR_FS_CATALOG_LANGUAGES\', DIR_FS_CATALOG . \'includes/languages/\');' . "\n" .
                   '  define(\'DIR_FS_CATALOG_IMAGES\', DIR_FS_CATALOG . \'images/\');' . "\n" .
                   '  define(\'DIR_FS_CATALOG_MODULES\', DIR_FS_CATALOG . \'includes/modules/\');' . "\n" .
                   '  define(\'DIR_FS_BACKUP\', DIR_FS_ADMIN . \'backups/\');' . "\n" .
                   '  define(\'DIR_FS_DOWNLOAD\', DIR_FS_CATALOG . \'download/\');' . "\n" .
                   '  define(\'DIR_FS_DOWNLOAD_PUBLIC\', DIR_FS_CATALOG . \'pub/\');' . "\n\n" .
                   '  define(\'DB_SERVER\', \'' . trim($HTTP_POST_VARS['DB_SERVER']) . '\');' . "\n" .
                   '  define(\'DB_SERVER_USERNAME\', \'' . trim($HTTP_POST_VARS['DB_SERVER_USERNAME']) . '\');' . "\n" .
                   '  define(\'DB_SERVER_PASSWORD\', \'' . trim($HTTP_POST_VARS['DB_SERVER_PASSWORD']) . '\');' . "\n" .
                   '  define(\'DB_DATABASE\', \'' . trim($HTTP_POST_VARS['DB_DATABASE']) . '\');' . "\n" .
                   '  define(\'USE_PCONNECT\', \'false\');' . "\n" .
                   '  define(\'STORE_SESSIONS\', \'mysql\');' . "\n";

  if (isset($HTTP_POST_VARS['CFG_TIME_ZONE'])) {
    $file_contents .= '  define(\'CFG_TIME_ZONE\', \'' . trim($HTTP_POST_VARS['CFG_TIME_ZONE']) . '\');' . "\n";
  }

  $file_contents .= '?>';

  $fp = fopen($dir_fs_document_root . 'admin/includes/configure.php', 'w');
  fputs($fp, $file_contents);
  fclose($fp);

  @chmod($dir_fs_document_root . 'admin/includes/configure.php', 0644);

  if ($admin_folder != 'admin') {
    @rename($dir_fs_document_root . 'admin', $dir_fs_document_root . $admin_folder);
  }
?>

     <p>Die Installation und Konfiguration war erfolgreich!</p>

    <br />

    <table border="0" width="99%" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right" width="50%" style="padding-right: 30px;"><?php echo osc_draw_button('Shop', 'cart', $http_server . $http_catalog . 'index.php', 'primary', array('newwindow' => 1)); ?></td>
        <td width="50%" style="padding-left: 30px;"><?php echo osc_draw_button('Administrationsbereich', 'locked', $http_server . $http_catalog . $admin_folder . '/index.php', 'primary', array('newwindow' => 1)); ?></td>
      </tr>
    </table>

    <br />

    <h3>Anmerkungen</h3>

    <p>Bitte folgen Sie den folgenden Empfehlungen, um Ihren osCommerce Onlineshop abzusichern:</p>

    <ol>
     <li>L&ouml;schen Sie das Verzeichnis <?php echo $dir_fs_document_root . 'install'; ?>.</li>

<?php
  if ($admin_folder == 'admin') {
?>

       <li>Nennen Sie das Verzeichnis <?php echo $dir_fs_document_root . 'admin'; ?> f&uuml;r den Administrationsbereich um.</li>

<?php
  }

  if (file_exists($dir_fs_document_root . 'includes/configure.php') && osc_is_writable($dir_fs_document_root . 'includes/configure.php')) {
?>

      <li>&Auml;ndern Sie die Berechtigungen f&uuml;r <?php echo $dir_fs_document_root . 'includes/configure.php'; ?> in 644 (oder 444 wenn f&uuml;r die Datei weiterhin Schreibrechte bestehen sollen).</li>

<?php
  }

  if (file_exists($dir_fs_document_root .  $admin_folder . '/includes/configure.php') && osc_is_writable($dir_fs_document_root . $admin_folder . '/includes/configure.php')) {
?>

      <li>&Auml;ndern Sie die Berechtigungen f&uuml;r <?php echo $dir_fs_document_root . $admin_folder . '/includes/configure.php'; ?> in 644 (oder 444 wenn f&uuml;r die Datei weiterhin Schreibrechtte bestehen sollen).</li>

<?php
  }
?>

      <li>&Uuml;berpr&uuml;fen Sie die Berechtigungen ihrer Verzeichnisse  im Administrationsbereich unter Hilfsprogramme -> Verzeichnissicherheit.</li>
      <li>Der Administrationsbereich sollte weiterhin mittels htaccess/htpasswd im Administrationsbereich unter Konfiguration -> Administratoren gesch&uuml;tzt werden.</li>
    </ol>
  </div>
</div>
