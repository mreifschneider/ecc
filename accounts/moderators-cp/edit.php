<?php
require ("../../connect.php");
if(isset($_GET['id'])) {$art_id=$_GET['id'];
}
//$sql="select * from articles where id='$art_id;'";
$query=mysql_query("SELECT id, topic, content FROM articles WHERE  id='$art_id'");
$fetch=mysql_fetch_array($query);
$topic=$fetch['topic'];
$content=$fetch['content'];
$id=$fetch['id'];
?>

					<form method="post" action="edit-q.php">

						<label>
							<p>
								Topic:
								<input type="text" name="topic" value="<?php echo $topic; ?>"/>
								<input type="hidden" name="id" value="<?php echo $id; ?>"/>
							</p></label>
						<label>
							<p>
								Content:
							</p>							<textarea name="content" rows="5" cols="50"> <?php echo $content; ?>
						</textarea></label>
						<br />

						<input type="submit" value="Post" />
					</form>
