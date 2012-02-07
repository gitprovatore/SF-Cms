<?php

foreach ($_GET as $getRequest) {
    if (($getRequest != $_GET['SEO']))
	{
	continue;
	}
	elseif((@preg_match("/[:alpha:]/i", $getRequest)) OR (@preg_match("/[:punct:]/i", $getRequest)))
	{
        die(print"<h1>YOU FAIL STUPID LAMER!!!</h1>");
    }
}
?>
