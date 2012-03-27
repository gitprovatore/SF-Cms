<?php
require_once("../config.php");
require_once("security.php");
adminpageOpen();
print"
<h1 style=\"text-align: center;\">
    Inserisci Pagina</h1><div style=\"text-align: center;\">
    <form method=\"post\" action=\"inserisciPagina.php\">
        <br>
        Nome:<br>
        <input name=\"nome\"><br>

        <br>Testo:<br>

        <textarea cols=\"100\" rows=\"20\" name=\"testo\"></textarea><br>

        <br>Tags:<br>

        <textarea cols=\"40\" rows=\"20\" name=\"tags\"></textarea><br>
        <input value=\"Inserici Pagina\" type=\"submit\">
    </form>
    <br>
</div>    
";
$idPagina = date("dmyhms");
$nomePagina = strip_tags($_POST['nome']);
$testoPagina = htmlentities($_POST['testo']);
$tagsPagina = strip_tags($_POST['tags']);
if (isset($nomePagina) && ($testoPagina) && ($tagsPagina))
{
    $pagina['ID'] = $idPagina;
    $pagina['nome'] = $nomePagina;
    $pagina['testo'] = $testoPagina;
    $pagina['tags'] = $tagsPagina;
    $json = json_encode($pagina);
    file_put_contents("".FULL_PATH."database/pagine/".$idPagina.".json", $json);
    file_put_contents("".FULL_PATH."database/liste/listaPagine.html", "
        <ul><li><a href=\"modificaPagina.php?ID=".$idPagina."\">".$nomePagina."</a></li></ul>", FILE_APPEND);
    file_put_contents("".FULL_PATH."database/liste/menuSito.html", "
        <div class=\"element\"><a href=\"".URL_SITO."pagina.php?ID=".$idPagina."\">".$nomePagina."</a></div>", FILE_APPEND);
    print"<br><center><h1>PAGINA INSERITA CON SUCCESSO!!!</h1></center>";
}
adminpageClose();
?>