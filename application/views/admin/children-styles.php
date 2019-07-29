<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Styles Of Room Type : {room_type_title}</title>

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<?php 
		$tab = "styles";
		 ?>
		<?php require 'sidebar_header.php'; ?>
		
				
		<div class="row">
			
			<div class="col-md-12">
				
				<!-- Title -->
				<h2 class="fL">
					Styles Of Room Type : {room_type_title}
				</h2>
				<a href="<?php echo base_url('admin/styles/add_room_type_style/{room_type_id}'); ?>"><button class="btn btn-primary btn-title">Create New Style For This Room Type</button></a>

				<div class="c"></div>

				<table id='multi-image' class="table table-bordered table-striped datatable <?php if(isset($empty)) echo "dN"; ?> ">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
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
						<td><img src="<?php echo base_url('public/img/styles/{img}'); ?>"></td>
						<td>{modified}</td>
						<td>

							<a href="<?php echo base_url();?>admin/styles/edit/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
							<!-- <a href="<?php echo base_url();?>index.php/Admin/Users/showUser/{id}" class='btn btn-default btn-sm btn-icon icon-left'> -->
								<i class='entypo-pencil'></i>
								Edit
							</a>						

						<a href="javascript:deleteStyle('{id}')" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-cancel'></i>
							Delete
						</a>
						
						<a href="<?php echo base_url();?>admin/configuration/ofStyle/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
						<i class='entypo-cog'></i>
							View Configurations
						</a>						

						</td>
					</tr>
					<?php if($styles!=false) echo '{/styles}'; ?>
				</tbody>
			</table>

			<?php if($styles==false) echo "<div class='c'></div><br>There Are No Styles"; ?>

			</div>

		</div>
	</div>

</div>



	<?php require 'import_js.php'; ?>

</body>
</html>