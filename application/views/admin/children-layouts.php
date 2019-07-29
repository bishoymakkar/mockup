<!DOCTYPE html>
<html lang="en">
<head>

	<title>Manage Layouts</title>
    <?php require 'import_css.php'; ?>

</head>



<body  class="page-body  page-fade">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	<?php require 'sidebar_header.php'; ?>
	<h3 class="fL design-title"><i>{area_title}</i> Layouts</h3>
	<a href="<?php echo base_url(); ?>admin/layouts/view_create_layout/{area_id}"><button class="btn btn-primary btn-title">Create New Layout</button></a>

	<div class="row">
					<div class="col-md-12">
						<h2>Assign a layout to this area</h2><br>
					</div>
				</div>

				<div class="row">
					<div class="col-md-9">
						<select class="form-control" id="layout_id_select">
							<option value="">Select a layout from the list</option>
							{alllayouts}
							<option value="{id}">{title}</option>
							{/alllayouts}
						</select>
					</div>

					<div class="col-md-3">
						<a class="btn btn-primary" onclick="assign_layout_to_area( {area_id} )">Assign</a>
					</div>
				</div>

				<br>

	<div class="c"></div>

	<?php if($this->session->flashdata('error')) echo "<p class='text-danger'>".$this->session->flashdata('error')."</p>"; ?>
	<?php if($this->session->flashdata('info')) echo "<p class='text-success'>".$this->session->flashdata('info')."</p>"; ?>


		<table id='multi-image' class="table table-bordered table-striped datatable <?php if($layout==false) echo "dN"; ?>">
			<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Layout Image</th>
					<!-- <th>Configuration Image</th> -->
					<!-- <th>Config area ID</th> -->
					<th>Modified</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				{layout}
				<tr>
					<td>{id}</td>
					<td>{title}</td>
					<td><img src="<?php echo base_url('public/img/layouts'); ?>/{img}"></td>
					<!-- <td><img src="<?php echo base_url('public/img/configurations'); ?>/{configuration_img}"></td> -->
					<!-- <td>{configuration_area_id}</td> -->
					<td>{modified}</td>
					<td>
						<a href="<?php echo base_url();?>admin/layouts/edit_layout/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-pencil'></i>
							Edit
						</a>
						

						<a href="javascript:deleteLayout('{id}', '{configuration_area_id}')" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-cancel'></i>
							Delete
						</a>


						<a href="<?php echo base_url();?>admin/objects/ofLayout/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
						<i class='entypo-archive'></i>
							View Objects
						</a>

							
					</td>
				</tr>
					{/layout}
				</tbody>
			</table>

			<?php if($layout==false) echo "<div class='c'></div><br>There Are No Layouts"; ?>

</div>

</div>



<?php require 'import_js.php'; ?>

</body>
</html>


