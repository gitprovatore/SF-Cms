<?php
require_once("../config.php");
require_once("security.php");
adminpageOpen();
$getDBPagine = file_get_contents("".FULL_PATH."database/liste/listaPagine.html");
$getDBArticoli = file_get_contents("".FULL_PATH."database/liste/listaArticoli.html");

print"<h1>Modifica Articoli</h1><br>";
$parselist = str_replace("".URL_SITO."", "", $getDBArticoli);
$listaParsed = str_replace("blog.php", "modificaArticolo.php", $parselist);
print"".$listaParsed."<br>";
print"<br><h1>Modifica Pagine</h1><br>";
print"".$getDBPagine."<br>";

adminpageClose();
?>