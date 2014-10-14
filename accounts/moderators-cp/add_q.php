<?php 
require ("../../connect.php");
				session_start();

				
				$topic = $_POST['topic'];
				$content= $_POST['area'];
				$uid= $_SESSION['id'];
				// image upload option
				$dir_name =dirname(__FILE__)."../../../images/";
				$image_path = $_FILES['img']['tmp_name'];
				$image_name = $_FILES['img']['name'];
				
				if($_POST['submit']){
				move_uploaded_file($image_path,$dir_name.$image_name);
				}
				

				
				$sql="insert into articles (id,topic,content,date,image,image_name,type,fk_user) value ('','".$topic."','".$content."','".date("Y-m-d")."','".$image_path."','".$image_name."',
				'home',
				'".$uid."');";
$query = mysql_query($sql);
if(! $query )
{
  die('Could not update data: ' . mysql_error());
}
else if ($query == true){
echo "The article posted successfully\n";
}			
				?>