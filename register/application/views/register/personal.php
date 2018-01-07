<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/plugin/font_awesome/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/plugin/bootstrap/css/bootstrap.min.css">
	<script src="<?php echo base_url()?>/assets/plugin/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url()?>/assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/custom/bootstrapcustom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/custom/login_register.css">
	
</head>
<script type="text/javascript">
	function checkPasswordMatch() {
		var password = $("#password").val();
		var confirmPassword = $("#confirm_password").val();

		if (password != confirmPassword)
		{
			$(".pesan_password").html("<p class='text-danger'>password doesn't match</p>");
		}
		else{
			$(".pesan_password").html("");
		}
	}
	function check_aviability(type,value) {
		if ((type=='email') ){
			var $url =  "<?php echo base_api ?>check?type="+type+"&value="+value+'<?php echo '@'.domain ?>';
		}
		if ((type=='phonenumber')){
			var $url =  "<?php echo base_api ?>check?type="+type+"&value="+value;
		}
		$.ajax({
			url: $url,
			method: 'GET',
			success: function (data) {
				if ((type=='email') ){
					var error_message ="<p class='text-success'>"+data.result.text+"</p>";
					$(".pesan_email").html(error_message);
				}
				if ((type=='phonenumber')){
					var error_message ="<p class='text-success'>"+data.result.text+"</p>";
					$(".pesan_phonenumber").html(error_message);
					
				}
				document.getElementById("sign_up").disabled = false;
			},
			error: function (data, status, error) {
				var response=data.responseJSON;
				//console.log(response);
				if ((type=='email') ){
					var error_message ="<p class='text-danger'>"+response.result.text+"</p>";
					$(".pesan_email").html(error_message);
				}
				if ((type=='phonenumber')){
					var error_message ="<p class='text-danger'>"+response.result.text+"</p>";
					$(".pesan_phonenumber").html(error_message);

				}
				$('#sign_up').attr('disabled', 'disabled');

			}
		});
	}
</script>
<body>
	<img src="<?php echo base_url()?>/assets/image/home/logo_mobile_cloud.png"  class="logo-center">
	<div class="container">
		<div class="col-sm-6 login-box">
			<div class="row">
				<div class="col-sm-12">
					<br>
					<h3>SIGN UP</h3>
					<form action="<?php echo site_url() ?>/register/send_otp" method="post">
						<div class="form-group">
							<label for="nama_lengkap">First Name:</label>
							<input type="text" class="form-control" id="nama_depan" required name="nama_depan" placeholder="First Name">
						</div>
						<div class="form-group">
							<label for="nama_lengkap">Last Name:</label>
							<input type="text" class="form-control" id="nama_belakang" required name="nama_belakang" placeholder="Last Name">
						</div>						
						<div class="form-group">
							<label for="email">Email:</label>
							<div class="input-group">
								<input type="text" class="form-control" required placeholder="user_name" onchange="check_aviability('email',this.value) " name="email">
								<span class="input-group-btn">
									<button class="btn btn-default" disabled type="button">@<?php echo domain ?></button>
								</span>
							</div>
							<div class="pesan_email">

							</div>
						</div>
						<div class="form-group">
							<label for="usr">Phone Number:</label>
							<input type="text" required class="form-control" name="nomor_telepon" onchange="check_aviability('phonenumber',this.value) ">
							<div class="pesan_phonenumber">
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-6">
									<label for="password">Password</label>
									<input class="form-control" required id="password" name="password" type="password" >
								</div>
								<div class="col-lg-6">
									<label for="confirm_password">Repeat Password</label>
									<input class="form-control" required id="confirm_password"  name="confirm_password" type="password" onchange="checkPasswordMatch()">
								</div>
							</div>
							<div class="pesan_password">

							</div>
						</div>
<!-- 						<div class="form-group">
							<div class="row">
								<div class="col-lg-4">
									<label for="ex1">Tanggal Lahir</label>
									<select  class="form-control" name="bulan_lahir">
										<option value="" disabled selected>Bulan</option>>
									</select>
								</div>
								<div class="col-lg-4">
									<label for="ex2"><br></label>
									<input class="form-control" id="ex2" type="text" placeholder="Tahun">
								</div>
								<div class="col-lg-4">
									<label for="ex2"><br></label>
									<input class="form-control" id="ex2" type="text" placeholder="Tahun">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="sel1">Jenis Kelamin:</label>
							<select class="form-control" id="sel1">
								<option>Laki Laki</option>
								<option>Perempuan</option>
							</select>
						</div> 
					-->
<!-- <div class="form-group">
						<label for="sel1">Negara :</label>
						<select class="form-control" id="sel1">
							<option></option>
							<option>Indonesia</option>
						</select>
					</div> -->

					<div class="form-group">
						<div class="row">
							<div class="col-sm-9">
								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input type="checkbox" required class="form-check-input" value="">
										I agree to the <a href="<?php echo base_url()?>assets/file/term_and_conditions.docx">Term and Conditions</a>
									</label>

								</div>	
							</div>
							<div class="col-sm-3">

								<button class="btn btn-danger pull-right" id="sign_up">Sign Up</button>
							</div>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>