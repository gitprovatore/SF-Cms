<?php
require_once("../config.php");
require_once("security.php");
require_once("../style/theme.php");
adminpageOpen();
print"
<center>
        <form method=\"POST\">
            <h1>Inserisci Articolo</h1><br/>
            <br/>
            Titolo:<br/>
            <input name=\"titoloArticolo\"><br/>
            Autore:<br/>
            <input name=\"autoreArticolo\"><br/>
            Text:<br/>
            <br/>
            <textarea cols=\"110\" rows=\"30\" name=\"testoArticolo\"></textarea><br/>
            <br/>
            <input value=\"Inserisci Articolo\" type=\"submit\"><br/>
        </form>
    </center>
";
$idArticolo = date("dmyhms");
$dataArticolo = date("h:m:s - d/m/y");
$titoloArticolo = strip_tags($_POST['titoloArticolo']);
$autoreArticolo = strip_tags($_POST['autoreArticolo']);
$testoArticolo = htmlentities($_POST['testoArticolo']);
$commentiArticolo = htmlentities("
<div id=\"disqus_thread\"></div>
<script type=\"text/javascript\">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = '".USER_DISQUS."'; // required: replace example with your forum shortname

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
if (isset($titoloArticolo) && ($autoreArticolo) && ($testoArticolo))
{
    $getDb = file_get_contents("../db/articoli.xml");
    $parseDb = str_replace("<?xml version=\"1.0\" encoding=\"UTF-8\"?>", "", $getDb);
    $dbParsed = str_replace("<articoliBlog>", "", $parseDb);
    if (COMMENTI_BLOG == "on")
    {
        file_put_contents("../db/articoli.xml", "<?xml version=\"1.0\" encoding=\"UTF-8\"?><articoliBlog><articolo><idArticolo>" . $idArticolo . "</idArticolo><titoloArticolo>" . $titoloArticolo . "</titoloArticolo><autoreArticolo>" . $autoreArticolo . "</autoreArticolo><dataArticolo>" . $dataArticolo . "</dataArticolo><testoArticolo>" . $testoArticolo . "</testoArticolo><commentiArticolo>" . $commentiArticolo . "</commentiArticolo></articolo>" . $dbParsed . "");
    }
    else
    {
        file_put_contents("../db/articoli.xml", "<?xml version=\"1.0\" encoding=\"UTF-8\"?><articoliBlog><articolo><idArticolo>" . $idArticolo . "</idArticolo><titoloArticolo>" . $titoloArticolo . "</titoloArticolo><autoreArticolo>" . $autoreArticolo . "</autoreArticolo><dataArticolo>" . $dataArticolo . "</dataArticolo><testoArticolo>" . $testoArticolo . "</testoArticolo></articolo>" . $dbParsed . "");
    }
}
adminpageClose();
?>
