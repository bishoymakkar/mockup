<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Edit Configuration</title>

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
   	<?php require 'sidebar_header.php'; ?>   
      <div class="row">
        
        <div class="col-md-12">
          
          <div class="panel panel-primary" data-collapsed="0">
            
            <div class="panel-heading">
              <div class="panel-title">
                Configuration Information
              </div>  
            </div>
            
            {config}
            <div class="panel-body">
              
              <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>Admin/Configuration/edit/{id}"  enctype="multipart/form-data">
  
					  <div class="form-group">
							<label for="title" class="col-sm-3 control-label">Title</label>
							
							<div class="col-sm-5">
								<input type="text" class="form-control" name="title" placeholder="Title" value={title}>
								<?php echo form_error('title'); ?>
							</div>
						</div>

						<div class="form-group">
							<label for="style_id" class="col-sm-3 control-label">Style</label>
							
							<div class="col-sm-5">
								<select name="style_id" class="form-control">
									<option class="bold" value="{style_id}">{style_title} - {style_id}</option>
										
										<?php foreach ($styles as $row ) {
											echo "<option value='".$row->id."'>".$row->title." - ".$row->id."</option>";
										} ?>									
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
								<input type="submit" class="btn btn-default" name="add" value="Edit Configuration">
							</div>
						</div>
  
  
  
      		</form>
      	</div>
      	{/config}
  </div>
  
  
  
  
  </div>
  </div>
  
  
  
  	<?php require 'import_js.php'; ?>

</body>
</html>