<?php

require_once("header.php");
print"
<center>
<form method=\"POST\">
<h1>Modifica Home</h1><br/>
<br/>
<textarea cols=\"100\" rows=\"50\" name=\"editHome\">
" . file_get_contents("../db/home.html") . "
</textarea><br/>
<br/>
<input value=\"Modifica Home\" type=\"submit\"><br/>
</form>
</center>
";
$editHome = htmlentities($_POST['editHome']);
if (isset($editHome)) {
    file_put_contents("../db/home.html", $editHome);
}
require_once("footer.php");
?>