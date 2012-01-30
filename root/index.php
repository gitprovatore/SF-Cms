<?php
require_once("header.php");
print"<h1>Informazioni Server</h1><br />";
foreach ($_SERVER as $info) {
    print"<ul><li>" . $info . "</li></ul>";
}
require_once("footer.php");
?>
