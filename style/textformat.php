<?php

function formatText($textString)
{
	if(TEXT_FORMAT == "HTML")
	{
		html_entity_decode(stripslashes($textString));
		return $textString;

	}
	elseif(TEXT_FORMAT == "BBCODE")
	{
		$textString = html_entity_decode(stripslashes($textString));
		$textString = str_replace("[h1]", "<h1>", $textString);
		$textString = str_replace("[/h1]", "</h1>", $textString);
		$textString = str_replace("[h2]", "<h2>", $textString);
		$textString = str_replace("[/h2]", "</h2>", $textString);
		$textString = str_replace("[br]", "<br />", $textString);
		$textString = str_replace("[hr]", "<hr>", $textString);
		$textString = str_replace("[p]", "<p>", $textString);
		$textString = str_replace("[/p]", "</p>", $textString);
		$textString = str_replace("[b]", "<b>", $textString);
		$textString = str_replace("[/b]", "</b>", $textString);
		$textString = str_replace("[i]", "<i>", $textString);
		$textString = str_replace("[/i]", "</i>", $textString);
		$textString = str_replace("[u]", "<u>", $textString);
		$textString = str_replace("[/u]", "</u>", $textString);
		$textString = str_replace("[right]", "<div style=\"text-align: right;\">", $textString);
		$textString = str_replace("[/right]", "</div>", $textString);
		$textString = str_replace("[left]", "<div style=\"text-align: left;\">", $textString);
		$textString = str_replace("[/left]", "</div>", $textString);
		$textString = str_replace("[center]", "<center>", $textString);
		$textString = str_replace("[/center]", "</center>", $textString);
		$textString = str_replace("[li]", "<ul><li>", $textString);
		$textString = str_replace("[/li]", "</li></ul>", $textString);
		$textString = str_replace("[code]", "<code>", $textString);
		$textString = str_replace("[/code]", "</code>", $textString);
		$textString = str_replace("[img]", "<img src=\"", $textString);
		$textString = str_replace("[/img]", "\">", $textString);
		$textString = preg_replace ("/\[url\=\"(.*?)\"\](.*?)\[\/url\]/is", "<a href=\"$1\">$2</a>", $textString);
		$textString = preg_replace ("/\[youtube\](.*?)\[\/youtube\]/is", "<br /><iframe title=\"YouTube video player\" width=\"480\" height=\"390\" src=\"http://www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>", $textString); // code by KinG-InFeT
		return $textString;
	}
	elseif(TEXT_FORMAT == "MARKDOWN")
	{
		$textString = html_entity_decode(stripslashes($textString));
		$textString = preg_replace ("/#(.*?)#/is", "<h1>$1</h1>", $textString);
		$textString = preg_replace ("/##(.*?)##/is", "<h2>$1</h2>", $textString);
		$textString = preg_replace ("/###(.*?)###/is", "<h3>$1</h3>", $textString);
		$textString = preg_replace ("/####(.*?)####/is", "<h4>$1</h4>", $textString);
		$textString = preg_replace ("/#####(.*?)#####/is", "<h5>$1</h5>", $textString);
		$textString = preg_replace ("/######(.*?)######/is", "<h6>$1</h6>", $textString);
		$textString = str_replace("  ", "<br />", $textString);
		$textString = str_replace("----------", "<hr>", $textString);
		$textString = preg_replace ("/\*(.*?)\*/is", "<i>$1</i>", $textString);
		$textString = preg_replace ("/\*\*(.*?)\*\*/is", "<b>$1</b>", $textString);
		$textString = preg_replace ("/\>(.*?)\^/is", "<blockquote>$1</blockquote>", $textString);
		$textString = preg_replace ("/\'(.*?)'/is", "<code>$1</code>", $textString);
		$textString = preg_replace ("/\[(.*?)\]\((.*?)\)/is", "<a href=\"$2\">$1</a>", $textString);
		$textString = preg_replace ("/\- (.*?)\*/is", "<ul><li>$1</li></ul>", $textString);
		return $textString;
	}
	else
	{
		die(print"<h1>Formato del Testo non Valido!!!</h1>");
	}
}

?>
