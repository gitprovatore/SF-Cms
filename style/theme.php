<?php

require_once("textformat.php");

function htmlHead($titolo, $keywords) {
    print"
	<!DOCTYPE html>
	<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"it\">
	<head>
	<title>".TITOLO_SITO." - ".$titolo."</title>
	<meta name=\"description\" content=\"" . DESCRIZIONE_SITO . "\" />
	<meta name=\"keywords\" content=\"" . KEYWORDS_SITO . ", ".$keywords."\" />
	<meta charset=\"UTF-8\" />
	<link rel=\"stylesheet\" type=\"text/css\" href=\"" . URL_SITO . "style/style.css\">
	</head>
	";
}

function htmladminHead() {
    print"
	<!DOCTYPE html>
	<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"it\">
	<head>
	<meta charset=\"UTF-8\" />
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
	" . stripslashes(html_entity_decode(TESTO_FOOTER)) . " - <a href=\"http://system-infet.webnet32.com/\">PoWeReD By SF-CmS v5.0</a> - <a href=\"http://meh.paranoid.pk\">Meh CSS Style</a>
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
    print"<h1>" . formatText(stripslashes(html_entity_decode($pageName))) . "</h1>" . formatText(stripslashes(html_entity_decode($pageText))) . "<br />";
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
<div class=\"blog\">
            
        <div class=\"page\">
<div id=\"39\" class=\"post\">
            <div class=\"header\">
                <span class=\"title\"><a href=\"".URL_SITO."blog.php?ID=".strip_tags($_GET['ID'])."\">".formatText(stripslashes(html_entity_decode($title)))."</a></span> <div style=\"float: right\"></div>
            </div>
            <div class=\"content\">".formatText(stripslashes(html_entity_decode($text)))."</div>
            <div class=\"by\">Scritto da <span class=\"author\">".formatText(stripslashes(html_entity_decode($author)))."</span> il <span class=\"date\">".formatText(stripslashes(html_entity_decode($data)))."</span></div>

            

            </div></div>
        </div>
".stripslashes(html_entity_decode($comment))."";
}
function viewArticle($title, $text, $author, $data)
{
        print"
<div class=\"blog\">
            
        <div class=\"page\">
<div id=\"39\" class=\"post\">
            <div class=\"header\">
                <span class=\"title\"><a href=\"".URL_SITO."blog.php?ID=".strip_tags($_GET['ID'])."\">".formatText(stripslashes(html_entity_decode($title)))."</a></span> <div style=\"float: right\"></div>
            </div>
            <div class=\"content\">".formatText(stripslashes(html_entity_decode($text)))."</div>
            <div class=\"by\">Scritto da <span class=\"author\">".formatText(stripslashes(html_entity_decode($author)))."</span> il <span class=\"date\">".formatText(stripslashes(html_entity_decode($data)))."</span></div>

            

            </div></div>
        </div>";
}

?>
