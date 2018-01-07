<!DOCTYPE html>
<html>
<head>
	<title>Telkom Mail</title>
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/plugin/font_awesome/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/plugin/bootstrap/css/bootstrap.min.css">
	<script src="<?php echo base_url()?>/assets/plugin/jquery/jquery-3.2.1.slim.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script> 
	<script src="<?php echo base_url()?>/assets/plugin/bootstrap/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/custom/bootstrapcustom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/custom/login_register.css">
	
</head>
<body>
	<script type="text/javascript">
		function checkPasswordMatch() {
			var password = $("#password").val();
			var confirmPassword = $("#confirm_password").val();

			if (password != confirmPassword)
			{
				$(".pesan_password").html("<p class='text-danger'>Password Tidak Sama</p>");
				$('#btn_forgot').attr('disabled', 'disabled');
			}
			else{
				$(".pesan_password").html("");
				document.getElementById("btn_forgot").disabled = false;
			}
		}
	</script>
	<img src="<?php echo base_url()?>/assets/image/home/logo_login.png"  class="logo-center">
	<div class="container">
		<div class="col-sm-6 login-box">
			<div class="row">
				<div class="col-sm-12">
					<h3>Forgot Password</h3>

					<form action="<?php echo site_url() ?>/login/do_forgot" method="post">

						<div class="form-group">
							<input type="hidden" class="form-control" name="email" value="<?php echo $email ?>">
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-6">
									<label for="password">Password</label>
									<input class="form-control" required id="password" name="password" type="password" >
								</div>
								<div class="col-lg-6">
									<label for="confirm_password">Konfirmasi Password</label>
									<input class="form-control" required id="confirm_password" type="password" onchange="checkPasswordMatch()">
								</div>
							</div>
							<div class="pesan_password">

							</div>
						</div>

						<div class="form-group">
							<label>Code OTP</label>
							<input type="text" class="form-control" name="code" >
						</div>

						<div class="form-group">

							<button type="submit" class="btn btn-danger pull-right" id="btn_forgot">Submit</button>
						</div>
						
					</form>


					<br>
					<br>


				</div>
			</div>
		</div>
	</div>
	<?php if (isset($_SESSION['otp_message'])): ?>
		<script type="text/javascript">
			$( document ).ready(function() {
				$("#modal_login").modal('show');
			});
		</script>
		<div id="modal_login" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<p><?php echo $_SESSION['otp_message']?></p>
					</div>
					<div class="modal-footer">
						<?php if ($_SESSION['otp_success']): ?>
							<a class="btn btn-default" href="<?php echo site_url()?>/login" >login</a>
						<?php else: ?>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<?php endif ?>
					</div>
				</div>

			</div>
		</div>

	<?php endif ?>
</body>
</html>