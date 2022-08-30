<?php require_once 'includes/header.php'; ?>


<?php
	$get_contact = $getFromU->viewFromContact();
	$contact_id = $get_contact->contact_id;
	$contact_email = $get_contact->contact_email;
	$contact_heading = $get_contact->contact_heading;
	$contact_desc = $get_contact->contact_desc;
?>

<?php

	if (isset($_POST['update_contact_us'])) {
		$contact_email = $_POST['contact_email'];
		$contact_heading = $_POST['contact_heading'];
		$contact_desc = $_POST['contact_desc'];

		$update_contact_us = $getFromU->update_table("contact_us", array("contact_email" => $contact_email, "contact_heading" => $contact_heading, "contact_desc" => $contact_desc));

		if ($update_contact_us) {
			$_SESSION['contact_us_update_msg'] = "Contact Us has been Updated Sucessfully";
			//header('Location: index.php?edit_contact_us');
		}else {
			echo '<script>alert("Contact Us has not Updated")</script>';
		}
	}

?>

<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Contact Us</li>
	</ol>
</nav>

<?php if (isset($_SESSION['contact_us_update_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['contact_us_update_msg']; unset($_SESSION['contact_us_update_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-edit"></i> Update Contact Us</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="contact_email">Contact Email</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="email" name="contact_email" class="form-control" id="contact_email" value="<?php echo $contact_email; ?>" placeholder="Contact Email" required>
				      <div class="invalid-feedback">
				        Please provide a Contact Email
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="contact_heading">Contact Heading</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="contact_heading" class="form-control" id="contact_heading" value="<?php echo $contact_heading; ?>" placeholder="Contact Heading" required>
				      <div class="invalid-feedback">
				        Please provide a Contact Heading
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="contact_desc">Contact Description</label>
				    </div>
				    <div class="col-md-9">
				    	<textarea name="contact_desc" class="form-control summernote" id="contact_desc" rows="10" placeholder="Contact Heading" required><?php echo $contact_desc; ?></textarea>
				      <div class="invalid-feedback">
				        Please provide a Contact Description
				      </div>
				    </div>
				  </div>


				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="update_contact_us" type="submit"><i class="fas fa-edit"></i> Update Contact Us</button>
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