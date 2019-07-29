<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Add styles to room type</title>

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container">
		<?php 
		$tab = "styles";
		 ?>
		<?php require 'sidebar_header.php'; ?>

		<div class="row">
			
			<div class="col-md-12">
				
				<!-- Title -->
				<h2 class="fL">
					Add styles to room type
				</h2>

				<div class="c"></div>

				<div class="row" style="margin-top: 25px;">
					<div class="col-md-5">
						<select class="form-control" id="style_id">	
							<option value="">Select style</option>
							{styles}
							<option value="{id}">{title}</option>
							{/styles}
						</select>
					</div>

					<div class="col-md-3">
						<a class="btn btn-primary" onclick="add_room_type_style({room_type_id})">Add</a>
					</div>
				</div>

			<?php if($styles==false) echo "<div class='c'></div><br>There Are No Styles"; ?>

			</div>

		</div>
</div>

</div>



	<?php require 'import_js.php'; ?>

</body>
</html>
