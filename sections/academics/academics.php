<?php
$eccContent = array ( 'sections/academics/ui/default.html');
array_push($GLOBALS['commands'], array ( 'academics', 'major_list', 'eccAcademics_getMajorList'));

function eccAcademics_getMajorList() {

	header('Content-Type: application/json');
	
	print file_get_contents('common/js/json/majors.json');
	die();
}
?>