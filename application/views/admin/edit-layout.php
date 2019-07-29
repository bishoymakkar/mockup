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

      <h3>Editing Layout : {id}</h3>

      <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo base_url();?>admin/layouts/update_layout/{id}"  enctype="multipart/form-data">


        <div class="form-group">
          <label class="col-sm-3 control-label">Layout Image</label>
          <div class="col-sm-5">
            <img src="<?php echo base_url(); ?>public/img/layouts/{img}" width="250"><br><br>
            <input type="file" name="userfile" value="{img}"/>  
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Title</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="title" name="title" placeholder="Layout title" value="{title}">
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-3 control-label">Submit</label>
          <div class="col-sm-5">
            <input type="submit" class="btn btn-primary" value="Edit Layout"/>  
          </div>
        </div>



     </form>

    </div>
  </div>
</div>

  <?php require 'import_js.php'; ?>


  <!-- init imagemap -->
  <script type="text/javascript">
    initImageArea(<?php echo $layout[0]->pos_x." , ".$layout[0]->pos_y." , ".$layout[0]->frame_width." , ".$layout[0]->frame_height ; ?> );
  </script>

</body>
</html>
