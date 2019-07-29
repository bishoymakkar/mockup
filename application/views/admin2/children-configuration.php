<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Manage Configurations Of Style : {username}</title>

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<?php 
		$tab = "config";
		 ?>
		<?php require 'sidebar_header.php'; ?>
		
				
		<div class="row">
			
			<div class="col-md-12">


				<h2 class="fL design-title">
					Manage Configurations Of Style : {username}
				</h2>

				<table id='multi-image' class="table table-bordered table-striped datatable <?php if(isset($empty)) echo "dN"; ?> ">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Image</th>
						<th>Style</th>
						<th>Last Modified</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					{configs}
					<tr>
						<td>{id}</td>
						<td>{title}</td>
						<td><img src="<?php echo base_url('public/img/configurations/{img}'); ?>"></td>
						<td>{style_title} - {style_id}</td>
						<td>{modified}</td>
						<td>

							<a href="<?php echo base_url();?>Admin/Configuration/edit/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
							<!-- <a href="<?php echo base_url();?>index.php/Admin/Users/showUser/{id}" class='btn btn-default btn-sm btn-icon icon-left'> -->
								<i class='entypo-pencil'></i>
								Edit
							</a>						
							
						<a href="javascript:deleteConfig('{id}')" class='btn btn-default btn-sm btn-icon icon-left'>
						<i class='entypo-cancel'></i>
							Delete
						</a>

						<a href="<?php echo base_url();?>Admin/Layouts/ofConfiguration/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
						<i class='entypo-flow-tree'></i>
							View Layouts
						</a>

						</td>
					</tr>
					{/configs}
				</tbody>
			</table>

				<div class="c"></div>
				<p class="<?php if(!isset($empty)) echo "dN"; ?>">No Configurations Exist For This Style</p>


				<div class="c"></div>

				<a href="<?php echo base_url('Admin/Configuration/create/{styleid}'); ?>"><button class="btn btn-default">Create New Configuration for This Style</button></a>

			</div>

			

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