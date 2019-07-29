<!DOCTYPE html>
<html lang="en">
<head>

	<title>Create User</title>
 <script src = "<?php echo base_url();?>public/js/user.js"></script>

</head>



<body>

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

	<h3>Manage Users</h3>

		<table class="table table-bordered table-striped datatable" id="multi-image">
			<thead>
				<tr>
					<th>ID</th>
					<th>Image</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Email</th>
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

						<a href="<?php echo base_url();?>Admin/Users/edit/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
						<!-- <a href="<?php echo base_url();?>index.php/Admin/Users/showUser/{id}" class='btn btn-default btn-sm btn-icon icon-left'> -->
							<i class='entypo-pencil'></i>
							Edit
						</a>

						<a href="javascript:deleteUser('{id}')" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-cancel'></i>
							Delete
						</a>

						<a href="<?php echo base_url();?>Admin/Styles/ofUser/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-brush'></i>
							View Styles
						</a>						

						
					</td>
				</tr>
				{/users}
			</tbody>
		</table>	















	       <div class="c">

				<a href="<?php echo base_url('Admin/Users/create'); ?>"><button class="btn btn-default">Create New User</button></a>

			</div>			

</div>



	

</body>
</html>


