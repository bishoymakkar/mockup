<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Manage Styles</title>

</head>
<body class="page-body  page-fade">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
		<?php require 'sidebar_header.php'; ?>
		
				
		<div class="row">
			
			<div class="col-md-12">
				
				<!-- Title -->
				<h2 class="fL">
					Manage Styles
				</h2>
				<a href="<?php echo base_url('admin/styles/view_create_style'); ?>"><button class="btn btn-primary btn-title fL">Create New Style</button></a>

				<div class="c"></div>

				<?php if($this->session->flashdata('error')) echo "<p class='text-danger'>".$this->session->flashdata('error')."</p>"; ?>
				<?php if($this->session->flashdata('info')) echo "<p class='text-success'>".$this->session->flashdata('info')."</p>"; ?>

				<table id='multi-image' class="table table-bordered table-striped datatable <?php if($styles==false) echo "dN"; ?>">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<!-- <th>User</th> -->
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
						<!-- <td>{firstname} {lastname} - {user_id}</td> -->
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
					{/styles}
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