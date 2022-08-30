<?php require_once 'includes/header.php'; ?>


<?php
	$get_about = $getFromU->viewFromTable('about_us');
	$about_id = $get_about->about_id;
	$about_short_desc = $get_about->about_short_desc;
	$about_heading = $get_about->about_heading;
	$about_desc = $get_about->about_desc;
?>

<?php

	if (isset($_POST['update_about_us'])) {
		$about_short_desc = $_POST['about_short_desc'];
		$about_heading = $_POST['about_heading'];
		$about_desc = $_POST['about_desc'];

		$update_about_us = $getFromU->update_table("about_us", array("about_heading" => $about_heading, "about_short_desc" => $about_short_desc, "about_desc" => $about_desc));

		if ($update_about_us) {
			$_SESSION['about_us_update_msg'] = "About Us has been Updated Sucessfully";
			//header('Location: index.php?edit_contact_us');
		}else {
			echo '<script>alert("About Us has not Updated")</script>';
		}
	}

?>

<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Contact Us</li>
	</ol>
</nav>

<?php if (isset($_SESSION['about_us_update_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['about_us_update_msg']; unset($_SESSION['about_us_update_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-edit"></i> Update About Us</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="about_heading">About Heading</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="about_heading" class="form-control" id="contact_email" value="<?php echo $about_heading; ?>" placeholder="About Heading" required>
				      <div class="invalid-feedback">
				        Please provide a About Heading
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="about_short_desc">About Short Description</label>
				    </div>
				    <div class="col-md-9">
				    	<textarea name="about_short_desc" class="form-control summernote" id="about_short_desc" rows="10" placeholder="About Heading" required><?php echo $about_short_desc; ?></textarea>
				      <div class="invalid-feedback">
				        Please provide a About Short Description
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="about_desc">About Description</label>
				    </div>
				    <div class="col-md-9">
				    	<textarea name="about_desc" class="form-control summernote" id="about_desc" rows="10" placeholder="About Heading" required><?php echo $about_desc; ?></textarea>
				      <div class="invalid-feedback">
				        Please provide a About Description
				      </div>
				    </div>
				  </div>


				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="update_about_us" type="submit"><i class="fas fa-edit"></i> Update About Us</button>
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