<?php
session_start ();
require_once ('common/commonDatabase.php');

if (isset($_GET['cmd']) === true) {
	$command = $_GET['cmd'];
}

$sql = "SELECT articles.id,fk_student,topic,content,FirstName,image_name FROM articles,users WHERE users.id = fk_student";
$query = mysql_query ( $sql );

include 'styles/header.php';

?>

<div class="top-banner">
<?php include 'slideshow/slideshow.html';?>
<iframe class="vid" width="330" height="250"
		src="https://docs.google.com/file/d/0Bw47NyVoMxg5X0plVlBLeW8tdmc/preview"
		frameborder="0" allowfullscreen></iframe>
</div>
<div class="inside">


	<div class="aside">

<?php include 'styles/calender.php'?>

			</div>
	<br />
	<br />
	<br />

	<div class="article">


										<?php
										
										include 'articles.php';
										?>
			 
 			</div>

</div>

<?php include 'styles/footer.php';?>
		