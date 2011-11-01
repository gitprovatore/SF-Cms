<?php
require_once("header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta content="text/html; charset=ISO-8859-1"
http-equiv="content-type">
<title></title>
</head>
<body><center>
<form method="POST">
<h1>Modifica Menu</h1><br/>
<br/>
<textarea cols="100" rows="50" name="mod_menu">
<?php
$filemenu = file_get_contents("../menu.html");
print"".$filemenu."";
?>
</textarea><br/>
<br/>
<input value="Modifica" type="submit"><br/>
</form>
</center></body>
</html>
<?php
$mod_menu = $_POST['mod_menu'];
if(isset($mod_menu))
{
	$aprimenu = fopen("../menu.html", "w");
	fwrite($aprimenu, $mod_menu);
	fclose($aprimenu);
}
require_once("footer.php");
?>
