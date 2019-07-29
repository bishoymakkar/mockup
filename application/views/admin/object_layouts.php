<!DOCTYPE html>
<html lang="en">
<head>

	<title>Manage Object Layouts</title>
    <?php require 'import_css.php'; ?>

</head>



<body  class="page-body  page-fade">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	<?php require 'sidebar_header.php'; ?>
	<h3 class="fL design-title">Manage Object Layouts</h3>
	<!-- <a href="<?php echo base_url('admin/objects/view_create_standalone_object'); ?>"><button class="btn btn-primary btn-title">Create New Object</button></a> -->

	<div class="c">

	<?php if($this->session->flashdata('error')) echo "<p class='text-danger'>".$this->session->flashdata('error')."</p>"; ?>
	<?php if($this->session->flashdata('info')) echo "<p class='text-success'>".$this->session->flashdata('info')."</p>"; ?>


		<table class="table table-bordered table-striped datatable <?php if($layouts==false) echo "dN"; ?> " id="multi-image">
			<thead>
				<tr>
					<th>ID</th>
					<th>Layout Title</th>
					<th>Layout Image</th>
					<th>Position x</th>
					<th>Position y</th>
					<th>Width</th>
					<th>Height</th>
					<th style="width: 30%;">Actions</th>
				</tr>
			</thead>
			<tbody>
				{layouts}
				<tr>
					<td>{layout_id}</td>
					<td>{layout_title}</td>
					<td><img src="<?php echo base_url('public/img/layouts'); ?>/{layout_img}" onerror=" src='<?php echo base_url(); ?>public/img/admin_no_img.png' "></td>
					<td>{pos_x}</td>
					<td>{pos_y}</td>
					<td>{frame_width}</td>
					<td>{frame_height}</td>
					<td>
						<a href="<?php echo base_url();?>admin/objects/remove_from_layout/{object_id}/{layout_id}" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-trash'></i>
							Remove from layout
						</a>
						<br><br>

						<a href="<?php echo base_url();?>admin/objects/edit_in_layout/{object_id}/{layout_id}" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-pencil'></i>
							Edit in layout
						</a>
					</td>
				</tr>
				{/layouts}
				</tbody>
			</table>

			<?php if($layouts==false) echo "<div class='c'></div><br>No layouts found containing this object"; ?>

</div>

</div>



<?php require 'import_js.php'; ?>

</body>
</html>


