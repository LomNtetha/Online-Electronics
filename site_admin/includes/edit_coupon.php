<?php require_once 'includes/header.php'; ?>
<?php
	if (isset($_GET['edit_coupon'])) {
		$coupon_id = $getFromU->checkInput($_GET['edit_coupon']);

		$view_coupon = $getFromU->view_coupon_by_coupon_id($coupon_id);

		$coupon_title = $view_coupon->coupon_title;
		$coupon_price = $view_coupon->coupon_price;
		$coupon_code = $view_coupon->coupon_code;
		$coupon_limit = $view_coupon->coupon_limit;
		$product_id = $view_coupon->product_id;

		$view_product = $getFromU->view_Product_By_Product_ID($product_id);
    $the_product_title = $view_product->product_title;
	}
?>


<?php
	if (isset($_POST['update_coupon'])) {
		$coupon_id = $_POST['coupon_id'];
		$coupon_title = $_POST['coupon_title'];
		$product_id = $_POST['product_id'];
		$coupon_price = $_POST['coupon_price'];
		$coupon_code = strtoupper($_POST['coupon_code']);
		$coupon_limit = $_POST['coupon_limit'];


		$update_coupon = $getFromU->update_coupon("coupons", $coupon_id, array("product_id" => $product_id, "coupon_title" => $coupon_title, "coupon_price" => $coupon_price, "coupon_code" => $coupon_code, "coupon_limit" => $coupon_limit));

		if ($update_coupon) {
			$_SESSION['update_coupon_msg'] = "Coupon Updated Successfully";
			header('Location: index.php?view_coupons');

		}else {
			echo '<script>alert("Coupon has not Updated")</script>';
		}
	}

?>

<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Coupon</li>
	</ol>
</nav>


<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-edit"></i> Update Coupon</div>
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
				    <div class="col-md-9">
				    	<input type="hidden" name="coupon_id" value="<?php echo $coupon_id ?>" required>
				    </div>
				  </div>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="coupon_title">Coupon Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="coupon_title" value="<?php echo $coupon_title ?>" class="form-control" id="coupon_title" placeholder="Coupon Title" required>
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
								<option value="<?php echo $product_id; ?>"><?php echo $the_product_title; ?></option>
								<?php
									$products = $getFromU->view_bundle_products('product');
									foreach ($products as $product) {
										$product_id = $product->product_id;
										$product_title = $product->product_title;
										if ($product_title == $the_product_title) {
											continue;
										}
								?>
								<option value="<?php echo $product_id; ?>"><?php echo $product_title; ?></option>
								<?php } ?>
								<option value="" disabled>----- Select a Bundle -----</option>
								<?php
									$products = $getFromU->view_bundle_products('bundle');
									foreach ($products as $product) {
										$product_id = $product->product_id;
										$product_title = $product->product_title;
										if ($product_title == $the_product_title) {
											continue;
										}
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
				    	<input type="number" name="coupon_price" value="<?php echo $coupon_price ?>" class="form-control" id="coupon_price" placeholder="Enter Coupon Price" required>
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
				    	<input type="text" name="coupon_code" value="<?php echo $coupon_code ?>" class="form-control" id="coupon_code" placeholder="Enter Coupon Code" required>
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
				    	<input type="text" name="coupon_limit" value="<?php echo $coupon_limit ?>" class="form-control" id="coupon_limit" placeholder="Enter Coupon Limit" required>
				      <div class="invalid-feedback">
				        Please provide Coupon Limit.
				      </div>
				    </div>
				  </div>

				  <div class="row">
				  	<div class="col-12 my-5">
				  		<button class="btn btn-info form-control" name="update_coupon" type="submit"><i class="fas fa-edit"></i> Update Coupon</button>
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