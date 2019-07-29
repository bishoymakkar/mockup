<!DOCTYPE html>
<html lang="en">
<head>

<title>Create Layout</title>
 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url();?>public/css/imgareaselect-default.css">
    <script src = "<?php echo base_url();?>public/js/jquery.imgareaselect.min.js"></script>   
    <script src = "<?php echo base_url();?>public/js/testimg.js"></script>  
   <!--plugin script in your site folder-->
<script type="text/javascript" src="<?php echo base_url();?>public/js/maphilight-master/jquery.maphilight.js"></script>

<!--maphighlight function code-->
<script type="text/javascript">
$(function() {
$('img[usemap]').maphilight();
});
</script>   

<style>
#container{
    background-color:#fff;
    width:800px;
    height:300px;
}


</style>
</head>
<body >
 
	<div id="container">

  <img src="<?php echo base_url(); ?>public/img/ikea.jpg" id="targetImg" usemap="#pointmap">


<map name="pointmap">
{points}
  <area  id="area" shape="rect" coords="{pos_x},{pos_y},{x2},{y2}" data-maphilight="{'strokeColor':'0000ff','strokeWidth':5,'fillColor':'00ff00','fillOpacity':0.6}" href="<?php echo base_url()?>" />
{/points}

</map>
</div>

</body>
</html>