<?php
 if($_SERVER['REQUEST_METHOD'] == "POST"){
session_start();

include 'connect.php';

$username=$_POST['username'];
$password=$_POST['password'];

$query="SELECT * FROM users WHERE Email='$username' AND Password='$password'";
$result=mysql_query($query);

$numrows=mysql_num_rows($result);

if($numrows==1){
$_SESSION['logged_in']=true;
$_SESSION['username']=$username;
$array=mysql_fetch_assoc($result);
$firstname=$array['FirstName'];
$_SESSION['FirstName']=$firstname;
$uid=$array['id'];
$_SESSION['id']=$uid;
$type=$array['type'];
$_SESSION['type']=$type;

header("Location: index.php");
}
else{
$errors = "<h5 style='color:red'>Wrong Username or Password</h5>";
}



}
?>