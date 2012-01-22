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
<h1>Inserisci Pagina</h1><br/>
Nome:<br/>
<input name="pag_nome"><br/>
Testo:<br/>
<br/>
<textarea cols="30" rows="15" name="pag_testo"></textarea><br/>
<br/>
<input value="Inserisci Pagina" type="submit"><br/>
</form>
</center></body>
</html>
<?php
$idPagina = date("dmyhms");
$nomePagina = htmlspecialchars(htmlentities($_POST['pag_nome']));
$testoPagina = htmlspecialchars(htmlentities($_POST['pag_testo']));
if(isset($nomePagina) && ($testoPagina))
{
	file_put_contents("../db/pagine/".$idPagina.".html", "<h1>".$nomePagina."</h1><br>".$testoPagina."");
	file_put_contents("../db/index.html", "<div class=\"element\"><a href=\"pagina.php?pag_id=".$idPagina."&seo=".$nomePagina."\">".$nomePagina."</a></div> <!-- <div class=\"element\"><a href=\"modifica_pagina.php?id=".$idPagina."\">Modifica ".$nomePagina."</a></div> -->", FILE_APPEND);
}
require_once("footer.php");
?>
