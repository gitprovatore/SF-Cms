<?php
require_once("../config.php");
require_once("security.php");
require_once("../style/theme.php");
adminpageOpen();
print"
<center>
<form method=\"POST\">
<h1>Inserisci Pagina</h1><br/>
Nome:<br/>
<input name=\"nomePagina\"><br/>
Testo:<br/>
<br/>
<textarea cols=\"110\" rows=\"30\" name=\"testoPagina\"></textarea><br/>
<br/>
<input value=\"Inserisci Pagina\" type=\"submit\"><br/>
</form>
</center>
";
$idPagina = date("dmyhms");
$nomePagina = htmlspecialchars(htmlentities($_POST['nomePagina']));
$testoPagina = htmlspecialchars(htmlentities($_POST['testoPagina']));
if (isset($nomePagina) && ($testoPagina)) {
    $getDb = file_get_contents("../db/pagine.xml");
    $dbParsed = str_replace("</pagineSito>", "", $getDb);
    file_put_contents("../db/pagine.xml", "" . $dbParsed . "<pagina><idPagina>" . $idPagina . "</idPagina><nomePagina>" . $nomePagina . "</nomePagina><testoPagina>" . $testoPagina . "</testoPagina></pagina></pagineSito>");
    $getMenu = file_get_contents("../db/menu.xml");
    $menuParsed = str_replace("</menuSito>", "", $getMenu);
    file_put_contents("../db/menu.xml", "" . $menuParsed . " <elementoMenu><nomeElemento>" . $nomePagina . "</nomeElemento><linkElemento>" . $idPagina . "</linkElemento></elementoMenu></menuSito>");
}
adminpageClose();
?>
