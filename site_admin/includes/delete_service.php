<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/electronics/core/init.php'); ?>

<?php

	if (isset($_GET['service_id'])) {
		$service_id = $_GET['service_id'];

    	$sql = "DELETE FROM services WHERE service_id = :service_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":service_id", $service_id);
        if ($stmt->execute()) {
        	$_SESSION['delete_service_msg'] = "Service has been Deleted Successfully";
        	header('Location: ../index.php?view_services');
        }

	}
?>