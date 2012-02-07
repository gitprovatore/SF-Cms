<?php
session_start();
if(isset($_SESSION['username']) && ($_SESSION['password']) && ($_SESSION['ip']) && ($_SESSION['useragent']))
{
	if(($_SESSION['username'] != USERNAME_ROOT) && ($_SESSION['password'] != PASSWORD_ROOT) && ($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']) && ($_SESSION['useragent'] != $_SERVER['HTTP_USER_AGENT']))
	{
		die(print"<h2>YOU FAIL STUPID LAMER!!!</h2>");
	}
}
else
{
	die(header("Location: login.php"));
}
?>
