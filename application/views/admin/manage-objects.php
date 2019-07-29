<!DOCTYPE html>
<html lang="en">
<head>

	<title>Manage Objects</title>
    <?php require 'import_css.php'; ?>

</head>



<body  class="page-body  page-fade">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	<?php require 'sidebar_header.php'; ?>
	<h3 class="fL design-title">All Objects</h3>
	<a href="<?php echo base_url('admin/objects/view_create_standalone_object'); ?>"><button class="btn btn-primary btn-title">Create New Object</button></a>

	<div class="c">

	<?php if($this->session->flashdata('error')) echo "<p class='text-danger'>".$this->session->flashdata('error')."</p>"; ?>
	<?php if($this->session->flashdata('info')) echo "<p class='text-success'>".$this->session->flashdata('info')."</p>"; ?>


		<table class="table table-bordered table-striped datatable <?php if($objects==false) echo "dN"; ?> " id="multi-image">
			<thead>
				<tr>
					<th>ID</th>
					<th>Object Image</th>
					<th>Layout Image</th>
					<th>Title</th>
					<th>Price</th>
					<th>Manufacturer</th>
					<th>Dimensions</th>
					<th>Link</th>
					<th>Modified</th>
					<th style="width: 40%;">Actions</th>
				</tr>
			</thead>
			<tbody>
				{objects}
				<tr>
					<td>{id}</td>
					<td><img src="<?php echo base_url('public/img/objects'); ?>/{object_img}"></td>
					<td><img src="<?php echo base_url('public/img/layouts'); ?>/{layout_img}" onerror=" src='<?php echo base_url(); ?>public/img/admin_no_img.png' "></td>
					<td>{title}</td>
					<td>{price}</td>
					<td>{manufacturer}</td>
					<td>{product_width} x {product_height} x {product_depth}</td>
					<td>{link}</td>
					<td>{modified}</td>
					<td>
						<a href="<?php echo base_url();?>admin/objects/edit/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-pencil'></i>
							Edit
						</a>
						<br><br>

						<a href="<?php echo base_url();?>admin/objects/view_object_layouts/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-pencil'></i>
							View layouts
						</a>
						<br><br>

						<a href="javascript:deleteObject('{id}')" class='btn btn-default btn-sm btn-icon icon-left'>
						<i class='entypo-cancel'></i>
							Delete
						</a>
						<br><br>
						<a href="<?php echo base_url(); ?>admin/objects/view_gallery/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
						<i class='entypo-picture'></i>
							View gallery
						</a>
					</td>
				</tr>
				<?php if($objects!=false) echo '{/objects}'; ?>
				</tbody>
			</table>

			<?php if($objects==false) echo "<div class='c'></div><br>There Are No Objects"; ?>

</div>

</div>



<?php require 'import_js.php'; ?>

</body>
</html>


