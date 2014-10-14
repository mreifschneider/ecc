<?php
/// بداية الجلسه + التأكد من تسجيل الدخول + إخفاء الفورم من هنا
session_start();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
//logged in
//echo $_SESSION['type'];
}
//else{
	//ask the user to login
//	header("Location: login.php");
// إلى هنا
//}
?>
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

		<link rel="stylesheet" href="http://cs470.comoj.com/styles/style.css" type="text/css">
		<link rel="stylesheet" href="http://cs470.comoj.com/accounts/moderators-cp/menu-cp.css" type="text/css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

		<!-- slideshow styling and script start from here -->
		<link rel="stylesheet" href="http://cs470.comoj.com/slideshow/css/craftyslide.css" />

		<!-- slideshow styling and script ends here -->
<!-- academics starts -->
		<link rel='stylesheet' type='text/css' href='/academics/styles.css' />
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
	<script type='text/javascript' src='/academics/menu_jquery.js'></script>
<!-- academics ends -->
		
		<script>
$(document).ready(function(){
  $(login_button).click(function(){
    $(divLogin).toggle();
  });
});
</script>
	</head>

	<body>
		<div class="upper-bg">
		<img  width="100%" height="100%" src="http://cs470.comoj.com/styles/img/CIS-Banner-back2.png">

		</div>
		<div class="pageborder">

			<header>
				<img class="logo" alt="logo" src="http://cs470.comoj.com/styles/img/CIS-Banner-edgewood-logo.png">
<!--				<p class="header">
					‹Computing & Information
				</p>
				<p class="header">
					Systems Department›
				</p> -->
			<img style="position:absolute;" src="http://cs470.comoj.com/styles/img/CIS-Banner-logo.png">

			</header>
				<div class="login" id="divLogin" hidden>
								<!--	<p>Hello<?php //echo $_SESSION['FirstName']; ?>, your id number is: <?php // echo $_SESSION['id']; ?></p> -->
					<form id="loginform" action="login.php"  method="post">
						<label>Email: <input style="width: 180px;" type="email" name="username" placeholder="example@edgewood.edu" required /></label>
						<label>Password: <input style="width: 180px;" type="password" name="password"/></label>
						<input type="submit"  value="Log in" id="loginBtn" onClick="startLogin()"/>
						
					</form>
				</div>	
			<nav id="navbar">
				<ul>
					<li class="active">
						<a href="http://cs470.comoj.com/index.php">Home</a>
					</li>
					<li class="has-sub">
						<a href="#">News</a>
						<ul>
							<li>
								<a href="#">Events</a>
							</li>
							<li>
								<a href="#">Blog</a>
							</li>
							<li>
								<a href="#">Alumni</a>
							</li>

						</ul>
					</li>
					<li>
						<a href="http://cs470.comoj.com/academics">Academics</a>
					</li>
					<li >
						<a href="http://cs470.comoj.com/careers.php">Careers</a>
					</li>
					<li>
						<a href="#">Faculty</a>
					</li>
					<li class="has-sub">
						<a href="#">Students</a>
						<ul>
							<li>
								<a href="#">Projects</a>
							</li>
							<li>
								<a href="#">Support</a>
							</li>
						</ul>
					</li>
					<?php	if(!isset($_SESSION['logged_in'])){ echo '<li class="active" id="login_button"><a href="#" style="background:green;" >Login</a></li>';} 
					elseif($_SESSION['logged_in']){ 
					if ($_SESSION['type']== "F") {echo '<li class="active"><a href="http://cs470.comoj.com/accounts/moderators-cp">Account</a></li>';}
					if ($_SESSION['type']== "S") {echo '<li class="active"><a href="http://cs470.comoj.com/accounts/users">Account</a></li>';}
					echo '<span style="color:white; position: absolute; top: 25px; right:40px;">Hello, ', $_SESSION['FirstName'],'</span><a style="position: absolute; top: 17px; right:250px; " href="http://cs470.comoj.com/logout.php">Logout</a>';} ?> 
					<form style="float: right; width: 250px; height: 20px;" action="search.php">
						<input type="search" name="search" />
						<input type="submit"value="Search" />
					</form>
			<?php //if($_SESSION['logged_in']==true) {echo '<a href="http://cs470.comoj.com/logout.php">Logout</a>';} ?>
				</ul>
			</nav>
