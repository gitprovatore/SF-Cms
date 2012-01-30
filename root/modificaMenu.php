<?php

require_once("header.php");
print"
<center>
<form method=\"POST\">
<h1>Modifica Menu</h1><br/>
<br/>
<textarea cols=\"110\" rows=\"30\" name=\"editMenu\">
" . file_get_contents("../db/menu.xml") . "
</textarea><br/>
<br/>
<input value=\"Modifica Menu\" type=\"submit\"><br/>
</form>
</center>
";
$editMenu = $_POST['editMenu'];
if (isset($editMenu)) {
    file_put_contents("../db/menu.xml", $editMenu);
}
require_once("footer.php");
?>