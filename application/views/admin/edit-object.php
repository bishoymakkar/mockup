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

      <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>admin/objects/edit/<?php echo $object[0]->id; ?>"  enctype="multipart/form-data">



        <div class="form-group">
          <label class="col-sm-3 control-label">Object Title</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="title" value="<?php echo $object[0]->title; ?>"/>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object description</label>
          <div class="col-sm-5">
            <textarea class="form-control" name="description"><?php echo $object[0]->description; ?></textarea>  
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
    initImageArea(<?php echo $object[0]->pos_x." , ".$object[0]->pos_y." , ".$object[0]->frame_width." , ".$object[0]->frame_height ; ?> );
  </script>

</body>
</html>
