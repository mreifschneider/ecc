<?php
array_push($GLOBALS['commands'], array ( 'articles', 'list', 'ecc_getArticles'));

function ecc_getArticles() {

	header('Content-Type: application/json');
	die(file_get_contents('common/js/json/articles.json'));
}

?>