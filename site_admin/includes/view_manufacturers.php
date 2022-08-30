<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">View Manufacturers</h1>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Manufacturers</li>
  </ol>
</nav>

<?php if (isset($_SESSION['insert_manufacturer_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['insert_manufacturer_msg']; unset($_SESSION['insert_manufacturer_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if (isset($_SESSION['update_manufacturer_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['update_manufacturer_msg']; unset($_SESSION['update_manufacturer_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>


<?php if (isset($_SESSION['delete_manufacturer_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['delete_manufacturer_msg']; unset($_SESSION['delete_manufacturer_msg']); ?>
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
            <div class="ibox-title"><i class="fas fa-list-ul"></i> Manufacturers List</div>
        </div>
        <div class="ibox-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="example-table2" cellspacing="0" width="100%">
                <thead class="bg-light">
                    <tr>
                        <th>Manufacturer ID</th>
                        <th>Manufacturer Title</th>
                        <th>Manufacturer Image</th>
                        <th>Manufacturer Top</th>
                        <th>Total Products</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot><tr></tr></tfoot>
                <tbody>
                    <?php

                        $view_manufacturers = $getFromU->viewAllFromTable('manufacturers');
                        $i = 0;
                        foreach ($view_manufacturers as $view_manufacturer) {
                            $manufacturer_id = $view_manufacturer->manufacturer_id;
                            $manufacturer_title = $view_manufacturer->manufacturer_title;
                            $manufacturer_image = $view_manufacturer->manufacturer_image;
                            $manufacturer_top = $view_manufacturer->manufacturer_top;
                            $i++;
                            $total_products = $getFromU->countFromTableByManufacturerID("products", $manufacturer_id);
                    ?>

                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $manufacturer_title; ?></td>
                        <td><img src="other_images/<?php echo $manufacturer_image; ?>" width="30" height="30"></td>
                        <td><?php echo $manufacturer_top; ?></td>
                        <td><?php echo $total_products; ?></td>
                        <td>
                            <a class="text-info" href="index.php?edit_manufacturer=<?php echo $manufacturer_id; ?>"><i class="fas fa-edit"></i> Edit</a>
                        </td>
                        <td>
                            <a class="text-danger" onclick="DeleteManufacturer('<?php echo $manufacturer_id; ?>')"><i class="fas fa-trash-alt"></i> Delete</a>
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
