<?php
require_once("../config.php");
require_once("security.php");
adminpageOpen();
if(!empty($_GET['ID']))
{
$ID = strip_tags($_GET['ID']);
$getPagina = file_get_contents("".FULL_PATH."database/pagine/".$ID.".json");
$jsondecode = json_decode($getPagina);
print"
<h1 style=\"text-align: center;\">
    Modifica Pagina</h1><div style=\"text-align: center;\">
    <form method=\"GET\" action=\"modificaPagina.php\">
        <br>
        <input name=\"ID\" value=\"".$jsondecode->ID."\" type=\"hidden\">
        <input name=\"oldnome\" value=\"".$jsondecode->nome."\" type=\"hidden\">
        Nome:<br>
        <input name=\"nome\" value=\"".$jsondecode->nome."\"><br>

        <br>Testo:<br>

        <textarea cols=\"100\" rows=\"20\" name=\"testo\">".html_entity_decode($jsondecode->testo)."</textarea><br>

        <br>Tags:<br>

        <textarea cols=\"40\" rows=\"20\" name=\"tags\">".$jsondecode->tags."</textarea><br>
        <input value=\"Modifica Pagina\" type=\"submit\">
    </form>
    <br>
</div>    
";
}
$ID = strip_tags($_GET['ID']);
$oldnome = strip_tags($_GET['oldnome']);
$nome= strip_tags($_GET['nome']);
$testo = htmlentities($_GET['testo']); 
$tags = strip_tags($_GET['tags']);
if(isset($ID) && ($oldnome) && ($nome) && ($testo) && ($tags))
{
    $pagina['ID'] = $ID;
    $pagina['nome'] = $nome;
    $pagina['testo'] = $testo;
    $pagina['tags'] = $tags;
    $json = json_encode($pagina);
    file_put_contents("".FULL_PATH."database/pagine/".$ID.".json", $json);
    $getList = file_get_contents("".FULL_PATH."database/liste/listaPagine.json");
    $parseList = str_replace($oldnome, $nome, $getList);
    file_put_contents("".FULL_PATH."database/liste/listaPagine.json", $parseList);
    $getMenu = file_get_contents("".FULL_PATH."database/liste/menuSito.json");
    $parseMenu = str_replace($oldnome, $nome, $getMenu);
    file_put_contents("".FULL_PATH."database/liste/menuSito.json", $getMenu);
    print"<br><center><h1>PAGINE MODIFICATA CON SUCCESSO!!!</h1></center>";
}
?>
