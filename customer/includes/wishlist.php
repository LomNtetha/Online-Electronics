<div class="card text-center">
	<div class="card-body">
		<h3 class="card-title mt-4">My Wishlist</h3>
		<h6 class="card-subtitle mb-2 text-muted">Your Wishlist on One Place</h6>
		<p class="card-text my-3">If you have any questions, please feel free to <a href="../contact.php">contact us</a>. Our customer service is working for you 24/7</p>


		<?php if (isset($_SESSION['delete_payment_msg'])): ?>
			<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
			  <?php echo $_SESSION['delete_payment_msg']; unset($_SESSION['delete_payment_msg']); ?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php endif ?>



		<table class="table table-bordered table-responsive-xl table-hover mt-5">
			<thead>
				<tr>
					<th scope="col">O.N</th>
					<th scope="col">Product Title</th>
					<th scope="col">Product Image</th>
					<th scope="col">Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$customer_session = $_SESSION['customer_email'];
					$get_customer = $getFromU->view_customer_by_email($customer_session);

  				$customer_id = $get_customer->customer_id;

  				$get_wishlists = $getFromU->view_wishlists_by_customer_id($customer_id);
  				$i = 0;
  				foreach ($get_wishlists as $get_wishlist) {
  					$wishlist_id = $get_wishlist->wishlist_id;
  					$product_id = $get_wishlist->product_id;

  					$get_product = $getFromU->view_Product_By_Product_ID($product_id);

  					$product_title = $get_product->product_title;
  					$product_image = $get_product->product_img1;
  					$product_url = $get_product->product_url;
  					$i++;
				?>

					<tr>
						<th>#<?php echo $i; ?></th>
						<td><a href="../product.php?product_id=<?php echo $product_id; ?>"><?php echo $product_title; ?></a></td>
						<td><a href="../product.php?product_id=<?php echo $product_id; ?>"><img src="../site_admin/product_images/<?php echo $product_image; ?>" width="30" height="30"></a></td>
						<td><a style="cursor: pointer;" class="text-danger" onclick="DeleteWishlist('<?php echo $wishlist_id; ?>')"><i class="fas fa-trash-alt"></i> Delete</a></td>
					</tr>
				<?php	} ?>
			</tbody>
		</table>
	</div>
</div>