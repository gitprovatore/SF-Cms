<?php
require_once("../config.php");
require_once("security.php");
adminpageOpen();
if(!empty($_GET['ID']))
{
$ID = strip_tags($_GET['ID']);
$getArticolo = file_get_contents("".FULL_PATH."database/articoli/".$ID.".json");
$jsondecode = json_decode($getArticolo);
print"
<div style=\"text-align: center;\"><h1>
        Modifica Articolo</h1>
    <br>
    <form method=\"GET\" action=\"modificaArticolo.php\">
        <input name=\"ID\" value=\"".$jsondecode->ID."\" type=\"hidden\">
        <input name=\"data\" value=\"".$jsondecode->data."\" type=\"hidden\">
        <input name=\"oldtitolo\" value=\"".$jsondecode->titolo."\" type=\"hidden\">
        <input name=\"commenti\" value=\"".$jsondecode->commenti."\" type=\"hidden\">
        Titolo:<br>
        <input name=\"titolo\" value=\"".$jsondecode->titolo."\"><br><br>Autore:<br>
        <input name=\"autore\" value=\"".$jsondecode->autore."\"><br><br>Testo:<br>
        <textarea cols=\"100\" rows=\"20\" name=\"testo\">".$jsondecode->testo."</textarea><br><br>Tags:<br>
        <textarea cols=\"40\" rows=\"10\" name=\"tags\">".$jsondecode->tags."</textarea><br>
        <br>
        <input value=\"Modifica Articolo\" type=\"submit\">
    </form>
    <br></div>    
";
}
$ID = strip_tags($_GET['ID']);
$titolo = strip_tags($_GET['titolo']);
$oldtitolo = strip_tags($_GET['oldtitolo']);
$autore = strip_tags($_GET['autore']);
$testo = htmlentities($_GET['testo']);
$tags = strip_tags($_GET['tags']);
$data = strip_tags($_GET['data']);
$commenti = htmlentities($_GET['commenti']);
if(isset($ID) && ($titolo) && ($autore) && ($testo) && ($tags) && ($oldtitolo))
{
    $articolo['ID'] = $ID;
    $articolo['titolo'] = $titolo;
    $articolo['autore'] = $autore;
    $articolo['testo'] = $testo;
    $articolo['tags'] = $tags;
    $articolo['data'] = $data;
    $articolo['commenti'] = $commenti;
    $jsonencode = json_encode($articolo);
    file_put_contents("".FULL_PATH."database/articoli/".$ID.".json", $jsonencode);
    $getList = file_get_contents("".FULL_PATH."database/liste/listaArticoli.html");
    $parseList = str_replace($oldtitolo, $titolo, $getList);
    file_put_contents("".FULL_PATH."database/liste/listaArticoli.html", $parseList);
    print"<br><center><h1>ARTICOLO MODIFICATO CON SUCCESSO!!!</h1></center>";
}
adminpageClose();
?>