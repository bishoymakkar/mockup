<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Create Configuration Area</title>

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
   	<?php require 'sidebar_header.php'; ?>   
      <div class="row">
        
        <div class="col-md-12">
          
          <div class="panel panel-primary" data-collapsed="0">
            
            <div class="panel-heading">
              <div class="panel-title">
                Create Configuration Area
              </div>  
            </div>
            
            <!-- {config} -->
            <div class="panel-body">
              
              <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>admin/configuration/create_conf_area/{conf_id}"  enctype="multipart/form-data">
  
  					<div class="form-group">
			        	<label class="col-sm-3 control-label">Image Mapping</label>
			          
			          	<div class="col-sm-5" id="image-mapper" onclick="initImageAreaCreate()">
			              	<img src="<?php echo base_url(); ?>public/img/configurations/{conf_img}" id="targetImg" style="width: 360px; height: 277px;">
			          	</div>
			        </div>

			        <div class="form-group">
						<label for="title" class="col-sm-3 control-label">Title</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="title" placeholder="Title">
						</div>
					</div>
			        
					<div class="form-group">
						<label for="title" class="col-sm-3 control-label">PosX</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="pos_x" placeholder="Left position">
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-3 control-label">PosY</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="pos_y" placeholder="Top position">
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-3 control-label">Width</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="width" placeholder="Width">
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-3 control-label">Height</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="height" placeholder="Height">
						</div>
					</div>

						
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<input type="submit" class="btn btn-primary" name="add" value="Create Area">
							</div>
						</div>
  
  
  
      		</form>
      	</div>
      	<!-- {/config} -->
  </div>
  
  
  
  
  </div>
  </div>
  
  
  
  	<?php require 'import_js.php'; ?>

</body>
</html>