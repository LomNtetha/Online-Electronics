
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>DivTech - Ecommerce System| Confirm</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="../css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="../css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="../css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="../css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="../css/style.css"/>

 		   <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- LightBox -->
<link href="../assets/lightbox2-2.11.3/lightbox2-2.11.3/dist/css/lightbox.min.css" rel="stylesheet">
    <!-- fancybox -->
<link rel="stylesheet" type="text/css" href="../assets/dist/jquery.fancybox.min.css">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
<?php require_once 'includes/header.php'; ?>

<?php
	if (!isset($_SESSION['customer_email'])) {
		header('Location: ../checkout.php');
	}
?>
<?php
	if (isset($_GET['order_id'])) {
		$order_id = $_GET['order_id'];

		$view_order = $getFromU->view_customer_order_by_order_id($order_id);

		$invoice_no = $view_order->invoice_no;
		$amount = $view_order->due_amount;

	}




?>
<!-- NAVIGATION -->
<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="../index.php?vhid=">Home</a></li>
					
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->


		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Regular Page</h3>
						<ul class="breadcrumb-tree">
							<li><a href="../index.php">Home</a></li>
							<li class="active">Login</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

<div id="content">
	<div class="container">
		<div class="row">

			<div class="col-md-3">
				<?php require_once 'includes/sidebar.php'; ?>
			</div>

			<div class="col-md-9 mb-5">
				<div class="card">
				  <div class="card-header text-center">
						<h5 class="mt-4">Confirm Payment</h5>
						<p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>. Our customer service is working for you 24/7</p>
				  </div>
				  <div class="card-body">
						<?php
							if (isset($_POST['confirm_payment'])) {
								$order_id = $_POST['order_id'];
								$invoice_no = $_POST['invoice_no'];
								$amount = $_POST['amount_sent'];
								$payment_mode = $_POST['payment_mode'];
								$ref_no = $_POST['ref_no'];
								$code = $_POST['code'];
								$payment_date = $_POST['date'];

								$complete = "Complete";

								$insert_payment = $getFromU->create("payments", array("invoice_no" => $invoice_no, "amount" => $amount, "payment_mode" => $payment_mode, "ref_no" => $ref_no, "code" => $code, "payment_date" => $payment_date));

								$update_customer_order = $getFromU->update_customer_order_status($complete, "customer_orders", $order_id);

								$update_pending_order = $getFromU->update_customer_order_status($complete, "pending_orders", $order_id);

								$_SESSION['update_customer_order_msg'] = "Your Payment has been Received. Order will be completed within 24 hours";
								header('Location: my_account.php?my_orders');

							}
						?>

						<form method="post" action="confirm.php" class="needs-validation" novalidate>
							<div class="form-row">
						    <div class="col-12 mb-3">
						      <input type="hidden" name="order_id" value="<?php echo $order_id; ?>" class="form-control" id="order_id" required>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="invoice_no">Invoice No</label>
						      <input type="text" name="invoice_no" value="<?php echo $invoice_no; ?>" class="form-control" id="invoice_no" required>
						      <div class="invalid-feedback">
						        Please provide a Invoice No.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="amount_sent">Ammount Sent</label>
						      <input type="number" name="amount_sent" value="<?php echo $amount; ?>" class="form-control" id="amount_sent" required>
						      <div class="invalid-feedback">
						        Please provide a Ammount.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="payment_mode">Select Payment Method</label>
						      <select class="custom-select mr-sm-2" name="payment_mode" id="payment_mode">
						        <option selected>Choose payment...</option>
						
						        <option value="M-Pesa">M-Pesa</option>
						        <option value="Ecocash">Eco Cash</option>
						        <option value="bank">Bank</option>
						      </select>
						      <div class="invalid-feedback">
						        Please select a method.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="ref_no">Transaction/Refference ID</label>
						      <input type="number" name="ref_no" class="form-control" id="ref_no" required>
						      <div class="invalid-feedback">
						        Please provide a Transaction/Refference ID.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="code">Mpesa/Ecocash/Bank</label>
						      <input type="text" name="code" class="form-control" id="code" required>
						      <div class="invalid-feedback">
						        Please provide a Mpesa/Ecocash<.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="date">Payment Date</label>
						      <input type="date" name="date" class="form-control" id="date" placeholder="Enter Your Subject" required>
						      <div class="invalid-feedback">
						        Please select a Date.
						      </div>
						    </div>
						  </div>

						  <div class="row">
						  	<div class="col-lg-4 offset-lg-4">
						  		<button class="btn btn-info form-control" type="submit" name="confirm_payment"><i class="fas fa-check-circle"></i> Confirm Payment</button>
						  	</div>
						  </div>
						</form>

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
				</div>  <!-- Card End -->
			</div>



		</div>
	</div>
</div>

<?php require_once 'includes/footer.php'; ?>
 
		<!-- jQuery Plugins -->
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/slick.min.js"></script>
		<script src="../js/nouislider.min.js"></script>
		<script src="../js/jquery.zoom.min.js"></script>
		<script src="../js/main.js"></script>

		  <!-- fancybox -->
<script src="../assets/dist/jquery.fancybox.min.js"></script>
    <!-- lightbox -->
  <script src=" ../assets/lightbox2-2.11.3/lightbox2-2.11.3/dist/js/lightbox-plus-jquery.min.js"></script>
  <!-- Jquery -->

	</body>
</html>
