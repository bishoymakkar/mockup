<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Styles Of User : {username}</title>

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<?php 
		$tab = "room_types";
		 ?>
		<?php require 'sidebar_header.php'; ?>
		
				
		<div class="row">
			
			<div class="col-md-12">
				
				<!-- Title -->
				<h2 class="fL">
					Room Types Of User : {username}
				</h2>
				<a href="<?php echo base_url('admin/room_types/add_user_room_type/{userid}'); ?>"><button class="btn btn-primary btn-title">Create New Rooom Type For This User</button></a>

				<div class="c"></div>

				<table id='multi-image' class="table table-bordered table-striped datatable <?php if(isset($empty)) echo "dN"; ?> ">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Image</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					{room_types}
					<tr>
						<td>{id}</td>
						<td>{title}</td>
						<td><img src="<?php echo base_url('public/img/room_types/{image}'); ?>"></td>
						<td>

							<a href="<?php echo base_url();?>admin/room_types/edit/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
							<!-- <a href="<?php echo base_url();?>index.php/Admin/Users/showUser/{id}" class='btn btn-default btn-sm btn-icon icon-left'> -->
								<i class='entypo-pencil'></i>
								Edit
							</a>						

						<a href="javascript:deleteRoomType('{id}')" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-cancel'></i>
							Delete
						</a>
						
						<a href="<?php echo base_url();?>admin/styles/ofRoomTypes/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
						<i class='entypo-cog'></i>
							View Styles
						</a>						

						</td>
					</tr>

					<?php if($room_types!=false) echo '{/room_types}'; ?>
				</tbody>
			</table>

			<?php if($room_types==false) echo "<div class='c'></div><br>There Are No Room Types for this User"; ?>

			</div>

		</div>
	</div>

</div>



	<?php require 'import_js.php'; ?>

</body>
</html>