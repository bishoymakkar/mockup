<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Create Style</title>

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
		<?php require 'sidebar_header.php'; ?>
		
				
		<div class="row">
			
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
				<div class="panel-heading">
					<div class="panel-title">
						Create Style
					</div>					
				</div>
								
				<div class="panel-body">
					 
					<form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>Admin/Styles/create<?php if(isset($parent_id)) echo '/'.$parent_id ?> "  enctype="multipart/form-data">
		
						<div class="form-group">
							<label for="title" class="col-sm-3 control-label">Title</label>
							
							<div class="col-sm-5">
								<input type="text" class="form-control" name="title" placeholder="Title">
								<?php echo form_error('title'); ?>
							</div>
						</div>

						<div class="form-group <?php if(isset($parent_id)) echo "dN"; ?> ">
							<label for="user_id" class="col-sm-3 control-label">User</label>
							
							<div class="col-sm-5">
								<select name="user_id" class="form-control">
									{users}
										<option value="{id}">{firstname} {lastname} - {id}</option>
									{/users}				
								</select>
								<?php echo form_error('user_id'); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="userfile" class="col-sm-3 control-label">Image</label>
							<input type="file" name="userfile"/>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<input type="submit" class="btn btn-default" name="add" value="Create Style">
							</div>
						</div>

					</form>
				</div>
			</div>

				



			</div>

		<footer>
			&copy; 2014 <strong>Neon</strong> Admin Theme by <a href="http://laborator.co" target="_blank">Laborator</a>
		
		</footer>

		</div>
	</div>

</div>



	<?php require 'import_js.php'; ?>

</body>
</html>