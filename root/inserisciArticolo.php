<?php
require_once("../config.php");
require_once("security.php");
adminpageOpen();
print"
<div style=\"text-align: center;\"><h1>
        Inserisci Articolo</h1>
    <br>
    <form method=\"post\" action=\"inserisciArticolo.php\">Titolo:<br>
        <input name=\"titolo\"><br><br>Autore:<br>
        <input name=\"autore\"><br><br>Testo:<br>
        <textarea cols=\"100\" rows=\"20\" name=\"testo\"></textarea><br><br>Tags:<br>
        <textarea cols=\"40\" rows=\"10\" name=\"tags\"></textarea><br>
        <br>
        <input value=\"Inserici Articolo\" type=\"submit\">
    </form>
    <br></div>    
";
$idArticolo = date("dmyhms");
$titoloArticolo = strip_tags($_POST['titolo']);
$autoreArticolo = strip_tags($_POST['autore']);
$testoArticolo = htmlentities($_POST['testo']);
$tagsArticolo = strip_tags($_POST['tags']);
$dataArticolo = date("d/m/y - h:m:s");
if (isset($titoloArticolo) && ($autoreArticolo) && ($testoArticolo) && ($tagsArticolo))
{
	$articolo['ID'] = $idArticolo;
    $articolo['titolo'] = $titoloArticolo;
    $articolo['autore'] = $autoreArticolo;
    $articolo['testo'] = $testoArticolo;
    $articolo['tags'] = $tagsArticolo;
    $articolo['data'] = $dataArticolo;
    $json = json_encode($articolo);
    file_put_contents("".FULL_PATH."database/articoli/".$idArticolo.".json", $json);
    $getList = file_get_contents("".FULL_PATH."database/liste/listaArticoli.json");
    $decodeList = json_decode($getList);
    $arrayList = array("ID" => $idArticolo, "titolo" => $titoloArticolo, "data" => $dataArticolo);
    array_push($decodeList, $arrayList);
    $encodeList = json_encode($decodeList);
    file_put_contents("".FULL_PATH."database/liste/listaArticoli.json", $encodeList);
        print"<br><center><h1>ARTICOLO INSERITO CON SUCCESSO!!!</h1></center>";
}
adminpageClose();
?>
