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
$pag_id = date("dmyhms");
$pag_nome = htmlspecialchars(htmlentities($_POST['pag_nome']));
$pag_testo = htmlspecialchars(htmlentities($_POST['pag_testo']));
if(isset($pag_nome) && ($pag_testo))
{
	$crea_pagina = fopen("../pagine/".$pag_id.".html", "w+");
	fwrite($crea_pagina, "<h1>".$pag_nome."</h1><br>".$pag_testo."");
	fclose($crea_pagina);
	$filemenu = file_get_contents("../menu.html");
	$aprimenu = fopen("../menu.html", "a");
	fwrite($aprimenu, "<div class=\"element\"><a href=\"pagina.php?pag_id=".$pag_id.".html&link=".$pag_nome."\">".$pag_nome."</a></div>");
	fclose($aprimenu);
}
require_once("footer.php");
?>
