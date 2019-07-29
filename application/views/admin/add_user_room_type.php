<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Add Room Types to User</title>

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container">
		<?php 
		$tab = "room_types";
		 ?>
		<?php require 'sidebar_header.php'; ?>

		<div class="row">
			
			<div class="col-md-12">
				
				<!-- Title -->
				<h2 class="fL">
					Add Room Types to User
				</h2>

				<div class="c"></div>

				<div class="row" style="margin-top: 25px;">
					<div class="col-md-5">
						<select class="form-control" id="room_type_id">	
							<option value="" disabled selected>Select Room Type</option>
							{room_types}
							<option value="{id}">{title}</option>
							{/room_types}
						</select>
					</div>

					<div class="col-md-3">
						<a class="btn btn-primary" onclick="add_user_room_type({user_id})">Add</a>
					</div>
				</div>

			<?php if($room_types==false) echo "<div class='c'></div><br>There Are No Styles"; ?>

			</div>

		</div>
</div>

</div>



	<?php require 'import_js.php'; ?>

</body>
</html>
