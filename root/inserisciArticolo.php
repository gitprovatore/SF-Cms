<?php
require_once("../config.php");
require_once("security.php");
adminpageOpen();
print"
<div style=\"text-align: center;\"><h1>
        Inserisci Articolo</h1>
    <br>
    <form method=\"post\" action=\"inserisciArticolo.php\">Titolo:<br>
        <input name=\"titolo\"><br><br>Autore:<br>
        <input name=\"autore\"><br><br>Testo:<br>
        <textarea cols=\"100\" rows=\"20\" name=\"testo\"></textarea><br><br>Tags:<br>
        <textarea cols=\"40\" rows=\"10\" name=\"tags\"></textarea><br>
        <br>
        <input value=\"Inserici Articolo\" type=\"submit\">
    </form>
    <br></div>    
";
$idArticolo = date("dmyhms");
$titoloArticolo = strip_tags($_POST['titolo']);
$autoreArticolo = strip_tags($_POST['autore']);
$testoArticolo = htmlentities($_POST['testo']);
$tagsArticolo = strip_tags($_POST['tags']);
$dataArticolo = date("d/m/y - h:m:s");
$commentiArticolo = htmlentities("
<div id=\"disqus_thread\"></div>
<script type=\"text/javascript\">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = '" . USER_DISQUS . "'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href=\"http://disqus.com/?ref_noscript\">comments powered by Disqus.</a></noscript>
<a href=\"http://disqus.com\" class=\"dsq-brlink\">blog comments powered by <span class=\"logo-disqus\">Disqus</span></a>
");
if (isset($titoloArticolo) && ($autoreArticolo) && ($testoArticolo) && ($tagsArticolo))
{
    if(COMMENTI_BLOG == TRUE)
    {
        $articolo['ID'] = $idArticolo;
        $articolo['titolo'] = $titoloArticolo;
        $articolo['autore'] = $autoreArticolo;
        $articolo['testo'] = $testoArticolo;
        $articolo['tags'] = $tagsArticolo;
        $articolo['data'] = $dataArticolo;
        $articolo['commenti'] = $commentiArticolo;
        $json = json_encode($articolo);
        file_put_contents("".FULL_PATH."database/articoli/".$idArticolo.".json", $json);
        $getList = file_get_contents("".FULL_PATH."database/liste/listaArticoli.html");
        file_put_contents("".FULL_PATH."database/liste/listaArticoli.html", "<ul><li><a href=\"".URL_SITO."blog.php?ID=".$idArticolo."\">[".$dataArticolo."] - $titoloArticolo</a></li></ul>
                ".$getList."");
        print"<br><center><h1>ARTICOLO INSERITO CON SUCCESSO!!!</h1></center>";
    }
    elseif((COMMENTI_BLOG == FALSE) OR (COMMENTI_BLOG == NULL))
    {
        $articolo['ID'] = $idArticolo;
        $articolo['titolo'] = $titoloArticolo;
        $articolo['autore'] = $autoreArticolo;
        $articolo['testo'] = $testoArticolo;
        $articolo['tags'] = $tagsArticolo;
        $articolo['data'] = $dataArticolo;
        $json = json_encode($articolo);
        file_put_contents("".FULL_PATH."database/articoli/".$idArticolo.".json", $json);
        $getList = file_get_contents("".FULL_PATH."database/liste/listaArticoli.html");
        file_put_contents("".FULL_PATH."database/liste/listaArticoli.html", "<ul><li><a href=\"".URL_SITO."blog.php?ID=".$idArticolo."\">[".$dataArticolo."] - $titoloArticolo</a></li></ul>
                ".$getList."");
        print"<br><center><h1>ARTICOLO INSERITO CON SUCCESSO!!!</h1></center>";
    }
}
adminpageClose();
?>