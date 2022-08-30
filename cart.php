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



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>DivTech - Ecommerce System</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

 		   <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">


 		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 		<!--[if lt IE 9]>
 		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 		<![endif]-->

    </head>
	<body>
		<!--header-->
        <?php include('includes/header.php');?>
<!-- /header--> 

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
				<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active" ><a href="index.php?vhid=">Home</a></li>
						<li><a href="#">Hot Deals</a></li>
						<li ><a href="shop.php?vhid=">Categories</a></li>
						<li><a href="#">Laptops</a></li>
						<li><a href="#">Smartphones</a></li>
						<li><a href="#">Cameras</a></li>
						<li><a href="#">Accessories</a></li>
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
							<li><a href="index.php?vhid=">Home</a></li>
							<li class="active">Shopping Cart</li>
						</ul>
					</div>
				</div>
				<!-- /row -->

			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->



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



			<div class="col-md-9">
				<div class="card mb-3">
				  <div class="card-body">
				    <h5 class="card-title">Shopping Cart</h5>
				   							<div class="alert alert-success" role="alert">
  <a href="#" class="alert-link"><p>You currently have <?php echo $getFromU->count_product_by_ip($ip_add); ?> product(s) in Cart.</p></a>.
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
		
				    <form method="post" action="cart.php" enctype="multipart/form-data">
							<div class="table-responsive mb-3">
							  <table class="table table-bordered table-hover text-center">
								  <thead>
								    <tr>
								      <th colspan="2" scope="col">Product</th>
								      <th scope="col" width="20%">Quantity</th>
								      <th scope="col">Unit Price (M)</th>
								      <!--<th scope="col">Size</th>-->
								      <th scope="col">Delete</th>
								      <th scope="col">Sub Total (M)</th>
								    </tr>
								  </thead>
								  <tbody>

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

								    <tr>
								      <td>
								      	<a href="product.php?product_id=<?php echo $product_id; ?>"><img class="img-responsive  cart_image" src="site_admin/product_images/<?php echo $product_img1; ?>"width="40px"></a>
								      </td>
								      <td>
								      	<a href="product.php?product_id=<?php echo $product_id; ?>"><?php echo $product_title; ?></a>
								      </td>
								      <td>
												<input type="number" name="quentity" value="<?php echo $_SESSION['product_qty'] ;?>" data-product_id = "<?php echo $product_id; ?>" class="quentity form-control" >
								      </td>
								      <td>M <?php echo $product_price; ?></td>
								      <!--<td><?php //echo ucwords($product_size); ?></td>-->
								      <td>
								      	<div class="custom-control custom-checkbox">
									        <input type="checkbox" name="remove[]" value="<?php echo $product_id; ?>" class="custom-control-input" id="checkbox['<?php echo $product_id; ?>']">
									        <label class="custom-control-label" for="checkbox['<?php echo $product_id; ?>']"></label>
									      </div>
								      </td>
								      <td class="text-right">M <?php echo number_format($sub_total, 2) ; ?></td>
								    </tr>
									<?php } } ?>

								    <tr>
								    	<th class="text-right" colspan="5"> Total </th>
								    	<th class="text-right" colspan="1"> M <?php echo number_format($total, 2) ; ?></th>
								    </tr>

								  </tbody>
								</table>
<!--
								<div class="form-inline float-right">
									<label class="mr-1" for="coupon">Coupon Code : </label>
								  <input type="text" name="coupon_code" class="form-control form-control-sm mr-sm-2" id="coupon" placeholder="Enter Coupon Code">
								  <button type="submit" name="apply_coupon" class="btn btn-sm btn-info">Apply Coupon</button>
								</div>-->

							</div> <!-- Table Responsive End -->


							<div class="card-footer">
								<div class="row">
									<div class="col-xs-4  pr-lg-1 pr-1 ">
										<a href="index.php?vhid=" class="primary-btn order-submit"><i class="fas fa-chevron-left"></i>continue shopping </a>
									</div>
									<!--
									<div class="col-lg-2 pr-1 pb-2">
										<a href="index.php" class="btn btn-outline-danger form-control"><i class="fas fa-shopping-cart"></i> Empty</a>


									</div>-->
									<div class="col-xs-4  pr-lg-1 pr-1">
										<button class="primary-btn order-submit" type= "submit" name="update" value="Update Cart">
										<i class="fas fa-shopping-cart"></i> Empty Cart
										</button>
									</div>
									<div class="col-xs-4  pr-lg-1 pr-1 ">
										<a href="checkout.php?vhid=" class="primary-btn order-submit"><i class="fas fa-chevron-right"></i>Proceed to Checkout </a>
									</div>
									
								</div>
							</div>
				    </form> <!-- Form End -->

				    <?php
							if (isset($_POST['update']) && !empty($_POST['update'])) {
								if (!empty($_POST['remove'])) {
									$product_ids = $_POST['remove'];
									foreach ($product_ids as $product_id) {
									 $delete_id = $getFromU->delete_from_cart_by_id($product_id);
								  }
									if ($delete_id) {
										header('Location: cart.php');
										echo '<script>alert("Item(s) Deleted Sucessfully")</script>';
										echo '<script>window.open("cart.php", "_self")</script>';
									}
								}
							}
						?>
				  </div>
				</div>
			</div> <!-- col-md-9 End -->

			<div class="col-md-3">
				<div class="card">
				  <h5 class="card-header text-center">Order Summary</h5>
				  <div class="card-body">
				    <p class="card-text text-muted text-justify">With supporting text below as a natural lead-in to additional content.</p>
				    <table class="table table-hover text-center">
						  <thead>
						    <tr>
						      <th scope="col">Heading</th>
						      <th scope="col">Price</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <td>Price</td>
						      <td class="text-right">M <?php echo number_format($total, 2); ?></td>
						    </tr>
						    <tr>
						      <td>Tax</td>
						      <td class="text-right">M <?php echo number_format($tax = ($total * 0) / 100, 2); ?></td>
						    </tr>
						    <tr>
						      <td>Shipping</td>
						      <td class="text-right">M <?php echo number_format($shipping = ($total *0) / 100, 2); ?></td>
						    </tr>
						    <tr>
						      <th>Total</th>
						      <th class="text-right">M <?php echo number_format($total + $tax + $shipping, 2); ?></th>
						    </tr>
						  </tbody>
						</table>
				  </div>
				</div>
			</div>

		</div> <!-- Row End -->


		<div class="row suggestion_heading">
			<div class="col-md-12 ">
				<div class="text-center">
					<h2 class="">You may also Like this</h2>
				</div>
			</div>
		</div>

	  <div class="row">
	  	<?php
	  		$random_products = $getFromU->select_random_products();
	  		foreach ($random_products as $random_product) {
	  			$product_title = $random_product->product_title;
	  			$product_id = $random_product->product_id;
	  			$product_img1 = $random_product->product_img1;
	  			$product_price = $random_product->product_price;
	  			$product_label   = $random_product->product_label;
					$manufacturer_id = $random_product->manufacturer_id;
					$product_psp_price = $random_product->product_psp_price;

					$view_manufacturer = $getFromU->selectManufacturerByManufacturerID($manufacturer_id);
					$manufacturer_title = $view_manufacturer->manufacturer_title;

					if ($product_label == "Sale" || $product_label == "Gift") {
						$product_price = "<del>M$product_price</del>";
						$product_psp_price = "<i class='fas fa-long-arrow-alt-right'></i> M$product_psp_price";
					}else{
						$product_price = "M$product_price";
						$product_psp_price = "";
					}
	  	?>
	  	 <!-- top product  -->

							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<a href="product.php?product_id=<?php echo $product_id; ?>"><img class="card-img-top img-responsive p-3" src="site_admin/product_images/<?php echo $product_img1; ?>" alt="Card image cap"></a>
										<div class="product-label">
											<!--<span class="sale">-30%</span>-->
											<span class="new"><?php if (!empty($product_label)): ?>
			
				<?php echo $product_label; ?>
				
			
		<?php endif ?></span>

										</div>
									</div>
									<div class="product-body">
										<p class="product-category"> <?php echo $manufacturer_title; ?></p>
										<h3 class="product-name"><a href="product.php?product_id=<?php echo $product_id; ?>"><?php echo $product_title; ?></a></h3>
										<h4 class="product-price"><?php echo $product_price; ?> <?php echo $product_psp_price; ?>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">

											<button class="add-to-wishlist">
												<a href="product.php?product_id=<?php echo $product_id; ?>">
												<i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a></button>
	
											<button class="quick-view"><i class="fa fa-eye"></i><a href="product.php?product_id=<?php echo $product_id; ?>"><span class="tooltipp">quick view</a></span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<a href="product.php?product_id=<?php echo $product_id; ?>">
										<button class="add-to-cart-btn">
											<i class="fa fa-shopping-cart"></i> add to cart</button></a>
									</div>

								</div>

							</div>
							<!-- /product -->
	  	<?php } ?>
          

	

	  </div> <!-- SINGLE PRODUCT ROW END -->

	</div>
				<!-- row -->
				<div class="row">
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!--footer-->
        <?php include('includes/footer.php');?>
<!-- /footer --> 

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
				 <script src="assets/js/main.js"></script>
    <script src="assets/js/data_load.js"></script>

	</body>
</html>
