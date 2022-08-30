<?php
	if (isset($_POST['login'])) {
		$customer_email = $_POST['c_email'];
		$customer_pass = $_POST['c_pass'];

	$secret = '6LeQlHYUAAAAAINHxB4boa6a_oPbYhJeRBwyQ2Bu';
					  		$response = $_POST['g-recaptcha-response'];
					  		$remoteip = $_SERVER['REMOTE_ADDR'];
					  		$url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
					  		$result = json_decode($url, true);

					  		if ($result['success'] == 1) {

		$login = $getFromU->login($customer_email, $customer_pass);
		if ($login === false) {
			$error = "Email or Password is Wrong";
		}else {
			$_SESSION['login_success_msg'] = "You have Successfully Login";
		}
	}

 else{
					  			echo '<script>alert("Please Select Re-Captcha")</script>';
					  		}
}
?>

<div class="card">
  <div class="card-body">
    <div class="col-md-12">
    	<h3 class="card-title text-center">Login</h3>
	    <p class="card-text text-muted text-center">Already our Member?</p>
	    <p class="card-text my-4 text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias eum excepturi veniam modi laborum sunt autem similique dicta quasi saepe voluptatibus ducimus iusto, illum maxime labore nesciunt obcaecati blanditiis.</p>


	    <?php if (isset($error)): ?>
	    	
	    		<div class="alert alert-danger" role="alert">
				  <a href="#" class="alert-link"><p><?php echo $error; ?></p></a>.
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
				</div>
	    <?php endif ?>


	    <form method="post" class="needs-validation" novalidate>
			  <div class="form-row">
			    <div class="col-12 mb-3">
			      <label for="email" class="font-weight-bold">Email</label>
			      <input type="email" name="c_email" class="form-control" id="email" placeholder="Enter Your Email" required>
			      <div class="invalid-feedback">
			        Please provide a valid Email Address.
			      </div>
			    </div>
			  </div>
			  <div class="form-row">
			    <div class="col-12 mb-3">
			      <label for="password" class="font-weight-bold">Password</label>
			      <input type="password" name="c_pass" class="form-control" id="password" placeholder="Enter Your Password" required>
			      <div class="invalid-feedback">
			        Please provide a Password.
			      </div>
			    </div>
			  </div>
<div class="form-row p-3">
						
						      <div class="g-recaptcha" data-sitekey="6LeQlHYUAAAAAI2t81Q3myw4fefWMyiPJ5PpY3q0"></div>
						    
						  </div>
			  <div class="row">

			  	<div class="col-lg-4 offset-lg-4">
			  		<button class="btn btn-info form-control" name="login" type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
			  	</div>

			  	<div class="col-md-2 offset-md-2">
						<a href="forgot_password.php" class="btn btn-sm btn-danger">Forgot Password?</a>
			  	</div>
			  </div>
			</form>

			<a href="customer_register.php">New ? Register Here</a>

			<script>
				// Example starter JavaScript for disabling form submissions if there are invalid fields
				(function() {
				  'use strict';
				  window.addEventListener('load', function() {
				    // Fetch all the forms we want to apply custom Bootstrap validation styles to
				    var forms = document.getElementsByClassName('needs-validation');
				    // Loop over them and prevent submission
				    var validation = Array.prototype.filter.call(forms, function(form) {
				      form.addEventListener('submit', function(event) {
				        if (form.checkValidity() === false) {
				          event.preventDefault();
				          event.stopPropagation();
				        }
				        form.classList.add('was-validated');
				      }, false);
				    });
				  }, false);
				})();
			</script>
    </div>
  </div>
</div>