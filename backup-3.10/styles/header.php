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

		<link rel="stylesheet" href="styles/style.css" type="text/css">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<!-- slideshow styling and script start from here -->
		<link rel="stylesheet" href="slideshow/css/craftyslide.css" />

		<!-- slideshow styling and script ends here -->

	</head>

	<body>
		<div class="upper-bg"></div>
		<div class="pageborder">

			<header>
				<img class="logo" alt="logo" src="http://studentserver.org/csg1/Images/logoOriginal%20(1).png">
				<p class="header">
					‹Computing & Information
				</p>
				<p class="header">
					Systems Department›
				</p>
			</header>

			<nav id="navbar">
				<ul>
					<li class="active">
						<a href="index.php">Home</a>
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
						<a href="#">About</a>
					</li>
					<li >
						<a href="careers.php">Careers</a>
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
					<p style="color:white; float:right;">
						<?php
						if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {echo 'Hello, ', $_SESSION['FirstName'];
						}
					?>
					</p>

					<form style="text-align: right; padding: 10px;" action="search.php">
						<input type="search" name="search" />
						<input type="submit"
						value="Search" />
					</form>
				</ul>
			</nav>
