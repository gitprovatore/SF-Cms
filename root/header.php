<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta content="text/html; charset=ISO-8859-1"
              http-equiv="content-type">
        <title>
            <?php
            require_once("../config.php");
            print"" . $titolosito . "~ Admin Panel";
            ?>
        </title>
        <link rel="stylesheet" type="text/css" href="../style/style.scss">
        <link rel="stylesheet" type="text/css" href="../style/style.min.css">
    </head>
    <body>
        <div id="menu">
            <div class="element"><a href="index.php">Admin Home</a></div>
            <div class="element"><a href="inserisci_articolo.php">Inserisci Articolo</a></div>
            <div class="element"><a href="inserisci_pagina.php">Inserisci Pagina</a></div>
            <div class="element"><a href="modifica_home.php">Modifica Home</a></div>
            <div class="element"><a href="modifica_menu.php">Modifica Menu</a></div>
        </div>
        <div id="body">
