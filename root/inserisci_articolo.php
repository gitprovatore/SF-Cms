<?php
require_once("header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta content="text/html; charset=ISO-8859-1"
              http-equiv="content-type">
        <title></title>
    </head>
    <body><center>
        <form method="POST">
            <h1>Inserisci Articolo</h1><br/>
            <br/>
            Titolo:<br/>
            <input name="art_titolo"><br/>
            Autore:<br/>
            <input name="art_autore"><br/>
            Text:<br/>
            <br/>
            <textarea cols="30" rows="15" name="art_testo"></textarea><br/>
            <br/>
            <input value="Inserisci Articolo" type="submit"><br/>
        </form>
    </center></body>
</html>
<?php
$idArticolo = date("dmyhms");
$dataArticolo = date("h:m:s - d/m/y");
$titoloArticolo = strip_tags($_POST['art_titolo']);
$autoreArticolo = strip_tags($_POST['art_autore']);
$testoArticolo = htmlentities($_POST['art_testo']);
$commentiArticolo = "
<div id=\"disqus_thread\"></div>
<script type=\"text/javascript\">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = \'" . $userdisqus . "\'; // required: replace example with your forum shortname

    /* * * DON\'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement(\'script\'); dsq.type = \'text/javascript\'; dsq.async = true;
        dsq.src = \'http://\' + disqus_shortname + \'.disqus.com/embed.js\';
        (document.getElementsByTagName(\'head\')[0] || document.getElementsByTagName(\'body\')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href=\"http://disqus.com/?ref_noscript\">comments powered by Disqus.</a></noscript>
<a href=\"http://disqus.com\" class=\"dsq-brlink\">blog comments powered by <span class=\"logo-disqus\">Disqus</span></a>";
if (isset($titoloArticolo) && ($autoreArticolo) && ($testoArticolo)) {
    if ($commenti == "on") {
        file_put_contents("../db/articoli/" . $idArticolo . ".html", "<h1>" . $titoloArticolo . "</h1><br>" . $testoArticolo . "<br><br><strong>Autore: </strong>" . $autoreArticolo . "  <strong>Data: </strong>" . $dataArticolo . "<br><strong>Commenti:</strong><br>" . $commentiArticolo . "");
    } else {
        file_put_contents("../db/articoli/" . $idArticolo . ".html", "<h1>" . $titoloArticolo . "</h1><br>" . $testoArticolo . "<br><br><strong>Autore: </strong>" . $autoreArticolo . "  <strong>Data: </strong>" . $dataArticolo . "");
    }
    $listaArticoli = file_get_contents("../db/articoli/index.html");
    file_put_contents("../db/articoli/index.html", "<ul><li><a href=\"blog.php?art_id=" . $idArticolo . "&seo=".$titoloArticolo."\">[" . $dataArticolo . "] - " . $titoloArticolo . "</a></li></ul><!-- <ul><li><a href=\"modifica_articolo.php?id=" . $idArticolo . "\">Modifica " . $titoloArticolo . "</a></li></ul> -->" . $listaArticoli . "");
}
require_once("footer.php");
?>
