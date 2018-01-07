<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/plugin/font_awesome/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/plugin/bootstrap/css/bootstrap.min.css">
	<script src="<?php echo base_url()?>/assets/plugin/jquery/jquery-3.2.1.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script> 
	<script src="<?php echo base_url()?>/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/custom/bootstrapcustom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/custom/login_register.css">
	
</head>
<body>
	<img src="<?php echo base_url()?>/assets/image/home/logo_login.png"  class="logo-center">
	<div class="container">
		<div class="col-sm-6 login-box">
			<div class="row">
				<div class="col-sm-12">
					<form action="<?php echo site_url()?>/register/do_register" method="post">
						<div class="form-group">
							<br>
							<h5 class="text-center">Masukkan code yang telah dikirim ke nomor telepon anda</h5>
							<input type="hidden" name="firstname" value="<?php echo $value['nama_depan'] ?>">
							<input type="hidden" name="lastname" value="<?php echo $value['nama_belakang'] ?>">
							<input type="hidden" name="phone" value="<?php echo $value['nomor_telepon']?>">
							<input type="hidden" name="email" value="<?php echo $value['email'] ?>">
							<input type="hidden" name="password" value="<?php echo $value['password'] ?>">
							<input type="text" name="code" class="form-control">
							
						</div>
						<div class="form-group">
							<button type="Submit" class="btn btn-danger btn-selesei pull-right" style="margin-bottom: 10px;">
								Submit
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>