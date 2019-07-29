<!DOCTYPE html>
<html lang="en">
<head>

<title>Create Layout</title>
    
    <?php require 'import_css.php'; ?>

</head>
<body class="page-body  page-fade">

<div class="page-container">

  <?php $tab="layouts"; require 'sidebar_header.php'; ?>

  <div class="row">
    <div class="col-md-12">

      <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>Admin/Layouts/create<?php if(isset($parent_id)) echo '/'.$parent_id ?>"  enctype="multipart/form-data">

        <div class="form-group <?php if(isset($parent_id)) echo "dN"; ?>">
          <label for="configuration_id" class="col-sm-3 control-label">Configuration</label>
          
          <div class="col-sm-5">
            <select name="configuration_id" data-location="<?php echo base_url('public/img/configurations/'); ?>" id="configuration_selector" onChange="changeImageLayout()" class="form-control">
              <?php if (isset($current_config)) {
                echo '<option class="bold" value="'.$current_config[0]->id.'" data-img="'.$current_config[0]->img.'">'.$current_config[0]->title.' - '.$current_config[0]->id.'</option>';
              } ?>
              {configs}
                <option value="{id}" data-img="{img}">{title} - {id}</option>
              {/configs}       
            </select>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Image Mapping</label>
          
          <div class="col-sm-5" id="image-mapper">
              <img src="<?php if(isset($parent_id)) echo base_url('public/img/configurations')."/".$parent_config[0]->img; 
               else  if(isset($current_config)) echo base_url('public/img/configurations')."/".$current_config[0]->img; 
               else echo base_url('public/img/configurations')."/".$configs[0]->img; ?>" id="targetImg">
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
          <label class="col-sm-3 control-label">Return To Same Configuration After Creating Layout</label>
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
            <input type="submit" class="btn btn-default" value="Create New Layout"/>  
          </div>
        </div>



     </form>

    </div>
  </div>
</div>

  <?php require 'import_js.php'; ?>

</body>
</html>
