<?php
session_start();
require_once ('common/commonDatabase.php');
$command = 'articles';
if (isset($_GET['cmd']) === true) {
	$command = $_GET['cmd'];
}
if ($command === 'articles') {
	include_once('lib/articles.php');
	header('Content-Type: application/json');
	print ecc_getArticles();
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>CS DEPARTMENT SITE</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0">

<link rel="stylesheet" href="common/ui/ecc.css" type="text/css">

<script src="http://code.jquery.com/jquery-1.9.1.js"
	type="text/javascript"></script>
<script src="common/common.js" type="text/javascript"></script>
</head>

<body>
<?php
include 'common/ui/header.php';
?>
<div class="article-box">
	<div id="topic">
		<h2>
			<a href="#"></a>
		</h2>
	</div>
	<p>By: no</p>
	<hr />
	<div id="content">	 </div>
	<br /> <br />
</div>

</div>
</body>
</html>