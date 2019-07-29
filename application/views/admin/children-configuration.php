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


				<h2 class="fL">
					Manage Configurations Of Style : {username}
				</h2>
				<a href="<?php echo base_url('admin/configuration/create/{styleid}'); ?>"><button class="btn btn-primary btn-title">Create New Configuration for This Style</button></a>

				<div class="c"></div>

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

							<a href="<?php echo base_url();?>admin/configuration/edit/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
							<!-- <a href="<?php echo base_url();?>index.php/Admin/Users/showUser/{id}" class='btn btn-default btn-sm btn-icon icon-left'> -->
								<i class='entypo-pencil'></i>
								Edit
							</a>						
							
						<a href="javascript:deleteConfig('{id}')" class='btn btn-default btn-sm btn-icon icon-left'>
						<i class='entypo-cancel'></i>
							Delete
						</a>

						<a href="<?php echo base_url();?>admin/configuration/view_areas/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
						<i class='entypo-flow-tree'></i>
							View areas
						</a>

						</td>
					</tr>
					<?php if($configs!=false) echo '{/configs}'; ?>
				</tbody>
			</table>

			<?php if($configs==false) echo "<div class='c'></div><br>There Are No Configurations"; ?>


			</div>

			</div>


		</div>
	</div>

</div>



	<?php require 'import_js.php'; ?>

</body>
</html>