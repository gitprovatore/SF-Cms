<?php

print"
<html>
<head>
<meta content=\"text/html; charset=ISO-8859-1\"
http-equiv=\"content-type\">
<title>Installazione SF-CmS</title>
</head>
<body>
<h1>Installazione SF-CmS</h1>
<br>
<form method=\"post\" action=\"install.php\">
UserName: <input name=\"usernameAdmin\"><br>
<br>
PassWord: <input name=\"passwordAdmin\" type=\"password\"><br>
<br>
Conferma Password: <input name=\"confermaPassword\" type=\"password\"><br>
<br>
<input value=\"Installa\" type=\"submit\"></form>
</body>
</html>
";
$usernameAdmin = strip_tags($_POST['usernameAdmin']);
$passwordAdmin = strip_tags($_POST['passwordAdmin']);
$confermaPassword = strip_tags($_POST['confermaPassword']);
if(isset($usernameAdmin) && ($passwordAdmin) && ($confermaPassword) && ($passwordAdmin == $confermaPassword))
{
	$hashPassword = hash("sha512", $passwordAdmin);
	file_put_contents("loginconfig.php", "
	<?php
	define(\"USERNAME_ROOT\", \"".$usernameAdmin."\");
	define(\"PASSWORD_ROOT\", \"".$hashPassword."\");
	?>
	");
}
else
{
	print"<h1>Errore!!! Riempi tutti i campi!!!</h1>";
}

?>
