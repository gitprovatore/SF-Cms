<?php
require_once("../config.php");
require_once("security.php");
adminpageOpen();
$getDBPagine = file_get_contents("".FULL_PATH."database/liste/listaPagine.json");
$getDBArticoli = file_get_contents("".FULL_PATH."database/liste/listaArticoli.json");
$decodeDBPagine = json_decode($getDBPagine);
$decodeDBArticoli = array_reverse(json_decode($getDBArticoli));

print"<h1>Modifica Articoli</h1><br>";
foreach($decodeDBArticoli as $elementoLista)
{
	print"<ul><li><a href=\"".URL_SITO."root/modificaArticolo.php?ID=".$elementoLista->ID."\">[".$elementoLista->data."] - ".$elementoLista->titolo."</a></li></ul>";
}
print"<br><h1>Modifica Pagine</h1><br>";
foreach($decodeDBPagine as $elementoLista)
{
	print"<ul><li><a href=\"".URL_SITO."root/modificaPagina.php?ID=".$elementoLista->ID."\">".$elementoLista->nome."</a></li></ul>";
}
adminpageClose();
?>
