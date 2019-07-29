<!DOCTYPE html>
<html lang="en">
<head>

	<title>Manage Objects</title>
    <?php require 'import_css.php'; ?>

</head>



<body  class="page-body  page-fade">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	<?php require 'sidebar_header.php'; ?>
	<h3>All Objects</h3>

		<table class="table table-bordered table-striped datatable" id="multi-image">
			<thead>
				<tr>
					<th>ID</th>
					<th>Object Image</th>
					<th>Layout Image</th>
					<th>Layout ID</th>
					<th>Title</th>
					<th>Price</th>
					<th>Manufacturer</th>
					<th>Dimensions</th>
					<th>Link</th>
					<th>Modified</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				{objects}
				<tr>
					<td>{id}</td>
					<td><img src="<?php echo base_url('public/img/objects'); ?>/{object_img}"></td>
					<td><img src="<?php echo base_url('public/img/layouts'); ?>/{layout_img}"></td>
					<td>{layout_id}</td>
					<td>{title}</td>
					<td>{price}</td>
					<td>{manufacturer}</td>
					<td>{product_width} x {product_height} x {product_depth}</td>
					<td>{link}</td>
					<td>{modified}</td>
					<td>
						<a href="<?php echo base_url();?>Admin/Objects/edit/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-pencil'></i>
							Edit
						</a>


						<a href="javascript:deleteObject('{id}')" class='btn btn-default btn-sm btn-icon icon-left'>
						<i class='entypo-cancel'></i>
							Delete
						</a>

							
					</td>
				</tr>
				{/objects}
			</tbody>
		</table>		


<div class="c">

				<a href="<?php echo base_url('Admin/Objects/create'); ?>"><button class="btn btn-default">Create New Object</button></a>

</div>

</div>



<?php require 'import_js.php'; ?>

</body>
</html>


