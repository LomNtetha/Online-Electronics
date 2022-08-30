<?php require_once 'includes/header.php'; ?>

<?php
	$file = "../assets/css/main.css";
	if (file_exists($file)) {
		$data = file_get_contents($file);
	}
?>

<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Edit CSS File</li>
	</ol>
</nav>

<?php if (isset($_SESSION['css_file_update_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['css_file_update_msg']; unset($_SESSION['css_file_update_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-edit"></i> Edit CSS File</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
				  <div class="form-row mb-3">
				    <div class="col-md-12">
				    	<textarea name="newdata" class="form-control" rows="25" required> <?php echo $data; ?></textarea>
				      <div class="invalid-feedback">
				        Please provide Some CSS Code.
				      </div>
				    </div>
				  </div>

				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="update_css" type="submit"><i class="fas fa-edit"></i> Update CSS File</button>
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


<?php

	if (isset($_POST['update_css'])) {
		$newdata 		= $_POST['newdata'];
		$handle = fopen($file, "w");
		fwrite($handle, $newdata);
		fclose($handle);

		$_SESSION['css_file_update_msg'] = "CSS File has been Updated Sucessfully";
		header('Location: index.php?edit_css');
	}

?>

