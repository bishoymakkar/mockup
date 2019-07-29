<!DOCTYPE html>
<?php header('Access-Control-Allow-Origin: *'); ?>
<script> var site_url = '<?php echo site_url();?>';</script>
<html lang="en">
<head>
	<title>Login Mockup</title>
	<?php include( 'includes.php' ); ?>
    <script src="<?= base_url();?>public/js/home.js"></script>
</head>
<body>
	<section class="section alt" id="examples">
		<div class="container16">
			{header_html}
			<div class="row body-container">
      <div class="column12">
          <div class="row registration-login">
          <div class="col-lg-12">
            <h3>Don't have an Account yet? <a href="<?= base_url();?>user/register">Sign Up</a>
          </h3>
        </div>
        <form role="form" action='<?= base_url();?>user/verify_login' method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
            <span class="text-danger"><?php echo form_error('email'); ?></span>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
            <span class="text-danger"><?php echo form_error('password'); ?></span>
          </div>
          <button type="submit" class="btn btn-default">Login</button>
        </form>
        </div>
  </div>
</div>
<!-- Modal End -->

</body>
</html>