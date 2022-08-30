<?php require_once 'includes/header.php'; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" id="navbar">
  <a class="navbar-brand home" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto text-uppercase">
      <li >
        <a class="active" href="index.php">Home</a>
      </li>
      <li>
        <a href="shop.php">Shop</a>
      </li>
      <?php if (!isset($_SESSION['customer_email'])): ?>
				<li><a href="checkout.php">My Account</a></li>
			<?php else: ?>
				<li><a href="customer/my_account.php?my_orders">My Account</a></li>
			<?php endif ?>
      <li>
        <a href="cart.php">Shopping Cart</a>
      </li>
      <li>
        <a href="contact.php">Contact Us</a>
      </li>
      <li>
        <a href="about.php">About Us</a>
      </li>
      <li>
        <a href="services.php">Services</a>
      </li>
    </ul>
			<a href="cart.php" class="btn btn-success mr-2"><i class="fas fa-shopping-cart"></i><span> <?php echo $getFromU->count_product_by_ip($ip_add); ?> items in Cart</span></a>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="user_query" required="1">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
    </form>
  </div>
</nav>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item" aria-current="page">Terms &amp; Conditions | Refund Policy</li>
				</ol>
			</nav>
		</div>
	</div>
</div>


<div class="container my-5">
	<div class="row">
		<div class="col-3">
			<div class="card">
				<div class="card-body">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

						<?php
							$view_term1 = $getFromU->selectTerm1();
							$term_id = $view_term1->term_id;
							$term_title = $view_term1->term_title;
							$term_link = $view_term1->term_link;
							$term_desc = $view_term1->term_desc;

						?>

						<a class="nav-link active" id="<?php echo $term_link; ?>-tab" data-toggle="pill" href="#<?php echo $term_link; ?>" role="tab" aria-controls="<?php echo $term_link; ?>" aria-selected="true"><?php echo $term_title; ?></a>

						<?php
							$get_terms = $getFromU->viewAllFromTable("terms");
							$count = count($get_terms);

							$view_terms = $getFromU->selectTerms($count);
							foreach ($view_terms as $view_term) {
								$term_id = $view_term->term_id;
								$term_title = $view_term->term_title;
								$term_link = $view_term->term_link;

						?>
						<a class="nav-link" id="<?php echo $term_link; ?>-tab" data-toggle="pill" href="#<?php echo $term_link; ?>" role="tab" aria-controls="<?php echo $term_link; ?>" aria-selected="false"><?php echo $term_title; ?></a>

						<?php } ?>


					</div>
				</div>
			</div>
		</div>
		<div class="col-9">
			<div class="card text-justify">
				<div class="card-body">
					<div class="tab-content" id="v-pills-tabContent">
						<?php

							$view_term1 = $getFromU->selectTerm1();
							$term_id = $view_term1->term_id;
							$term_title = $view_term1->term_title;
							$term_link = $view_term1->term_link;
							$term_desc = $view_term1->term_desc;
						?>
						<div class="tab-pane fade show active" id="<?php echo $term_link; ?>" role="tabpanel" aria-labelledby="<?php echo $term_link; ?>-tab">
							<h4 class="mb-4"><?php echo $term_title; ?></h4>
							<p><?php echo $term_desc; ?></p>
						</div>


						<?php
							$get_terms = $getFromU->viewAllFromTable("terms");
							$count = count($get_terms);

							$view_terms = $getFromU->selectTerms($count);
							foreach ($view_terms as $view_term) {
								$term_id = $view_term->term_id;
								$term_title = $view_term->term_title;
								$term_link = $view_term->term_link;
								$term_desc = $view_term->term_desc;
						?>
						<div class="tab-pane fade show" id="<?php echo $term_link; ?>" role="tabpanel" aria-labelledby="<?php echo $term_link; ?>-tab">
							<h4 class="mb-4"><?php echo $term_title; ?></h4>
							<p><?php echo $term_desc; ?></p>
						</div>

						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>










		<?php require_once 'includes/footer.php'; ?>

