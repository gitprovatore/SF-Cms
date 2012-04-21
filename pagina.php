<?php
require_once("config.php");
if(!empty($_GET['ID']))
{
    if(file_exists("".FULL_PATH."database/pagine/".$_GET['ID'].".json"))
    {
        $ID = strip_tags($_GET['ID']);
        $getPagina = file_get_contents("".FULL_PATH."database/pagine/".$ID.".json");
        $jsondecode = json_decode($getPagina);
        pageOpen($jsondecode->nome, $jsondecode->tags);
        viewPage($jsondecode->nome, $jsondecode->testo);
        pageClose();
    }
    else
    {
        pageOpen("PAGINA NON ESISTENTE", "PAGINA NON ESISTENTE");
        print"<center><h1>LA PAGINA NON ESISTE!!!</h1></center>";
        pageClose();
    }
}
?>