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

      <?php if($this->session->flashdata('info')) echo "<p class='text-success'>".$this->session->flashdata('info')."</p>"; ?>

      <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>admin/layouts/create/{area_id}"  enctype="multipart/form-data">

        

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

        <!-- <div class="form-group">
          <label class="col-sm-3 control-label">Return To Same Configuration After Creating Layout</label>
          <div class="col-sm-5">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="return" value="TRUE" checked>
                </label>
              </div>
          </div>
        </div> -->

        <div class="form-group">
          <label class="col-sm-3 control-label">Title</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="title" name="title" placeholder="Layout title">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Submit</label>
          <div class="col-sm-5">
            <input type="submit" class="btn btn-primary" value="Create New Layout"/>  
          </div>
        </div>



     </form>

    </div>
  </div>
</div>

  <?php require 'import_js.php'; ?>

</body>
</html>
