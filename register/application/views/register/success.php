<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/plugin/font_awesome/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/plugin/bootstrap/css/bootstrap.min.css">
	<script src="<?php echo base_url()?>/assets/plugin/jquery/jquery-3.2.1.slim.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script> 
	<script src="<?php echo base_url()?>/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	
</head>
<style type="text/css">
body{
	background: url("../../assets/image/home/bg.png") no-repeat center center fixed;
	-moz-background-size: cover;
	-webkit-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}
.logo-center{
	display: block;
	margin-top: 2%;
	margin-bottom: 2%;
	margin-left: auto;
	margin-right: auto;
	width: 35%;
}
.login-box{
	float: none;
	display: block;
	margin-left: auto;
	margin-right: auto;
	background: #F1EFF2;
	border:solid 0.5px #D01800;
	margin-bottom: 2%;
}
.btn-danger {
	color: #fff !important;
	background-color:#D01800;
	border-color: #D01800;
}
.btn-danger:hover, .btn-danger:focus, .btn-danger:active, .btn-danger.active, .open>.dropdown-toggle.btn-danger {
	color: #fff !important;
	background-color: #dc3545;
	border-color: #dc3545;
}
.btn-selesei{
	display: table;
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 12%;
}
</style>
<body>
	<img src="<?php echo base_url()?>/assets/image/home/logo_login.png"  class="logo-center">
	<div class="container">
		<div class="col-sm-6 login-box">
			<div class="row">
				<div class="col-sm-12">
					<br>
					<h5 class="text-center"><?php echo $result['message']; ?></h5>
					<a href="<?php echo site_url()?>/login" class="btn btn-danger btn-selesei">
						SELESAI
					</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>