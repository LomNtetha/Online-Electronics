
		<?php require_once 'core/init.php'; ?>

<?php
	$ip_add = $getFromU->getRealUserIp();
	$total = 0;
	$records = $getFromU->select_products_by_ip($ip_add);
	foreach ($records as $record) {
		$product_id = $record->p_id;
		$product_price = $record->product_price;
		$product_qty = $record->qty;
		$get_prices = $getFromU->viewProductByProductID($product_id);
		foreach ($get_prices as $get_price) {
			$product_title;
			$sub_total = ($product_price * $product_qty);
			$total += $sub_total;
			
		}
	}
?>

		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +266-5089-9604</a></li>
						<li><a href="#"><i class="fas fa-envelope"></i> ntethalumkile@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i>Down Town Maseru 100</a></li>
					</ul>
				
					<ul class="header-links pull-right">
					<li class="welcome"> <!-- col-md-6 offer Starts -->
						<a href="customer/my_account.php" >
							<?php
								if (!isset($_SESSION['customer_email'])) {
									echo "";
								}else {
									$customer = $getFromU->view_customer_by_email($_SESSION['customer_email']);
									$customer_name = $customer->customer_name;
									echo "Welcome : <strong class='text-uppercase'>$customer_name</strong>" ;
								}
							?>
						</a>


							</li> <!-- col-md-6 offer Ends -->
						<li><i class="">M</i></a>
	<?php if (isset($_SESSION['customer_email'])): ?>
							<a href="#"> M <?php echo number_format($total, 2) ; ?></a>
						<?php else: ?>
							<a href="#"> <?php echo number_format($total, 2) ; ?></a>
						<?php endif ?></li>
                        <?php if (!isset($_SESSION['customer_email'])): ?>
						<li><a href="checkout.php">My Account</a></li>
					<?php else: ?>
						<li><a href="customer/my_account.php?my_orders"><i class="fas fa-user"></i>My Account</a></li>
					<?php endif ?>
						
					<li>
								<?php if (!isset($_SESSION['customer_email'])): ?>
									<a href="login.php">Login | Register</a>
								<?php else: ?>
									<a href="logout.php">Logout</a>
								<?php endif ?>
							</li>
                        
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<ul class="header-links pull-left">

								<li><h1><a href="#"><b>xyz Tech</b></a></h1></li>
								<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i></li>
					</ul>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
									</select>
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fas fa-heart"></i>
										<span>Your Wishlist</span>
										<div class="qty">0</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty"> <?php echo $getFromU->count_product_by_ip($ip_add); ?></div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
										
							
										</div>
										<div class="cart-summary">
											<small><?php echo $getFromU->count_product_by_ip($ip_add); ?> Item(s) selected</small>
											<h5>SUBTOTAL: 
							<a href="#"> <a href="#"> M <?php echo number_format($total, 2) ; ?></a>
						</h5>
										</div>
										<div class="cart-btns">
											<a href="cart.php?vhid=">View Cart</a>
											<a href="checkout.php?vhid=">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                            
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->