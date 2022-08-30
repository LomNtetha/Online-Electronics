<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">View Terms</h1>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Terms</li>
  </ol>
</nav>

<?php if (isset($_SESSION['insert_term_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['insert_term_msg']; unset($_SESSION['insert_term_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if (isset($_SESSION['terms_update_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['terms_update_msg']; unset($_SESSION['terms_update_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>


<?php if (isset($_SESSION['delete_terms_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['delete_terms_msg']; unset($_SESSION['delete_terms_msg']); ?>
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
            <div class="ibox-title"><i class="fas fa-list-ul"></i> Terms List</div>
        </div>
        <div class="ibox-body">
            <div class="card-deck">

                <?php
                    $view_terms = $getFromU->viewAllFromTable('terms');
                    foreach ($view_terms as $view_term) {
                        $term_title = $view_term->term_title;
                        $term_link = $view_term->term_link;
                        $term_desc = $view_term->term_desc;
                        $term_id = $view_term->term_id;

                ?>

                <div class="card text-justify">
                    <div class="card-header bg-light font-weight-bold text-center"><?php echo $term_title; ?></div>
                    <div class="card-body">
                      <p class="card-text text-justify"><?php echo $term_desc; ?></p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <a class="text-danger" onclick="DeleteTerms('<?php echo $term_id; ?>')"><i class="fas fa-trash-alt"></i> Delete</a>
                            </div>
                            <div class="col-6">
                                <a class="text-info float-right" href="index.php?edit_terms=<?php echo $term_id; ?>"><i class="fas fa-edit"></i> Edit</a>
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
