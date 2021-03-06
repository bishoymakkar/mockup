<!DOCTYPE html>
<html lang="en">
<head>

<title>Edit User</title>
    
    <?php require 'import_css.php'; ?>

</head>
<body class="page-body  page-fade">
<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	<?php $tab = "users"; require 'sidebar_header.php'; ?>
				
<div class="row">
			
<div class="col-md-12">
				
	<div class="panel panel-primary" data-collapsed="0">
				
	<div class="panel-heading">
						<div class="panel-title">
							User Information
						</div>
						
	</div>
	
	{user}
	<div class="panel-body">
						 
						<form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>admin/users/edit/{id}"  enctype="multipart/form-data">
			
							<div class="form-group">
								<label for="field-3" class="col-sm-3 control-label">Firstname</label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" name="fname" placeholder="Firstname" value="{firstname}">
								</div>
							</div>

							<div class="form-group">
								<label for="field-3" class="col-sm-3 control-label">Lastname</label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" name="lname" placeholder="Lastname" value="{lastname}">
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-3" class="col-sm-3 control-label">Username</label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" name="email" placeholder="Username" value="{email}">
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-3" class="col-sm-3 control-label">Password</label>
								
								<div class="col-sm-5">
									<input type="password" class="form-control" name="password" placeholder="Password">
								</div>
							</div>

							<div class="form-group">
								<label for="field-3" class="col-sm-3 control-label">Image</label>
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
									<input type="submit" class="btn btn-primary" name="add" value="Edit User">
								</div>
							</div>



						</form>
	</div>
	{/user}
</div>


		
		
		</div>
	</div>
</div>

	  <?php require 'import_js.php'; ?>
</body>
</html>