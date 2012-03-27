<?php
require_once("../config.php");
require_once("security.php");
adminpageOpen();
print"
<center>
<form method=\"POST\">
<h1>Modifica Menu</h1><br/>
<br/>
<textarea cols=\"110\" rows=\"30\" name=\"editMenu\">
" . file_get_contents("".FULL_PATH."database/liste/menuSito.html") . "
</textarea><br/>
<br/>
<input value=\"Modifica Home\" type=\"submit\"><br/>
</form>
</center>
";
$editMenu = htmlentities($_POST['editMenu']);
if (isset($editMenu))
{
    file_put_contents("".FULL_PATH."database/liste/menuSito.html", $editMenu);
    print"<br><center><h1>MENU MODIFICATO CON SUCCESSO!!!</h1></center>";
}
adminpageClose();
?>