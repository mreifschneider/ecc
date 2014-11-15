<nav id="eccNavbar">

	<img id="eccImgEdgewoodLogo"
		src="http://www.edgewood.edu/Portals/0/Skins/ECBSCore/img/logos/ECLogo150.png" />


	<ul id="eccNavMain">

		<li class="eccNavActive"><a href="?">Home</a></li>
		<li><a href="#">News + </a>
			<ul>
				<li><a href="#">Events</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Alumni</a></li>
			</ul></li>


		<li><a href="?cmd=academics">Academics</a></li>
		<li><a href="?cmd=careers">Careers</a></li>
		<li><a href="#">Faculty</a></li>
		<li><a href="#">Students + </a>
			<ul>
				<li><a href="#">Projects</a></li>
				<li><a href="#">Support</a></li>
			</ul></li>


	</ul>
	<ul id="eccNavAdmin" style="display: none;">
		<li><a href="#">Admin</a>
			<ul>
				<li><a href="#">New User</a></li>
				<li><a href="#">New Article</a></li>
			</ul></li>
	</ul>
	<ul id="eccNavLogin">
		<li><a href="#" id="eccNavLoginLink">Log In</a></li>
	</ul>
	<ul id="eccNavUser" style="display: none;">
		<li><a href="#" id="eccNavLoggedInName"></a>
			<ul>
				<li><a href="#">Log Out</a></li>
			</ul></li>
	</ul>

	<div id="eccNavLoginDiv" style="display: none;">
		<form id="eccNavLoginForm" target="#" method="post">
			<label>Email</label><input type="email" id="eccUserEmail"
				name="eccUserEmail" placeholder="example@edgewood.edu"
				required="required" /> <br /> <label>Password</label> <input
				type="password" name="eccUserPassword" id="eccUserPassword"
				required="required" /><br />
			<button type="submit" id="eccLoginButton">Log In</button>
		</form>
		<span id="eccNavLoginStatus"></span>
	</div>

</nav>


