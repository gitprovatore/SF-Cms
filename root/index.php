<?php
require_once("../config.php");
require_once("security.php");
adminpageOpen();
print"<h1>Informazioni Server</h1><br />";
foreach ($_SERVER as $info)
{
    print"<ul><li>" . $info . "</li></ul>";
}
adminpageClose();
?>
