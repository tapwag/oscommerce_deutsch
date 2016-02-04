<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2013 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Administratoren');

define('TABLE_HEADING_ADMINISTRATORS', 'Administratoren');
define('TABLE_HEADING_HTPASSWD','Abgesichert mit htpasswd');
define('TABLE_HEADING_ACTION', 'Aktion');

define('TEXT_INFO_INSERT_INTRO', 'Bitte den neuen Administrator mit seinen Daten eingeben');
define('TEXT_INFO_EDIT_INTRO', 'Nehmen Sie bitte alle notwendigen &Auml;nderungen vor');
define('TEXT_INFO_DELETE_INTRO', 'Sind Sie sicher dass Sie diesen Administrator l&ouml;schen m&ouml;chten?');
define('TEXT_INFO_HEADING_NEW_ADMINISTRATOR', 'Neuer Administrator');
define('TEXT_INFO_USERNAME', 'Benutzername:');
define('TEXT_INFO_NEW_PASSWORD', 'Neues Password:');
define('TEXT_INFO_PASSWORD', 'Password:');
define('TEXT_INFO_PROTECT_WITH_HTPASSWD','mit .htpasswd sch&uuml;tzen');

define('ERROR_ADMINISTRATOR_EXISTS', 'Error: Administrator existiert bereits.');

define('HTPASSWD_INFO', '<strong>Zus&auml;tzlicher Schutz durch htaccess/htpasswd</strong><p>Der Administrationsbereich ist nicht durch  htaccess/htpasswd gesichert.</p><p>Die Aktivierung des htaccess / htpasswd Security Layer speichert automatisch den Benutzernamen und das Kennwort des Administrators in einer Datei htpasswd. </p><p><strong>Hinweis:</strong>Wenn diese zus&auml;tzliche Ebene der Sicherheit aktiviert ist, und Sie nicht mehr  nicht mehr auf den Administrationsbereich zugreifen k&ouml;nnen, k&ouml;nnen Sie durch folgenden &Auml;nderungen den htaccess / htpasswd-Schutz deaktivieren:</p><p><u><strong>1.  Bearbeiten Sie diese Datei:</strong></u><br /><br />' . DIR_FS_ADMIN . '.htaccess</p><p>Entfernen Sie die folgenden Zeilen, wenn sie vorhanden sind:</p><p><i>%s</i></p><p><u><strong>2. L&ouml;schen Sie diese Datei:</strong></u><br /><br />' . DIR_FS_ADMIN . '.htpasswd_oscommerce</p>') ;
define('HTPASSWD_SECURED', '<strong>Zus&auml;tzlicher Schutz durch htaccess/htpasswd</strong><p>Diese osCommerce Online Merchant Administration Tool Installation wird weiter durch htaccess / htpasswd Schutz gesichert.</p>'); 
define('HTPASSWD_PERMISSIONS', '<strong>Zus&auml;tzlicher Schutz durch htaccess/htpasswd< /strong><p>Dieser Administrationsbereich ist nicht weiter durch htaccess / htpasswd Schutz gesichert.</p><p>Die folgenden Dateien muss vom Webserver beschreibbar sein um den htaccess / htpasswd Security Layer zu aktivieren:</p><ul><li>' . DIR_FS_ADMIN . '.htaccess</li><li>' . DIR_FS_ADMIN . '.htpassw d_oscommerce</li></ul><p>Laden Sie diese Seite neu, um zu best&auml;tigen, dass die richtigen Dateiberechtigungen gesetzt wurden.</p>'); 
?>
