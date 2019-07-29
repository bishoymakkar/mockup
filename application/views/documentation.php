<!DOCTYPE html>
<!-- saved from url=(0073)http://documenterdocs.revaxarts.com/doc_9062d128a62c632bf89c108678a249d9/ -->
<html lang="en-us"><!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	
	<title>Mockup Documentation</title>
	
	<meta name="description" content="">
	<meta name="author" content="Ahmed Mustafa">
	<meta name="copyright" content="Ahmed Mustafa">
	<meta name="generator" content="Documenter v2.0 http://rxa.li/documenter">
	<meta name="date" content="2016-02-09T00:00:00+01:00">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/documenter_style.css" media="all">
	
	
	
	<script src="<?php echo base_url(); ?>public/jquery.js"></script>
	
	<script src="<?php echo base_url(); ?>public/jquery.scrollTo.js"></script>
	<script src="<?php echo base_url(); ?>public/jquery.easing.js"></script>
	
	<script>document.createElement('section');var duration='500',easing='swing';</script>
	<script src="<?php echo base_url(); ?>public/script.js"></script>
	
	<style>
		html{background-color:#FFFFFF;color:#383838;}
		::-moz-selection{background:#444444;color:#DDDDDD;}
		::selection{background:#444444;color:#DDDDDD;}
		#documenter_sidebar #documenter_logo{background-image:url();}
		a{color:#0000FF;}
		.btn {
			border-radius:3px;
		}
		.btn-primary {
			  background-image: -moz-linear-gradient(top, #0088CC, #0044CC);
			  background-image: -ms-linear-gradient(top, #0088CC, #0044CC);
			  background-image: -webkit-gradient(linear, 0 0, 0 0088CC%, from(#DDDDDD), to(#0044CC));
			  background-image: -webkit-linear-gradient(top, #0088CC, #0044CC);
			  background-image: -o-linear-gradient(top, #0088CC, #0044CC);
			  background-image: linear-gradient(top, #0088CC, #0044CC);
			  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0088CC', endColorstr='#0044CC', GradientType=0);
			  border-color: #0044CC #0044CC #bfbfbf;
			  color:#FFFFFF;
		}
		.btn-primary:hover,
		.btn-primary:active,
		.btn-primary.active,
		.btn-primary.disabled,
		.btn-primary[disabled] {
		  border-color: #0088CC #0088CC #bfbfbf;
		  background-color: #0044CC;
		}
		hr{border-top:1px solid #EBEBEB;border-bottom:1px solid #FFFFFF;}
		#documenter_sidebar, #documenter_sidebar ul a{background-color:#DDDDDD;color:#222222;}
		#documenter_sidebar ul a{-webkit-text-shadow:1px 1px 0px #EEEEEE;-moz-text-shadow:1px 1px 0px #EEEEEE;text-shadow:1px 1px 0px #EEEEEE;}
		#documenter_sidebar ul{border-top:1px solid #AAAAAA;}
		#documenter_sidebar ul a{border-top:1px solid #EEEEEE;border-bottom:1px solid #AAAAAA;color:#444444;}
		#documenter_sidebar ul a:hover{background:#444444;color:#DDDDDD;border-top:1px solid #444444;}
		#documenter_sidebar ul a.current{background:#444444;color:#DDDDDD;border-top:1px solid #444444;}
		#documenter_copyright{display:block !important;visibility:visible !important;}
	</style>
	
</head>
<body class="documenter-project-mockup-documentation">
	<div id="documenter_sidebar">
		<a href="http://documenterdocs.revaxarts.com/doc_9062d128a62c632bf89c108678a249d9/#documenter_cover" id="documenter_logo"></a>
		<ul id="documenter_nav">
			<li><a class="current" href="#documenter_cover">Start</a></li>
				
			<li><a href="#libraries_frameworks" title="Libraries &amp; Frameworks">Libraries &amp; Frameworks</a></li>
			<li><a href="#controllers" title="Controllers">Controllers</a></li>
			<li><a href="#models" title="Models">Models</a></li>
			<!-- <li><a href="#javascript" title="Javascript">Javascript</a></li> -->

		</ul>
		<div id="documenter_copyright">Copyright Ahmed Mustafa 2016<br>
		made with the <a href="http://rxa.li/documenter">Documenter v2.0</a> 
		</div>
	</div>
	<div id="documenter_content">
	<section id="documenter_cover">
	<h1>Mockup Documentation</h1>
	
	<div id="documenter_buttons">
		
	</div>
	<hr>
	<ul>
	<li>created: 02/07/2016</li>
	<li>latest update: 02/9/2016</li>
	<li>by: Ahmed Mustafa</li>
	
	<li>email: <a href="mailto:amustafa@qpixsolutions.com">amustafa@qpixsolutions.com</a></li>
	</ul>
	<p></p>
	</section>
	
	<section id="libraries_frameworks">
	<div class="page-header"><h3>Libraries &amp; Frameworks</h3><hr class="notop"></div>
<ul>
	<li>
		Codeigniter</li>
	<li>
		Bootstrap 1</li>
	<li>
		PHP 5.4 OR 5.6</li>
</ul>
</section>
<section id="controllers">
	<div class="page-header"><h3>Controllers</h3><hr class="notop"></div>
<ul>
	<li>
		<strong>About</strong></li>
</ul>
<p style="margin-left: 40px;">
	Contains the index function that loads the 'about' view.</p>
<ul>
	<li>
		<strong>​Contact</strong></li>
</ul>
<p style="margin-left: 40px;">
	Loads contact us view.</p>
<ul>
	<li>
		<strong>Error</strong></li>
</ul>
<p style="margin-left: 40px;">
	Loads error page in case the user typed an invalid URL or something that may cause an error.</p>
<ul>
	<li>
		<strong>Floorplan</strong></li>
	<li style="margin-left: 40px;">
		<strong><em>"product"&nbsp;</em>function</strong></li>
</ul>
<p style="margin-left: 80px;">
	Gets product info from the database, parse the information with an HTML template and returns all information together with the HTML ina &nbsp;JSON array.</p>
<ul>
	<li style="margin-left: 40px;">
		<strong><em>"configuration_layouts"&nbsp;</em>function</strong></li>
</ul>
<p style="margin-left: 80px;">
	Loads all layouts of a given configuration area ID and reidrects to another function called "layouts" to display the layouts view.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"layouts"</strong>&nbsp;</em><strong>function</strong></li>
</ul>
<p style="margin-left: 80px;">
	Loads layouts together with their objects and parse all data in "floorplan_layouts_view".</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"style_configurations"</strong>&nbsp;</em><strong>function</strong></li>
</ul>
<p style="margin-left: 80px;">
	Given a style ID, this function loads a view with all configurations of that style.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"logout"</strong></em> <strong>function</strong></li>
</ul>
<p style="margin-left: 80px;">
	Destroys the sessin and redirects the user to the home page.</p>
<ul>
	<li>
		<strong>Personal_info</strong></li>
</ul>
<p style="margin-left: 40px;">
	Loads a view for the user to enter / confirm his personal info before submitting his purchase.</p>
<ul>
	<li>
		<strong>Purchase</strong></li>
	<li style="margin-left: 40px;">
		<em><strong>"add_item_to_cart"</strong>&nbsp;</em><strong>function</strong></li>
</ul>
<p style="margin-left: 80px;">
	Asynchronously adds a selected item to cart by it's ID.</p>
<ul>
	<li style="margin-left: 40px;">
		<strong>"</strong><strong><em>get_layout_objects</em>"</strong> <strong>function</strong></li>
</ul>
<p style="margin-left: 80px;">
	Asynchronously returns all objects of a selected layout by it's ID.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"remove_cart_item" </strong></em><strong>function</strong></li>
</ul>
<p style="margin-left: 80px;">
	Removes an item from cart.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"update_cart_item" </strong></em><strong>function</strong></li>
</ul>
<p style="margin-left: 80px;">
	Asynchronously update Item quantity in user cart</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"finalize_purchase" </strong></em><strong>function</strong></li>
</ul>
<p style="margin-left: 80px;">
	Collects cart info with detailed item info and redirects to finalize purchase page.</p>
<ul>
	<li>
		<strong>Style_items</strong></li>
</ul>
<p style="margin-left: 40px;">
	Loads user styles in style items view.</p>
<p style="margin-left: 40px;">
	&nbsp;</p>
</section>
<section id="models">
	<div class="page-header"><h3>Models</h3><hr class="notop"></div>
<ul>
	<li>
		<b>Cart model</b></li>
	<li style="margin-left: 40px;">
		<strong><em>"get_user_cart( user_id )"</em></strong></li>
</ul>
<p style="margin-left: 80px;">
	Returns user cart ID that is still pending confirmation for it's items.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"get_cart_items( cart_id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Given a cart ID, it returns cart items information.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"create_cart( user_id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Creates a new cart for user with the passed ID.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"remove_cart_item( cart_id, item_id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Removes item with the passed item ID from cart whose ID equals cart_id.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"update_cart_item( cart_id, item_id, qty )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Given cart ID, item ID and quantity. It updates the quantity of a given Item in a cart.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"check_cart_item_exists( cart_id, item_id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Checks if the given Item with ID equals item ID is already added in the given cart and returns 1 if it exists, 0 otherwise.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"add_item_to_cart( cart_id, id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Adds item with ID equals id to the cart with ID equals cart_id.</p>
<ul>
	<li>
		<strong>User model</strong></li>
	<li style="margin-left: 40px;">
		<strong><em>"register( user_array )"</em></strong></li>
</ul>
<p style="margin-left: 80px;">
	Takes user information in a single array as a parameter and inserts a new record in user tables in the database.</p>
<ul>
	<li style="margin-left: 40px;">
		<b><i>"get_all()"</i></b></li>
</ul>
<p style="margin-left: 80px;">
	Gets all users from the database.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"login( email, pass )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Checks if there is a record in the database for a user with the passed email and password</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"get_user_styles( id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Gets all styles for the user with ID equals the passed id.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"get_user_plan( id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Gets user row from teh database user table where user ID equals the passed id.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"verify_logn( email, password )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Replica for login function decribed above.</p>
<ul>
	<li style="margin-left: 40px;">
		<strong><em>"check_email( email )"</em></strong></li>
</ul>
<p style="margin-left: 80px;">
	Checks if the given email exists in the database, returns 1 if exists and 0 otherwise.</p>
<ul>
	<li>
		<strong>Admin/admin_users_model</strong></li>
	<li style="margin-left: 40px;">
		<strong><em>"login( email, password )"</em></strong></li>
</ul>
<p style="margin-left: 80px;">
	Function used to login admin users, returns a row of their information from the database if exists, 0 otherwise.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"get_admins()"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Returns all admin users in the database.</p>
<ul>
	<li>
		<b>Admin/configuration_model</b></li>
	<li style="margin-left: 40px;">
		<em><strong>"getConfigurations()"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Gets all configurations from the database and return them as an object. if there's no configurations in the database, it returns 0.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"get_config_info( id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Returns an array containing all information of a given configuration.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"getSingleConfiguration( id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Same as the previous function but instead of returning all information, it just returns specific fields from the database. Also the previous functions returns an array while this function returns an object,</p>
<ul>
	<li style="margin-left: 40px;">
		<strong><em>"create_conf_area( conf_id, title, posX, posY, width, height )"</em></strong></li>
</ul>
<p style="margin-left: 80px;">
	Given these parameters, this functions inserts a new record in conf_areas table in the database.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"get_configuration_areas( id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Returns an array containing all configuration areas of a given configuration with ID equals the passed id.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"get_area_info( id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Returns an array containing all information of a given configuration area.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"save_conf_area_changes( id, title, posX, posY, width, height )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Updates configuration area record with ID equals the passed ID with the passed values for position and dimensions.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>​"delete_area( id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Deletes a configuration area with ID equals passed ID from the database.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"get_area_layouts( area_id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Returns an array containing all layouts of a given configuration area.</p>
<ul>
	<li style="margin-left: 40px;">
		<strong><em>"get_conf_layouts( conf_id )"</em></strong></li>
</ul>
<p style="margin-left: 80px;">
	Returns an array containing all layouts of a given configuration.</p>
<ul>
	<li style="margin-left: 40px;">
		<strong><em>"get_area_conf_id( area_id )"</em></strong></li>
</ul>
<p style="margin-left: 80px;">
	Returns the configuration ID to which the given area belongs.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"get_style_confs( style_id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Returns an array containing all configurations of a given style.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"getConfigurationsOfStyle( id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	if the passed style has configurations, it return an object containing specific information about the configurations. Otherwise, it returns 0.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"createConfiguration( title, img, style_id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Inserts a new record in configuration table in the database with the passed values. It returns the ID of the newely created configuration if the insertion is successful, otherwise it returns 0.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"updateConfiguration( id, title, img, style_id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Updates the configuration whose &nbsp;ID equals the passed id with the passed values. It returns 1 if update is successful and 0 otherwise.</p>
<ul>
	<li style="margin-left: 40px;">
		<em><strong>"deleteConfiguration( id )"</strong></em></li>
</ul>
<p style="margin-left: 80px;">
	Deletes a given configuration by ID from the database. reutrn 1 if deletion is successful, 0 otherwise.</p>
<ul>
	<li style="margin-left: 40px;">
		<strong><em>"count()"</em></strong></li>
</ul>
<p style="margin-left: 80px;">
	Returns the number of configurations in the database.</p>
<!-- <ul>
	<li>
		<strong>Admin/layout_model</strong></li>
	<li style="margin-left: 40px;">
		<b><i>"get_all()"</i></b></li>
</ul> -->
<p style="margin-left: 80px;">
	&nbsp;</p>
</section>
<!-- <section id="javascript">
	<div class="page-header"><h3>Javascript</h3><hr class="notop"></div>
<p>
	Start Here</p>
</section> -->

	</div>

</body></html>