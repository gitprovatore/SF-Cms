<?php
require_once("style/theme.php");
require_once("config.php");
pageOpen();
$articleID = strip_tags($_GET['articleID']);
if (empty($_GET['articleID']))
{
    $getDb = simplexml_load_file("db/articoli.xml");
    foreach ($getDb->articolo as $article)
    {
        viewArticlelist($article->idArticolo, $article->titoloArticolo, $article->dataArticolo);
    }
}
else
{
    $getDb = simplexml_load_file("db/articoli.xml");
    foreach ($getDb->articolo as $article)
    {
        if ($articleID == $article->idArticolo)
        {
			viewArticle($article->titoloArticolo, $article->testoArticolo, $article->autoreArticolo, $article->dataArticolo, $article->commentiArticolo);
        }
    }
}
pageClose();
?>
