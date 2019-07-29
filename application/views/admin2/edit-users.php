<!DOCTYPE html>
<html lang="en">
<head>

	<title>Create User</title>

</head>



<body >

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

		
				
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
						 
						<form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>Admin/Users/edit/{id}"  enctype="multipart/form-data">
			
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
								<label for="field-3" class="col-sm-3 control-label">Email</label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" name="email" placeholder="Email Address" value="{email}">
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
								<input type="file" name="userfile"/>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<input type="submit" class="btn btn-default" name="add" value="Edit User">
								</div>
							</div>



						</form>
	</div>
	{/user}
</div>


		
		
	</div>
</div>



	

</body>
</html>