<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/electronics/core/init.php'); ?>

<?php

	if (isset($_GET['box_id'])) {
		$box_id = $_GET['box_id'];

    	$sql = "DELETE FROM boxes_section WHERE box_id = :box_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":box_id", $box_id);
        if ($stmt->execute()) {
        	$_SESSION['delete_box_msg'] = "Box has been Deleted Successfully";
        	header('Location: ../index.php?view_boxes');
        }

	}
?>