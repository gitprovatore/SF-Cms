<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta content="text/html; charset=ISO-8859-1"
              http-equiv="content-type">
        <title>
            <?php
            require_once("config.php");
            print"" . $titolosito . " ~ ";
            $titolohtml = htmlspecialchars($_GET['link']);
            if (isset($titolohtml)) {
                print"" . $titolohtml . "";
            } else {
                print"Home";
            }
            ?>
        </title>
        <link rel="stylesheet" type="text/css" href="style/style.scss">
        <link rel="stylesheet" type="text/css" href="style/style.min.css">
    </head>
    <body>
        <div id="menu">
            <?php
            require_once("menu.html");
            ?>
        </div>

        <div id="body">
