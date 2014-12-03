<?php
array_push($GLOBALS['commands'], array ( 'templates', 'list', 'eccTemplates_getList'), 
	array('templates','edit','eccTemplates_edit'));

function eccTemplates_getList() {

	header('Content-Type: application/json');
	die(file_get_contents('common/js/json/pages.json'));
}

function eccTemplates_edit() {
	
	$content = $_POST['html'];

	$resultArray = array('newHTML'=>$content); 
	$templateArray = json_decode(file_get_contents('common/js/json/pages.json'), true);
	$template = 'default';
	if (isset($_POST['eccTemplate']) === true) {
		$template = $_POST['eccTemplate'];
	}
	
	$templateArrayTemp = array();
	foreach ($templateArray as $tempArray) {
		if ($tempArray['ID'] == $template) {
			$tempArray['Template']= $content;
		}
		$templateArrayTemp[]=$tempArray;
	}
	
	$put = file_put_contents('common/js/json/pages.json', json_encode($templateArrayTemp));
	$resultArray = array('result',($put !== false ? 'success' : 'failure'));
	die(json_encode($resultArray));
	
}

?>