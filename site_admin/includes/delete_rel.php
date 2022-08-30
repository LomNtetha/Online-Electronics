<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/electronics/core/init.php'); ?>

<?php

	if (isset($_GET['rel_id'])) {
		$rel_id = $_GET['rel_id'];

    	$sql = "DELETE FROM bundle_product_relation WHERE rel_id = :rel_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":rel_id", $rel_id);
        if ($stmt->execute()) {
        	$_SESSION['delete_rel_msg'] = "Relation has been Deleted Successfully";
        	header('Location: ../index.php?view_product_to_bundles');
        }

	}
?>