<?php

require_once("loginconfig.php");

/*
 * 
 * Configurazione Login Sicuro
 * 
 * Quì bisogna inserire i dati dei software che usi in modo che il login li riconosca e neghi la possobilità di eseguire un login
 * a persone che non hanno gli stessi dati eliminando così in partenza un tentativo di cracking di password da parte di software
 * automatizzati.
 * 
 */

define("SECURE_LOGIN", FALSE); /*Quì bisogna mettere lo stato del login sicuro metti TRUE per abilitarlo o FALSE per disabilitarlo,
								 se lo hai disalilitato non c' è bisogno di inserire i dati per il login sicuro quì sotto.*/

define("OS", ""); // Linux, Windows, Mac, BSD -- ricorda maiuscole e minuscole.
define("BROWSER", ""); // MSIE, Opera, Mozilla, Safari, Chrome -- ricorda maiuscole e minuscole.
define("IP", ); // Se hai un IP statico inseriscilo tra i doppi apici altrimenti scrivi NULL senza i doppi apici.
define("EMAIL_NOTIFICATION", ); // Metti TRUE per attivare le nofifiche via email altrimenti metti FALSE.
define("ADMIN_EMAIL", ""); // Se hai abilitate le notifiche via email metti la tua email altrimenti metti NULL.

/*
 * 
 * Configurazione Impostazioni Sito
 * 
 * Quì bisogna mettere tutti i dati del nostro sito come full path, url etc... e anche il titolo del sito, la descrizione etc...
 * 
 */

define("TITOLO_SITO", ""); // Quì bisogna mettere il titolo del sito.
define("DESCRIZIONE_SITO", ""); // Quì bisogna mettere la descrizione del sito.
define("KEYWORDS_SITO", ""); // Quì bisogna mettere le keyword per il sito.
define("TESTO_FOOTER", ""); // Quì bisogna mettere il testo che sarà visualizzato nel footer.
define("COMMENTI_BLOG", ); // Quì bisogna mettere TRUE se vuoi abilitare i commenti nel sito e FALSE o NULL se vuoi disabilitarli.
define("USER_DISQUS", ""); // Quì bisogna mettere il tuo shortname di Disqus.
define("URL_SITO", ""); // Quì bisogna mettere l' url del sito ad esempio http://sito.it/sf-cms/ e non dimenticare lo slash finale.
define("FULL_PATH", ""); // Quì bisogna mettere la full path del sito senza dimenticare lo slash finale ad esempio /opt/lampp/htdocs/ .
define("TEXT_FORMAT", "HTML"); // Quì bisogna mettere il linguaggio di markup del testo dei contenuti che inserirere e potete scegliere tra: HTML, BBCODE, MARKDOWN.

require_once("".FULL_PATH."style/theme.php");
?>
    
