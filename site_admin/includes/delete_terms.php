<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/electronics/core/init.php'); ?>

<?php

	if (isset($_GET['term_id'])) {
		$term_id = $_GET['term_id'];

    	$sql = "DELETE FROM terms WHERE term_id = :term_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":term_id", $term_id);
        if ($stmt->execute()) {
        	$_SESSION['delete_terms_msg'] = "Terms has been Deleted Successfully";
        	header('Location: ../index.php?view_terms');
        }

	}
?>