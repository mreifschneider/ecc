<?php
$con = mysql_connect("mysql5.000webhost.com","a2008224_root","1q2w3e4r");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("a2008224_cs480", $con);
?>
