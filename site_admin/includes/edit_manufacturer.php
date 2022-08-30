<?php require_once 'includes/header.php'; ?>

<?php

	if (isset($_GET['edit_manufacturer'])) {
		$manufacturer_id = $getFromU->checkInput($_GET['edit_manufacturer']);

		$view_manufacturer = $getFromU->selectManufacturerByManufacturerID($manufacturer_id);
		$manufacturer_title = $view_manufacturer->manufacturer_title;
		$manufacturer_image = $view_manufacturer->manufacturer_image;
		$manufacturer_top = $view_manufacturer->manufacturer_top;
	}

?>


<?php

	if (isset($_POST['update_manufacturer'])) {
		$manufacturer_title = $getFromU->checkInput($_POST['manufacturer_title']);
		$manufacturer_top = $getFromU->checkInput($_POST['manufacturer_top']);
		$manufacturer_id = $getFromU->checkInput($_POST['manufacturer_id']);

		$manufacturer_image = $_FILES['manufacturer_image']['name'];
		$temp_name = $_FILES['manufacturer_image']['tmp_name'];


		move_uploaded_file($temp_name, "other_images/$manufacturer_image");

		$update_manufacturer = $getFromU->update_manufacturer("manufacturers",$manufacturer_id, array("manufacturer_title" => $manufacturer_title, "manufacturer_top" => $manufacturer_top, "manufacturer_image" => $manufacturer_image));

		if ($update_manufacturer) {
			$_SESSION['update_manufacturer_msg'] = "Manufacturer has been Updatted Sucessfully";
			header('Location: index.php?view_manufacturers');

		}else {
			echo '<script>alert("Manufacturer has not been Updatted")</script>';
		}


	}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Insert Manufacturer</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Insert Manufacturer</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="form-row mb-3">
				    <div class="col-md-9">
				    	<input type="hidden" name="manufacturer_id" value="<?php echo $manufacturer_id; ?>" required>
				    </div>
				  </div>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="manufacturer_title">Manufacturer Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="manufacturer_title" value="<?php echo $manufacturer_title; ?>" class="form-control" id="manufacturer_title" placeholder="Manufacturer Title" required>
				      <div class="invalid-feedback">
				        Please provide a Manufacturer Title.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="manufacturer_top">Manufacturer Top</label>
				    </div>
				    <div class="col-md-9">
				    	<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="radio1" name="manufacturer_top" value="Yes" <?php ($manufacturer_top === "Yes") ? print "checked='checked' " : ""; ?> class="custom-control-input" required>
							  <label class="custom-control-label" for="radio1">Yes</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="radio2" name="manufacturer_top" value="No" <?php ($manufacturer_top === "No") ? print "checked='checked' " : ""; ?> class="custom-control-input" required>
							  <label class="custom-control-label" for="radio2">No</label>
							</div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="manufacturer_image">Manufacturer Image</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="manufacturer_image" value="<?php echo $manufacturer_image; ?>" id="manufacturer_image" placeholder="Category Title" required>
				      <div class="invalid-feedback">
				        Please provide a Slide Image.
				      </div>
				    </div>
				  </div>



				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="update_manufacturer" type="submit"><i class="fas fa-plus-circle"></i> Insert Manufacturer</button>
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

