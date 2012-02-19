<?php
require_once("../config.php");
require_once("security.php");
require_once("../style/theme.php");
adminpageOpen();
print"
<center>
<form method=\"POST\">
<h1>Modifica Home</h1><br/>
<br/>
<textarea cols=\"110\" rows=\"30\" name=\"editHome\">
" . file_get_contents("../db/home.html") . "
</textarea><br/>
<br/>
<input value=\"Modifica Home\" type=\"submit\"><br/>
</form>
</center>
";
$editHome = htmlentities($_POST['editHome']);
if (isset($editHome))
{
    file_put_contents("../db/home.html", $editHome);
}
adminpageClose();
?>
