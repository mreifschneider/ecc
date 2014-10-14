<?php
require ("../../connect.php");

$new_topic = $_POST['topic'];
$new_content = $_POST['content'];
$id = $_POST['id'];
$sql=("UPDATE articles SET topic='$new_topic' , content='$new_content'
 where id='$id'");

$retval = mysql_query($sql);
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
echo "Updated data successfully\n";
 ?>