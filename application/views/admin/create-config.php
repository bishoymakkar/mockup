<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Create Configuration</title>

</head>
<body class="page-body  page-fade">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
		<?php $tab="config"; require 'sidebar_header.php'; ?>
		
				
		<div class="row">
			
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
				<div class="panel-heading">
					<div class="panel-title">
						Create Configuration
					</div>					
				</div>

				<?php if($this->session->flashdata('info')) echo "<p class='text-success'>".$this->session->flashdata('info')."</p>"; ?>
								
				<div class="panel-body">
					 
					<form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>admin/configuration/create<?php if(isset($parent_id)) echo '/'.$parent_id ?>"  enctype="multipart/form-data">
		
						<div class="form-group">
							<label for="title" class="col-sm-3 control-label">Title</label>
							
							<div class="col-sm-5">
								<input type="text" class="form-control" name="title" placeholder="Title">
								<?php echo form_error('title'); ?>
							</div>
						</div>

						<div class="form-group <?php if(isset($parent_id)) echo "dN"; ?> ">
							<label for="user_id" class="col-sm-3 control-label">Style</label>
							
							<div class="col-sm-5">
								<select name="style_id" class="form-control">
									{styles}
										<option value="{id}">{title} - {id}</option>
									{/styles}				
								</select>
								<?php echo form_error('style_id'); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="userfile" class="col-sm-3 control-label">Image</label>
							<div class="col-sm-5">
								<span class="btn btn-info btn-file">
									Upload Image<input type="file" name="userfile" onchange="$('#upload-file-info').html($(this).val());"/>
								</span>
								<span id="upload-file-info"></span>
								<?php if($this->session->flashdata('img')) echo "<p class='text-danger'>".$this->session->flashdata('img')."</p>"; ?>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<input type="submit" class="btn btn-primary" name="add" value="Create Configuration">
							</div>
						</div>

					</form>
				</div>
			</div>

				



			</div>


		</div>
	</div>

</div>



	<?php require 'import_js.php'; ?>

</body>
</html>