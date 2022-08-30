<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">View Coupons</h1>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Coupons</li>
  </ol>
</nav>

<?php if (isset($_SESSION['insert_coupon_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['insert_coupon_msg']; unset($_SESSION['insert_coupon_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if (isset($_SESSION['update_coupon_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['update_coupon_msg']; unset($_SESSION['update_coupon_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>


<?php if (isset($_SESSION['delete_coupon_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['delete_coupon_msg']; unset($_SESSION['delete_coupon_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>


<div class="page-content fade-in-up">
    <div class="ibox rounded">
        <div class="ibox-head bg-light">
            <div class="ibox-title"><i class="fas fa-list-ul"></i> Coupons List</div>
        </div>
        <div class="ibox-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="example-table2" cellspacing="0" width="100%">
                <thead class="bg-light">
                    <tr>
                        <th>Coupon ID</th>
                        <th>Coupon Title</th>
                        <th>Product Title</th>
                        <th>Coupon Price</th>
                        <th>Coupon Code</th>
                        <th>Coupon Limit</th>
                        <th>Coupon Used</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot><tr></tr></tfoot>
                <tbody>
                    <?php
                        $view_coupons = $getFromU->viewAllFromTable('coupons');
                        foreach ($view_coupons as $view_coupon) {
                            $coupon_id = $view_coupon->coupon_id;
                            $coupon_title = $view_coupon->coupon_title;
                            $coupon_price = $view_coupon->coupon_price;
                            $coupon_code = $view_coupon->coupon_code;
                            $coupon_limit = $view_coupon->coupon_limit;
                            $coupon_used = $view_coupon->coupon_used;
                            $product_id = $view_coupon->product_id;

                            $view_product = $getFromU->view_Product_By_Product_ID($product_id);
                            $product_title = $view_product->product_title;
                    ?>

                    <tr>
                        <td><?php echo $coupon_id; ?></td>
                        <td><?php echo $coupon_title; ?></td>
                        <td><?php echo $product_title; ?></td>
                        <td><?php echo $coupon_price; ?></td>
                        <td><?php echo $coupon_code; ?></td>
                        <td><?php echo $coupon_limit; ?></td>
                        <td><?php echo $coupon_used; ?></td>
                        <td>
                            <a class="text-info" href="index.php?edit_coupon=<?php echo $coupon_id; ?>"><i class="fas fa-edit"></i> Edit</a>
                        </td>
                        <td>
                            <a class="text-danger" onclick="DeleteCoupon('<?php echo $coupon_id; ?>')"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>

                    </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- CORE PLUGINS, Must Need-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- PAGE LEVEL SCRIPTS-->
<script>
    $(function() {
        $('#example-table2').DataTable({
            pageLength: 10,
        });
    });


</script>
