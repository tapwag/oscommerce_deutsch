<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2013 osCommerce

  Released under the GNU General Public License
*/
?>

<script>
<!--

  var dbServer;
  var dbUsername;
  var dbPassword;
  var dbName;

  var formSubmited = false;
  var formSuccess = false;

  function prepareDB() {
    if (formSubmited == true) {
      return false;
    }

    formSubmited = true;

    $('#mBox').show();

    $('#mBoxContents').html('<p><img src="images/progress.gif" align="right" hspace="5" vspace="5" />Datebankverbindug wird getestet.</p>');

    dbServer = $('#DB_SERVER').val();
    dbUsername = $('#DB_SERVER_USERNAME').val();
    dbPassword = $('#DB_SERVER_PASSWORD').val();
    dbName = $('#DB_DATABASE').val();

    $.get('rpc.php?action=dbCheck&server=' + encodeURIComponent(dbServer) + '&username=' + encodeURIComponent(dbUsername) + '&password=' + encodeURIComponent(dbPassword) + '&name=' + encodeURIComponent(dbName), function (response) {
      var result = /\[\[([^|]*?)(?:\|([^|]*?)){0,1}\]\]/.exec(response);
      result.shift();

      if (result[0] == '1') {
        $('#mBoxContents').html('<p><img src="images/progress.gif" align="right" hspace="5" vspace="5" />Die Datenbank wird nun importiert. Bitte haben Sie Geduld.</p>');

        $.get('rpc.php?action=dbImport&server=' + encodeURIComponent(dbServer) + '&username=' + encodeURIComponent(dbUsername) + '&password='+ encodeURIComponent(dbPassword) + '&name=' + encodeURIComponent(dbName), function (response2) {
          var result2 = /\[\[([^|]*?)(?:\|([^|]*?)){0,1}\]\]/.exec(response2);
          result2.shift();

          if (result2[0] == '1') {
            $('#mBoxContents').html('<p><img src="images/success.gif" align="right" hspace="5" vspace="5" />Datenbankimport erfolgreich.</p>');

            formSuccess = true;

            setTimeout(function() {
              $('#installForm').submit();
            }, 2000);
          } else {
            var result2_error = result2[1].replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');

            $('#mBoxContents').html('<p><img src="images/failed.gif" align="right" hspace="5" vspace="5" />W&auml;hrend dem Datenbankimport trat ein Fehler auf. Folgende Fehler sind aufgetreten:</p><p><strong>%s</strong></p><p>Bitte &uuml;berpr&uuml;fen Sie die Einstellungen, und versuchen Sie es erneut.</p>'.replace('%s', result2_error));

            formSubmited = false;
          }
        }).fail(function() {
          formSubmited = false;
        });
      } else {
        var result_error = result[1].replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');

        $('#mBoxContents').html('<p><img src="images/failed.gif" align="right" hspace="5" vspace="5" />Keine Verbindung zum Datenbankserver m&ouml;lich. Folgender Fehler ist aufgetreten:</p><p><strong>%s</strong></p><p>Bitte &uuml;berpr&uuml;fen Sie die Einstellungen, und versuchen Sie es erneut.</p>'.replace('%s', result_error));

        formSubmited = false;
      }
    }).fail(function() {
      formSubmited = false;
    });
  }

  $(function() {
    $('#installForm').submit(function(e) {
      if ( formSuccess == false ) {
        e.preventDefault();

        prepareDB();
      }
    });
  });

//-->
</script>

<div class="mainBlock">
  <div class="stepsBox">
    <ol>
      <li style="font-weight: bold;">Datenbankserver</li>
      <li>Webserver</li>
      <li>Onlineshop - Einstellungen</li>
      <li>Fertig!</li>
    </ol>
  </div>

  <h1>neue Installation</h1>

 <p>Diese webbasierte Installtion konfiguriert osCommerce Online Merchant f&uuml;r Ihren Server.</p>
  <p>Bitte folgen Sie den Installationsanweisungen f&uuml;r den Datenbankserver, den Webserver und den Konfigutationseinstellungen f&uuml;r den Shop. Wenn Sie an einer Stelle Hilfe ben&ouml;tigen, nutzen Sie die Dokumentation, oder suchen sie Hilfe in den Onlineforen von osCommerce.</p>
</div>

<div class="contentBlock">
  <div class="infoPane">
    <h3>Schritt 1: Datenbankserver</h3>

    <div class="infoPaneContents">
      <p>Der Datenbankserver speichert die Shopinformationen &uuml;ber Produkte, Kunden und Bestellungen.</p>
      <p>Bitte informieren Sie sich bei Ihrem Provider oder Administrator, wenn Ihnen die Zugangsdaten f&uuml;r Ihren Datenbankserver nicht bekannt sind.</p>
    </div>
  </div>
  </div>

  <div class="contentPane">
    <div id="mBox">
      <div id="mBoxContents"></div>
    </div>

    <h2>Datenbankserver</h2>

    <form name="install" id="installForm" action="install.php?step=2" method="post">

    <table border="0" width="99%" cellspacing="0" cellpadding="5" class="inputForm">
      <tr>
        <td class="inputField"><?php echo 'Datenbankserver<br />' . osc_draw_input_field('DB_SERVER', 'localhost', 'class="text"'); ?></td>
        <td class="inputDescription">Die Adresse des Datenbankservers in Form eines Hostnamens oder einer IP-Adresse.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'Benutzername<br />' . osc_draw_input_field('DB_SERVER_USERNAME', null, 'class="text"'); ?></td>
         <td class="inputDescription">Der Benutzername, um sich am Datenbankserver anzumelden.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'Passwort<br />' . osc_draw_password_field('DB_SERVER_PASSWORD', 'class="text"'); ?></td>
       <td class="inputDescription">Das Passwort f&uuml;r den Benutzername, um sich am Datenbankserver anzumelden.</td>
      </tr>
      <tr>
        <td class="inputField"><?php echo 'Datenbank<br />' . osc_draw_input_field('DB_DATABASE', null, 'class="text"'); ?></td>
       <td class="inputDescription">Der Name der Datenbank.</td>
      </tr>
    </table>

    <p><?php echo osc_draw_button('Weiter', 'triangle-1-e', null, 'primary'); ?></p>

    </form>
  </div>
</div>
