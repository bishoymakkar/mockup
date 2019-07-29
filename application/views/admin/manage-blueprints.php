<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Manage Blueprints

Blueprints</title>

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
		<?php require 'sidebar_header.php'; ?>
		
				
		<div class="row">
			
			<div class="col-md-12">
				
				<!-- Title -->
				<h2 class="fL blueprint-title">
					Blueprints
				</h2>


				<div class="blueprint-btn-group btn-group fR" role="group">
				  <button type="button" class="btn btn-default">Base</button>
				  <button type="button" class="btn btn-success">Stylish</button>
				  <button type="button" class="btn btn-danger">Classic</button>
				  <button type="button" class="btn btn-info">Modern</button>
				</div>

				<div class="blueprint-search form-inline form-group fR">
					<input type="text" class="form-control" placeholder="Search...">
					<button type="button" class="btn btn-default"><i class="entypo-search"></i></button>	
				</div>

				<div class="fR">
					<h4><a href="javascript:;" onclick="createBlueprintModal()" class="sm">Create a new Blueprint...</a></h4>
				</div>

				<br>

				<table class="blueprint-table table table-bordered table-hover">
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Image</th>
						<th>UserID</th>
						<th>Last Modified</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>

					<tr>
						<td>1</td>
						<td>My Room</td>
						<td><img src="<?php echo base_url(); ?>/public/img/designs/design.jpg"></td>
						<td>12</td>
						<td>10:10pm 10/10/2015</td>
						<td><a href="#">Edit</a></td>
						<td> <a href="javascript:;" onclick="deleteBlueprintConfirm(1);"> Delete</a></td>
					</tr>
					<tr>
						<td>2</td>
						<td>My Room</td>
						<td><img src="<?php echo base_url(); ?>/public/img/designs/design.jpg"></td>
						<td>12</td>
						<td>10:10pm 10/10/2015</td>
						<td><a href="#">Edit</a></td>
						<td> <a href="javascript:;" onclick="deleteBlueprintConfirm(2);"> Delete</a></td>
					</tr>
					<tr>
						<td>3</td>
						<td>My Room</td>
						<td><img src="<?php echo base_url(); ?>/public/img/designs/design.jpg"></td>
						<td>12</td>
						<td>10:10pm 10/10/2015</td>
						<td><a href="#">Edit</a></td>
						<td> <a href="javascript:;" onclick="deleteBlueprintConfirm(3);"> Delete</a></td>
					</tr>


				</table>

			&copy; 2014 <strong>Neon</strong> Admin Theme by <a href="http://laborator.co" target="_blank">Laborator</a>
		
		</footer>
	</div>

</div>

	<!-- Modal 1 Delete blueprint-->
	<div class="modal fade" id="modal-1">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Delete Blueprint</h4>
				</div>
				
				<div class="modal-body">
					Are You Sure you want to delete Blueprint No.<span></span> ?
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-danger" onclick="deleteBlueprintProccess()">Delete Blueprint</button>
				</div>

			</div>
		</div>
	</div>

	<!-- Modal 2 Create blueprint-->
	<div class="modal fade" id="modal-2">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Create Blueprint</h4>
				</div>
				
				<form method="POST" action="<?php echo base_url('admin/blueprints/createBlueprint'); ?>">

				<div class="modal-body">
					
						<div class="form-group">
							<label class="control-label" for="title">Title</label>
							<input type="text" name="title" id="title" placeholder="title" class="form-control">
						</div>

						<div class="form-group">
							<label class="control-label" for="picture">Picture</label><br>
							<button type="button" class="btn btn-info fileinput-button">
								<span class="glyphicon glyphicon-plus"></span>
								<span>Upload Image</span>
								<input id="fileupload" type="file" name="fileupload" multiple>
							</button>

							<div id="progress">
							    <div class="bar bg-success" style="width: 0%; height:18px;"></div>
							</div>

							<input hidden id="post_image" name="post_image">

							<p id="filename">

							</p>

						</div>
						<div class="form-group">
							<label class="control-label" for="user">User</label>
							<input type="text" name="user" id="user" placeholder="User Id" class="form-control">	
						</div>


				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info"> Create Blueprint</a></button>
				</div>

				</form>

			</div>
		</div>
	</div>

	<?php require 'import_js.php'; ?>

</body>
</html>