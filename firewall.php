<?php

foreach ($_GET as $getRequest) {
    if ((preg_match("/[:alpha:]/i", $getRequest)) OR (preg_match("/[:punct:]/i", $getRequest))) {
        print"<h1>YOU FAIL STUPID LAMER!!!</h1>";
    }
}