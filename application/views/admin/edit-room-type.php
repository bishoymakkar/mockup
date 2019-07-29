<!DOCTYPE html>
<html lang="en">
<head>

    <?php require 'import_css.php'; ?>


    <title>Edit Room Type</title>

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
    <?php require 'sidebar_header.php'; ?>
    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        Room Type Information
                    </div>
                </div>

                {room_types}
                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups-bordered" method="post" action="
                    <?php echo base_url();?>admin/room_types/edit/{id}"  enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Title</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="title" placeholder="Title" value="{title}">
                                <?php echo form_error('title'); ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="img" class="col-sm-3 control-label">Image</label>

                            <div class="col-dm-5">
                                <img src="<?php echo base_url(); ?>public/img/room_types/{image}" width="250">
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
                            <div class="col-sm-offset-3 col-sm-5">
                                <input type="submit" class="btn btn-primary" name="add" value="Edit Room Type">
                            </div>
                        </div>



                    </form>
                </div>
                {/room_types}
            </div>




        </div>
    </div>



    <?php require 'import_js.php'; ?>

</body>
</html>