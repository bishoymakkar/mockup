<!DOCTYPE html>
<html lang="en">
<head>

<title>Edit Object</title>
    
    <?php require 'import_css.php'; ?>

</head>
<body class="page-body  page-fade">

<div class="page-container">
  <?php require 'sidebar_header.php'; ?>

  <div class="row">
    <div class="col-md-12">

      <h3>Editing Object : <?php echo $object[0]->id; ?></h3>

      <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>Admin/Objects/edit/<?php echo $object[0]->id; ?>"  enctype="multipart/form-data">



        <div class="form-group">
          <label class="col-sm-3 control-label">Object Title</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="title" value="<?php echo $object[0]->title; ?>"/>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Image Mapping</label>
          
          <div class="col-sm-5" id="image-mapper">
              <img src="<?php if(isset($current_layout)) echo base_url('public/img/layouts')."/".$current_layout[0]->layout_img;
               else echo base_url('public/img/layouts')."/".$layout[0]->layout_img; ?>" id="targetImgEdit">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object Coordinates</label>
          
          <div class="col-sm-5">
              pos_x<input type="text" name="pos_x"  id="pos_x" />
              pos_y<input type="text" name="pos_y" id="pos_y"  /><br/>
              <?php echo form_error('pos_x'); ?><?php echo form_error('pos_x'); ?>
              Width<input type="text" name="width"  id="width" />
              Height<input type="text" name="height" id="height" /> 
              <?php echo form_error('width'); ?><?php echo form_error('height'); ?>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object Image</label>
          <div class="col-sm-5">
            <input type="file" name="userfile"/>  
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Object Manufacturer</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="manufacturer" value="<?php echo $object[0]->manufacturer; ?>"/>
            <?php echo form_error('manufacturer'); ?>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object price</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="price" value="<?php echo $object[0]->price; ?>"/>
            <?php echo form_error('price'); ?>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object Link</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="link" value="<?php echo $object[0]->link; ?>"/>
            <?php echo form_error('link'); ?>  
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Object width</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="pwidth" value="<?php echo $object[0]->product_width; ?>"/>
            <?php echo form_error('pwidth'); ?>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object Height</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="pheight" value="<?php echo $object[0]->product_height; ?>"/>
            <?php echo form_error('pheight'); ?>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object Depth</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="pdepth" value="<?php echo $object[0]->product_depth; ?>"/>
            <?php echo form_error('pdepth'); ?>  
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Submit</label>
          <div class="col-sm-5">
            <input type="submit" class="btn btn-default" value="Edit Object"/>  
          </div>
        </div>



     </form>

    </div>
  </div>
</div>

  <?php require 'import_js.php'; ?>


  <!-- molto -->
  <script type="text/javascript">
    initImageArea(<?php echo $object[0]->pos_x." , ".$object[0]->pos_y." , ".$object[0]->frame_width." , ".$object[0]->frame_height ; ?> );
  </script>

</body>
</html>
