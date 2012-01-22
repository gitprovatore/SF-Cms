<?php
require_once("header.php");
$listaArticoli = file_get_contents("../db/articoli/index.html");
$listaPagine = file_get_contents("../db/index.html");
$parseArticoli = str_replace("<!--", "", $listaArticoli);
$parsedArticoli = str_replace("-->", "", $parseArticoli);
$parsePagine = str_replace("<!--", "", $listaPagine);
$parsePagine1 = str_replace("<div class=\"element\"><a href=\"index.php\">Home</a></div>", "<a href=\"modifica_home.php\">Modifica Home</a>", $parsePagine);
$parsePagine2 = str_replace("<div class=\"element\"><a href=\"blog.php\">Blog</a></div>", "", $parsePagine1);
$parsedPagine = str_replace("-->", "", $parsePagine2);
print"<h1>Modifica Articoli</h1><br>".$parsedArticoli."<br><hr><br>";
print"<h1>Modifica Pagine</h1><br>
<ul><li><a href=\"../index.php\">Home</a></li></ul>
<ul><li>".$parsedPagine."</li></ul>";
require_once("footer.php");
?>