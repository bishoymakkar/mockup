<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon admin Panel" />
	<meta name="author" content="" />

	<title>Home</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href= "<?php echo base_url();?>public/js/admin/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/admin/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/admin/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/admin/neon-core.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/admin/neon-theme.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/admin/neon-forms.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/admin/custom.css">

	<script src="<?php echo base_url();?>public/js/admin/jquery-1.11.0.min.js"></script>
	<script>$.noConflict();</script>
	<script type="text/javascript">
		var base_url = "<?php  echo base_url(); ?>";
	</script>

	</head>
	
<body>
<div class="page-container">
	<div class="sidebar-menu">
		<div class="sidebar-menu-inner">
			
			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
					<a href="index.html">
						<img src="<?php echo base_url() ?>public/img/mockup.png" width="120" alt="" />
					</a>
				</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>

								
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>
			
									
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				<li <?php if($tab=='dash') echo "class='active opened active'"; ?> >
					<a href="<?php echo base_url(); ?>admin/">
						<i class="entypo-gauge"></i>
						<span class="title">Dashboard</span>
					</a>
					
				</li>
				<li <?php if($tab=='users') echo "class='active opened active'"; ?> >
					<a href="<?php echo base_url(); ?>admin/users">
						<i class="entypo-user"></i>
						<span class="title">Manage Users</span>
					</a>
					
				</li>
				<li <?php if($tab=='room_types') echo "class='active opened active'"; ?> >
					<a href="<?php echo base_url(); ?>admin/room_types">
						<i class="entypo-home"></i>
						<span class="title">Manage Room Types</span>
					</a>
					
				</li>
				<li <?php if($tab=='styles') echo "class='active opened active'"; ?> >
					<a href="<?php echo base_url(); ?>admin/styles">
						<i class="entypo-brush"></i>
						<span class="title">Manage Styles</span>
					</a>
					
				</li>
				<li <?php if($tab=='config') echo "class='active opened active'"; ?> >
					<a href="<?php echo base_url(); ?>admin/configuration">
						<i class="entypo-cog"></i>
						<span class="title">Manage Configurations</span>
					</a>
					
				</li>
				<li <?php if($tab=='layouts') echo "class='active opened active'"; ?> >
					<a href="<?php echo base_url(); ?>admin/layouts">
						<i class="entypo-flow-tree"></i>
						<span class="title">Manage Layouts</span>
					</a>
					
				</li>
				<li <?php if($tab=='objects') echo "class='active opened active'"; ?> >
					<a href="<?php echo base_url(); ?>admin/objects">
						<i class="entypo-archive"></i>
						<span class="title">Manage Objects</span>
					</a>
					
				</li>
				
			</ul>
			
		</div>

	</div>
	<div class="main-content" >
				
		<div class="row">
		
			<!-- Profile Info and Notifications -->
			<div class="col-md-6 col-sm-8 clearfix">
		
				<ul class="user-info pull-left pull-none-xsm">
		
					<!-- Profile Info -->
					<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
		
						<a href="<?php echo base_url('admin/'); ?>/" class="dropdown-toggle" data-toggle="dropdown">
								<h2>
									<?php 
										// echo($this->session->userdata('admin_mockup_logged_in')['email']); ?> 
								</h2>
						</a>
		
						
					</li>
		
				</ul>
				
		
			</div>		
		
		</div>
		
		<hr />
		</body>
		</html>