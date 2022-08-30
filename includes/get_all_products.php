<?php

	// / getProducts function Code Starts ///

	$aWhere = array();

	// / Manufacturers Code Starts ///

	if (isset($_REQUEST['man']) && is_array($_REQUEST['man']))
		{
		foreach($_REQUEST['man'] as $sKey => $sVal)
			{
			if ((int)$sVal != 0)
				{
				$aWhere[] = 'manufacturer_id=' . (int)$sVal;
				}
			}
		}

	// / Manufacturers Code Ends ///
	// / Products Categories Code Starts ///

	if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat']))
		{
		foreach($_REQUEST['p_cat'] as $sKey => $sVal)
			{
			if ((int)$sVal != 0)
				{
				$aWhere[] = 'p_cat_id=' . (int)$sVal;
				}
			}
		}

	// / Products Categories Code Ends ///
	// / Categories Code Starts ///

	if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat']))
		{
		foreach($_REQUEST['cat'] as $sKey => $sVal)
			{
			if ((int)$sVal != 0)
				{
				$aWhere[] = 'cat_id=' . (int)$sVal;
				}
			}
		}

	// / Categories Code Ends ///

	$per_page = 6;

	if (isset($_GET['page'])){

		$page = $_GET['page'];

	} else {
		$page = 1;
	}

	$start_from = ($page - 1) * $per_page;
	$sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
	$sWhere = (count($aWhere) > 0 ? ' WHERE ' . implode(' or ', $aWhere) : '') . $sLimit;

	$get_products = $getFromU->selectAllProducts($sWhere);

	foreach ($get_products as $get_product) {
		$product_id = $get_product->product_id;
		$product_title = $get_product->product_title;
		$product_price = $get_product->product_price;
		$product_img1 = $get_product->product_img1;
		$product_label   = $get_product->product_label;
		$manufacturer_id = $get_product->manufacturer_id;
		$product_psp_price = $get_product->product_psp_price;

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

<?php  } // / getProducts function Code Ends /// ?>




