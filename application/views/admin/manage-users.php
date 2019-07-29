<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Manage Users</title>

</head>
<body class="page-body  page-fade">
<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

	<?php require 'sidebar_header.php'; ?>
	
	<h3 class="fL">Manage Users </h3> <a href="<?php echo base_url('admin/users/create'); ?>"><button class="btn btn-primary btn-title fL">Create New User</button></a>

	<div class="c"></div>

	<?php if($this->session->flashdata('error')) echo "<p class='text-danger'>".$this->session->flashdata('error')."</p>"; ?>
	<?php if($this->session->flashdata('info')) echo "<p class='text-success'>".$this->session->flashdata('info')."</p>"; ?>

		<table class="table table-bordered table-striped datatable <?php if($users==false) echo 'dN'; ?>" id="multi-image">
			<thead>
				<tr>
					<th>ID</th>
					<th>Image</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Username</th>
					<th>Password</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				{users}
				<tr>
					<td>{id}</td>
					<td><img src="<?php echo base_url('public/img/designs');?>/{img}"></td>
					<td>{firstname}</td>
					<td>{lastname}</td>
					<td>{email}</td>
					<td>{password}</td>
					<td>

						<a href="<?php echo base_url();?>admin/users/edit/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
						<!-- <a href="<?php echo base_url();?>index.php/Admin/Users/showUser/{id}" class='btn btn-default btn-sm btn-icon icon-left'> -->
							<i class='entypo-pencil'></i>
							Edit
						</a>

						<a href="javascript:deleteUser('{id}')" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-cancel'></i>
							Delete
						</a>

						<a href="<?php echo base_url();?>admin/room_types/ofUser/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-brush'></i>
							View Room Types
						</a>						

						
					</td>
				</tr>
				<?php if($users!=false) echo '{/users}'; ?>
			</tbody>
		</table>	

		<?php if($users==false) echo "<div class='c'></div><br>There Are No Users"; ?>

			</div>			

</div>

<?php require 'import_js.php'; ?>

</body>
</html>

