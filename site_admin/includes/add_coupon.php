<?php require_once 'includes/header.php'; ?>
<?php
	if (isset($_POST['submit'])) {
		$coupon_title = $_POST['coupon_title'];
		$product_id = $_POST['product_id'];
		$coupon_price = $_POST['coupon_price'];
		$coupon_code = strtoupper($_POST['coupon_code']);
		$coupon_limit = $_POST['coupon_limit'];

		$check_coupon = $getFromU->check_coupon_by_coupon_code_or_product_id($product_id, $coupon_code);

		if ($check_coupon >= 1) {
			$_SESSION['insert_coupon_error_msg'] = "Coupon Code OR Product already Added. Please Choose another";
		}else {

			$insert_coupon = $getFromU->create("coupons", array("product_id" => $product_id, "coupon_title" => $coupon_title, "coupon_price" => $coupon_price, "coupon_code" => $coupon_code, "coupon_limit" => $coupon_limit));

			if ($insert_coupon) {
				$_SESSION['insert_coupon_msg'] = "Coupon Inserted Successfully";
				header('Location: index.php?view_coupons');

			}else {
				echo '<script>alert("Coupon has not added")</script>';
			}

		}

	}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Insert Coupon</li>
	</ol>
</nav>


<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Insert Coupon</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">

				<?php if (isset($_SESSION['insert_coupon_error_msg'])): ?>
					<div class="alert alert-danger text-dark rounded text-center alert-dismissible fade show" role="alert">
					  <?php echo $_SESSION['insert_coupon_error_msg']; unset($_SESSION['insert_coupon_error_msg']); ?>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
				<?php endif ?>

				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="coupon_title">Coupon Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="coupon_title" class="form-control" id="coupon_title" placeholder="Coupon Title" required>
				      <div class="invalid-feedback">
				        Please provide a Coupon Title.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
						<div class="col-3">
							<label for="product_id">Coupon Product / Bundle</label>
						</div>
						<div class="col-md-9">
							<select name="product_id" id="product_id" class="form-control" required>
								<option value="">----- Select a Product -----</option>
								<?php
									$products = $getFromU->view_bundle_products('product');
									foreach ($products as $product) {
										$product_id = $product->product_id;
										$product_title = $product->product_title;
								?>
								<option value="<?php echo $product_id; ?>"><?php echo $product_title; ?></option>
								<?php } ?>
								<option value="" disabled>----- Select a Bundle -----</option>
								<?php
									$products = $getFromU->view_bundle_products('bundle');
									foreach ($products as $product) {
										$product_id = $product->product_id;
										$product_title = $product->product_title;
								?>
								<option value="<?php echo $product_id; ?>"><?php echo $product_title; ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback">
								Please select a Coupon Product.
							</div>
						</div>
					</div>


					<div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="coupon_price">Coupon Price</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="number" name="coupon_price" class="form-control" id="coupon_price" placeholder="Enter Coupon Price" required>
				      <div class="invalid-feedback">
				        Please provide a Coupon Price.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="coupon_code">Coupon Code</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="coupon_code" class="form-control" id="coupon_code" placeholder="Enter Coupon Code" required>
				      <div class="invalid-feedback">
				        Please provide a Coupon Code.
				      </div>
				    </div>
				  </div>



				  <div class="form-row mb-3">
				    <div class="col-3 ">
				      <label for="coupon_limit">Coupon Limit</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="coupon_limit" class="form-control" id="coupon_limit" placeholder="Enter Coupon Limit" required>
				      <div class="invalid-feedback">
				        Please provide Coupon Limit.
				      </div>
				    </div>
				  </div>



				  <div class="row">
				  	<div class="col-12 my-5">
				  		<button class="btn btn-info form-control" name="submit" type="submit"><i class="fas fa-plus-circle"></i> Insert Coupon</button>
				  	</div>
				  </div>
				</form>
			</div>
		</div>

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





<?php require_once 'includes/footer.php'; ?>

