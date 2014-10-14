<?php include '../styles/header.php';?>
			<div class="inside" style="margin-top: -5px;">
				<!--put the content you want to display after this line-->
				<table style="margin: 100px 0px 100px 0px;">
				<tr>
						<td  valign="top">

<div id='cssmenu'>
<ul>
   <li class='active'><a href='#'><span>Academics</span></a></li>
   <li class='has-sub'><a href='#'><span>Majors</span></a>
      <ul>
         <li><a href='cis_major.php' target="a_frame" ><span>Computer Information Systems</span></a></li>
         <li><a href='bcis.php' target="a_frame"><span>Business/Computer Information Systems</span></a></li>
         <li><a href='wdd_major.php' target="a_frame"><span>Web Design and Development</span></a></li>
         <li class='last'><a href='cst_major.php' target="a_frame"><span>Computer Science Teaching</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Minors</span></a>
      <ul>
         <li><a href='cis_minor.php' target="a_frame" ><span>Computer Information Systems</span></a></li>
         <li><a href='cs_minor.php' target="a_frame" ><span>Computer Science</span></a></li>
         <li class='last'><a href='cst_minor.php' target="a_frame" ><span>Computer Science Teaching</span></a></li>
      </ul>
   </li>

</ul>
</div>

</td>
						<td>
<iframe class="tabbed-forms" width="800px" height="auto" name="a_frame" src="#" >
	
</iframe>


						</td>
					</tr>
				</table>

							<!--until this line-->

				<?php
				include '../styles/footer.php';
				?>
