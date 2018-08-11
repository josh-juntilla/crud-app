<!doctype html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>ASEC | Service Order Form</title>

	<link rel="stylesheet" href="<?php echo base_url('css/login.css') ?>">
	<!-- <script src="<?php echo base_url('js/jquery-1.11.0.js') ?>"></script> -->
</head>

<body>

	<div class="login_box">
		
		<div class="container">
			<img src="<?php echo base_url('images/asecint.png') ?>" alt="">
		</div>

		<?php echo form_open(base_url("login/do_validate")) ?>

			<br>
			<?php echo form_error("userid") ?>
			<?php echo $login_error ?> 
			<div class="clear">
				<input type="text" name="userid" placeholder="Username" size="25">
			</div>
	
			<br>
			<?php echo form_error("password") ?>
			<div class="clear">
				<input type="password" name="password" placeholder="Password" size="25">
			</div>
			&nbsp;
			<div>
				<input type="submit" value="Log In">
			</div>		
				
		<?php echo form_close() ?>
		
	</div>			
	
</body>

</html>