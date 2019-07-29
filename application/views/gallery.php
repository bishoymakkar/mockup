<!DOCTYPE html>
<?php header('Access-Control-Allow-Origin: *'); ?>
<script> var site_url = '<?php echo site_url();?>';</script>
<html lang="en">
<head>
	
	<title>Gallery Mockup</title>
    <?php include( 'includes.php' ); ?>
	
    <script src="<?= base_url();?>public/js/home.js"></script>
</head>
<body>
	<section class="section alt" id="examples">
		<div class="container16">
			{header_html}
			<div class="row body-container gallery-container">
                {furniture}
                <div class="col-lg-3">
                    <a href="<?= base_url();?>home?{url}"><img src="{background_image}"></a>
                </div>
                {/furniture}
            </div>
<!-- Modal End -->

</body>
</html>