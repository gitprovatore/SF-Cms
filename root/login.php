<?php
require_once("../config.php");
require_once("../style/theme.php");
adminpageOpen();
print"
<h1>SF-CmS Admin Login</h1>
<p><br>
</p>
<form method=\"post\" action=\"login.php\">UserName: <input name=\"username\"><br>
<br>
Password: <input name=\"password\" type=\"password\"><br>
<br>
<br>
<input value=\"Login\" type=\"submit\"></form>
<p><br>
</p>
";
$usernameForm = strip_tags($_POST['username']);
$passwordForm = strip_tags($_POST['password']);
if(isset($usernameForm) && ($passwordForm))
{
	$hashForm = hash("sha512", $passwordForm);
	if(($usernameForm == USERNAME_ROOT) && ($hashForm == PASSWORD_ROOT))
	{
		session_start();
		$_SESSION['username'] = $usernameForm;
		$_SESSION['password'] = $hashForm;
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
		$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
		header("Location: index.php");
	}
	else
	{
		die(print"<h2>YOU FAIL STUPID LAMER!!!</h2>");
	}
}
adminpageClose();
?>