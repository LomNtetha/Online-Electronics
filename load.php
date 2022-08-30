<?php require_once 'core/init.php'; ?>


<?php

	switch ($_REQUEST['sAction']) {
		case 'getPaginator':
			require_once 'includes/get_paginator.php';
			break;

		default:
      require_once 'includes/get_all_products.php';
			break;
	}


?>
