<?php

function htmlHead()
{
	print"
	<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
	<html>
    <head>
    <meta content=\"text/html; charset=UTF-8\" http-equiv=\"content-type\">
    <title>
	";
	print"".TITOLO_SITO."";
	if (isset($_GET['SEO']))
	{
		print" - ".strip_tags($_GET['SEO'])."";
	}
	print"
	</title>
	<meta name=\"DESCRIPTION\" content=\"".DESCRIZIONE_SITO."\" />
	<meta name=\"KEYWORDS\" content=\"".KEYWORDS_SITO."\" />
    <link rel=\"stylesheet\" type=\"text/css\" href=\"".URL_SITO."style/style.css\">
    </head>
	";
}

function htmladminHead()
{
	print"
	<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01//EN\" \"http://www.w3.org/TR/html4/strict.dtd\">
	<html>
    <head>
    <meta content=\"text/html; charset=UTF-8\" http-equiv=\"content-type\">
    <title>SF-CmS - Admin Panel</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"".URL_SITO."style/style.css\">
    </head>
	";
}

function htmlBody()
{
	print"<body>";
}

function htmlMenu()
{
	print"
	<div id=\"menu\">
	<div class=\"element\"><a href=\"".URL_SITO."index.php\">Home</a></div>
	<div class=\"element\"><a href=\"".URL_SITO."blog.php\">Blog</a></div>
	";
	$loadMenu = simplexml_load_file("db/menu.xml");
	foreach ($loadMenu->elementoMenu as $menuItem)
	{
		if((@preg_match("/http/i", $menuItem->linkElemento)) OR (@preg_match("/https/i", $menuItem->linkElemento)) OR (@preg_match("/ftp/i", $menuItem->linkElemento)) OR (@preg_match("/ftps/i", $menuItem->linkElemento)))
		{
			print"<div class=\"element\"><a href=\"".$menuItem->linkElemento."\">".$menuItem->nomeElemento."</a></div>";
		}
		else
		{
			print"<div class=\"element\"><a href=\"".URL_SITO."pagina.php?pageID=".$menuItem->linkElemento."&SEO=".$menuItem->nomeElemento."\">".$menuItem->nomeElemento."</a></div>";
		}
	}
	print"</div>";
}

function htmladminMenu()
{
	print"
	<div id=\"menu\">
<div class=\"element\"><a href=\"index.php\">ACP Home</a></div>
<div class=\"element\"><a href=\"inserisciArticolo.php\">Inserisci Articolo</a></div>
<div class=\"element\"><a href=\"inserisciPagina.php\">Inserisci Pagina</a></div>
<div class=\"element\"><a href=\"listaDati.php\">Modifica Articolo/Pagina</a></div>
<div class=\"element\"><a href=\"modificaHome.php\">Modifica HomePage</a></div>
<div class=\"element\"><a href=\"modificaMenu.php\">Modifica Menu</a></div>
<div class=\"element\"><a href=\"modificaImpostazioni.php\">Modifica Impostazioni</a></div>
<div class=\"element\"><a href=\"logout.php\">Logout</a></div>
	</div>
	";
}

function htmlContent()
{
	print"<div id=\"body\">";
}

function htmlcloseContent()
{
	print"</div>";
}

function htmlFooter()
{
	print"
	<div id=\"credits\">
	".TESTO_FOOTER." - <a href=\"http://system-infet.webnet32.com/\">PoWeReD By SF-CmS</a> - <a href=\"http://meh.paranoid.pk\">Meh CSS Style</a>
	</div>
	";
}

function htmlcloseBody()
{
	print"
	</body>
	</html>
	";
}

function pageOpen()
{
	htmlHead();
	htmlBody();
	htmlMenu();
	htmlContent();
}

function pageClose()
{
	htmlcloseContent();
	htmlFooter();
	htmlcloseBody();
}

function adminpageOpen()
{
	htmladminHead();
	htmlBody();
	htmladminMenu();
	htmlContent();
}

function adminpageClose()
{
	htmlcloseContent();
	htmlFooter();
	htmlcloseBody();
}
?>
