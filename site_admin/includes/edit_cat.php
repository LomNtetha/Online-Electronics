<?php require_once 'includes/header.php'; ?>

<?php

	if (isset($_GET['edit_cat'])) {
		$cat_id 				= $_GET['edit_cat'];

		$view_category 	= $getFromU->view_All_By_cat_ID($cat_id);
		$cat_title 			= $view_category->cat_title;
		$cat_top 			  = $view_category->cat_top;
		$cat_image 			= $view_category->cat_image;
	}

?>

<?php

	if (isset($_POST['update_cat'])) {
		$cat_title 		= $_POST['cat_title'];
		$cat_top 		  = $_POST['cat_top'];
		$cat_image 		= $_POST['cat_image'];
		$cat_id 			= $_POST['cat_id'];

		$update_cat = $getFromU->update_cat("categories",$cat_id, array("cat_title" => $cat_title, "cat_top" => $cat_top, "cat_image" => $cat_image));

		if ($update_cat) {
			$_SESSION['cat_update_msg'] = "Category has been Updated Sucessfully";
			header('Location: index.php?view_cats');
		}else {
			echo '<script>alert("Category has not added")</script>';
		}
	}

?>

<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Category</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-edit"></i> Update Category</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					 <div class="form-row mb-3">
				    <div class="col-md-9">
				    	<input type="hidden" name="cat_id"  value="<?php echo $cat_id; ?>" required>
				    </div>
				  </div>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="cat_title">Category Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="cat_title" class="form-control" id="cat_title" value="<?php echo $cat_title; ?>" placeholder="Category Title" required>
				      <div class="invalid-feedback">
				        Please provide a Category Title.
				      </div>
				    </div>
				  </div>


					<div class="form-row mb-3">
				    <div class="col-3">
				      <label for="cat_top">Category Top</label>
				    </div>
				    <div class="col-md-9">
				    	<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="radio1" name="cat_top" value="Yes" <?php ($cat_top === "Yes") ? print "checked='checked' " : ""; ?> class="custom-control-input" required>
							  <label class="custom-control-label" for="radio1">Yes</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="radio2" name="cat_top" value="No" <?php ($cat_top === "No") ? print "checked='checked' " : ""; ?> class="custom-control-input" required>
							  <label class="custom-control-label" for="radio2">No</label>
							</div>
				    </div>
				  </div>



				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="cat_image">Category Image</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="cat_image" value="<?php echo $cat_image; ?>" id="cat_image" placeholder="Category Title" required>
				      <div class="invalid-feedback">
				        Please provide a Slide Image.
				      </div>
				    </div>
				  </div>





				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="update_cat" type="submit"><i class="fas fa-edit"></i> Update Category</button>
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

