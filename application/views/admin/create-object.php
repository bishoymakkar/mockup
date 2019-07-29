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

      <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>admin/objects/create/{layout_id}"  enctype="multipart/form-data">

        <?php if($this->session->flashdata('error')) echo "<p class='text-danger'>".$this->session->flashdata('error')."</p>"; ?>
      <?php if($this->session->flashdata('info')) echo "<p class='text-success'>".$this->session->flashdata('info')."</p>"; ?>

      	<div class="form-group">
          <label class="col-sm-3 control-label">Object Title</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="title"/>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object description</label>
          <div class="col-sm-5">
            <textarea class="form-control" name="description"></textarea>  
          </div>
        </div>

        <div class="form-group">
                <label class="col-sm-3 control-label">Image Mapping</label>
                
                  <div class="col-sm-5" id="image-mapper" onclick="initImageAreaCreate()">
                      <img src="<?php echo base_url(); ?>public/img/layouts/{layout_img}" id="targetImg">
                  </div>
              </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object Coordinates</label>
          
          <div class="col-sm-5">
              pos_x<input type="text" name="pos_x"  id="pos_x" value="" />
              pos_y<input type="text" name="pos_y" id="pos_y"  value="" /><br/>

              Width<input type="text" name="width"  id="width" value="" />
              Height<input type="text" name="height" id="height" value="" /> 
              
          </div>
        </div>

        <div class="form-group">
          <label for="userfile" class="col-sm-3 control-label">Image</label>
          <div class="col-sm-5">
            <span class="btn btn-info btn-file">
              Upload Image<input type="file" name="userfile" onchange="$('#upload-file-info').html($(this).val());"/>
            </span>
            <span id="upload-file-info"></span>
            <?php if($this->session->flashdata('img')) echo "<p class='text-danger'>".$this->session->flashdata('img')."</p>"; ?>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Object Manufacturer</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="manufacturer"/>
            
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object price</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="price"/>
            
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object Link</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="link"/>
            
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Object width</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="pwidth"/>
             
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object Height</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="pheight"/>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Object Depth</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="pdepth"/>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Submit</label>
          <div class="col-sm-5">
            <input type="submit" class="btn btn-primary" value="Create New Object"/>  
          </div>
        </div>



     </form>

    </div>
  </div>
</div>

  <?php require 'import_js.php'; ?>

</body>
</html>
