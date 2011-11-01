<?php
require_once("header.php");
$art_id = htmlspecialchars($_GET['art_id']);
$art_id = str_replace(".php", "", $art_id);
$art_id = str_replace("../", "", $art_id);
if(!empty($_GET['art_id']))
{
	$articolo = file_get_contents("articoli/".$art_id."");
	print"".stripslashes(htmlspecialchars_decode(html_entity_decode($articolo)))."";
}
else
{
	require_once("articoli/lista_articoli.html");
}
require_once("footer.php");
?>
