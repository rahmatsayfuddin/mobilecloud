<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/plugin/font_awesome/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/plugin/bootstrap/css/bootstrap.min.css">
	<script src="<?php echo base_url()?>/assets/plugin/jquery/jquery-3.2.1.slim.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script> 
	<script src="<?php echo base_url()?>/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/custom/bootstrapcustom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/custom/login_register.css">
</head>
<style type="text/css">
.btn-selesei{
	display: table;
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 12%;
}
</style>
<body>
	<img src="<?php echo base_url()?>/assets/image/home/logo_mobile_cloud.png""  class="logo-center">
	<div class="container">
		<div class="col-sm-6 login-box">
			<div class="row">
				<div class="col-sm-12">
					<br>
					<h5 class="text-center"><?php echo $result['message']; ?></h5>
					<a href="<?php echo site_url()?>/" class="btn btn-danger btn-selesei">
						Try Again
					</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>