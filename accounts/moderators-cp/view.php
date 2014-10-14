<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>CS DEPARTMENT SITE</title>
		<meta name="description" content="">
		<meta name="author" content="Faisal">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/base-min.css">


		<!-- slideshow styling and script start from here -->
		<!-- slideshow styling and script ends here -->
		
<style type="text/css">
table.hovertable {
width: 800px;
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
}
table.hovertable th {
width: 150px;
	background-color:#c3dde0;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.hovertable tr {
	background-color:#d4e3e5;
}
table.hovertable td {
width: 150px;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
</style>

	</head>

	<body>
<table class="hovertable">
										<th>ID</th>
										<th>Topic</th>
										<th>Author</th>
										<th>Date</th>
										<th>Edit</th>
										<th>Delete</th>
			<?php
require ("../../connect.php");


										$sql = "SELECT articles.id,topic,FirstName,date,fk_user FROM articles,users WHERE users.id = fk_user";
$query = mysql_query($sql);

				while($fetch=mysql_fetch_array($query)){
										$art_id = $fetch['id'];
										$topic = $fetch['topic'];
										$author = $fetch['FirstName'];
										$date = $fetch['date'];
										?>
										<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
										<td><?php echo $art_id; ?></td>
										<td><?php echo $topic; ?></td>
										<td><?php echo $author; ?></td>
										<td><?php echo $date; ?></td>
										<td><?php echo '<a href="edit.php?id=',$art_id,'"><img src="../images/edit.png" /><a>' ?></td>
										<td><?php echo '<a href="delete.php?id=',$art_id,'"><img src="../images/delete.png" /><a>' ?></td>
										</tr>
<?php
}
			?>
			 
</table>
</body>
</html>