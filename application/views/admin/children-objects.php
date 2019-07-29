<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Objects of Layout : {username}</title>

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
		<?php 
		$tab = "objects";
		 ?>
		<?php require 'sidebar_header.php'; ?>
		
				
		<div class="row">
			
			<div class="col-md-12">
				
				<!-- Title -->
				<h2 class="fL">
					Objects of Layout : {username}
				</h2>
				<a href="<?php echo base_url('admin/objects/view_create_object/{layoutid}'); ?>"><button class="btn btn-primary btn-title">Create New Object For This Layout</button></a>

				<div class="c"></div>

				<div class="row">
					<div class="col-md-12">
						<h2>Assign an object to this layout</h2><br>
					</div>
				</div>

				<div class="row">
					<div class="col-md-9">
						<select class="form-control" id="obj_id_select">
							<option value="">Select an object from the list</option>
							{allobjects}
							<option value="{id}">{title}</option>
							{/allobjects}
						</select>
					</div>

					<div class="col-md-3">
						<a class="btn btn-primary" onclick="assign_object_to_layout( {layoutid} )">Assign</a>
					</div>
				</div>

				<br>


				<table class="table table-bordered table-striped datatable <?php if(isset($empty)) echo "dN"; ?> " id="multi-image">
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
						<a href="<?php echo base_url();?>admin/objects/edit_in_layout/{id}/{layout_id}" class='btn btn-default btn-sm btn-icon icon-left'>
							<i class='entypo-pencil'></i>
							Edit
						</a>

						<a href="javascript:deleteObjectFromLayout('{id}', '{layout_id}')" class='btn btn-default btn-sm btn-icon icon-left'>
						<i class='entypo-cancel'></i>
							Delete
						</a>
						 							
					</td>
				</tr>
				<?php if($objects!=false) echo '{/objects}'; ?>
				</tbody>
			</table>

			<?php if($objects==false) echo "<div class='c'></div><br>There Are No Objects"; ?>

			</div>

		</div>
	</div>

</div>



	<?php require 'import_js.php'; ?>

</body>
</html>