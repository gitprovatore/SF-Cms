<?php
require_once("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
        <title>
<?php
print"" . $titoloSito . "";
if(isset($_GET['seo']))
{
print" - ".strip_tags($_GET['seo'])."";
}
?>
        </title>
		<meta name="DESCRIPTION" content="<?php print"".$descrizioneSito.""; ?>" />
		<meta name="KEYWORDS" content="<?php print"".$keywordSito.""; ?>" />
        <link rel="stylesheet" type="text/css" href="style/style.scss">
        <link rel="stylesheet" type="text/css" href="style/style.min.css">
    </head>
    <body>
        <div id="menu">
            <?php
            require_once("db/index.html");
            ?>
        </div>

        <div id="body">
