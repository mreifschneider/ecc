

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


		<!-- slideshow styling and script start from here -->
		<!-- slideshow styling and script ends here -->
		<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>

<script>
tinymce.init({
    selector: "textarea#elm1",
    theme: "modern",
    width: 780,
    height: 200,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "/css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
</script>

	</head>

	<body>
					<div class="article">


								<form action="add_q.php" method="post"  enctype="multipart/form-data">

						<label>
							<p>
								Topic Name:
								<input type="text" name="topic" style="width:300px;"/>
							</p></label>

						<p>
							Include image for the article:
							<input type="file" name="img"  accept="image/*" />
						</p>
						<label>
						<textarea id="elm1" name="area">
						</textarea></label>
						<br />

						<input type="submit" value="SEND" name="submit" style="width:50px; height:30px;" />
					</form>
									
				</div>
</body>
</html>