<?php

require_once("../config.php");
print"
<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
<html>
    <head>
        <meta content=\"text/html; charset=ISO-8859-1\" http-equiv=\"content-type\">
        <title>
";
print"" . $titoloSito . " - Admin Panel";
print"
</title>
		<meta name=\"DESCRIPTION\" content=\"" . $descrizioneSito . "\" />
		<meta name=\"KEYWORDS\" content=\"" . $keywordSito . "\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"../style/style.css\">
		";
		if(!preg_match("/\/modificaMenu\.php/i", $_SERVER['REQUEST_URI']))
		{
		print"<script type=\"text/javascript\" src=\"../external/tinymce/jscripts/tiny_mce/tiny_mce.js\" ></script >
<script type=\"text/javascript\" >
tinyMCE.init({
        mode : \"textareas\",
        theme : \"advanced\"
});
</script >";
		}
		
		print"
    </head>
    <body>
        <div id=\"menu\">
<div class=\"element\"><a href=\"index.php\">ACP Home</a></div>
<div class=\"element\"><a href=\"inserisciArticolo.php\">Inserisci Articolo</a></div>
<div class=\"element\"><a href=\"inserisciPagina.php\">Inserisci Pagina</a></div>
<div class=\"element\"><a href=\"listaDati.php\">Modifica Articolo/Pagina</a></div>
<div class=\"element\"><a href=\"modificaHome.php\">Modifica HomePage</a></div>
<div class=\"element\"><a href=\"modificaMenu.php\">Modifica Menu</a></div>
<div class=\"element\"><a href=\"modificaImpostazioni.php\">Modifica Impostazioni</a></div>
";
print"</div><div id=\"body\">";
?>