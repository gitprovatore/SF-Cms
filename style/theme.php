<?php

require_once("textformat.php");

function htmlHead($titolo, $keywords) {
    print"
	<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
	<html>
    <head>
    <meta content=\"text/html; charset=UTF-8\" http-equiv=\"content-type\">
    <title>".TITOLO_SITO." - ".$titolo."</title>
	<meta name=\"DESCRIPTION\" content=\"" . DESCRIZIONE_SITO . "\" />
	<meta name=\"KEYWORDS\" content=\"" . KEYWORDS_SITO . ", ".$keywords."\" />
    	<link rel=\"stylesheet\" type=\"text/css\" href=\"" . URL_SITO . "style/style.css\">
    	</head>
	";
}

function htmladminHead() {
    print"
	<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
	<html>
    <head>
    <meta content=\"text/html; charset=UTF-8\" http-equiv=\"content-type\">
    <title>SF-CmS - Admin Panel</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"" . URL_SITO . "style/style.css\">
    </head>
	";
}

function htmlBody() {
    print"<body>";
}

function htmlMenu() {
    print"
	<div id=\"menu\">
	<div class=\"element\"><a href=\"" . URL_SITO . "index.php\">Home</a></div>
	<div class=\"element\"><a href=\"" . URL_SITO . "blog.php\">Blog</a></div>
	";
	$getMenu = file_get_contents("".FULL_PATH."database/liste/menuSito.json");
    $decodeMenu = json_decode($getMenu);
    foreach($decodeMenu as $elementoLista)
    {
		if((!@preg_match("http", $elementoLista)) OR (!@preg_match("https", $elementoLista)) OR (!@preg_match("ftp", $elementoLista)) OR (!@preg_match("ftps", $elementoLista)))
		{
			print "<div class=\"element\"><a href=\"".URL_SITO."pagina.php?ID=".$elementoLista->link."\">".$elementoLista->nome."</a></div>";
		}
		else
		{
			print "<div class=\"element\"><a href=\"".$elementoLista->link."\">".$elementoLista->nome."</a></div>";
		}
	}
	print"</div>";
}

function htmladminMenu() {
    print"
	<div id=\"menu\">
<div class=\"element\"><a href=\"index.php\">ACP Home</a></div>
<div class=\"element\"><a href=\"inserisciArticolo.php\">Inserisci Articolo</a></div>
<div class=\"element\"><a href=\"inserisciPagina.php\">Inserisci Pagina</a></div>
<div class=\"element\"><a href=\"listaDati.php\">Modifica Articolo/Pagina</a></div>
<div class=\"element\"><a href=\"modificaHome.php\">Modifica HomePage</a></div>
<div class=\"element\"><a href=\"modificaMenu.php\">Modifica Menu</a></div>
<div class=\"element\"><a href=\"logout.php\">Logout</a></div>
	</div>
	";
}

function htmlContent() {
    print"<div id=\"body\">";
}

function htmlcloseContent() {
    print"</div>";
}

function htmlFooter() {
    print"
	<div id=\"credits\">
	" . formatText(TESTO_FOOTER) . " - <a href=\"http://system-infet.webnet32.com/\">PoWeReD By SF-CmS v4.1</a> - <a href=\"http://meh.paranoid.pk\">Meh CSS Style</a>
	</div>
	";
}

function htmlcloseBody() {
    print"
	</body>
	</html>
	";
}

function pageOpen($titolo, $keywords) {
    htmlHead($titolo, $keywords);
    htmlBody();
    htmlMenu();
    htmlContent();
}

function pageClose() {
    htmlcloseContent();
    htmlFooter();
    htmlcloseBody();
}

function adminpageOpen() {
    htmladminHead();
    htmlBody();
    htmladminMenu();
    htmlContent();
}

function adminpageClose() {
    htmlcloseContent();
    htmlFooter();
    htmlcloseBody();
}

function viewPage($pageName, $pageText) {
    print"<h1>" . formatText($pageName) . "</h1><br>" . formatText($pageText) . "<br>";
}

function viewArticlelist()
{
    $getList = file_get_contents("".FULL_PATH."database/liste/listaArticoli.json");
    $decodeList = array_reverse(json_decode($getList));
    foreach($decodeList as $elementoLista)
    {
		print"<ul><li><a href=\"".URL_SITO."blog.php?ID=".$elementoLista->ID."\">[".$elementoLista->data."] - ".$elementoLista->titolo."</a></li></ul>";
	}    
}

function viewArticleandComments($title, $text, $author, $data, $comment) {
        print"
	<h1>" . $title . "</h1>
	" . formatText($text) . "<br><br>
	<strong>Autore:</strong>" . $author . "&nbsp;&nbsp;<strong>Data:</strong>" . $data . "<br><br>
	<strong>Commenti:</strong><br><br>
	" . formatText($comment) . "";
}
function viewArticle($title, $text, $author, $data)
{
     print"
	<h1>" . $title . "</h1>
	" . formatText($text) . "<br><br>
	<strong>Autore:</strong>" . $author . "&nbsp;&nbsp;<strong>Data:</strong>" . $data . "<br>";
}

?>
