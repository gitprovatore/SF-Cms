<?php

require_once("style/header.php");
$pageID = strip_tags($_GET['pageID']);
if (isset($pageID)) {
    $getDb = simplexml_load_file("db/pagine.xml");
    foreach ($getDb->pagina as $page) {
        if ($pageID == $page->idPagina) {
            print"" . html_entity_decode($page->testoPagina) . "";
        }
    }
}
require_once("style/footer.php");
?>
