<?php require_once 'includes/header.php'; ?>
<?php
	if (isset($_POST['add_cat'])) {
		$cat_title = $getFromU->checkInput($_POST['cat_title']);
		$cat_top = $getFromU->checkInput($_POST['cat_top']);

		$cat_image = $_FILES['cat_image']['name'];
		$temp_name = $_FILES['cat_image']['tmp_name'];

		move_uploaded_file($temp_name, "other_images/$cat_image");

		$insert_cat = $getFromU->create("categories", array("cat_title" => $cat_title, "cat_top" => $cat_top, "cat_image" => $cat_image));

		if ($insert_cat) {
			$_SESSION['insert_cat_msg'] = "Category has been added Sucessfully";
			header('Location: index.php?view_cats');

		}else {
			echo '<script>alert("Category has not added")</script>';
		}


	}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Insert Category</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Insert Category</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="cat_title">Category Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="cat_title" class="form-control" id="cat_title" placeholder="Category Title" required>
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
							  <input type="radio" id="radio1" name="cat_top" value="Yes" class="custom-control-input" required>
							  <label class="custom-control-label" for="radio1">Yes</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="radio2" name="cat_top" value="No" class="custom-control-input" required>
							  <label class="custom-control-label" for="radio2">No</label>
							</div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="cat_image">Category Image</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="cat_image" id="cat_image" placeholder="Category Image" required>
				      <div class="invalid-feedback">
				        Please provide a Category Image.
				      </div>
				    </div>
				  </div>

				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="add_cat" type="submit"><i class="fas fa-plus-circle"></i> Insert Category</button>
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

