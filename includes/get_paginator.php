<?php

	// / getPaginator Function Code Starts ///

	$per_page = 6;
	global $db;
	$aWhere = array();
	$aPath = '';

	// / Manufacturers Code Starts ///

	if (isset($_REQUEST['man']) && is_array($_REQUEST['man']))
		{
		foreach($_REQUEST['man'] as $sKey => $sVal)
			{
			if ((int)$sVal != 0)
				{
				$aWhere[] = 'manufacturer_id=' . (int)$sVal;
				$aPath.= 'man[]=' . (int)$sVal . '&';
				}
			}
		}

	// / Manufacturers Code Ends ///
	// / Products Categories Code Starts ///

	if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat']))
		{
		foreach($_REQUEST['p_cat'] as $sKey => $sVal)
			{
			if ((int)$sVal != 0)
				{
				$aWhere[] = 'p_cat_id=' . (int)$sVal;
				$aPath.= 'p_cat[]=' . (int)$sVal . '&';
				}
			}
		}

	// / Products Categories Code Ends ///
	// / Categories Code Starts ///

	if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat']))
		{
		foreach($_REQUEST['cat'] as $sKey => $sVal)
			{
			if ((int)$sVal != 0)
				{
				$aWhere[] = 'cat_id=' . (int)$sVal;
				$aPath.= 'cat[]=' . (int)$sVal . '&';
				}
			}
		}

	// / Categories Code Ends ///

	$sWhere = (count($aWhere) > 0 ? ' WHERE ' . implode(' or ', $aWhere) : '');

	$result = $getFromU->selectAllProducts($sWhere);

	$total_records = count($result);
	$total_pages = ceil($total_records / $per_page);

	echo "<li class='page-item'><a class='page-link' href='shop.php?page=1";

	if (!empty($aPath)){

		echo "&" . $aPath;
	}

	echo "' >" . '<i class="fa fa-angle-left"></i> first page' . "</a></li>";

	for ($i = 1; $i <= $total_pages; $i++){

		echo "<li class='page-item' class='active'><a class='page-link' href='shop.php?page=" . $i . (!empty($aPath) ? '&' . $aPath : '') . "' >" . $i . "</a></li>";
	};

	echo "<li class='page-item'><a class='page-link' href='shop.php?page=$total_pages";

	if (!empty($aPath)){

		echo "&" . $aPath;
	}

	echo "' >" . 'last page  <i class="fa fa-angle-right"></i>' . "</a></li>";

	// / getPaginator Function Code Ends ///

?>

