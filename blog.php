<?php
require_once("style/theme.php");
require_once("config.php");
pageOpen();
$articleID = strip_tags($_GET['articleID']);
if (empty($_GET['articleID'])) {
    $getDb = simplexml_load_file("db/articoli.xml");
    foreach ($getDb->articolo as $article) {
        print"<ul><li><a href=\"blog.php?articleID=" . $article->idArticolo . "&SEO=" . $article->titoloArticolo . "\">[" . $article->dataArticolo . "] - " . $article->titoloArticolo . "</a></li></ul>";
    }
} else {
    $getDb = simplexml_load_file("db/articoli.xml");
    foreach ($getDb->articolo as $article) {
        if ($articleID == $article->idArticolo) {
            print"
<h1>" . $article->titoloArticolo . "</h1>
<br>
" . $article->testoArticolo . "
<br>
<br>
<strong>Autore:</strong>" . $article->autoreArticolo . "&nbsp;&nbsp;<strong>Data:</strong>" . $article->dataArticolo . "<br><br>
<strong>Commenti:</strong>
<br>
" . html_entity_decode($article->commentiArticolo) . "
";
        }
    }
}
pageClose();
?>
