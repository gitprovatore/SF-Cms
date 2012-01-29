<?php

require_once("header.php");
print"
<p>
<strong>Attenzione: Tutti i Campi vanno Riempiti!!!!</strong><br /><br />
<form method=\"POST\" action=\"impostazioni.php\">
Titolo Sito: <input name=\"titolosito\"><br>
<br>
Descrizione Sito: <input name=\"descrizionesito\"><br>
<br>
KeyWord Sito: <input name=\"keywordsito\"> Inserisci le keywords separate da una virgola.<br>
<br>
Testo Footer: <input name=\"testofooter\"><br>
<br>
Admin UserName: <input name=\"adminuser\"><br>
<br>
Admin Password: <input name=\"adminpass\" type=\"password\"><br>
<br>
Conferma Password: <input name=\"adminpassc\" type=\"password\"><br>
<br>
Commenti:&nbsp;<input name=\"commenti\">
&nbsp;Inserire on per abilitarli oppure off per disabilitarli
(attenzione inserire on/off a caratteri minuscoli).<br>
<br>
Disqus ShortName:&nbsp;<input name=\"shortname\"> Se
hai disabilitato i commenti scrivi empty.<br>
<input type=\"submit\" value=\"Installa\" />
</p>
";
$titoloSito = strip_tags($_POST['titolosito']);
$descrizioneSito = strip_tags($_POST['descrizionesito']);
$keywordSito = strip_tags($_POST['keywordsito']);
$testoFooter = htmlentities($_POST['testofooter']);
$usernameAdmin = strip_tags($_POST['adminuser']);
$passwordAdmin = strip_tags($_POST['adminpass']);
$confermaPassword = strip_tags($_POST['adminpassc']);
$commentiArticoli = strip_tags($_POST['commenti']);
$userDisqus = strip_tags($_POST['shortname']);
if (isset($titoloSito) && ($descrizioneSito) && ($keywordSito) && ($testoFooter) && ($usernameAdmin) && ($passwordAdmin) && ($confermaPassword) && ($commentiArticoli) && ($userDisqus) && ($passwordAdmin == $confermaPassword)) {
    file_put_contents("../config.php", "<?php

require_once(\"firewall.php\");

\$titoloSito = \"" . $titoloSito . "\"; // inserisci il tutolo del sito
\$descrizioneSito = \"" . $descrizioneSito . "\";
\$keywordSito = \"" . $keywordSito . "\";
\$testoFooter = \"" . $testoFooter . "\"; // inserisci il testo che verr� visualizzato nel footer
\$commentiArticoli = \"" . $commentiArticoli . "\"; // � possibile abilitare o disabilitare mettendo rispettivamente on oppure off i commenti e vi ricordo che per i commenti bisogna avere un accound disqus
\$userDisqus = \"" . $userDisqus . "\"; // inserisci il tuo shortname di disqus per utilizzare i commenti
?>");
    file_put_contents(".htaccess", "AuthUserFile " . getcwd() . "/.htpasswd
AuthGroupFile /dev/null
AuthName \"Password Protected Area\"
AuthType Basic

<limit GET POST>
require valid-user
</limit>");
    file_put_contents(".htpasswd", "" . $usernameAdmin . ":" . crypt($confermaPassword) . "");
}
require_once("footer.php");
?>