
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>xyz Tech  - Ecommerce System</title>

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


    <!-- LightBox -->
<link href="assets/lightbox2-2.11.3/lightbox2-2.11.3/dist/css/lightbox.min.css" rel="stylesheet">
    <!-- fancybox -->
<link rel="stylesheet" type="text/css" href="assets/dist/jquery.fancybox.min.css">

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
<!-- /header --> 
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

<?php
	if (isset($_POST['add_to_wishlist'])) {
		if (!isset($_SESSION['customer_email'])) {
			header('Location: checkout.php');
		}else {
			$customer_email = $_SESSION['customer_email'];

			$get_customer = $getFromU->view_customer_by_email($customer_email);

			$customer_id = $get_customer->customer_id;

			$product_id = $getFromU->checkInput($_GET['product_id']);

			$check_wishlist = $getFromU->check_wishlist_by_customer_id_and_product_id($customer_id, $product_id);

			if ($check_wishlist === true) {
				$error = "This Product is already in Wishlist";
			}else{
				$insert_wishlist = $getFromU->create('wishlist', array('customer_id' => $customer_id , 'product_id' => $product_id));
				if ($insert_wishlist) {
					$insert_wishlist_msg = "Product inserted successfully to wishlist";
				}
			}
		}
	}
?>

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
			
		<?php
			if (isset($_GET['product_id'])) {
				$the_product_id = $_GET['product_id'];

				$get_products = $getFromU->viewProductByProductID($the_product_id);
				//var_dump($get_products);

				foreach ($get_products as $get_product) {
					$p_cat_id          = $get_product->p_cat_id;
					$product_title     = $get_product->product_title;
					$product_price     = $get_product->product_price;
					$product_desc      = $get_product->product_desc;
					$product_img1      = $get_product->product_img1;
					$product_img2 		 = $get_product->product_img2;
					$product_img3      = $get_product->product_img3;
					$product_label     = $get_product->product_label;
					$manufacturer_id   = $get_product->manufacturer_id;
					$p_cat_id          = $get_product->p_cat_id;
					$product_psp_price = $get_product->product_psp_price;
					$product_features  = $get_product->product_features;
					$product_video     = $get_product->product_video;
					$status            = $get_product->status;

					$view_manufacturer = $getFromU->selectManufacturerByManufacturerID($manufacturer_id);
					$manufacturer_title= $view_manufacturer->manufacturer_title;

					if ($status == "product") {
						$title = "Product";
					}elseif ($status == "bundle") {
						$title = "Bundle";
					}
					if ($product_label == "Sale" || $product_label == "Gift") {
			$product_price = "<del>M$product_price</del>";
			$product_psp_price = "<i class='fas fa-long-arrow-alt-right'></i> M$product_psp_price";
		}else{
			$product_price = "M$product_price";
			$product_psp_price = "";
		}

					

					$get_p_cats = $getFromU->viewAllByCatID($p_cat_id);
					foreach ($get_p_cats as $get_p_cat) {
						$p_cat_title = $get_p_cat->p_cat_title;
						$p_cat_id = $get_p_cat->p_cat_id;

		?>

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="index.php?vhid=">Home</a></li>
							<li><a href="store.php?vhid=">All Categories</a></li>
							<li class="active"><b><?php echo $product_title; ?></b></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
		




			<?php if (isset($error)): ?>
				<div class="col-md-12">
						<div class="alert alert-danger" role="alert">
				  <a href="#" class="alert-link"><p><?php echo $error; ?></p></a>.
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
				</div>
				</div>

				
			<?php endif ?>

			<?php if (isset($insert_wishlist_msg)): ?>
				<div class="col-md-12">
						<div class="alert alert-success" role="alert">
				  <a href="#" class="alert-link"><p><?php echo $insert_wishlist_msg; ?></p></a>.
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
				</div>
				</div>
			<?php endif ?>


					<!-- Product main img -->
					<div class="col-md-5">
				  <div class="post-thumbnail-fluid" title="click here to see photos of the Product">
           <!--displaying Beuty images-->
   <p>
<a href="site_admin/product_images/<?php echo $product_img1; ?>" data-lightbox="image-1" data-title="<?php echo $product_title; ?>">
                    <img class="img-responsive" alt="" src="site_admin/product_images/<?php echo $product_img1; ?>"width="900" height="600" />
                </a>
</p>

<div style="display: none;">
<a href="site_admin/product_images/<?php echo $product_img2; ?>" data-lightbox="image-1" data-title="<?php echo $product_title; ?>">
                    <img class="img-responsive" alt="" src="site_admin/product_images/<?php echo $product_img2; ?>" width="370" height="350" />
                </a>

<a href="site_admin/product_images/<?php echo $product_img3; ?>" data-lightbox="image-1" data-title="<?php echo $product_title; ?>">
                    <img class="img-responsive" alt="" src="site_admin/product_images/<?php echo $product_img3; ?>" width="370" height="350" />
                </a>

</div>
					</div>		
						</div>
				
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
	

					<!-- Product details -->
					<div class="col-md-7">
						<div class="product-details">
							<h2 class="product-name"><?php echo $product_title; ?></h2>
   <?php

						    	if (isset($_POST['add_to_cart'])) {
						    		$p_id = $_POST['product_id'];
						    		$ip_add = $getFromU->getRealUserIp();
						    		$product_qty = $_POST['product_qty'];
						    		//$product_size = $_POST['product_size'];

						    		$get_product = $getFromU->view_Product_By_Product_ID($p_id);
						    		$product_price = $get_product->product_price;
						    		$product_psp_price = $get_product->product_psp_price;
						    		$product_label = $get_product->product_label;

						    		$check_product_by_ip_id = $getFromU->check_product_by_ip_id($ip_add, $p_id);

						    		if ($check_product_by_ip_id === true) {
						    			echo '<script>alert("This product is already added in cart")</script>';
						    		}else{

						    			if ($product_label == "Sale" || $product_label == "Gift" || $product_label == "Bundle") {
						    				$product_price = $product_psp_price;
						    			}else {
						    				$product_price = $product_price;
						    			}

						    			$insert_cart = $getFromU->create("cart", array("p_id" => $p_id, "ip_add" => $ip_add, "qty" =>$product_qty, "product_price" =>$product_price /*"size" =>$product_size*/));
						    			echo '<script>alert("This product added successfully in cart")</script>';
						    			header('Location: shop.php');

						    		}

						    	}


						    ?>
                            
                            <?php echo $title; ?>
							<div>

								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#">10 Review(s) | Add your review</a>
							</div>
							<div>
								<h3 class="product-price"><?php echo $product_price; ?> <?php echo $product_psp_price; ?></h3>
								<span class="product-available">In Stock</span>
							</div>
							<p><?php echo $product_desc; ?> </p>


<form method="post"><!--
					  <div class="form-group row">
								    <label for="product_size" class="col-sm-5 col-form-label-sm text-xl-right"><?php echo $title; ?> Size</label>
								    <div class="col-sm-7">
								      <select name="product_size" id="product_size" class="form-control" required>
								      	<option value="">Select a Size</option>
								      		<option value="small">Default</option>
                                          	<option value="small">All in one</option>
								      	<option value="small">Small</option>
								      	<option value="medium">Medium</option>
								      	<option value="large">Large</option>
								      	<option value="extra large">Extra Large</option>
								      </select>
								    </div>
								  </div>-->

						<div class="form-group row">
							<div class="add-to-cart">
								<div class="qty-label">
									Qty
									<div class="input-number" id="product_qty">
										<input type="number"name="product_qty"id="product_qty" class="form-control" required>
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
									
								</div>

  <div class="form-group row mb-0">
								    <div class="col-sm-7">
								      <input type="hidden" name="product_id" value="<?php echo $the_product_id; ?>">
								    </div>
								  </div>

								<button type="submit" name="add_to_cart" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>

								 <button type="submit" name="add_to_wishlist" class="add-to-wishlist-btn"><i class="fa fa-heart"></i> Add to Wishlist</button>
							</div>

							<ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> Checkout</a></li>
							</ul>
							
</div>
</form>
							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#"><?php echo $p_cat_title; ?></a></li>
															</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Features</a></li>
								<li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?php echo $product_desc; ?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p><?php echo $product_features; ?></p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span>4.5</span>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 60%;"></div>
														</div>
														<span class="sum">2</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
													<li>
														<div class="review-heading">
															<h5 class="name">Lomkile Ntetha</h5>
															<p class="date">27 November 2021, 8:0 PM</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
																<i class="fa fa-star"></i>
															</div>
														</div>
														<div class="review-body">
															<p>I orded Acer core i7  last week. I am so glad it is working very well.  </p>
														</div>
													</li>
													<li>
														<div class="review-heading">
															<h5 class="name">Tumisang Ngatane</h5>
															<p class="date">23 November 2021, 8:0 PM</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																
															</div>
														</div>
														<div class="review-body">
															<p>I have just received my sumsang A12 but the camera its not like what i was expecting</p>
														</div>
													</li>
													<li>
														<div class="review-heading">
															<h5 class="name">Tumelo Mokobocho</h5>
															<p class="date">2 November 2021, 8:0 Am</p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																
															</div>
														</div>
														<div class="review-body">
															<p>I am not happ at all with what i have received , I want my money back</p>
														</div>
													</li>
												</ul>
												<ul class="reviews-pagination">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
												</ul>
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form">
													<input class="input" type="text" placeholder="Your Name">
													<input class="input" type="email" placeholder="Your Email">
													<textarea class="input" placeholder="Your Review"></textarea>
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn">Submit</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
					<?php } } } ?>
				</div>
				<!-- /row -->

			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>
			<!--random Product-->
        <?php include('includes/randomProduct.php');?>
<!-- /random--> 
				</div>

				<!-- /row -->
			</div>

			<!-- /container -->
		</div>
		<!-- /Section -->

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

		  <!-- fancybox -->
<script src="assets/dist/jquery.fancybox.min.js"></script>
    <!-- lightbox -->
  <script src=" assets/lightbox2-2.11.3/lightbox2-2.11.3/dist/js/lightbox-plus-jquery.min.js"></script>
  <!-- Jquery -->

	</body>
</html>
