<?php require_once 'includes/header.php'; ?>

<?php
	if (isset($_GET['edit_enquiry_type'])) {
		$enquiry_id = $getFromU->checkInput($_GET['edit_enquiry_type']);

		$view_enquiry_type = $getFromU->view_enquiry_by_id($enquiry_id);
		$enquiry_title = $view_enquiry_type->enquiry_title;
	}


?>

<?php

	if (isset($_POST['update_enquiry'])) {
		$enquiry_title = $getFromU->checkInput($_POST['enquiry_title']);
		$enquiry_id = $getFromU->checkInput($_POST['enquiry_id']);

		$update_enquiry = $getFromU->update_enquiry($enquiry_id, $enquiry_title);

		if ($update_enquiry) {
			$_SESSION['update_enquiry_msg'] = "Enquiry Type has been Updated Sucessfully";
			header('Location: index.php?view_enquiry_types');

		}else {
			echo '<script>alert("Enquiry has not Updated added")</script>';
		}


	}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Enquiry Type</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-edit"></i> Update Enquiry Type</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="enquiry_title">Enquiry Type Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="enquiry_title" class="form-control" id="enquiry_title" value="<?php echo $enquiry_title; ?>" placeholder="Enquiry Type Title" required>
				      <div class="invalid-feedback">
				        Please provide a Enquiry Type Title.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-md-9">
				    	<input type="hidden" name="enquiry_id" value="<?php echo $enquiry_id; ?>" required>
				    </div>
				  </div>

				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="update_enquiry" type="submit"><i class="fas fa-edit"></i> Update Enquiry Type</button>
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