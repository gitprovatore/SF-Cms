<?php

require_once("header.php");
$dbArticoli = simplexml_load_file("../db/articoli.xml");
$dbPagine = simplexml_load_file("../db/pagine.xml");
print"<h1>Modifica Articoli</h1><br />";
foreach ($dbArticoli->articolo as $modArticolo) {
    print"<ul><li><a href=\"modificaArticoli.php?id=" . $modArticolo->idArticolo . "\">Modifica " . $modArticolo->titoloArticolo . "</a></li></ul>";
}
print"<br /><h1>Modifica Pagina</h1><br />";
foreach ($dbPagine->pagina as $modPagina) {
    print"<ul><li><a href=\"modificaPagine.php?id=" . $modPagina->idPagina . "\">Modifica " . $modPagina->nomePagina . "</a></li></ul>";
}
require_once("footer.php");
?>