<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Manage Configurations</title>

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
		<?php require 'sidebar_header.php'; ?>
		
				
		<div class="row">
			
			<div class="col-md-12">
				
				<!-- Title -->
				<h2 class="fL">
					Manage Configuration
				</h2>
				<a href="<?php echo base_url('admin/configuration/view_create_conf_area/{conf_id}'); ?>"><button class="btn btn-primary btn-title">Create New Configuration Area</button></a>

				<div class="c"></div>

				<?php if($this->session->flashdata('error')) echo "<p class='text-danger'>".$this->session->flashdata('error')."</p>"; ?>
				<?php if($this->session->flashdata('info')) echo "<p class='text-success'>".$this->session->flashdata('info')."</p>"; ?>

				<table id='multi-image' class="table table-bordered table-striped datatable <?php if($areas==false) echo "dN"; ?>">
				<thead>
					<tr>
						<th>ID</th>
						<th>title</th>
						<th>posX</th>
						<th>posY</th>
						<th>width</th>
						<th>height</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					{areas}
					<tr>
						<td>{id}</td>
						<td>{title}</td>
						<td>{pos_x}</td>
						<td>{pos_y}</td>
						<td>{width}</td>
						<td>{height}</td>
						<td>
							<a href="<?php echo base_url();?>admin/layouts/view_area_layouts/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
								<i class='entypo-list'></i>
									View layouts
							</a>

							<a href="<?php echo base_url();?>admin/configuration/edit_area/{id}" class='btn btn-default btn-sm btn-icon icon-left'>
								<i class='entypo-pencil'></i>
									Edit
							</a>						

							<a href="javascript:deleteConfigArea('{id}')" class='btn btn-default btn-sm btn-icon icon-left'>
								<i class='entypo-cancel'></i>
								Delete
							</a>	
						</td>
					</tr>
					{/areas}
				</tbody>
			</table>

			<?php if($areas==false) echo "<div class='c'></div><br>There Are No Configuration Areas"; ?>

			</div>


		</div>
	</div>

</div>



	<?php require 'import_js.php'; ?>

</body>
</html>