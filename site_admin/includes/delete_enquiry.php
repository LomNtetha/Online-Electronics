<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/electronics/core/init.php'); ?>

<?php

	if (isset($_GET['enquiry_id'])) {
		$enquiry_id = $_GET['enquiry_id'];

    	$sql = "DELETE FROM enquiry_type WHERE enquiry_id = :enquiry_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":enquiry_id", $enquiry_id);
        if ($stmt->execute()) {
        	$_SESSION['delete_enquiry_msg'] = "Enquiry has been Deleted Successfully";
        	header('Location: ../index.php?view_enquiry_types');
        }

	}
?>