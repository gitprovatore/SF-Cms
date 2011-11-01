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
<h1>Modifica Home</h1><br/>
<br/>
<textarea cols="100" rows="50" name="mod_home">
<?php
$filehome = file_get_contents("../pagine/index.html");
print"".$filehome."";
?>
</textarea><br/>
<br/>
<input value="Modifica" type="submit"><br/>
</form>
</center></body>
</html>
<?php
$mod_home = $_POST['mod_home'];
if(isset($mod_home))
{
	$aprihome = fopen("../pagine/index.html", "w");
	fwrite($aprihome, $mod_home);
	fclose($aprihome);
}
require_once("footer.php");
?>
