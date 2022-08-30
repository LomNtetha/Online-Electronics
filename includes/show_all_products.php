<div class="card mb-3">
  <div class="card-body">
    <h5 class="card-title">Shop</h5>
    <p class="card-text">
Teams around the world invent on behalf of our customers every day to meet their desire for lower prices, better selection, and convenient services. One way we guarantee a wide selection of products  and offering more options for customers.</p>
  </div>
</div>


<div class="row" id="Products">

	<?php require_once 'includes/get_all_products.php'; ?>

</div> <!-- ROW END -->

<div class="row mb-4">
	<div class="col-lg-6 offset-lg-3 d-flex">
		<ul class="pagination mx-auto">

			<?php require_once 'includes/get_paginator.php'; ?>

		</ul>
	</div>
</div> <!-- Pagination ROW END -->
