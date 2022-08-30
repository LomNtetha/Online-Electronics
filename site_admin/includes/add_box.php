<?php require_once 'includes/header.php'; ?>
<?php
	if (isset($_POST['add_box'])) {
		$box_title = $getFromU->checkInput($_POST['box_title']);
		$box_desc = $getFromU->checkInput($_POST['box_desc']);




		$insert_cat = $getFromU->create("boxes_section", array("box_title" => $box_title, "box_desc" => $box_desc));

		if ($insert_cat) {
			$_SESSION['insert_box_msg'] = "Box has been added Sucessfully";
			header('Location: index.php?view_boxes');

		}else {
			echo '<script>alert("Box has not added")</script>';
		}


	}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Insert Box</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Insert Box</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="box_title">Box Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="box_title" class="form-control" id="box_title" placeholder="Box Title" required>
				      <div class="invalid-feedback">
				        Please provide a Box Title.
				      </div>
				    </div>
				  </div>
					<div class="form-row mb-3">
				    <div class="col-md-3 ">
				      <label for="box_desc">Box Description</label>
				    </div>
				    <div class="col-md-9">
				    	<textarea name="box_desc" class="form-control" rows="6" id="box_desc" placeholder="Enter Box Description" required></textarea>
				      <div class="invalid-feedback">
				        Please provide Box Description.
				      </div>
				    </div>
				  </div>
				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="add_box" type="submit"><i class="fas fa-plus-circle"></i> Insert Box</button>
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

