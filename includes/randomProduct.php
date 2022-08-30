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
					
		<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<a href="product.php?product_id=<?php echo $product_id; ?>"><img class="card-img-top img-fluid" src="site_admin/product_images/<?php echo $product_img1; ?>" height="450px" width="100%"  alt="Card image cap" ></a>
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
										
										<div class="product-btns">

											<button class="add-to-wishlist">
												<a href="product.php?product_id=<?php echo $product_id; ?>">
												<i class="fas fa-heart"></i><span class="tooltipp">add to wishlist</span></a></button>
	
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
<?php  } ?>
				