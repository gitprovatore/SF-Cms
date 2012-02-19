<?php
require_once("../config.php");
require_once("security.php");
require_once("../style/theme.php");
adminpageOpen();
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
$editMenu = stripslashes($_POST['editMenu']);
if (isset($editMenu))
{
    file_put_contents("../db/menu.xml", $editMenu);
}
adminpageClose();
?>
