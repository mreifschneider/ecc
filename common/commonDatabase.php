<?php
/**
 * @package common
 */
// keep mysql credentials out of web root
require_once ('/web/database.php');

$database = mysqli_connect ( 'localhost', $dbUser, $dbPass, "ECC" );

if (($database === false) || ($database === null)) {
	die ( "Error connecting to database.  (" . mysqli_error ( $database ) . ")" );
}

?>