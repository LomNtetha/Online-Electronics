<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/electronics/core/init.php'); ?>

<?php

	if (isset($_GET['coupon_id'])) {
		$coupon_id = $_GET['coupon_id'];

    	$sql = "DELETE FROM coupons WHERE coupon_id = :coupon_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":coupon_id", $coupon_id);
        if ($stmt->execute()) {
        	$_SESSION['delete_coupon_msg'] = "Coupon has been Deleted Successfully";
        	header('Location: ../index.php?view_coupons');
        }

	}
?>