<!DOCTYPE html>
<html lang="en">
<head>

<title>Create Object</title>
    
    <?php require 'import_css.php'; ?>

</head>
<body class="page-body  page-fade">

<div class="page-container">
  <?php $tab = "objects"; require 'sidebar_header.php'; ?>

  <div class="row">
    <div class="col-md-12">

      <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>Admin/Objects/create<?php if(isset($parent_id)) echo '/'.$parent_id ?>"  enctype="multipart/form-data">


      	<div class="form-group">
          <label class="col-sm-3 control-label">Object Title</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="title"/>  
          </div>
        </div>

        <div class="form-group <?php if(isset($parent_id)) echo "dN"; ?>">
          <label for="layout_id" class="col-sm-3 control-label">Layout</label>
          
          <div class="col-sm-5">
            <select name="layout_id" data-location="<?php echo base_url('public/img/layouts/'); ?>" id="layout_selector" onChange="changeImageObject()" class="form-control">
              <?php if (isset($current_config)) {
                echo '<option class="bold" value="'.$current_layout[0]->id.'" data-img="'.$current_layout[0]->img.'">'.$current_layout[0]->title.' - '.$current_layout[0]->id.'</option>';
              } ?>
              {layouts}
                <option value="{id}" data-img="{layout_img}">{id}</option>
              {/layouts}       
            </select>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Image Mapping</label>
          
          <div class="col-sm-5" id="image-mapper">
              <img src="<?php if(isset($parent_id)) echo base_url('public/img/layouts')."/".$parent_config[0]->layout_img;
              else if(isset($current_layout)) echo base_url('public/img/layouts')."/".$current_layout[0]->layout_img;
               else echo base_url('public/img/layouts')."/".$layouts[0]->layout_img; ?>" id="targetImg">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object Coordinates</label>
          
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
          <label class="col-sm-3 control-label">Object Image</label>
          <div class="col-sm-5">
            <input type="file" name="userfile"/>  
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Object Manufacturer</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="manufacturer"/>
            <?php echo form_error('manufacturer'); ?>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object price</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="price"/>
            <?php echo form_error('price'); ?>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object Link</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="link"/>
            <?php echo form_error('link'); ?>  
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Object width</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="pwidth"/>
            <?php echo form_error('pwidth'); ?>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object Height</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="pheight"/>
            <?php echo form_error('pheight'); ?>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object Depth</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="pdepth"/>
            <?php echo form_error('pdepth'); ?>  
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Return To Same Layout After Creating Object</label>
          <div class="col-sm-5">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="return" value="TRUE" checked>
                </label>
              </div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Submit</label>
          <div class="col-sm-5">
            <input type="submit" class="btn btn-default" value="Create New Object"/>  
          </div>
        </div>



     </form>

    </div>
  </div>
</div>

  <?php require 'import_js.php'; ?>

</body>
</html>
