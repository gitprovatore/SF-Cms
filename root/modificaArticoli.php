<?php

require_once("header.php");
$id = strip_tags($_GET['id']);
if (isset($id)) {
    $getDb = simplexml_load_file("../db/articoli.xml");
    foreach ($getDb->articolo as $modArticolo) {
        if ($id == $modArticolo->idArticolo) {
            $titoloMod = $modArticolo->titoloArticolo;
            $autoreMod = $modArticolo->autoreArticolo;
            $testoMod = $modArticolo->testoArticolo;
            $dataMod = $modArticolo->dataArticolo;
        }
    }
}
print"
<center>
        <form method=\"POST\">
            <h1>Modifica Articolo</h1><br/>
            <br/>
            Titolo:<br/>
            <input name=\"titoloArticolo\" value=\"" . $titoloMod . "\"><br/>
            Autore:<br/>
            <input name=\"autoreArticolo\" value=\"" . $autoreMod . "\"><br/>
            Text:<br/>
            <br/>
            <textarea cols=\"110\" rows=\"30\" name=\"testoArticolo\">" . $testoMod . "</textarea><br/>
            <br/>
            <input value=\"Modifica Articolo\" type=\"submit\"><br/>
        </form>
    </center>
";
$idArticolo = date("dmyhms");
$dataArticolo = date("h:m:s - d/m/y");
$titoloArticolo = strip_tags($_POST['titoloArticolo']);
$autoreArticolo = strip_tags($_POST['autoreArticolo']);
$testoArticolo = htmlentities($_POST['testoArticolo']);
if (isset($titoloArticolo) && ($autoreArticolo) && ($testoArticolo)) {
    $modDb = file_get_contents("../db/articoli.xml");
    $parseDb = str_replace("<titoloArticolo>" . $titoloMod . "</titoloArticolo>", "<titoloArticolo>" . $titoloArticolo . "</titoloArticolo>", $modDb);
    $parseDb1 = str_replace("<autoreArticolo>" . $autoreMod . "</autoreArticolo>", "<autoreArticolo>" . $autoreArticolo . "</autoreArticolo>", $parseDb);
    $parseDb2 = str_replace("<dataArticolo>" . $dataMod . "</dataArticolo>", "<dataArticolo>" . $dataArticolo . "</dataArticolo>", $parseDb1);
    $dbParsed = str_replace("<testoArticolo>" . $testoMod . "</testoArticolo>", "<testoArticolo>" . $testoArticolo . "</testoArticolo>", $parseDb2);
    file_put_contents("../db/articoli.xml", $dbParsed);
}
require_once("footer.php");
?>