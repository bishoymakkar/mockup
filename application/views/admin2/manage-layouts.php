<!DOCTYPE html>
<html lang="en">
<head>

	<title>Manage Layouts</title>
    <?php require 'import_css.php'; ?>

</head>



<body  class="page-body  page-fade">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	<?php require 'sidebar_header.php'; ?>
	<h3>All Layouts</h3>

		<table class="table table-bordered table-striped datatable" id="multi-image">
			<thead>
				<tr>
					<th>ID</th>
					<th>Layout Image</th>
					<th>Configuration Image</th>
					<th>pos_x</th>
					<th>pos_y</th>
					<th>Frame width</th>
					<th>Frame height</th>
					<th>Config ID</th>
					<th>Modified</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				{layout}
				<tr>
					<td>{id}</td>
					<td><img src="<?php echo base_url('public/img/layouts'); ?>/{layout_img}"></td>
					<td><img src="<?php echo base_url('public/img/configurations'); ?>/{configuration_img}"></td>
					<td>{pos_x}</td>
					<td>{pos_y}</td>
					<td>{frame_width}</td>
					<td>{frame_height}</td>
					<td>{configuration_id}</td>
					<td>{modified}</td>
					<td>
						<a href="<?php echo base_url();?>Admin/Layouts/edit_layout/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-pencil'></i>
							Edit
						</a>
						

						<a href="javascript:deleteLayout('{id}')" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-cancel'></i>
							Delete
						</a>


						<a href="<?php echo base_url();?>Admin/Objects/ofLayout/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
						<i class='entypo-archive'></i>
							View Objects
						</a>

							
					</td>
				</tr>
				{/layout}
			</tbody>
		</table>		


<div class="c">

				<a href="<?php echo base_url('Admin/Layouts/create'); ?>"><button class="btn btn-default">Create New Layout</button></a>

</div>

</div>



<?php require 'import_js.php'; ?>

</body>
</html>


