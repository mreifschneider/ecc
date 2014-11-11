<?php

array_push($GLOBALS['commands'], array ( 'articles', 'list', 'ecc_getArticles'));

function ecc_getArticles() {

	header('Content-Type: application/json');
		
	print file_get_contents('/web/ecc/articles.json');
	exit();
}

?>