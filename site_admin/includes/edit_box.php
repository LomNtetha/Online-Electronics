<?php require_once 'includes/header.php'; ?>

<?php

	if (isset($_GET['edit_box'])) {
		$box_id 		= $_GET['edit_box'];

		$view_box   = $getFromU->selectBoxByBoxID($box_id);
		$box_title 	= $view_box->box_title;
		$box_desc 	= $view_box->box_desc;


	}

?>

<?php

	if (isset($_POST['update_box'])) {
		$box_id 		= $_POST['box_id'];
		$box_title 	= $_POST['box_title'];
		$box_desc 	= $_POST['box_desc'];

		$update_box = $getFromU->update_box("boxes_section",$box_id, array("box_title" => $box_title, "box_desc" => $box_desc));

		if ($update_box) {
			$_SESSION['box_update_msg'] = "Box has been Updated Sucessfully";
			header('Location: index.php?view_boxes');
		}else {
			echo '<script>alert("Box has not added")</script>';
		}
	}

?>

<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Box</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Update Box</div>
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
				    <div class="col-3">
				      <label for="box_title">Box Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="box_title" class="form-control" id="box_title" placeholder="Box Title" required value="<?php echo $box_title; ?>">
				      <div class="invalid-feedback">
				        Please provide a Box Title.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="box_desc">Box Description</label>
				    </div>
				    <div class="col-md-9">
				    	<textarea name="box_desc" class="form-control" id="box_desc" rows="5" placeholder="Box Description" required> <?php echo $box_desc; ?></textarea>
				      <div class="invalid-feedback">
				        Please provide a Box Description.
				      </div>
				    </div>
				  </div>





				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="update_box" type="submit"><i class="fas fa-edit"></i> Update Box</button>
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

