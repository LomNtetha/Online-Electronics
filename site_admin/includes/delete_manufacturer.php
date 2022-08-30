<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/electronics/core/init.php'); ?>

<?php

	if (isset($_GET['manufacturer_id'])) {
		$manufacturer_id = $_GET['manufacturer_id'];

    	$sql = "DELETE FROM manufacturers WHERE manufacturer_id = :manufacturer_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":manufacturer_id", $manufacturer_id);
        if ($stmt->execute()) {
        	$_SESSION['delete_manufacturer_msg'] = "Manufacturer has been Deleted Successfully";
        	header('Location: ../index.php?view_manufacturers');
        }

	}
?>