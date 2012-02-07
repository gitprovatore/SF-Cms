<?php
require_once("../config.php");
require_once("security.php");
require_once("../style/theme.php");
adminpageOpen();
$id = strip_tags($_GET['id']);
if (isset($id)) {
    $getDb = simplexml_load_file("../db/pagine.xml");
    foreach ($getDb->pagina as $modPagina) {
        if ($id == $modPagina->idPagina) {
            $nomeMod = $modPagina->nomePagina;
            $testoMod = $modPagina->testoPagina;
        }
    }
}
print"
<center>
<form method=\"POST\">
<h1>Modifica Pagina</h1><br/>
Nome:<br/>
<input name=\"nomePagina\" value=\"" . $nomeMod . "\"><br/>
Testo:<br/>
<br/>
<textarea cols=\"110\" rows=\"30\" name=\"testoPagina\">" . $testoMod . "</textarea><br/>
<br/>
<input value=\"Modifica Pagina\" type=\"submit\"><br/>
</form>
</center>
";
$nomePagina = htmlspecialchars(htmlentities($_POST['nomePagina']));
$testoPagina = htmlspecialchars(htmlentities($_POST['testoPagina']));
if (isset($nomePagina) && ($testoPagina)) {
    $modDb = file_get_contents("../db/pagine.xml");
    $parseDb = str_replace("<nomePagina>" . $nomeMod . "</nomePagina>", "<nomePagina>" . $nomePagina . "</nomePagina>", $modDb);
    $dbParsed = str_replace("<testoPagina>" . $testoMod . "</testoPagina>", "<testoPagina>" . $testoPagina . "</testoPagina>", $parseDb);
    file_put_contents("../db/pagine.xml", $dbParsed);
    $modMenu = file_get_contents("../db/menu.xml");
	$parsedMenu = str_replace($nomeMod, $nomePagina, $modMenu);
	file_put_contents("../db/menu.xml", $parsedMenu);
}
adminpageClose();
?>
