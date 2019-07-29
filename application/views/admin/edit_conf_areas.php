<!DOCTYPE html>
<html lang="en">
<head>

<title>Edit Object In layout</title>
    
    <?php require 'import_css.php'; ?>

</head>
<body class="page-body  page-fade">

<div class="page-container">
  <?php require 'sidebar_header.php'; ?>

  <div class="row">
    <div class="col-md-12">
      <h3>Editing area</h3>
            
            <!-- {config} -->
            <!-- <div class="panel-body"> -->
              
              <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>admin/configuration/save_conf_area_changes/{id}"  enctype="multipart/form-data">
  
  					<div class="form-group">
                <label class="col-sm-3 control-label">Image Mapping</label>
                
                  <div class="col-sm-5" id="image-mapper">
                      <img src="<?php echo base_url(); ?>public/img/configurations/{conf_img}" id="targetImgEdit" style="width: 360px; height: 277px;">
                  </div>
              </div>

              		<div class="form-group">
						<label for="title" class="col-sm-3 control-label">Title</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{title}">
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-3 control-label">PosX</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="pos_x" id="pos_x" placeholder="Left position" value="<?php echo round( ($pos_x/100)*277 ); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-3 control-label">PosY</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="pos_y" id="pos_y" placeholder="Top position" value="<?php echo round( ($pos_y/100)*277 ); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-3 control-label">Width</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="width" id="width" placeholder="Width" value="<?php echo round( ($width/100)*360 ); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="title" class="col-sm-3 control-label">Height</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="height" id="height" placeholder="Height" value="<?php echo round( ($height/100)*277 ); ?>">
						</div>
					</div>

						
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<input type="submit" class="btn btn-primary" name="add" value="Edit Configuration">
							</div>
						</div>
  
  
  
      		</form>
      	<!-- </div> -->
      	<!-- {/config} -->
  </div>
  
  
  
  
  </div>
  </div>
  
  
  
  	<?php require 'import_js.php'; ?>
  	<!-- Init Image Mapping Area -->
  <script type="text/javascript">
  // alert( '<?php echo intVal(($pos_y/100)*277); ?>' );
  // initImageArea( 0, 0, 100, 100 );
  	initImageArea(<?php echo intval(($pos_x/100)*360)." , ".intVal(($pos_y/100)*277)." , ".intVal(($width/100)*360)." , ".intVal(($height/100)*277) ; ?> );
  </script>
</body>
</html>