<?php require_once 'includes/header.php'; ?>

<?php
  if (!isset($_SESSION['admin_email'])) {
    header('Location: login.php');
  }
?>

<body class="fixed-navbar">
  <div class="page-wrapper">
    <!-- START HEADER-->
		<?php require_once 'includes/top_nav.php'; ?>
    <!-- END HEADER-->
    <!-- START SIDEBAR-->
		<?php require_once 'includes/sidebar.php'; ?>
    <!-- END SIDEBAR-->
    <div class="content-wrapper">
      <!-- START PAGE CONTENT-->


			<?php
				if (isset($_GET['dashboard'])) {
					require_once 'includes/dashboard.php';

				}elseif (isset($_GET['user_profile'])) {
          require_once 'includes/user_profile.php';

        }elseif (isset($_GET['add_product'])) {
          require_once 'includes/insert_products.php';

        }elseif (isset($_GET['view_products'])) {
          require_once 'includes/view_products.php';

        }elseif (isset($_GET['edit_product'])) {
          require_once 'includes/edit_product.php';

        }elseif (isset($_GET['add_p_cat'])) {
          require_once 'includes/insert_product_cat.php';

        }elseif (isset($_GET['view_p_cats'])) {
          require_once 'includes/view_p_cats.php';

        }elseif (isset($_GET['edit_p_cat'])) {
          require_once 'includes/edit_p_cat.php';

        }elseif (isset($_GET['add_cat'])) {
          require_once 'includes/add_cat.php';

        }elseif (isset($_GET['view_cats'])) {
          require_once 'includes/view_cats.php';

        }elseif (isset($_GET['edit_cat'])) {
          require_once 'includes/edit_cat.php';

        }elseif (isset($_GET['add_slide'])) {
          require_once 'includes/add_slide.php';

        }elseif (isset($_GET['view_slides'])) {
          require_once 'includes/view_slides.php';

        }elseif (isset($_GET['edit_slide'])) {
          require_once 'includes/edit_slide.php';

        }elseif (isset($_GET['view_customers'])) {
          require_once 'includes/view_customers.php';

        }elseif (isset($_GET['view_orders'])) {
          require_once 'includes/view_orders.php';

        }elseif (isset($_GET['view_payments'])) {
          require_once 'includes/view_payments.php';

        }elseif (isset($_GET['add_user'])) {
          require_once 'includes/add_user.php';

        }elseif (isset($_GET['view_users'])) {
          require_once 'includes/view_users.php';

        }elseif (isset($_GET['edit_user'])) {
          require_once 'includes/edit_user.php';

        }elseif (isset($_GET['add_box'])) {
          require_once 'includes/add_box.php';

        }elseif (isset($_GET['view_boxes'])) {
          require_once 'includes/view_boxes.php';

        }elseif (isset($_GET['edit_box'])) {
          require_once 'includes/edit_box.php';

        }elseif (isset($_GET['add_terms'])) {
          require_once 'includes/add_terms.php';

        }elseif (isset($_GET['view_terms'])) {
          require_once 'includes/view_terms.php';

        }elseif (isset($_GET['edit_terms'])) {
          require_once 'includes/edit_terms.php';

        }elseif (isset($_GET['edit_css'])) {
          require_once 'includes/edit_css.php';

        }elseif (isset($_GET['add_manufacturer'])) {
          require_once 'includes/add_manufacturer.php';

        }elseif (isset($_GET['view_manufacturers'])) {
          require_once 'includes/view_manufacturers.php';

        }elseif (isset($_GET['edit_manufacturer'])) {
          require_once 'includes/edit_manufacturer.php';

        }elseif (isset($_GET['add_coupon'])) {
          require_once 'includes/add_coupon.php';

        }elseif (isset($_GET['view_coupons'])) {
          require_once 'includes/view_coupons.php';

        }elseif (isset($_GET['edit_coupon'])) {
          require_once 'includes/edit_coupon.php';

        }elseif (isset($_GET['add_icon'])) {
          require_once 'includes/add_icon.php';

        }elseif (isset($_GET['view_icons'])) {
          require_once 'includes/view_icons.php';

        }elseif (isset($_GET['edit_icon'])) {
          require_once 'includes/edit_icon.php';

        }elseif (isset($_GET['add_bundle'])) {
          require_once 'includes/add_bundle.php';

        }elseif (isset($_GET['view_bundles'])) {
          require_once 'includes/view_bundles.php';

        }elseif (isset($_GET['edit_bundle'])) {
          require_once 'includes/edit_bundle.php';

        }elseif (isset($_GET['add_product_to_bundle'])) {
          require_once 'includes/add_product_to_bundle.php';

        }elseif (isset($_GET['view_product_to_bundles'])) {
          require_once 'includes/view_product_to_bundles.php';

        }elseif (isset($_GET['edit_product_to_bundle'])) {
          require_once 'includes/edit_product_to_bundle.php';

        }elseif (isset($_GET['edit_contact_us'])) {
          require_once 'includes/edit_contact_us.php';

        }elseif (isset($_GET['add_enquiry_type'])) {
          require_once 'includes/add_enquiry_type.php';

        }elseif (isset($_GET['view_enquiry_types'])) {
          require_once 'includes/view_enquiry_types.php';

        }elseif (isset($_GET['edit_enquiry_type'])) {
          require_once 'includes/edit_enquiry_type.php';

        }elseif (isset($_GET['edit_about_us'])) {
          require_once 'includes/edit_about_us.php';

        }elseif (isset($_GET['add_service'])) {
          require_once 'includes/add_service.php';

        }elseif (isset($_GET['view_services'])) {
          require_once 'includes/view_services.php';

        }elseif (isset($_GET['edit_service'])) {
          require_once 'includes/edit_service.php';

        }


			 ?>




			 <!-- END PAGE CONTENT-->

      <!-- COPYRIGHT START-->
			<?php require_once 'includes/copyright.php'; ?>
      <!-- COPYRIGHT END-->

    </div>
  </div>

<?php require_once 'includes/footer.php'; ?>
