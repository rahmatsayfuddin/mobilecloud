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
	<img src="<?php echo base_url()?>/assets/image/home/logo_login.png"  class="logo-center">
	<div class="container">
		<div class="col-sm-6 login-box">
			<div class="row">
				<div class="col-sm-12">
					<h3>Forgot Password</h3>

					<form action="<?php echo site_url() ?>/login/verifikasi_otp" method="post">

						<div class="form-group">
							<label for="pwd">Email:</label>
							<input type="email" class="form-control" name="email" >
						</div>

						<div class="form-group">

							<button type="submit" class="btn btn-danger pull-right">Submit</button>
						</div>
						
					</form>


					<br>
					<br>


				</div>
			</div>
		</div>
	</div>
	<?php if (isset($_SESSION['email_verif_message'])): ?>
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
						<p><?php echo $_SESSION['email_verif_message']?></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>

	<?php endif ?>
</body>
</html>