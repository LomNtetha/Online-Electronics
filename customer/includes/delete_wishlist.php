<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/eCommerce/core/init.php'); ?>

<?php

	if (isset($_GET['wishlist_id'])) {
		$wishlist_id = $_GET['wishlist_id'];

    	$sql = "DELETE FROM wishlist WHERE wishlist_id = :wishlist_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":wishlist_id", $wishlist_id);
        if ($stmt->execute()) {
        	$_SESSION['delete_payment_msg'] = "Wishlist has been Deleted Successfully";
        	header('Location: ../my_account.php?wishlist');
        }

	}
?>