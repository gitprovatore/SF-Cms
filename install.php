<?php
print"
<html>
<head>
    <meta content=\"text/html; charset=UTF-8\" http-equiv=\"content-type\">
    <title>Installazione SF-CmS</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"style/style.css\">
    </head>
</head>
<body>
<ul>
<br>
<p>
<h1>Installazione SF-CmS</h1><br>
<form method=\"POST\" action=\"install.php\">
Titolo Sito: <input name=\"titolosito\"><br>
<br>
URL Sito: <input name=\"urlsito\">&nbsp; Scrivi l' url del tuo sito ad es. http://www.tuosito.it/ non dimenticare lo slash finale e se SF-CmS si trova in una sottodirectory inserisci anche quella ad es. http://www.tuosito.it/sottodir/<br>
<br>
Descrizione Sito: <input name=\"descrizionesito\"><br>
<br>
KeyWord Sito: <input name=\"keywordsito\">&nbsp;Inserisci le keywords separate da una virgola.<br>
<br>
Testo Footer:<br><br><textarea cols=\"40\" rows=\"5\" name=\"testofooter\"></textarea><br>
<br>
Admin UserName: <input name=\"adminuser\"><br>
<br>
Admin Password: <input name=\"adminpass\" type=\"password\"><br>
<br>
Conferma Password: <input name=\"adminpassc\" type=\"password\"><br>
<br>
Commenti:&nbsp;<input name=\"commenti\">
&nbsp;Inserire TRUE per abilitarli oppure FALSE per disabilitarli
(attenzione inserire on/off a caratteri minuscoli).<br>
<br>
Disqus ShortName:&nbsp;<input name=\"shortname\"> Se
hai disabilitato i commenti scrivi empty.<br><br>
<input type=\"submit\" value=\"Installa\" />
</form>
</p>
</ul>
</body></html>
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
if (isset($titoloSito) && ($urlSito) && ($descrizioneSito) && ($keywordSito) && ($testoFooter) && ($usernameAdmin) && ($passwordAdmin) && ($confermaPassword) && ($commentiArticoli) && ($userDisqus) && ($passwordAdmin == $confermaPassword)) {
    file_put_contents("config.php", "
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
define(\"FULL_PATH\", \"".getcwd()."/\");
require_once(\"".getcwd()."/style/theme.php\");
?>
    ");

}
?>
