<html>
    <head>
        <script> var Chartkick = {"language": "de"}; </script>
        <title>404 page not found</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo config_item('base_url');?>public/css/home.css">
        <link rel="stylesheet" href="<?php echo config_item('base_url');?>public/css/master.css">
    </head>

    <body class="mockup-body">
        <div class="container error">
            {header}
        	<div class="jumbotron">
        		<h1 class="marBot0">404</h1>
        		<h4 class="marTop0">The page you're looking for cannot be found</h4>
        		<h5 class="marTop6">Go back to <a href="<?php echo base_url(); ?>home">Home page</a> or <a href="<?php echo base_url(); ?>contact">Contact us</a> about the problem</h5>
        	</div>
        </div>
    </body>
</html>