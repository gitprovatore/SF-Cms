<?php

require_once("header.php");
foreach ($_SERVER as $info) {
    print"<ul><li>" . $info . "</li></ul>";
}
require_once("footer.php");
?>
