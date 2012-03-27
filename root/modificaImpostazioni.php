<?php
require_once("../config.php");
require_once("security.php");
adminpageOpen();
print"
<center><h1>Modifica Impostazioni</h1></center><br>
<strong>Attenzione: Tutti i Campi vanno Riempiti!!!!</strong>
<br><br>
<form method=\"post\" action=\"modificaImpostazioni.php\">
Titolo Sito:<br>
  <input name=\"titolosito\"><br>
  <br>
URL Sito:<br>
  <input name=\"urlsito\">&nbsp; Scrivi l' url del tuo
sito ad es. http://www.tuosito.it/ non dimenticare lo slash finale e se
SF-CmS si trova in una sottodirectory inserisci anche quella ad es.
http://www.tuosito.it/sottodir/<br>
  <br>
Descrizione Sito:<br>
  <input name=\"descrizionesito\"><br>
  <br>
KeyWord Sito:<br>
  <input name=\"keywordsito\">&nbsp;Inserisci le
keywords separate da una virgola.<br>
  <br>
Testo Footer:<br>
  <textarea cols=\"40\" rows=\"5\" name=\"testofooter\"></textarea><br>
  <br>
Admin UserName:<br>
  <input name=\"adminuser\"><br>
  <br>
Admin Password:<br>
  <input name=\"adminpass\" type=\"password\"><br>
  <br>
Conferma Password:<br>
  <input name=\"adminpassc\" type=\"password\"><br>
  <br>
Commenti:<br>
  <input name=\"commenti\">&nbsp;Inserire on per
abilitarli oppure off per disabilitarli
(attenzione inserire on/off a caratteri minuscoli).<br>
  <br>
Disqus ShortName:<br>
  <input name=\"shortname\"> Se
hai disabilitato i commenti scrivi empty.<br>
  <br>
  <input value=\"Modifica Impostazioni\" type=\"submit\">
</form>
";
$titoloSito = strip_tags($_POST['titolosito']);
$urlSito = strip_tags($_POST['urlsito']);
$descrizioneSito = strip_tags($_POST['descrizionesito']);
$keywordSito = strip_tags($_POST['keywordsito']);
$testoFooter = htmlentities($_POST['testofooter']);
$usernameAdmin = strip_tags($_POST['adminuser']);
$passwordAdmin = strip_tags($_POST['adminpass']);
$confermaPassword = strip_tags($_POST['adminpassc']);
$commentiArticoli = strip_tags($_POST['commenti']);
$userDisqus = strip_tags($_POST['shortname']);
$passwordHash = hash("sha512", $passwordAdmin);
if (isset($titoloSito) && ($urlSito) && ($descrizioneSito) && ($keywordSito) && ($testoFooter) && ($usernameAdmin) && ($passwordAdmin) && ($confermaPassword) && ($commentiArticoli) && ($userDisqus) && ($passwordAdmin == $confermaPassword))
{
    file_put_contents("../config.php", "
<?php
define(\"TITOLO_SITO\", \"".$titoloSito."\");
define(\"DESCRIZIONE_SITO\", \"".$descrizioneSito."\");
define(\"KEYWORDS_SITO\", \"".$keywordSito."\");
define(\"TESTO_FOOTER\", \"".$testoFooter."\");
define(\"USERNAME_ROOT\", \"".$usernameAdmin."\");
define(\"PASSWORD_ROOT\", \"".$passwordHash."\");
define(\"COMMENTI_BLOG\", \"".$commentiArticoli."\");
define(\"USER_DISQUS\", \"".$userDisqus."\");
define(\"URL_SITO\", \"".$urlSito."\");
define(\"FULL_PATH\", \"".FULL_PATH."\");
require_once(\"".FULL_PATH."style/theme.php\");
?>
    ");
print"<center><h1>IMPOSTAZIONI MODIFICATE CON SUCCESSO!!!</h1></center>";
}
adminpageClose();
?>
