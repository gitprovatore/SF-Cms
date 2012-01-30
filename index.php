<?php

require_once("style/header.php");
print"".html_entity_decode(file_get_contents("db/home.html"))."";
require_once("style/footer.php");
?>
