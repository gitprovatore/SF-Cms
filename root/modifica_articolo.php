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
<h1>Modifica articolo</h1><br/>
<br/>
<textarea cols="100" rows="50" name="mod_articolo">
<?php
$idarticolo = strip_tags($_GET['id']);
if(isset($idarticolo))
{
print"".file_get_contents("../db/articoli/".$idarticolo.".html")."";
}
?>
</textarea><br/>
<br/>
<input value="Modifica" type="submit"><br/>
</form>
</center></body>
</html>
<?php
$editPage = htmlentities($_POST['mod_articolo']);
if(isset($editPage))
{
	file_put_contents("../db/articoli/".$idarticolo.".html", $editPage);
}
require_once("footer.php");
?>