<?php
if(file_exists("install.php"))
{
die(header("Location: install.php"));
}
require_once("config.php");
pageOpen("Home Page", "Home Page");
print"".html_entity_decode(file_get_contents("".FULL_PATH."database/pagine/home.html"))."";
pageClose();
?>
