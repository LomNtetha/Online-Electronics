<?php require_once 'includes/header.php'; ?>

<?php

	if (isset($_GET['edit_terms'])) {
		$term_id 		= $_GET['edit_terms'];

		$view_terms   = $getFromU->selectTermsByTermID($term_id);
		$term_title 	= $view_terms->term_title;
		$term_desc 	= $view_terms->term_desc;
		$term_link 	= $view_terms->term_link;
	}

?>

<?php

	if (isset($_POST['update_terms'])) {
		$term_id 		= $_POST['term_id'];
		$term_title 	= $_POST['term_title'];
		$term_desc 	= $_POST['term_desc'];
		$term_link 	= $_POST['term_link'];

		$update_terms = $getFromU->update_terms("terms",$term_id, array("term_title" => $term_title, "term_link" => $term_link, "term_desc" => $term_desc));

		if ($update_terms) {
			$_SESSION['terms_update_msg'] = "Terms has been Updated Sucessfully";
			header('Location: index.php?view_terms');
		}else {
			echo '<script>alert("Terms has not added")</script>';
		}
	}

?>

<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Terms</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Update Terms</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="form-row mb-3">
				    <div class="col-md-9">
				    	<input type="hidden" name="box_id" class="form-control" required value="<?php echo $box_id; ?>">
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-md-9">
				    	<input type="hidden" name="term_id" id="term_title" required value="<?php echo $term_id; ?>">
				    </div>
				  </div>


				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="term_title">Terms Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="term_title" class="form-control" id="term_title" placeholder="Terms Title" required value="<?php echo $term_title; ?>">
				      <div class="invalid-feedback">
				        Please provide a Terms Title.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="term_link">Terms Link</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="term_link" class="form-control" id="term_link" placeholder="Terms Link" required value="<?php echo $term_link; ?>">
				      <div class="invalid-feedback">
				        Please provide a Terms Link.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="term_desc">Terms Description</label>
				    </div>
				    <div class="col-md-9">
				    	<textarea name="term_desc" class="form-control" id="term_desc" rows="5" placeholder="Terms Description" required> <?php echo $term_desc; ?></textarea>
				      <div class="invalid-feedback">
				        Please provide a Terms Description.
				      </div>
				    </div>
				  </div>





				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="update_terms" type="submit"><i class="fas fa-edit"></i> Update Terms</button>
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

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

