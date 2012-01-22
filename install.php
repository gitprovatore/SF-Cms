<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta content="text/html; charset=ISO-8859-"
 http-equiv="content-type">
  <title>Installazione SF-CmS</title>
          <link rel="stylesheet" type="text/css" href="style/style.scss">
        <link rel="stylesheet" type="text/css" href="style/style.min.css">
</head>
<body>
<p>
<h1>Installazione SF-CmS</h1><br>
<br>
<form method="POST" action="install.php">
Titolo Sito: <input name="titolosito"><br>
<br>
Descrizione Sito: <input name="descrizionesito"><br>
<br>
KeyWord Sito: <input name="keywordsito"><br>&nbsp;Inserisci le keywords separate da una virgola.
<br>
Testo Footer: <input name="testofooter"><br>
<br>
Admin UserName: <input name="adminuser"><br>
<br>
Admin Password: <input name="adminpass" type="password"><br>
<br>
Conferma Password: <input name="adminpassc" type="password"><br>
<br>
Commenti:&nbsp;<input name="commenti">
&nbsp;Inserire on per abilitarli oppure off per disabilitarli
(attenzione inserire on/off a caratteri minuscoli).<br>
<br>
Disqus ShortName:&nbsp;<input name="shortname"> Se
hai disabilitato i commenti scrivi empty.<br>
<input type="submit" value="Installa" />
</p>
</body>
</html>
<?php
$titoloSito = strip_tags($_POST['titolosito']);
$descrizioneSito = strip_tags($_POST['descrizionesito']);
$keywordSito = strip_tags($_POST['keywordsito']);
$testoFooter = htmlentities($_POST['testofooter']);
$usernameAdmin = strip_tags($_POST['adminuser']);
$passwordAdmin = strip_tags($_POST['adminpass']);
$confermaPassword = strip_tags($_POST['adminpassc']);
$commentiArticoli = strip_tags($_POST['commenti']);
$userDisqus = strip_tags($_POST['shortname']);
if(isset($titoloSito) && ($descrizioneSito) && ($keywordSito) && ($testoFooter) && ($usernameAdmin) && ($passwordAdmin) && ($confermaPassword) && ($commentiArticoli) && ($userDisqus) && ($passwordAdmin == $confermaPassword))
{
file_put_contents("config.php", "<?php
\$titoloSito = \"".$titoloSito."\"; // inserisci il tutolo del sito
\$descrizioneSito = \"".$descrizioneSito."\";
\$keywordSito = \"".$keywordSito."\";
\$testoFooter = \"".$testoFooter."\"; // inserisci il testo che verrà visualizzato nel footer
\$commentiArticoli = \"".$commentiArticoli."\"; // è possibile abilitare o disabilitare mettendo rispettivamente on oppure off i commenti e vi ricordo che per i commenti bisogna avere un accound disqus
\$userDisqus = \"".$userDisqus."\"; // inserisci il tuo shortname di disqus per utilizzare i commenti
?>");
file_put_contents("root/.htaccess", "AuthUserFile ".getcwd()."/root/.htpasswd
AuthGroupFile /dev/null
AuthName \"Password Protected Area\"
AuthType Basic

<limit GET POST>
require valid-user
</limit>");
file_put_contents("root/.htpasswd", "".$usernameAdmin.":".crypt($confermaPassword)."");
}
?>