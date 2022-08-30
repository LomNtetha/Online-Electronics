<?php require_once 'includes/header.php'; ?>

<?php
	if (isset($_GET['edit_service'])) {
		$service_id = $getFromU->checkInput($_GET['edit_service']);

		if (!empty($service_id)) {
			$get_service = $getFromU->view_service_by_id($service_id);

			$service_title = $get_service->service_title;
			$the_service_image = $get_service->service_image;
			$service_desc = $get_service->service_desc;
			$service_button = $get_service->service_button;
			$service_url = $get_service->service_url;
		}else {
			header('Location: index.php?view_services');
		}
	}
?>

<?php

	if (isset($_POST['update_service'])) {
		$service_title = $getFromU->checkInput($_POST['service_title']);
		$service_desc = $_POST['service_desc'];
		$service_button = $getFromU->checkInput($_POST['service_button']);
		$service_url = $getFromU->checkInput($_POST['service_url']);
		$service_id = $getFromU->checkInput($_POST['service_id']);


		$service_image = $_FILES['service_image']['name'];
		$temp_name = $_FILES['service_image']['tmp_name'];

		if (empty($service_image)) {
			$service_image = $the_service_image;
		}


		move_uploaded_file($temp_name, "services_images/$service_image");

		$update_service = $getFromU->update_service("services", $service_id, array("service_title" => $service_title, "service_desc" => $service_desc, "service_image" => $service_image, "service_button" => $service_button, "service_url" => $service_url));

		if ($update_service) {
			$_SESSION['update_service_msg'] = "Service has been Updated Sucessfully";
			header('Location: index.php?view_services');

		}else {
			echo '<script>alert("Service has not been Updated")</script>';
		}

	}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Service</li>
	</ol>
</nav>

<?php if (isset($error)): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-warning text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $error; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-edit"></i> Update Service</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="service_title">Service Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="service_title" value="<?php echo $service_title; ?>" class="form-control" id="service_title" placeholder="Service Title" required>
				      <div class="invalid-feedback">
				        Please provide a Service Title.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-md-9">
				    	<input type="hidden" name="service_id" value="<?php echo $service_id; ?>" required>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="service_image">Service Image</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="service_image" id="service_image">
				    	<span><img src="services_images/<?php echo $the_service_image; ?>" class="rounded" height="45" width="45"></span>
				      <div class="invalid-feedback">
				        Please provide a Service Image.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="service_desc">Service Description</label>
				    </div>
				    <div class="col-md-9">
				    	<textarea name="service_desc" placeholder="Service Description" rows="10" class="form-control summernote" id="service_desc" required><?php echo $service_desc; ?></textarea>
				      <div class="invalid-feedback">
				        Please provide a Service Title.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="service_button">Service Button</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="service_button" value="<?php echo $service_button; ?>" class="form-control" id="service_button" placeholder="Service Button" required>
				      <div class="invalid-feedback">
				        Please provide a Service Button.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="service_url">Service URL</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="service_url" value="<?php echo $service_url; ?>" class="form-control" id="service_url" placeholder="Service URL" required>
				      <div class="invalid-feedback">
				        Please provide a Service URL.
				      </div>
				    </div>
				  </div>



				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="update_service" type="submit"><i class="fas fa-edit"></i> Update Service</button>
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

