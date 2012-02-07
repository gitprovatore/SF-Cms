<?php
require_once("style/theme.php");
require_once("config.php");
pageOpen();
print"".html_entity_decode(file_get_contents("db/home.html"))."";
pageClose();
?>
