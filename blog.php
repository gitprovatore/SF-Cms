<?php
require_once("style/header.php");
$art_id = strip_tags($_GET['art_id']);
if(!empty($_GET['art_id']))
{
	$articolo = file_get_contents("db/articoli/".$art_id.".html");
	print"".html_entity_decode($articolo)."";
}
else
{
	require_once("db/articoli/index.html");
}
require_once("style/footer.php");
?>
