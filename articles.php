										<?php

							//if (isset($_GET['id'])){$art2_id = $_GET['id'];}				
$sql="SELECT articles.id, topic, content, date,image_name, fk_user, FirstName FROM articles,users WHERE users.id = fk_user";
				$query=mysql_query($sql);			
					while($fetch=mysql_fetch_array($query)){
										$art_id = $fetch['id'];
										$img_name = $fetch['image_name'];
										$topic = $fetch['topic'];
										$content = $fetch['content'];
										$author = $fetch['FirstName'];
										$date = $fetch['date'];

										?><div class="article-box"> <?php
						  if ($img_name!=NULL){echo '<img class="articleimg" src="images/',$img_name,'" />';}
					?> 
					<div id="topic"><h2><?php echo "<a href='view_article.php?id=",$art_id,"'>"; ?><?php echo $topic;?> </a></h2></div>
					<p>By: <?php echo $author; ?><br/>Date: <?php echo $date; ?></p>
					<hr />
					<div id="content">	<?php echo SUBSTR($content,0,STRPOS($content,".",200)+1).".. <a href='view_article.php?id=".$fetch['id']."'><b>read more</b></a>";
?></div>
					<br/><br/></div>



					<?php
				
				
}

			?>
			 
