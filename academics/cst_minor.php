		<style type="text/css">
			#wrapper {
				width: 600px;
				margin: -37px 0px 0px 20px; 
				border: 1px solid #CCC;
				box-shadow: 0 1px 5px #CCC;
				border-radius: 5px;
				font-family: verdana;
				overflow: hidden;
			}
			summary { cursor: pointer;
			background: #f1f1f1;
			background-image: -webkit-linear-gradient( top, #f1f1f1, #CCC );
			background-image: -ms-linear-gradient( top, #f1f1f1, #CCC );
			background-image: -moz-linear-gradient( top, #f1f1f1, #CCC );
			background-image: -o-linear-gradient( top, #f1f1f1, #CCC );
			box-shadow: 0 1px 2px #888;
			padding: 10px;
			 color: #8A0808;

			
	}

			.no-details details > * { display: none; }

			.no-details details > summary:before { float: left; width: 20px; content: '? '; }
			.no-details details.open > summary:before { content: '? '; }
			.no-details details summary { display: block; }
			
			  #wrapper p{
    font-size: 12px;
    line-height: 175%;
    color: #333;
		</style>
		<h1>Computer Science Teaching Minor</h1>
							<p>
								The	Computer	Science	Teaching	Minor	is	part	of	a	program	
								leading to a Wisconsin initial educator license to teach 
								computer science at the level corresponding to the student’s 
								major.
							</p>
							<p>
								A	teaching	major	in	some	field	for	middle/	secondary	or	
								secondary education
							</p>
<br/><br/><br/>

										<?php
require ("../connect.php");

							//if (isset($_GET['id'])){$art2_id = $_GET['id'];}				
$sql="SELECT courses.course_code, courses.course_name, courses.course_des, major_has_courses.type FROM courses, majors, major_has_courses WHERE  major_has_courses.fk_majors = majors.id AND major_has_courses.fk_courses = courses.id AND major_has_courses.fk_majors = 4 AND type= 'minor'" ;
				$query=mysql_query($sql);			
					while($fetch=mysql_fetch_array($query)){
										$course_id = $fetch['course_code'];
										$course_name = $fetch['course_name'];
										$course_des = $fetch['course_des'];
										$course_type = $fetch['type'];
										

										?>

		<div id="wrapper"><details><summary>
<?php echo $course_id,' - ' , $course_name,'</summary>';
echo '<p>',$course_des,'</p></detalis>';
?>
</div>
					<br/><br/>



					<?php
				
				
}

			?>
										<p>
								A course on computers in education approved by the department.
							</p>
							<p>
								Completion of the Education professional requirements 
								and licensure requirements for early adolescence through 
								adolescence	(see	<a href="http://www.edgewood.edu/Portals/0/pdf/Academics/Undergrad/pdf/Education.pdf">EDUCATION</a>).	
								A	Computer	Science	Teaching	major	must	be	accepted	to	Emergent	Professional	
								Transition	before	being	admitted	to	ED	459U;	progress	
								through transition steps is recommended as early as possible.
							</p>
			 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
		<script src="jquery.details.js"></script>
		<script>
			$(function() {
				// Add conditional classname based on support
				$('html').addClass($.fn.details.support ? 'details' : 'no-details');
				// Emulate <details> where necessary and enable open/close event handlers
				$('details').details();
			});
		</script>