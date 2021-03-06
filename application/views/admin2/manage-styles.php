<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Manage Styles</title>

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
		<?php require 'sidebar_header.php'; ?>
		
				
		<div class="row">
			
			<div class="col-md-12">
				
				<!-- Title -->
				<h2 class="fL design-title">
					Manage Styles
				</h2>


				<table id='tab' class="table table-bordered table-striped datatable" id="table-2">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>User</th>
						<th>Image</th>
						<th>Last Modified</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					{styles}
					<tr>
						<td>{id}</td>
						<td>{title}</td>
						<td>{firstname} {lastname} - {user_id}</td>
						<td><img src="<?php echo base_url('public/img/styles/{img}'); ?>"></td>
						<td>{modified}</td>
						<td>

							<a href="<?php echo base_url();?>Admin/Styles/edit/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
							<!-- <a href="<?php echo base_url();?>index.php/Admin/Users/showUser/{id}" class='btn btn-default btn-sm btn-icon icon-left'> -->
								<i class='entypo-pencil'></i>
								Edit
							</a>						

						<a href="javascript:deleteStyle('{id}')" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-cancel'></i>
							Delete
						</a>
						
						<a href="<?php echo base_url();?>Admin/Configuration/ofStyle/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
						<i class='entypo-cog'></i>
							View Configurations
						</a>						

						</td>
					</tr>
					{/styles}
				</tbody>
			</table>


				<div class="c"></div>

				<a href="<?php echo base_url('Admin/Styles/create'); ?>"><button class="btn btn-default">Create New Style</button></a>

			</div>

		<footer>
			&copy; 2014 <strong>Neon</strong> Admin Theme by <a href="http://laborator.co" target="_blank">Laborator</a>
		
		</footer>

		</div>
	</div>

</div>



	<?php require 'import_js.php'; ?>

</body>
</html>