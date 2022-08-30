<?php require_once 'includes/header.php'; ?>

<?php

	if (isset($_GET['edit_bundle'])) {
		$product_id 			= $_GET['edit_bundle'];

		$view_product 		= $getFromU->view_Product_By_Product_ID($product_id);

		$product_title 		= $view_product->product_title;
		$manufacturer_id 	= $view_product->manufacturer_id;
		$p_cat_id 				= $view_product->p_cat_id;
		$cat_id 					= $view_product->cat_id;
		$product_price 		= $view_product->product_price;
		$product_psp_price= $view_product->product_psp_price;
		$product_desc 		= $view_product->product_desc;
		$product_features = $view_product->product_features;
		$product_video 		= $view_product->product_video;
		$product_keywords = $view_product->product_keywords;
		$the_product_img1 = $view_product->product_img1;
		$the_product_img2 = $view_product->product_img2;
		$the_product_img3 = $view_product->product_img3;
		$product_label 		= $view_product->product_label;
		$the_status 		  = $view_product->status;

		$view_p_category 	= $getFromU->view_All_By_p_cat_ID($p_cat_id);
		$the_p_cat_title 	= $view_p_category->p_cat_title;

		$view_category 		= $getFromU->view_All_By_cat_ID($cat_id);
		$the_cat_title 		= $view_category->cat_title;

		$view_manufacturer 		  = $getFromU->view_All_By_Manufacturer_ID($manufacturer_id);
		$the_manufacturer_title = $view_manufacturer->manufacturer_title;
	}

?>

<?php

	if (isset($_POST['update_bundle'])) {
		$product_title 		= $_POST['product_title'];
		$manufacturer_id 	= $_POST['manufacturer_id'];
		$product_cat 			= $_POST['product_cat'];
		$cat_id 					= $_POST['cat'];
		$product_price 		= $_POST['product_price'];
		$product_psp_price= $_POST['product_psp_price'];
		$product_desc 		= $_POST['product_desc'];
		$product_features = $_POST['product_features'];
		$product_video 		= $_POST['product_video'];
		$product_keywords = $_POST['product_keywords'];
		$product_label    = $_POST['product_label'];
		$status    				= $_POST['status'];

		$product_img1 		= $_FILES['product_img1']['name'];
		$product_img2 		= $_FILES['product_img2']['name'];
		$product_img3 		= $_FILES['product_img3']['name'];

		$temp_name1 			= $_FILES['product_img1']['tmp_name'];
		$temp_name2 			= $_FILES['product_img2']['tmp_name'];
		$temp_name3 			= $_FILES['product_img3']['tmp_name'];

		if (empty($product_img1)) {
			$product_img1 = $the_product_img1;
		}
		if (empty($product_img2)) {
			$product_img2 = $the_product_img2;
		}
		if (empty($product_img3)) {
			$product_img3 = $the_product_img3;
		}

		move_uploaded_file($temp_name1, "product_images/$product_img1");
		move_uploaded_file($temp_name2, "product_images/$product_img2");
		move_uploaded_file($temp_name3, "product_images/$product_img3");

		$update_product = $getFromU->update_product("products",$product_id, array("p_cat_id" => $product_cat, "cat_id" => $cat_id, "manufacturer_id" => $manufacturer_id, "add_date" => date("Y-m-d H:i:s"), "product_title" => $product_title, "product_img1" => $product_img1,"product_img2" => $product_img2, "product_img3" => $product_img3, "product_price" => $product_price, "product_psp_price" => $product_psp_price, "product_desc" => $product_desc, "product_features" => $product_features, "product_video" => $product_video, "product_keywords" => $product_keywords, "product_label" => $product_label, "status" => $status));

		if ($update_product) {
			$_SESSION['product_update_msg'] = "Bundle has been Updated Sucessfully";
			header('Location: index.php?view_bundles');
		}else {
			echo '<script>alert("Bundle has not added")</script>';
		}
	}

?>

<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Bundle</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-edit"></i> Update Bundle</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					 <div class="form-row mb-3">
				    <div class="col-md-9">
				    	<input type="hidden" name="product_id"  value="<?php echo $product_id; ?>" required>
				    </div>
				  </div>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="product_title">Bundle Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="product_title" class="form-control" id="product_title" value="<?php echo $product_title; ?>" placeholder="Bundle Title" required>
				      <div class="invalid-feedback">
				        Please provide a Bundle Title.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
						<div class="col-3">
							<label for="product_cat">Bundle Manufacturer</label>
						</div>
						<div class="col-md-9">
							<select name="manufacturer_id" id="manufacturer_id" class="form-control" required>
								<option value="<?php echo $manufacturer_id; ?>"><?php echo $the_manufacturer_title; ?></option>
								<?php
									$manufacturers = $getFromU->viewAllFromTable("manufacturers");
									foreach ($manufacturers as $manufacturer) {
										$manufacturer_id = $manufacturer->manufacturer_id;
										$manufacturer_title = $manufacturer->manufacturer_title;
										if ($manufacturer_title == $the_manufacturer_title) {
											continue;
										}
								?>
								<option value="<?php echo $manufacturer_id; ?>" ><?php echo $manufacturer_title; ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback">
								Please select a Bundle Manufacturer.
							</div>
						</div>
					</div>


					<div class="form-row mb-3">
						<div class="col-3">
							<label for="product_cat">Bundle Categories</label>
						</div>
						<div class="col-md-9">
							<select name="product_cat" id="product_cat" class="form-control" required>
								<option value="<?php echo $p_cat_id; ?>"><?php echo $the_p_cat_title; ?></option>
								<?php
									$p_categories = $getFromU->viewAllFromTable("product_categories");
									foreach ($p_categories as $p_category) {
										$p_cat_id = $p_category->p_cat_id;
										$p_cat_title = $p_category->p_cat_title;
										if ($p_cat_title == $the_p_cat_title) {
											continue;
										}
								?>
								<option value="<?php echo $p_cat_id; ?>" ><?php echo $p_cat_title; ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback">
								Please select a Bundle Categories.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-md-3">
							<label for="cat">Categories</label>
						</div>
						<div class="col-md-9">
							<select name="cat" id="cat" class="form-control" required>
								<option value="<?php echo $cat_id; ?>"><?php echo $the_cat_title; ?></option>
								<?php
									$categories = $getFromU->viewAllFromTable("categories");
									foreach ($categories as $category) {
										$cat_id = $category->cat_id;
										$cat_title = $category->cat_title;
										if ($cat_title == $the_cat_title) {
											continue;
										}
								?>
								<option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback">
								Please select a Categories.
							</div>
						</div>
					</div>


				  <div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="product_img1">Bundle Image 1</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="product_img1" id="product_img1">
				    	<img src="product_images/<?php echo $the_product_img1; ?>" width="30" height = "30">
				      <div class="invalid-feedback">
				        Please provide a Bundle Image 1.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="product_img2">Bundle Image 2</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="product_img2"  id="product_img2">
				    	<img src="product_images/<?php echo $the_product_img2; ?>" width="30" height = "30">
				      <div class="invalid-feedback">
				        Please provide a Bundle Image 2.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="product_img3">Bundle Image 3</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="product_img3"  id="product_img3">
				    	<img src="product_images/<?php echo $the_product_img3; ?>" width="30" height = "30">
				      <div class="invalid-feedback">
				        Please provide a Bundle Image 3.
				      </div>
				    </div>
				  </div>

					<div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="product_price">Bundle Price</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="number" name="product_price" class="form-control" id="product_price" value="<?php echo $product_price; ?>" placeholder="Enter Bundle Price" required>
				      <div class="invalid-feedback">
				        Please provide a Bundle Price.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="product_psp_price">Bundle Sale Price</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="number" name="product_psp_price" class="form-control" id="product_psp_price" value="<?php echo $product_psp_price; ?>" placeholder="Enter Bundle Sale Price" required>
				      <div class="invalid-feedback">
				        Please provide a Bundle Sale Price.
				      </div>
				    </div>
				  </div>

					<div class="form-row mb-3">
				    <div class="col-md-3 ">
				      <label for="product_desc">Bundle Tabs</label>
				    </div>
				    <div class="col-md-9">
				    	<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Bundle Description</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Bundle Features</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Bundle Video</a>
							  </li>
							</ul>
							<div class="tab-content" id="myTabContent">
							  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							  	<textarea name="product_desc" class="form-control summernote" rows="15" id="product_desc" placeholder="Enter Bundle Description" required><?php echo $product_desc; ?></textarea>
						      <div class="invalid-feedback">
						        Please provide Bundle Description.
						      </div>
							  </div>
							  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							  	<textarea name="product_features" class="form-control summernote" rows="15"  id="product_features" placeholder="Enter Bundle Video" required><?php echo $product_features; ?></textarea>
						      <div class="invalid-feedback">
						        Please provide Bundle Features.
						      </div>
							  </div>
							  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
							  	<input type='text' name='product_video' class='form-control' value='<?php echo $product_video; ?>' id='product_video' placeholder='Enter Bundle Video' required>
									<p class="mt-3" style="text-align: center;"><?php echo $product_video; ?></p>
						      <div class="invalid-feedback">
						        Please provide Bundle Video.
						      </div>

							  </div>
							</div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3 ">
				      <label for="product_keywords">Bundle Keyword</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="product_keywords" class="form-control" value="<?php echo $product_keywords; ?>" id="product_keywords" placeholder="Enter Bundle Keyword" required>
				      <div class="invalid-feedback">
				        Please provide Bundle Keyword.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3 ">
				      <label for="product_label">Product Label</label>
				    </div>
				    <div class="col-md-9">
				    	<select name="product_label" id="product_label" class="form-control" required>
				      	<option value="<?php echo $product_label; ?>"><?php echo $product_label; ?></option>
				      	<option value="New">New</option>
				      	<option value="Sale">Sale</option>
				      	<option value="Gift">Gift</option>
				      </select>
				      <div class="invalid-feedback">
				        Please Select Product Label.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
						<div class="col-md-3">
							<label for="status">Status</label>
						</div>
						<div class="col-md-9">
							<select name="status" id="status" class="form-control" required>
								<option value="<?php echo $the_status; ?>"><?php echo ucwords($the_status); ?></option>
								<?php
									$view_statuses = $getFromU->view_distinct_status();
									foreach ($view_statuses as $view_status) {
										$status = $view_status->status;
										if ($status == $the_status) {
											continue;
										}
								?>
								<option value="<?php echo $status; ?>"><?php echo ucwords($status); ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback">
								Please select a Status.
							</div>
						</div>
					</div>



				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="update_bundle" type="submit"><i class="fas fa-edit"></i> Update Product</button>
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

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script>
  $(document).ready(function() {
      $('.summernote').summernote();
  });
</script>