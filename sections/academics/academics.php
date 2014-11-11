<?php
$eccContent = array ( 'academics/default.php');
array_push($GLOBALS['commands'], array ( 'academics', 'major_list', 'eccAcademics_getMajorList'));

function eccAcademics_getMajorList() {

	header('Content-Type: application/json');
	
	print file_get_contents('/web/ecc/majors.json');
	die();
}
?>