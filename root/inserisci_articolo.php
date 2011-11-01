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
$art_id = date("dmyhms");
$art_data = date("d/m/y h:m:s");
$art_titolo = htmlspecialchars(htmlentities($_POST['art_titolo']));
$art_autore = htmlspecialchars(htmlentities($_POST['art_autore']));
$art_testo = htmlspecialchars(htmlentities($_POST['art_testo']));
$art_commenti = "<div id=\"disqus_thread\"></div>
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
if (isset($art_titolo) && ($art_autore) && ($art_testo)) {
    $crea_articolo = fopen("../articoli/" . $art_id . ".html", "w+");
    if ($commenti == "on") {
        fwrite($crea_articolo, "<h1>" . $art_titolo . "</h1><br>" . $art_testo . "<br><br><strong>Autore: </strong>" . $art_autore . "  <strong>Data: </strong>" . $art_data . "<br><strong>Commenti:</strong><br>" . $art_commenti . "");
    } else {
        fwrite($crea_articolo, "<h1>" . $art_titolo . "</h1><br>" . $art_testo . "<br><br><strong>Autore: </strong>" . $art_autore . "  <strong>Data: </strong>" . $art_data . "");
    }
    fclose($crea_articolo);
    $lista_articoli = file_get_contents("../articoli/lista_articoli.html");
    $aprilista = fopen("../articoli/lista_articoli.html", "w");
    fwrite($aprilista, "<ul><li><a href=\"blog.php?art_id=" . $art_id . ".html&link=" . $art_titolo . "\">[" . $art_data . "] - " . $art_titolo . "</a></li></ul>" . $lista_articoli . "");
    fclose($aprilista);
}
require_once("footer.php");
?>
