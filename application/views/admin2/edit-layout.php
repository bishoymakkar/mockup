<!DOCTYPE html>
<html lang="en">
<head>

<title>Edit Layout</title>
    
    <?php require 'import_css.php'; ?>

</head>
<body class="page-body  page-fade">

<div class="page-container">
  <?php require 'sidebar_header.php'; ?>

  <div class="row">
    <div class="col-md-12">

      <h3>Editing Layout : <?php echo $layout[0]->id; ?></h3>

      <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>Admin/Layouts/edit_layout/<?php echo $layout[0]->id; ?>"  enctype="multipart/form-data">



        <div class="form-group">
          <label class="col-sm-3 control-label">Image Mapping</label>
          
          <div class="col-sm-5" id="image-mapper">
              <img src="<?php echo base_url('public/img/configurations')."/".$config[0]->img; ?>" id="targetImgEdit">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Layout Coordinates</label>
          
          <div class="col-sm-5">
              pos_x<input type="text" name="pos_x"  id="pos_x" value="" />
              pos_y<input type="text" name="pos_y" id="pos_y"  value="" /><br/>
              <?php echo form_error('pos_x'); ?><?php echo form_error('pos_x'); ?>
              Width<input type="text" name="width"  id="width" value="" />
              Height<input type="text" name="height" id="height" value="" /> 
              <?php echo form_error('width'); ?><?php echo form_error('height'); ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Layout Image</label>
          <div class="col-sm-5">
            <input type="file" name="userfile"/>  
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Submit</label>
          <div class="col-sm-5">
            <input type="submit" class="btn btn-default" value="Edit Layout"/>  
          </div>
        </div>



     </form>

    </div>
  </div>
</div>

  <?php require 'import_js.php'; ?>


  <!-- molto -->
  <script type="text/javascript">
    initImageArea(<?php echo $layout[0]->pos_x." , ".$layout[0]->pos_y." , ".$layout[0]->frame_width." , ".$layout[0]->frame_height ; ?> );
  </script>

</body>
</html>
