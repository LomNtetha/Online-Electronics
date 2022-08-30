<?php require_once 'core/init.php'; ?>


<?php

	$ip_add = $getFromU->getRealUserIp();

	if (isset($_POST['id']) && isset($_POST['quentity'])) {
		$id = $_POST['id'];
		$qty = $_POST['quentity'];

		$update_cat = $getFromU->update_cart($id, $ip_add, $qty);
	}

?>