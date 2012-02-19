<?php
require_once("style/theme.php");
require_once("config.php");
pageOpen();
$pageID = strip_tags($_GET['pageID']);
if (isset($pageID))
{
    $getDb = simplexml_load_file("db/pagine.xml");
    foreach ($getDb->pagina as $page)
    {
        if ($pageID == $page->idPagina)
        {
            viewPage($page->testoPagina);
        }
    }
}
pageClose();
?>
