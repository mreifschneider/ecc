<?php include '../../styles/header.php';?>
			<div class="inside" style="margin-top: -5px;">
				<!--put the content you want to display after this line-->
				<table style="margin: 100px 0px 100px 0px;">
				<tr>
						<td  valign="top">
						<ul>
							<a href="view.php" target="a_frame" class="menu-frame"  id="edit">
								View
							</a>
							<br />
							
							<a href="add_article.php" target="a_frame" class="menu-frame" id="post">
								New Post
							</a>
							<br />
							
							<a href="upload.php" target="a_frame" class="menu-frame" id="upload">
								Upload
							</a>
							<br />
							
							<a href="web_content.php" target="a_frame" class="menu-frame"  id="web_content">
								Web Content
							</a>
						</ul></td>
						<td>
<iframe class="tabbed-forms" width="800px" height="auto" name="a_frame" src="view.php" >
	
</iframe>


						</td>
					</tr>
				</table>

							<!--until this line-->

				<?php
				include '../../styles/footer.php';
				?>
