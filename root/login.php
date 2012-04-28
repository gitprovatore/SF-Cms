<?php
require_once("../config.php");

function sendMail($mode)
{
	if($mode == "ALERT")
	{
		$mailHeader = "From: mittente<".ADMIN_EMAIL.">\nReply-to: ".ADMIN_EMAIL."";
		@mail($admin_email , "SF-CmS Mailer Alert", "E' stato rilevato un tentato accesso non desiderato al pannello admin di SF-CmS dall IP: ".$_SERVER['REMOTE_ADDR']." alle ".date("h:m:s")." del ".date("d/m/y")."", $mailHeader);
	}
	elseif($mode == "INFO")
	{
		$mailHeader = "From: mittente<".ADMIN_EMAIL.">\nReply-to: ".ADMIN_EMAIL."";
		@mail($admin_email , "SF-CmS Mailer Info", "E' stato effettuato un login al pannello admin di SF-CmS dall IP: ".$_SERVER['REMOTE_ADDR']." alle ".date("h:m:s")." del ".date("d/m/y")."", $mailHeader);
	}
	else
	{
		die();
	}
}

if(SECURE_LOGIN == TRUE)
{
	if((IP != NULL) && (IP != $_SERVER['REMOTE_ADDR']))
	{
		sendMail("ALERT");
		die(print"<h1>YOU FAIL STUPID LAMER!!!</h1>");
	}
	if(!preg_match("/".BROWSER."/i", $_SERVER['HTTP_USER_AGENT']))
	{
		sendMail("ALERT");
		die(print"<h1>YOU FAIL STUPID LAMER!!!</h1>");
	}
	if(!preg_match("/".OS."/i", $_SERVER['HTTP_USER_AGENT']))
	{
		sendMail("ALERT");
		die(print"<h1>YOU FAIL STUPID LAMER!!!</h1>");
	}

	adminpageOpen();
	print"
	<h1>SF-CmS Admin Login</h1>
	<br>
	<form method=\"post\" action=\"login.php\">UserName: <input name=\"username\"><br>
	<br>
	Password: <input name=\"password\" type=\"password\"><br>
	<br>
	<br>
	<input value=\"Login\" type=\"submit\"></form>
	<br>
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
			sendMail("INFO");
			header("Location: index.php");
		}
		else
		{
			sendMail("ALERT");
			die(print"<h1>YOU FAIL STUPID LAMER!!!</h1>");
		}
	}
	adminpageClose();
}
else
{
	adminpageOpen();
	print"
	<h1>SF-CmS Admin Login</h1>
	<br>
	<form method=\"post\" action=\"login.php\">UserName: <input name=\"username\"><br>
	<br>
	Password: <input name=\"password\" type=\"password\"><br>
	<br>
	<br>
	<input value=\"Login\" type=\"submit\"></form>
	<br>
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
			die(print"<h1>YOU FAIL STUPID LAMER!!!</h1>");
		}
	}
	adminpageClose();
}
?>
