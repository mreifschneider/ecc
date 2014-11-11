<?php
/**
 * @package common
 */

$command = $paramater = null;
$eccContent = $eccContentJS = array();

$commands = array ( );

if (isset($_GET['do']) === true) {
	$paramater = $_GET['do'];
}

if (isset($_GET['cmd']) === true) {
	$command = $_GET['cmd'];
	if (is_file("sections/$command/$command.php") === true) {
		include_once ("sections/$command/$command.php");
	}
}

foreach ( $commands as $commandArray ) {
	list ( $valueCommand, $valueParamater, $valueFunction ) = $commandArray;
	if (($valueCommand === $command) && ($valueParamater === $paramater)) {
		call_user_func($valueFunction);
	}
}
if (count($eccContent) <= 0) {
	$eccContent = array('common/ui/default.html');
}


?>