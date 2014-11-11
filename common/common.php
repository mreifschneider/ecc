<?php
/**
 * @package common
 */
// keep mysql credentials out of web root
require_once ('/web/database.php');
define('ECC_JSON_PATH','/web/ecc');

$database = mysqli_connect('localhost', $dbUser, $dbPass, "ECC");

if (($database === false) || ($database === null)) {
	die("Error connecting to database.  (" . mysqli_error($database) . ")");
}

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