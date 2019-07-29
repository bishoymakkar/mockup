<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php require 'import_css.php'; ?>


	<title>Mockup | Dashboard</title>


</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
		<?php require 'sidebar_header.php'; ?>
		
				
		<div class="row">
			<div class="col-sm-3 col-xs-6">
			
			<a href="<?php echo base_url('admin/users'); ?>">
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="{users}" data-postfix="" data-duration="1500" data-delay="0">0</div>
		
					<h3>Users</h3>
					<!-- <p>so far in our blog, and our website.</p> -->
				</div>
			</a>
			
			</div>
		
			<div class="col-sm-2 col-xs-6">
				
				<a href="<?php echo base_url('admin/styles'); ?>">	
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-brush"></i></div>
					<div class="num" data-start="0" data-end="{styles}" data-postfix="" data-duration="1500" data-delay="600">0</div>
		
					<h3>Styles</h3>
					<!-- <p>this is the average value.</p> -->
				</div>
				</a>
		
			</div>
		
			<div class="col-sm-2 col-xs-6">
			
				<a href="<?php echo base_url('admin/configuration'); ?>">
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-cog"></i></div>
					<div class="num" data-start="0" data-end="{configuration}" data-postfix="" data-duration="1500" data-delay="1200">0</div>
		
					<h3>Configurations</h3>
					<!-- <p>messages per day.</p> -->
				</div>
				</a>
		
			</div>
		
			<div class="col-sm-2 col-xs-6">
			
				<a href="<?php echo base_url('admin/layouts'); ?>">
				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-flow-tree"></i></div>
					<div class="num" data-start="0" data-end="{layouts}" data-postfix="" data-duration="1500" data-delay="1800">0</div>
		
					<h3>Layouts</h3>
					<!-- <p>on our site right now.</p> -->
				</div>
				</a>
		
			</div>

			<div class="col-sm-2 col-xs-6">
				
				<a href="<?php echo base_url('admin/objects'); ?>">
				<div class="tile-stats tile-purple">
					<div class="icon"><i class="entypo-archive"></i></div>
					<div class="num" data-start="0" data-end="{objects}" data-postfix="" data-duration="1500" data-delay="1800">0</div>
		
					<h3>Objects</h3>
					<!-- <p>on our site right now.</p> -->
				</div>
				</a>
		
			</div>

		</div>
		
		<br />
		
		
	</div>


	
</div>

	<?php require 'import_js.php'; ?>

</body>
</html>