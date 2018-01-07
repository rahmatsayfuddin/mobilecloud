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
<body>

	<img src="<?php echo base_url()?>/assets/image/home/logo_login.png"  class="logo-center">
	<style>

	/* Mark input boxes that gets an error on validation: */
	input.invalid {
		background-color: #ffdddd;
	}

	/* Hide all steps by default: */
	.tab {
		display: none;
	}

	button:hover {
		opacity: 0.8;
	}

	#prevBtn {
		background-color: #bbbbbb;
	}

	/* Make circles that indicate the steps of the form: */
	.step {
		height: 15px;
		width: 15px;
		margin: 0 2px;
		background-color: #bbbbbb;
		border: none;  
		border-radius: 50%;
		display: inline-block;
		opacity: 0.5;
	}

	.step.active {
		opacity: 1;
	}

	/* Mark the steps that are finished and valid: */
	.step.finish {
		background-color: #4CAF50;
	}
</style>
<div class="container">
	<div class="col-md-6 login-box">
		<form id="regForm" >
			<h3>Sign Up</h3>
			<!-- One "tab" for each step in the form: -->
			<div class="tab">
				<div class="form-group">
					<label for="usr">Nama Lengkap:</label>
					<input type="text" class="form-control" id="usr">
				</div>
				<div class="form-group">
					<label for="usr">Badan Usaha:</label>
					<input type="text" class="form-control" id="usr">
				</div>
				<div class="form-group">
					<label for="sel1">Negara :</label>
					<select class="form-control" id="sel1">
						<option></option>
						<option>Indonesia</option>
					</select>
				</div>
				<div class="form-group">
					<label for="usr">Nomor Telepon:</label>
					<input type="text" class="form-control" id="usr">
				</div>
				<div class="form-group">
					<label for="usr">Email Yang Aktif:</label>
					<input type="text" class="form-control" id="usr">
				</div>
			</div>
			<div class="tab">
				<h1>Sign Up</h1>
				<div class="form-group">
					<label for="usr">Nama Domain:</label>
					<input type="text" class="form-control" id="usr">
				</div>
				<div class="form-group">
					<label for="usr">Alamat Email Bisnis:</label>
					<input type="text" class="form-control" id="usr">
				</div>
				<div class="form-group">
					<label for="usr">Password :</label>
					<input type="text" class="form-control" id="usr">
				</div>
				<div class="form-group">
					<label for="usr">Konfirmasi Password:</label>
					<input type="text" class="form-control" id="usr">
				</div>
			</div>
	<!-- 		<div class="tab">Birthday:
				<p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
				<p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
				<p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
			</div>
			<div class="tab">Login Info:
				<p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
				<p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
			</div> -->
			<div style="overflow:auto;">
				<div style="float:right;">
					<button type="button" id="prevBtn" class="btn btn-default" onclick="nextPrev(-1)">Previous</button>
					<button type="button" id="nextBtn" class="btn btn-danger" onclick="nextPrev(1)">Next</button>
				</div>
			</div>
			<!-- Circles which indicates the steps of the form: -->
			<div style="text-align:center;margin-top:40px;">
				<span class="step"></span>
				<span class="step"></span><!-- 
				<span class="step"></span>
				<span class="step"></span> -->
			</div>
		</form>
	</div>
</div>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
  	document.getElementById("prevBtn").style.display = "none";
  } else {
  	document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
  	document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
  	document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
}
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
  }
}
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
  	document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
  	x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

</body>
</html>