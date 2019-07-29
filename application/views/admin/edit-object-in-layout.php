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
      <h3>Editing Object : <?php echo $object_id ?></h3>

      <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>admin/objects/update_object_in_layout/{object_id}/{layout_id}"  enctype="multipart/form-data">



        
        <div class="form-group">
          <label class="col-sm-3 control-label">Image Mapping</label>
          <div class="col-sm-5" id="image-mapper">
              <img src="<?php echo base_url(); ?>public/img/layouts/{layout_img}" id="targetImgEdit" style="width: 500px; height: 500px;">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object Coordinates</label>
          <div class="col-sm-5">
              pos_x<input type="text" name="pos_x"  id="pos_x" value="<?php echo (($pos_x/100)*500); ?>"/>
              pos_y<input type="text" name="pos_y" id="pos_y"  value="<?php echo (($pos_y/100)*500) ?>"/><br/>
              Width<input type="text" name="width"  id="width" value="<?php echo (($frame_width/100)*500) ?>"/>
              Height<input type="text" name="height" id="height" value="<?php echo (($frame_height/100)*500) ?>"/> 
          </div>
        </div>




        
        <div class="form-group">
          <label class="col-sm-3 control-label">Submit</label>
          <div class="col-sm-5">
            <input type="submit" class="btn btn-primary" value="Edit Object"/>  
          </div>
        </div>



     </form>

    </div>
  </div>
</div>

  <?php require 'import_js.php'; ?>


  <!-- Init Image Mapping Area -->
  <script type="text/javascript">
    initImageArea(<?php echo (($pos_x/100)*500)." , ".(($pos_y/100)*500)." , ".(($frame_width/100)*500)." , ".(($frame_height/100)*500) ; ?> );
  </script>

</body>
</html>
