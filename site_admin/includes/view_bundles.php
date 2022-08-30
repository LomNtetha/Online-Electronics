<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">View Bundles</h1>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Bundles</li>
  </ol>
</nav>

<?php if (isset($_SESSION['product_update_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['product_update_msg']; unset($_SESSION['product_update_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if (isset($_SESSION['delete_product_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['delete_product_msg']; unset($_SESSION['delete_product_msg']); ?>
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
            <div class="ibox-title"><i class="fas fa-list-ul"></i> Bundles List</div>
        </div>
        <div class="ibox-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="example-table" cellspacing="0" width="100%">
                <thead class="bg-light">
                    <tr>
                        <th>ID</th>
                        <th>Bundle Title</th>
                        <th class="text-center">Bundle Image</th>
                        <th>Label</th>
                        <th>Price</th>
                        <th>Sale Price</th>
                        <th>Sold</th>
                        <th>Keywords</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot><tr></tr></tfoot>
                <tbody>
                    <?php
                        $view_products = $getFromU->view_bundle_products('bundle');
                        $i = 0;
                        foreach ($view_products as $view_product) {
                            $product_id = $view_product->product_id;
                            $product_title = $view_product->product_title;
                            $product_img1 = $view_product->product_img1;
                            $product_price = $view_product->product_price;
                            $product_psp_price = $view_product->product_psp_price;
                            $product_keywords = $view_product->product_keywords;
                            $status = $view_product->status;
                            $product_label = $view_product->product_label;
                            $add_date = $view_product->add_date;
                            $i++;
                            $product_sold = $getFromU->countFromTableByProductID('pending_orders', $product_id);
                    ?>

                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $product_title; ?></td>
                        <td class="text-center"><img src="product_images/<?php echo $product_img1; ?>" height="40px" width="60px"></td>
                        <td><?php echo $product_label; ?></td>
                        <td class="text-right">$ <?php echo number_format($product_price, 2); ?></td>
                        <td class="text-right">$ <?php echo number_format($product_psp_price, 2); ?></td>
                        <td><?php echo $product_sold; ?></td>
                        <td><?php echo $product_keywords; ?></td>
                        <td><?php echo ucwords($status); ?></td>
                        <td><?php echo $add_date; ?></td>
                        <td>
                            <a class="text-info" href="index.php?edit_bundle=<?php echo $product_id; ?>"><i class="fas fa-edit"></i> Edit</a>
                        </td>
                        <td>
                            <a class="text-danger" onclick="DeleteProduct('<?php echo $product_id; ?>')"><i class="fas fa-trash-alt"></i> Delete</a>
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
        $('#example-table').DataTable({
            pageLength: 10,
        });
    });


</script>
