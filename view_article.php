<?php
require ("connect.php");
if(isset($_GET['id'])) {$art_id=$_GET['id'];
}
//$sql="select * from articles where id='$art_id;'";
$query=mysql_query("SELECT articles.id,fk_user,topic,content,date,FirstName,image_name FROM articles,users WHERE users.id = fk_user AND articles.id='$art_id'");
$fetch=mysql_fetch_array($query);
$img_name=$fetch['image_name'];
$topic=$fetch['topic'];
$content=$fetch['content'];
$author = $fetch['FirstName'];
$date = $fetch['date'];
	include 'styles/header.php';?>

		<div class="top-banner">
<?php include 'slideshow/slideshow.html';?>
<iframe class="vid" width="330" height="250" src="//www.youtube.com/embed/nzSIjfZlOpY" frameborder="0" allowfullscreen></iframe>
		</div> 
		<div class="inside">


			<div class="aside">

<?php include 'styles/calender.php'?>

			</div>
			 <br/><br/><br/>


			<div class="article">


			<div class="article-box"> <?php
			if($img_name!=NULL) {echo '<img class="articleimg" src="images/',$img_name,'" />';
			}?> 
								<div id="topic"><h2><?php echo $topic;?></h2></div>
					<p>By: <?php echo $author; ?><br/>Date: <?php echo $date; ?></p>
					<hr />
					<div id="content">	<?php echo $content; ?></div>
					<br/><br/>

	
 			</div>

		</div>

	<?php
	include 'styles/footer.php';
?>
	