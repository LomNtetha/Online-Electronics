
<?php
	if (isset($_POST['login'])) {
		$customer_email = $_POST['customer_email'];
		$customer_pass = $_POST['customer_pass'];
		

		if (!empty($customer_email) && !empty($customer_pass)) {

            if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
                $error = "Invaild Email Address";
            }elseif (strlen($customer_pass) < 5) {
                $error = "Password can't not be less than 5 Characters";
            }else{

		$login = $getFromU->login($customer_email, $customer_pass);
		if ($login === false) {
			$error = "Email or Password is Wrong";
		}else {
			$_SESSION['login_success_msg'] = "You have Successfully Login";
		}
	}
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

		<form id="login-form" action="login.php" method="post" class="rounded">
            <h2 class="login-title">Log in</h2>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger text-center text-white alert-dismissible fade show" role="alert">
                  <?php echo $error; ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php endif ?>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="email" name="customer_email" placeholder="Email" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="customer_pass" placeholder="Password">
                </div>
            </div>
            <div class="form-group d-flex justify-content-between">
                <label class="ui-checkbox ui-checkbox-info">
                    <input type="checkbox">
                    <span class="input-span"></span>Remember me</label>
                <a href="forgot_password.php">Forgot password?</a>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit" name="login">Login</button>
            </div>
            
            <div class="text-center social-auth m-b-20">
			<div class="social-auth-hr">
                <span>Or login with</span>
            </div>
                <a class="btn btn-social-icon btn-twitter m-r-5" href="javascript:;"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-social-icon btn-facebook m-r-5" href="javascript:;"><i class="fab fa-facebook"></i></a>
                <a class="btn btn-social-icon btn-google m-r-5" href="javascript:;"><i class="fab fa-google-plus"></i></a>
                <a class="btn btn-social-icon btn-linkedin m-r-5" href="javascript:;"><i class="fab fa-linkedin"></i></a>
            
            </div>
            <div class="text-center">Not a member?
                <a class="color-blue" href="register.php">Create accaunt</a>
            </div>
        </form>

			<a href="customer_register.php">New ? Register Here</a>

			<script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    admin_email: {
                        required: true,
                        email: true
                    },
                    admin_pass: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
    </div>
  </div>
</div>