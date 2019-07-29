<!DOCTYPE html>
<html lang="en">
<head>

	<title>Object gallery</title>
    <?php require 'import_css.php'; ?>

</head>



<body  class="page-body  page-fade">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	<?php require 'sidebar_header.php'; ?>
	<h3 class="fL design-title">Object gallery</h3>
	<a onclick="$( '#object_photo' ).click();"><button class="btn btn-primary btn-title">Upload new photo</button></a>
	<input type="file" name="object_photo" id="object_photo" style="display:none;" forobjid="{object_id}">

	<div class="c">

	<?php if($this->session->flashdata('error')) echo "<p class='text-danger'>".$this->session->flashdata('error')."</p>"; ?>
	<?php if($this->session->flashdata('info')) echo "<p class='text-success'>".$this->session->flashdata('info')."</p>"; ?>

	<div class="row" style="margin-top: 40px; padding: 20px;">
		{images}
		<div class="col-md-3">
			{image_name}
		</div>
		{/images}
	</div>

</div>

</div>
<?php require 'import_js.php'; ?>

</body>
</html>


