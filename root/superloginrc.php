<?php

define("OS", "Linux"); // Linux, Windows, Mac, BSD -- ricorda maiuscole e minuscole.
define("BROWSER", "Chrome"); // MSIE, Opera, Mozilla, Safari, Chrome -- ricorda maiuscole e minuscole.
define("IP", NULL) // Se hai un IP statico inseriscilo tra i doppi apici altrimenti scrivi NULL senza i doppi apici.
define("EMAIL_NOTIFICATION", TRUE); // Metti TRUE per attivare le nofifiche via email altrimenti metti FALSE.
define("ADMIN_EMAIL", "system-infet@live.it"); // Se hai abilitate le notifiche via email metti la tua email altrimenti metti NULL.

function sendMail()
{
	$mailHeader = "From: mittente<".ADMIN_EMAIL.">\nReply-to: ".ADMIN_EMAIL."";
    @mail($admin_email , "SF-CmS Mailer", "E' stato rilevato un tentato accesso non desiderato al pannello admin di SF-CmS dall IP: ".$_SERVER['REMOTE_ADDR']."", $mailHeader);
}

if((IP != NULL) && (IP != $_SERVER['REMOTE_ADDR']))
{
	sendMail();
	die(print"<h1>YOU FAIL STUPID LAMER!!!</h1>");
}
if(!preg_match(BROWSER, $_SERVER['HTTP_USER_AGENT']))
{
	sendMail();
	die(print"<h1>YOU FAIL STUPID LAMER!!!</h1>");
}
if(!preg_match(OS, $_SERVER['HTTP_USER_AGENT']))
{
	sendMail();
	die(print"<h1>YOU FAIL STUPID LAMER!!!</h1>");
}
