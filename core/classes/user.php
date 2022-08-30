<?php

	class User {
    protected $pdo;
    protected $state_csv = false;
    public function __construct($pdo)
    {
      $this->pdo = $pdo;
    }

    public function checkInput($var)
    {
    	$var = htmlspecialchars($var);
    	$var = trim($var);
    	$var = stripcslashes($var);
    	return $var;
    }

    public function search($search)
    {
      $sql = "SELECT * FROM students WHERE student_name LIKE ? OR roll LIKE ?";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(1, '%'.$search.'%', PDO::PARAM_STR);
      $stmt->bindValue(2, '%'.$search.'%', PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll();
    }



    public function login($customer_email, $customer_pass)
    {
    	//$password = md5($password);
    	$sql = "SELECT * FROM customers WHERE customer_email = :customer_email AND customer_pass = :customer_pass";
    	$stmt = $this->pdo->prepare($sql);
    	$stmt->bindParam(":customer_email", $customer_email, PDO::PARAM_STR);
    	$stmt->bindParam(":customer_pass", $customer_pass);
    	$stmt->execute();

    	$customer = $stmt->fetch();
    	$count = $stmt->rowCount();
    	if ($count > 0) {
        $_SESSION['customer_email'] = $customer->customer_email;
        header('Location: customer/my_account.php?my_orders');

    	}else {
    		return false;
    	}
    }

    public function admin_login($admin_email, $admin_pass)
    {
      //$password = md5($password);
      $sql = "SELECT * FROM admins WHERE admin_email = :admin_email AND admin_pass = :admin_pass";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":admin_email", $admin_email, PDO::PARAM_STR);
      $stmt->bindParam(":admin_pass", $admin_pass);
      $stmt->execute();

      $admin = $stmt->fetch();
      $count = $stmt->rowCount();
      if ($count > 0) {
        $_SESSION['admin_email'] = $admin->admin_email;
        $_SESSION['admin_login_success_msg'] = "You are Logged in into Admin Panel";
        header('Location: index.php?dashboard');

      }else {
        return false;
      }
    }

  	public function create($table, $fields = array())
  	{
  		$columns = implode(',', array_keys($fields));
  		$values  = ':'.implode(', :', array_keys($fields));
  		$sql = "INSERT INTO {$table} ({$columns}) VALUES({$values})";
  		$stmt = $this->pdo->prepare($sql);

  		if ($stmt) {
  			foreach ($fields as $key => $data) {
  				$stmt->bindValue(':'.$key, $data);
  			}
  			$stmt->execute();
  			return $this->pdo->lastInsertId();
  		}
  	}

    public function check_customer_by_email($customer_email)
    {
      $sql = "SELECT * FROM customers WHERE customer_email = :customer_email";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_email", $customer_email);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      if ($count > 0) {
        return true;
      }else{
        return false;
      }
    }

    public function check_admin_by_email($admin_email)
    {
      $sql = "SELECT * FROM admins WHERE admin_email = :admin_email";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":admin_email", $admin_email);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      if ($count > 0) {
        return true;
      }else{
        return false;
      }
    }

    public function check_old_pass_by_email($customer_pass, $customer_email)
    {
      $sql = "SELECT * FROM customers WHERE customer_pass = :customer_pass AND customer_email = :customer_email";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_pass", $customer_pass);
      $stmt->bindParam(":customer_email", $customer_email);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      if ($count > 0) {
        return true;
      }else{
        return false;
      }
    }

    public function check_wishlist_by_customer_id_and_product_id($customer_id, $product_id)
    {
      $sql = "SELECT * FROM wishlist WHERE customer_id = :customer_id AND product_id = :product_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_id", $customer_id);
      $stmt->bindParam(":product_id", $product_id);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      if ($count > 0) {
        return true;
      }else{
        return false;
      }
    }

    public function view_customer_by_email($customer_email)
    {
      $sql = "SELECT * FROM customers WHERE customer_email = :customer_email";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_email", $customer_email);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function view_wishlists_by_customer_id($customer_id)
    {
      $sql = "SELECT * FROM wishlist WHERE customer_id = :customer_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_id", $customer_id);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function view_relation_by_id($rel_id)
    {
      $sql = "SELECT * FROM bundle_product_relation WHERE rel_id = :rel_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":rel_id", $rel_id);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function view_customer_by_id($customer_id)
    {
      $sql = "SELECT * FROM customers WHERE customer_id = :customer_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_id", $customer_id);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function view_service_by_id($service_id)
    {
      $sql = "SELECT * FROM services WHERE service_id = :service_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":service_id", $service_id);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function view_enquiry_by_id($enquiry_id)
    {
      $sql = "SELECT * FROM enquiry_type WHERE enquiry_id = :enquiry_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":enquiry_id", $enquiry_id);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function view_icon_by_id($icon_id)
    {
      $sql = "SELECT * FROM icons WHERE icon_id = :icon_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":icon_id", $icon_id);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function view_customer_orders_by_order_id($order_id)
    {
      $sql = "SELECT * FROM customer_orders WHERE order_id = :order_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":order_id", $order_id);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function view_distinct_status()
    {
      $sql = "SELECT DISTINCT status FROM products";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function view_admin_by_email($admin_email)
    {
      $sql = "SELECT * FROM admins WHERE admin_email = :admin_email";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":admin_email", $admin_email);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function view_admin_by_admin_id($admin_id)
    {
      $sql = "SELECT * FROM admins WHERE admin_id = :admin_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":admin_id", $admin_id);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function view_customer_orders_by_id($customer_id)
    {
      $sql = "SELECT * FROM customer_orders WHERE customer_id = :customer_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_id", $customer_id);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function view_pending_orders_with_limit()
    {
      $sql = "SELECT * FROM pending_orders ORDER BY 1 DESC LIMIT 0, 5";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function view_customer_order_by_order_id($order_id)
    {
      $sql = "SELECT * FROM customer_orders WHERE order_id = :order_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":order_id", $order_id);
      $stmt->execute();
      return $stmt->fetch();
    }


    public function viewCustomerOrderByOrderId($order_id)
    {
      $sql = "SELECT * FROM customer_orders WHERE order_id = :order_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":order_id", $order_id);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function view_coupon_by_coupon_code($coupon_code)
    {
      $sql = "SELECT * FROM coupons WHERE coupon_code = :coupon_code";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":coupon_code", $coupon_code);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function view_coupon_by_coupon_id($coupon_id)
    {
      $sql = "SELECT * FROM coupons WHERE coupon_id = :coupon_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":coupon_id", $coupon_id);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function count_coupon_by_coupon_code($coupon_code)
    {
      $sql = "SELECT * FROM coupons WHERE coupon_code = :coupon_code";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":coupon_code", $coupon_code);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      return $count;
    }

    public function check_coupon_by_coupon_code_or_product_id($product_id, $coupon_code)
    {
      $sql = "SELECT * FROM coupons WHERE product_id = :product_id OR coupon_code = :coupon_code";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":product_id", $product_id);
      $stmt->bindParam(":coupon_code", $coupon_code);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      return $count;
    }

    public function update_customer_order_status($order_status, $table_name, $order_id)
    {
      $sql = "UPDATE $table_name SET order_status = :order_status WHERE order_id = :order_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":order_status", $order_status);
      $stmt->bindParam(":order_id", $order_id);
      $stmt->execute();
    }

    public function update_enquiry($enquiry_id, $enquiry_title)
    {
      $sql = "UPDATE enquiry_type SET enquiry_title = :enquiry_title WHERE enquiry_id = :enquiry_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":enquiry_title", $enquiry_title);
      $stmt->bindParam(":enquiry_id", $enquiry_id);

      if ($stmt->execute()) {
        return true;
      }else{
        return false;
      }
    }


    public function update_customer_password($customer_id, $customer_pass)
    {
      $sql = "UPDATE customers SET customer_pass = :customer_pass WHERE customer_id = :customer_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_pass", $customer_pass);
      $stmt->bindParam(":customer_id", $customer_id);

      if ($stmt->execute()) {
        return true;
      }else{
        return false;
      }
    }

    public function update_customer_confirm_code($customer_confirm_code)
    {
      $sql = "UPDATE customers SET customer_confirm_code = '' WHERE customer_confirm_code = :customer_confirm_code";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_confirm_code", $customer_confirm_code);

      if ($stmt->execute()) {
        return true;
      }else{
        return false;
      }
    }



    public function update_cart($p_id,$ip_add, $qty)
    {
      $sql = "UPDATE cart SET qty = :qty WHERE p_id = :p_id AND ip_add = :ip_add";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":qty", $qty);
      $stmt->bindParam(":p_id", $p_id);
      $stmt->bindParam(":ip_add", $ip_add);

      if ($stmt->execute()) {
        return true;
      }else{
        return false;
      }
    }

    public function update_cart_price($product_id,$ip_add, $coupon_price)
    {
      $sql = "UPDATE cart SET product_price = :coupon_price  WHERE p_id = :product_id AND ip_add = :ip_add";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":coupon_price", $coupon_price);
      $stmt->bindParam(":product_id", $product_id);
      $stmt->bindParam(":ip_add", $ip_add);

      if ($stmt->execute()) {
        return true;
      }else{
        return false;
      }
    }


    public function update_used_coupon($coupon_code)
    {
      $sql = "UPDATE coupons SET coupon_used = coupon_used + 1  WHERE coupon_code = :coupon_code";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":coupon_code", $coupon_code);

      if ($stmt->execute()) {
        return true;
      }else{
        return false;
      }
    }





  	public function logout()
  	{
  		$_SESSION = array();
  		session_destroy();
  		header("Location: ".BASE_URL."index.php");
  	}


  	public function selectSlide1()
  	{
  		$sql = "SELECT * FROM slider LIMIT 0,1";
  		$stmt = $this->pdo->prepare($sql);
  		$stmt->execute();

  		return $stmt->fetchAll();
  	}

    public function selectTerm1()
    {
      $sql = "SELECT * FROM terms LIMIT 0,1";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetch();
    }

    public function selectTerms($count)
    {
      $sql = "SELECT * FROM terms LIMIT 1,$count";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }


    public function selectSlideAll()
    {
      $sql = "SELECT * FROM slider LIMIT 1,3";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectSlideBySlideID($slide_id)
    {
      $sql = "SELECT * FROM slider WHERE slide_id = :slide_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":slide_id", $slide_id);
      $stmt->execute();

      return $stmt->fetch();
    }

    public function selectTopManufacturer()
    {
      $sql = "SELECT * FROM manufacturers WHERE manufacturer_top = 'Yes' ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function selectNonTopManufacturer()
    {
      $sql = "SELECT * FROM manufacturers WHERE manufacturer_top = 'No' ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function selectTopProductCatagories()
    {
      $sql = "SELECT * FROM product_categories WHERE p_cat_top = 'Yes' ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function selectNonTopProductCatagories()
    {
      $sql = "SELECT * FROM product_categories WHERE p_cat_top = 'No' ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function selectTopCatagories()
    {
      $sql = "SELECT * FROM categories WHERE cat_top = 'Yes' ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function selectNonTopCatagories()
    {
      $sql = "SELECT * FROM categories WHERE cat_top = 'No' ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function selectBoxByBoxID($box_id)
    {
      $sql = "SELECT * FROM boxes_section WHERE box_id = :box_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":box_id", $box_id);
      $stmt->execute();

      return $stmt->fetch();
    }

    public function selectManufacturerByManufacturerID($manufacturer_id)
    {
      $sql = "SELECT * FROM manufacturers WHERE manufacturer_id = :manufacturer_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":manufacturer_id", $manufacturer_id);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function selectTermsByTermID($term_id)
    {
      $sql = "SELECT * FROM terms WHERE term_id = :term_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":term_id", $term_id);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function selectLatestProduct()
    {
      $sql = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0,8";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectAllProducts1($start_from, $per_page)
    {
      $sql = "SELECT * FROM products ORDER BY 1 DESC LIMIT $start_from, $per_page ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function selectAllProducts($conditions)
    {
      $sql = "SELECT * FROM products $conditions ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function selectAllProductByP_cat_ID($start_from, $per_page, $p_cat_id)
    {
      $sql = "SELECT * FROM products WHERE p_cat_id = :p_cat_id ORDER BY 1 DESC LIMIT $start_from, $per_page ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":p_cat_id", $p_cat_id);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function selectAllProductBy_cat_ID($start_from, $per_page, $cat_id)
    {
      $sql = "SELECT * FROM products WHERE cat_id = :cat_id ORDER BY 1 DESC LIMIT $start_from, $per_page ";
      $stmt = $this->pdo->prepare($sql);
       $stmt->bindParam(":cat_id", $cat_id);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewProductByProductID($product_id)
    {
      $sql = "SELECT * FROM products WHERE product_id = :product_id ";
      $stmt = $this->pdo->prepare($sql);
       $stmt->bindParam(":product_id", $product_id);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function viewIconsByProductID($product_id)
    {
      $sql = "SELECT * FROM icons WHERE icon_product = :product_id ";
      $stmt = $this->pdo->prepare($sql);
       $stmt->bindParam(":product_id", $product_id);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function viewProductByProductURL($product_id)
    {
      $sql = "SELECT * FROM products WHERE product_url = :product_id ";
      $stmt = $this->pdo->prepare($sql);
       $stmt->bindParam(":product_id", $product_id);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function view_Product_By_Product_ID($product_id)
    {
      $sql = "SELECT * FROM products WHERE product_id = :product_id ";
      $stmt = $this->pdo->prepare($sql);
       $stmt->bindParam(":product_id", $product_id);
      $stmt->execute();

      return $stmt->fetch();
    }
    public function view_customer_By_Customer_ID($customer_id)
    {
      $sql = "SELECT * FROM customer WHERE customer_id = :customer_id ";
      $stmt = $this->pdo->prepare($sql);
       $stmt->bindParam(":customer_id", $customer_id);
      $stmt->execute();

      return $stmt->fetch();
    }

    public function viewFromTableByProductID($table_name, $product_id)
    {
      $sql = "SELECT * FROM $table_name WHERE product_id = :product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":product_id", $product_id);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function viewAllFromBundleByBundleID($bundle_id)
    {
      $sql = "SELECT * FROM bundle_product_relation WHERE bundle_id = :bundle_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":bundle_id", $bundle_id);
      $stmt->execute();
      return $stmt->fetchAll();
    }

    public function countFromTableByProductID($table_name, $product_id)
    {
      $sql = "SELECT * FROM $table_name WHERE product_id = :product_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":product_id", $product_id);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      return $count;
    }

    public function countFromTableByPCatID($table_name, $p_cat_id)
    {
      $sql = "SELECT * FROM $table_name WHERE p_cat_id = :p_cat_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":p_cat_id", $p_cat_id);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      return $count;
    }

    public function countFromTableByCatID($table_name, $cat_id)
    {
      $sql = "SELECT * FROM $table_name WHERE cat_id = :cat_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":cat_id", $cat_id);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      return $count;
    }

    public function countFromTableByManufacturerID($table_name, $manufacturer_id)
    {
      $sql = "SELECT * FROM $table_name WHERE manufacturer_id = :manufacturer_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":manufacturer_id", $manufacturer_id);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      return $count;
    }

    public function viewAllByCatID($p_cat_id)
    {
      $sql = "SELECT * FROM product_categories WHERE p_cat_id = :p_cat_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":p_cat_id", $p_cat_id);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function view_All_By_p_cat_ID($p_cat_id)
    {
      $sql = "SELECT * FROM product_categories WHERE p_cat_id = :p_cat_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":p_cat_id", $p_cat_id);
      $stmt->execute();

      return $stmt->fetch();
    }

    public function view_All_By_cat_ID($cat_id)
    {
      $sql = "SELECT * FROM categories WHERE cat_id = :cat_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":cat_id", $cat_id);
      $stmt->execute();

      return $stmt->fetch();
    }

    public function view_All_By_Manufacturer_ID($manufacturer_id)
    {
      $sql = "SELECT * FROM manufacturers WHERE manufacturer_id = :manufacturer_id ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":manufacturer_id", $manufacturer_id);
      $stmt->execute();

      return $stmt->fetch();
    }

    public function viewProductByCatID($p_cat_id)
    {
      $sql = "SELECT * FROM products WHERE p_cat_id = :p_cat_id ORDER BY 1 DESC LIMIT 4";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":p_cat_id", $p_cat_id);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function view_bundle_products($status)
    {
      $sql = "SELECT * FROM products WHERE status = :status ORDER BY 1";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":status", $status);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewAllFromTable($table_name)
    {
      $sql = "SELECT * FROM {$table_name}";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function viewFromContact()
    {
      $sql = "SELECT * FROM contact_us";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function viewFromTable($table_name)
    {
      $sql = "SELECT * FROM {$table_name}";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetch();
    }

    public function viewAllFromTableWhereOrderStatus($table_name, $order_status)
    {
      $sql = "SELECT * FROM {$table_name} WHERE order_status = :order_status";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":order_status", $order_status);
      $stmt->execute();

      return $stmt->fetchAll();
    }

    public function getRealUserIp()
    {
       if ( !empty( $_SERVER['HTTP_CLIENT_IP'] ) )
      {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      }
      elseif( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
      //to check ip passed from proxy
      {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
      }
      else
      {
        $ip = $_SERVER['REMOTE_ADDR'];
      }
      return $ip;
    }

    public function check_product_by_ip_id($ip_add, $p_id)
    {
      $sql = "SELECT * FROM cart WHERE ip_add = :ip_add AND p_id = :p_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":ip_add", $ip_add);
      $stmt->bindParam(":p_id", $p_id);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      if ($count > 0) {
        return true;
      }else{
        return false;
      }
    }


    public function count_product_by_ip($ip_add)
    {
      $sql = "SELECT * FROM cart WHERE ip_add = :ip_add";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":ip_add", $ip_add);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      return $count;
    }


    public function count_product_by_status($order_status)
    {
      $sql = "SELECT * FROM customer_orders WHERE order_status = :order_status";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":order_status", $order_status);
      $stmt->execute();
      $stmt->fetch();
      $count = $stmt->rowCount();
      return $count;
    }


    public function select_products_by_ip($ip_add)
    {
      $sql = "SELECT * FROM cart WHERE ip_add = :ip_add";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":ip_add", $ip_add);
      $stmt->execute();
      return $stmt->fetchAll();
    }

     public function select_random_products()
    {
      $sql = "SELECT * FROM products ORDER BY rand() LIMIT 0, 6";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    }

  	public function update_product($table, $product_id, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
        $columns .= "{$name} = :{$name}";
        if ($i < count($fields)) {
          $columns .= ', ';
        }
        $i++;
      }

      $sql = "UPDATE {$table} SET {$columns} WHERE product_id = {$product_id}";
      $stmt = $this->pdo->prepare($sql);
      if ($stmt) {
        foreach ($fields as $key => $value) {
          $stmt->bindValue(":".$key, $value);
        }

       	if ($stmt->execute()) {
          return true;
        }else{
          return false;
        }

      }
    }

    public function update_rel($table, $rel_id, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
        $columns .= "{$name} = :{$name}";
        if ($i < count($fields)) {
          $columns .= ', ';
        }
        $i++;
      }

      $sql = "UPDATE {$table} SET {$columns} WHERE rel_id = {$rel_id}";
      $stmt = $this->pdo->prepare($sql);
      if ($stmt) {
        foreach ($fields as $key => $value) {
          $stmt->bindValue(":".$key, $value);
        }

        if ($stmt->execute()) {
          return true;
        }else{
          return false;
        }

      }
    }

    public function update_manufacturer($table, $manufacturer_id, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
        $columns .= "{$name} = :{$name}";
        if ($i < count($fields)) {
          $columns .= ', ';
        }
        $i++;
      }

      $sql = "UPDATE {$table} SET {$columns} WHERE manufacturer_id = {$manufacturer_id}";
      $stmt = $this->pdo->prepare($sql);
      if ($stmt) {
        foreach ($fields as $key => $value) {
          $stmt->bindValue(":".$key, $value);
        }

        if ($stmt->execute()) {
          return true;
        }else{
          return false;
        }

      }
    }


    public function update_p_cat($table, $p_cat_id, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
        $columns .= "{$name} = :{$name}";
        if ($i < count($fields)) {
          $columns .= ', ';
        }
        $i++;
      }

      $sql = "UPDATE {$table} SET {$columns} WHERE p_cat_id = {$p_cat_id}";
      $stmt = $this->pdo->prepare($sql);
      if ($stmt) {
        foreach ($fields as $key => $value) {
          $stmt->bindValue(":".$key, $value);
        }

        if ($stmt->execute()) {
          return true;
        }else{
          return false;
        }

      }
    }

    public function update_cat($table, $cat_id, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
        $columns .= "{$name} = :{$name}";
        if ($i < count($fields)) {
          $columns .= ', ';
        }
        $i++;
      }

      $sql = "UPDATE {$table} SET {$columns} WHERE cat_id = {$cat_id}";
      $stmt = $this->pdo->prepare($sql);
      if ($stmt) {
        foreach ($fields as $key => $value) {
          $stmt->bindValue(":".$key, $value);
        }

        if ($stmt->execute()) {
          return true;
        }else{
          return false;
        }

      }
    }

    public function update_slide($table, $slide_id, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
        $columns .= "{$name} = :{$name}";
        if ($i < count($fields)) {
          $columns .= ', ';
        }
        $i++;
      }

      $sql = "UPDATE {$table} SET {$columns} WHERE slide_id = {$slide_id}";
      $stmt = $this->pdo->prepare($sql);
      if ($stmt) {
        foreach ($fields as $key => $value) {
          $stmt->bindValue(":".$key, $value);
        }

        if ($stmt->execute()) {
          return true;
        }else{
          return false;
        }

      }
    }


    public function update_box($table, $box_id, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
        $columns .= "{$name} = :{$name}";
        if ($i < count($fields)) {
          $columns .= ', ';
        }
        $i++;
      }

      $sql = "UPDATE {$table} SET {$columns} WHERE box_id = {$box_id}";
      $stmt = $this->pdo->prepare($sql);
      if ($stmt) {
        foreach ($fields as $key => $value) {
          $stmt->bindValue(":".$key, $value);
        }

        if ($stmt->execute()) {
          return true;
        }else{
          return false;
        }

      }
    }
  public function update_customer($table, $customer_id, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
        $columns .= "{$name} = :{$name}";
        if ($i < count($fields)) {
          $columns .= ', ';
        }
        $i++;
      }

      $sql = "UPDATE {$table} SET {$columns} WHERE customer_id = {$customer_id}";
      $stmt = $this->pdo->prepare($sql);
      if ($stmt) {
        foreach ($fields as $key => $value) {
          $stmt->bindValue(":".$key, $value);
        }

        if ($stmt->execute()) {
          return true;
        }else{
          return false;
        }

      }
    }

    public function update_terms($table, $term_id, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
        $columns .= "{$name} = :{$name}";
        if ($i < count($fields)) {
          $columns .= ', ';
        }
        $i++;
      }

      $sql = "UPDATE {$table} SET {$columns} WHERE term_id = {$term_id}";
      $stmt = $this->pdo->prepare($sql);
      if ($stmt) {
        foreach ($fields as $key => $value) {
          $stmt->bindValue(":".$key, $value);
        }

        if ($stmt->execute()) {
          return true;
        }else{
          return false;
        }

      }
    }


    public function update_user($table, $admin_id, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
        $columns .= "{$name} = :{$name}";
        if ($i < count($fields)) {
          $columns .= ', ';
        }
        $i++;
      }

      $sql = "UPDATE {$table} SET {$columns} WHERE admin_id = {$admin_id}";
      $stmt = $this->pdo->prepare($sql);
      if ($stmt) {
        foreach ($fields as $key => $value) {
          $stmt->bindValue(":".$key, $value);
        }

        if ($stmt->execute()) {
          return true;
        }else{
          return false;
        }

      }
    }

    public function update_coupon($table, $coupon_id, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
        $columns .= "{$name} = :{$name}";
        if ($i < count($fields)) {
          $columns .= ', ';
        }
        $i++;
      }

      $sql = "UPDATE {$table} SET {$columns} WHERE coupon_id = {$coupon_id}";
      $stmt = $this->pdo->prepare($sql);
      if ($stmt) {
        foreach ($fields as $key => $value) {
          $stmt->bindValue(":".$key, $value);
        }

        if ($stmt->execute()) {
          return true;
        }else{
          return false;
        }

      }
    }

    public function update_icon($table, $icon_id, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
        $columns .= "{$name} = :{$name}";
        if ($i < count($fields)) {
          $columns .= ', ';
        }
        $i++;
      }

      $sql = "UPDATE {$table} SET {$columns} WHERE icon_id = {$icon_id}";
      $stmt = $this->pdo->prepare($sql);
      if ($stmt) {
        foreach ($fields as $key => $value) {
          $stmt->bindValue(":".$key, $value);
        }

        if ($stmt->execute()) {
          return true;
        }else{
          return false;
        }

      }
    }


    public function update_service($table, $service_id, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
        $columns .= "{$name} = :{$name}";
        if ($i < count($fields)) {
          $columns .= ', ';
        }
        $i++;
      }

      $sql = "UPDATE {$table} SET {$columns} WHERE service_id = {$service_id}";
      $stmt = $this->pdo->prepare($sql);
      if ($stmt) {
        foreach ($fields as $key => $value) {
          $stmt->bindValue(":".$key, $value);
        }

        if ($stmt->execute()) {
          return true;
        }else{
          return false;
        }

      }
    }

    public function update_table($table, $fields = array())
    {
      $columns = '';
      $i       = 1;
      foreach ($fields as $name => $value) {
        $columns .= "{$name} = :{$name}";
        if ($i < count($fields)) {
          $columns .= ', ';
        }
        $i++;
      }

      $sql = "UPDATE {$table} SET {$columns} ";
      $stmt = $this->pdo->prepare($sql);
      if ($stmt) {
        foreach ($fields as $key => $value) {
          $stmt->bindValue(":".$key, $value);
        }

        if ($stmt->execute()) {
          return true;
        }else{
          return false;
        }

      }
    }


    public function delete_from_cart_by_id($product_id)
    {
      $sql =  "DELETE FROM cart WHERE p_id = :product_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":product_id", $product_id);
      return $stmt->execute();
    }

    public function delete_product($product_id)
    {
      $sql = "DELETE FROM products WHERE product_id = :product_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":product_id", $product_id);
      return $stmt->execute();
    }



    public function delete_cart($ip_add)
    {
    	$sql = 	"DELETE FROM cart WHERE ip_add = :ip_add";
    	$stmt = $this->pdo->prepare($sql);
    	$stmt->bindParam(":ip_add", $ip_add);
    	return $stmt->execute();
    }

    public function delete_customer($customer_email)
    {
      $sql =  "DELETE FROM customers WHERE customer_email = :customer_email";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":customer_email", $customer_email);

      if ($stmt->execute()) {
        return true;
      }else {
        return false;
      }
    }



    public function countPages($table_name, $per_page)
    {
    	$sql = "SELECT * FROM $table_name";
    	$stmt = $this->pdo->prepare($sql);
    	$stmt->execute();

    	$total_records = $stmt->rowCount();
    	$total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countPagesBy_P_Cat($table_name, $per_page, $p_cat_id)
    {
      $sql = "SELECT * FROM $table_name WHERE p_cat_id = :p_cat_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":p_cat_id", $p_cat_id);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function countPagesByCat($table_name, $per_page, $cat_id)
    {
      $sql = "SELECT * FROM $table_name WHERE cat_id = :cat_id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(":cat_id", $cat_id);
      $stmt->execute();

      $total_records = $stmt->rowCount();
      $total_pages = ceil($total_records / $per_page);
      return $total_pages;
    }

    public function getAllByID($table_name, $id)
    {
        $sql = "SELECT * FROM $table_name WHERE p_cat_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllByCatID($table_name, $id)
    {
        $sql = "SELECT * FROM $table_name WHERE cat_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }



}
?>