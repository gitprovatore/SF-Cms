<?php
require_once("config.php");
define("DISQUS_CODE", "
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
if(!empty($_GET['ID']))
{
    if(file_exists("".FULL_PATH."database/articoli/".$_GET['ID'].".json"))
    {
        $ID = strip_tags((double)$_GET['ID']);
        $getArticolo = file_get_contents("".FULL_PATH."database/articoli/".$ID.".json");
        $jsondecode = json_decode($getArticolo);
    if(COMMENTI_BLOG == TRUE)
    {
        pageOpen($jsondecode->titolo, $jsondecode->tags);
        viewArticleandComments($jsondecode->titolo, $jsondecode->testo, $jsondecode->autore, $jsondecode->data, DISQUS_CODE);
        pageClose();
    }
    elseif((COMMENTI_BLOG == FALSE) OR (COMMENTI_BLOG == NULL))
    {
        pageOpen($jsondecode->titolo, $jsondecode->tags);
        viewArticle($jsondecode->titolo, $jsondecode->testo, $jsondecode->autore, $jsondecode->data);
        pageClose();
    }
    }
    else
    {
        pageOpen("ARTICOLO NON ESISTENTE", "ARTICOLO NON ESISTENTE");
        print"<center><h1>L' ARTICOLO NON ESISTE!!!</h1></center>";
        pageClose();
    }
}
else
{
    pageOpen("Blog", "Blog");
    viewArticlelist();
    pageClose(); 
}
?>
