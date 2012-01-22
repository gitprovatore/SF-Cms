<?php
require_once("style/header.php");
$pag_id = strip_tags($_GET['pag_id']);
if(isset($pag_id))
{
	$pagina = file_get_contents("db/pagine/".$pag_id.".html");

	print"".html_entity_decode($pagina)."";
}
else
{
	print"La pagina non Esiste";
}
require_once("style/footer.php");
?>
