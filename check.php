<?php require_once 'core/init.php'; ?>
<?php
	if (isset($_POST['apply_coupon'])) {
		$coupon_code = $getFromU->checkInput(strtoupper($_POST['coupon_code']));

		if (!empty($coupon_code)) {

			$get_coupons = $getFromU->view_coupon_by_coupon_code($coupon_code);
			$count_coupon = count($get_coupons);

			if ($count_coupon === 1 ) {

				foreach ($get_coupons as $get_coupon) {

					$product_id = $get_coupon->product_id;
					$coupon_price = $get_coupon->coupon_price;
					$coupon_limit = $get_coupon->coupon_limit;
					$coupon_used = $get_coupon->coupon_used;

				}

				if ($coupon_limit == $coupon_used ) {

					$coupon_error_msg = "Your Coupon Code has been Expired";

				}else {

					$ip_add = $getFromU->getRealUserIp();

					$check_cart = $getFromU->check_product_by_ip_id($ip_add, $product_id);

					if ($check_cart == 1) {
						$update_used = $getFromU->update_used_coupon($coupon_code);

						if ($update_used) {
							$update_cat = $getFromU->update_cart_price($product_id, $ip_add, $coupon_price);

							if ($update_cat) {
								$coupon_success_msg = "Your Coupon Code has been Applied";
							}
						}

					}else {
						$coupon_error_msg = "Product does not Exits in Cart";
					}

				}

			}else {
				$coupon_error_msg = "You have used an Invalid Coupon Code";
			}
		}else {
			$coupon_error_msg = "Please Enter a valid Coupon Code";
		}
	}

?>


		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">

			<div class="col-12">
				<?php if (isset($coupon_error_msg)): ?>
					<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
					  <?php echo $coupon_error_msg; ?>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
				<?php endif ?>
			</div>

			<div class="col-12">
				<?php if (isset($coupon_success_msg)): ?>
					<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
					  <?php echo $coupon_success_msg; ?>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
				<?php endif ?>
			</div>


				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="first-name" placeholder="First Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last-name" placeholder="Last Name">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Country">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telephone">
							</div>
							<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="create-account">
									<label for="create-account">
										<span></span>
										Create Account?
									</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
										<input class="input" type="password" name="password" placeholder="Enter Your Password">
									</div>
								</div>
							</div>
						</div>
						<!-- /Billing Details -->

						<!-- Shiping Details -->
						<div class="shiping-details">
							<div class="section-title">
								<h3 class="title">Shiping address</h3>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="shiping-address">
								<label for="shiping-address">
									<span></span>
									Ship to a diffrent address?
								</label>
								<div class="caption">
									<div class="form-group">
										<input class="input" type="text" name="first-name" placeholder="First Name">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="last-name" placeholder="Last Name">
									</div>
									<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="address" placeholder="Address">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="city" placeholder="City">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="country" placeholder="Country">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
									</div>
									<div class="form-group">
										<input class="input" type="tel" name="tel" placeholder="Telephone">
									</div>
								</div>
							</div>
						</div>
						<!-- /Shiping Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" placeholder="Order Notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
							<div class="alert alert-success" role="alert">
  <a href="#" class="alert-link"><p>You currently have <?php echo $getFromU->count_product_by_ip($ip_add); ?> product(s) in Cart.</p></a>.
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
					
						</div>

						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>


							<div class="order-products">

									<?php
										$ip_add = $getFromU->getRealUserIp();
										$total = 0;
										$records = $getFromU->select_products_by_ip($ip_add);
										foreach ($records as $record) {
											$product_id = $record->p_id;
											$product_qty = $record->qty;
											$product_price = $record->product_price;
											$product_size = $record->size;
											$get_prices = $getFromU->viewProductByProductID($product_id);
											foreach ($get_prices as $get_price) {
												$product_img1 = $get_price->product_img1;
												$product_title = $get_price->product_title;
												$sub_total = $product_price * $product_qty;
												$total += $sub_total;

												$_SESSION['product_qty'] = $product_qty;
									?>

								<div class="order-col">
									<div><?php echo $product_qty;?> x  <a href="product.php?product_id=<?php echo $product_id; ?>"><?php echo $product_title; ?>       M <?php echo number_format ($product_price,2); ?></a></div>
									<div>M <?php echo number_format($sub_total, 2) ; ?></div>
								</div>
								<?php } } ?>
							</div>
							<div class="order-col">
								<div>Sub Total</div>
								<div><strong> M <?php echo number_format($total, 2) ; ?></strong></div>
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>M <?php echo number_format($shipping = ($total *0) / 100, 2); ?></strong></div>
							</div>
							<div class="order-col">
								<div>Tax</div>
								<div><strong>M <?php echo number_format($tax = ($total * 0) / 100, 2); ?></strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">M <?php echo number_format($total + $tax + $shipping, 2); ?></strong></div>
							</div>
						</div>
						
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1">
								<label for="payment-1">
									<span></span>
									Mpesa
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2">
								<label for="payment-2">
									<span></span>
									Paypal System
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3">
								<label for="payment-3">
									<span></span>
									Ecocash
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-4">
								<label for="payment-4">
									<span></span>
								Direct Bank Transfer
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<?php
						require_once 'payment_options.php';?>
						
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
     

