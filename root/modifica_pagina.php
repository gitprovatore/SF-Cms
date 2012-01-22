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
<h1>Modifica Pagina</h1><br/>
<br/>
<textarea cols="100" rows="50" name="mod_page">
<?php
$idPagina = strip_tags($_GET['id']);
if(isset($idPagina))
{
print"".file_get_contents("../db/pagine/".$idPagina.".html")."";
}
?>
</textarea><br/>
<br/>
<input value="Modifica" type="submit"><br/>
</form>
</center></body>
</html>
<?php
$editPage = htmlentities($_POST['mod_page']);
if(isset($editPage))
{
	file_put_contents("../db/pagine/".$idPagina.".html", $editPage);
}
require_once("footer.php");
?>
