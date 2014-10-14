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
		<h1>Web Design and Development</h1>
							<p>
								The Web Design and Development major is offered jointly by 
								the departments of Art and Computing Information Sciences. 
								This major provides students with a strong foundation in 
								graphic design as well as computing related skills as 
								preparation for jobs in the rapidly growing area of web 
								media design and development.
							</p>
							<p>
								Sixty-five credits, to include:
							</p>
							<p>
								Required course:	
							</p>
<br/><br/><br/>

										<?php
require ("../connect.php");

							//if (isset($_GET['id'])){$art2_id = $_GET['id'];}				
$sql="SELECT courses.course_code, courses.course_name, courses.course_des, major_has_courses.type FROM courses, majors, major_has_courses WHERE  major_has_courses.fk_majors = majors.id AND major_has_courses.fk_courses = courses.id AND major_has_courses.fk_majors = 3 AND type= 'major'" ;
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
			<br/><br/><br/>

										<p>
								Transfer students must complete a minimum of 12 credits in Art and/or CIS courses at 
								Edgewood College. All Art Department courses listed must be completed with a minimum 
								2.0 or C grade. All majors must fulfill the Senior Presentation and Critique requirement 
								in order to obtain Art Department approval for graduation.
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