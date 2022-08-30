<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">View Services</h1>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Services</li>
  </ol>
</nav>

<?php if (isset($_SESSION['insert_service_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['insert_service_msg']; unset($_SESSION['insert_service_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if (isset($_SESSION['update_service_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['update_service_msg']; unset($_SESSION['update_service_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>


<?php if (isset($_SESSION['delete_service_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['delete_service_msg']; unset($_SESSION['delete_service_msg']); ?>
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
            <div class="ibox-title"><i class="fas fa-list-ul"></i> Services List</div>
        </div>
        <div class="ibox-body">
            <div class="card-deck">

                <?php
                    $view_services = $getFromU->viewAllFromTable('services');
                    foreach ($view_services as $view_service) {
                        $service_id = $view_service->service_id;
                        $service_title = $view_service->service_title;
                        $service_image = $view_service->service_image;
                        $service_desc = $view_service->service_desc;
                        $service_button = $view_service->service_button;
                        $service_url = $view_service->service_url;
                ?>

                <div class="card text-justify">
                    <img class="card-img-top" height="250px" src="services_images/<?php echo $service_image; ?>" alt="<?php echo $service_title; ?>">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $service_title; ?></h4>
                        <p class="card-text text-justify"><?php echo $service_desc; ?></p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <a class="text-danger" onclick="DeleteService('<?php echo $service_id; ?>')"><i class="fas fa-trash-alt"></i> Delete</a>
                            </div>
                            <div class="col-6">
                                <a class="text-info float-right" href="index.php?edit_service=<?php echo $service_id; ?>"><i class="fas fa-edit"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
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
