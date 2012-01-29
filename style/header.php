<?php

require_once("config.php");
print"
<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
<html>
    <head>
        <meta content=\"text/html; charset=ISO-8859-1\" http-equiv=\"content-type\">
        <title>
";
print"" . $titoloSito . "";
if (isset($_GET['seo'])) {
    print" - " . strip_tags($_GET['seo']) . "";
}
print"
</title>
		<meta name=\"DESCRIPTION\" content=\"" . $descrizioneSito . "\" />
		<meta name=\"KEYWORDS\" content=\"" . $keywordSito . "\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"style/style.css\">
    </head>
    <body>
        <div id=\"menu\">
<div class=\"element\"><a href=\"index.php\">Home</a></div>
<div class=\"element\"><a href=\"blog.php\">Blog</a></div>
";
$loadMenu = simplexml_load_file("db/menu.xml");
foreach ($loadMenu->elementoMenu as $menuItem) {
    print"<div class=\"element\"><a href=\"pagina.php?pageID=" . $menuItem->linkElemento . "&seo=" . $menuItem->nomeElemento . "\">" . $menuItem->nomeElemento . "</a></div>";
}
print"</div>";
print"<div id=\"body\">";
?>