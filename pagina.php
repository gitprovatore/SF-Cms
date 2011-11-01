<?php
require_once("header.php");
$pag_id = htmlspecialchars($_GET['pag_id']);
$pag_id = str_replace(".php", "", $pag_id);
$pag_id = str_replace("../", "", $pag_id);
if(isset($pag_id))
{
	$pagina = file_get_contents("pagine/".$pag_id."");

	print"".stripslashes(htmlspecialchars_decode(html_entity_decode($pagina)))."";
}
else
{
	print"La pagina non Esiste";
}
require_once("footer.php");
?>
