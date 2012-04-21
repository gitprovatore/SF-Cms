<?php
require_once("../config.php");
require_once("security.php");
adminpageOpen();
print"
<center>
<form method=\"POST\">
<h1>Modifica Home</h1><br/>
<br/>
<textarea cols=\"110\" rows=\"30\" name=\"editHome\">
" . html_entity_decode(file_get_contents("".FULL_PATH."database/pagine/home.html")) . "
</textarea><br/>
<br/>
<input value=\"Modifica Home\" type=\"submit\"><br/>
</form>
</center>
";
$editHome = htmlentities($_POST['editHome']);
if (isset($editHome))
{
    file_put_contents("".FULL_PATH."database/pagine/home.html", $editHome);
    print"<br><center><h1>HOMEPAGE MODIFICATA CON SUCCESSO!!!</h1></center>";
}
adminpageClose();
?>
