<?php
require_once("config.php");
if(!empty($_GET['ID']))
{
    if(file_exists("".FULL_PATH."database/articoli/".$_GET['ID'].".json"))
    {
        $ID = strip_tags($_GET['ID']);
        $getArticolo = file_get_contents("".FULL_PATH."database/articoli/".$ID.".json");
        $jsondecode = json_decode($getArticolo);
    if(COMMENTI_BLOG == TRUE)
    {
        pageOpen($jsondecode->titolo, $jsondecode->tags);
        viewArticleandComments($jsondecode->titolo, $jsondecode->testo, $jsondecode->autore, $jsondecode->data, $jsondecode->commenti);
        pageClose();
    }
    elseif((COMMENTI_BLOG == FALSE) OR (COMMENTI_BLOG == NULL))
    {
        pageOpen($jsondecode->titolo, $jsondecode->tags);
        viewArticle($jsondecode->titolo, $jsondecode->testo, $jsondecode->autore, $jsondecode->data);
        pageClose();
    }
    }
    else
    {
        pageOpen("ARTICOLO NON ESISTENTE", "ARTICOLO NON ESISTENTE");
        print"<center><h1>L' ARTICOLO NON ESISTE!!!</h1></center>";
        pageClose();
    }
}
else
{
    pageOpen("Blog", "Blog");
    viewArticlelist();
    pageClose(); 
}
?>