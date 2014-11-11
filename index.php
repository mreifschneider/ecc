<?php
error_reporting(E_ALL);
session_start();
require_once ('common/common.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>CS DEPARTMENT SITE</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0">

<link rel="stylesheet" href="common/ui/ecc.css" type="text/css">

<script src="common/js/jquery-1.11.1.js" type="text/javascript"></script>
<script src="common/common.js" type="text/javascript"></script>

</head>

<body>

<?php
include 'common/ui/header.php';
?>

<div id="eccContent">
<?php 
foreach ($eccContent as $contentFile) {
	readfile($contentFile); 
}

?>
	</div>
	
	
</body>
</html>