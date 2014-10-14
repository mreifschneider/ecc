<?php 

require("connect.php");

$sql="SELECT articles.id,fk_student,topic,content,FirstName,image_name FROM articles,users WHERE users.id = fk_student";
$query=mysql_query($sql);


		include 'styles/header.php';?>

		<div class="top-banner">
<?php include 'slideshow/slideshow.html';?>
<iframe class="vid" width="330" height="250" src="//www.youtube.com/embed/nzSIjfZlOpY" frameborder="0" allowfullscreen></iframe>
		</div> 
		<div class="inside">

<!--put the content you want to display after this line-->



<!--until this line-->


	<?php include 'styles/footer.php';?>
		