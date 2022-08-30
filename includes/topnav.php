<?php
$aCat = array();
// / Categories Code Starts ///

if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])){
  foreach($_REQUEST['cat'] as $sKey => $sVal){
    if ((int)$sVal != 0){
      $aCat[(int)$sVal] = (int)$sVal;
    }
  }
}
// / Categories Code Ends ///
?>
<!--
<div class="card sidebar-menu">
  <div class="card-header">
    
    <h3 class="aside-title">Categories</h3>
    <div class="float-right">
      <a href="#" class="text-dark"><span class="nav-toggle3 hide-show3" style="font-size: 10px"><i class="fa fa-minus"></i></span></a>
    </div>
  </div>
  <div class="panel-collapse3 collapse-data3">
    <div class="card-body">
      <div class="input-group">
        <input type="text" class="form-control" name="" id="dev-table-filter" data-action="filter" data-filter="#dev-cats" placeholder="Filter Categories" aria-describedby="basic-addon2">
        <div class="input-group-prepend">
          <a href="#" class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></a href="#">
        </div>
      </div>
    </div>
    <div class="card-body scroll-menu">
      <ul class="nav nav-pills nav-stacked category-menu" id="dev-cats">
        <?php
          $get_catagories = $getFromU->selectTopCatagories();
          foreach ($get_catagories as $get_catagory) {
            $cat_id = $get_catagory->cat_id;
            $cat_title = $get_catagory->cat_title;
            $cat_image = $get_catagory->cat_image;
/*
            if ($cat_image == "") {

            }else{
              $cat_image = " <img src='site_admin/other_images/$cat_image' width='20px' height='20px'> &nbsp;";
            }*/
        ?>

        <li class="checkbox checkbox-primary form-control mb-2 bg-light">
          <a>
            <div class="custom-control custom-checkbox mr-sm-2" style="top: 15px">
              <input type="checkbox" <?php (isset($aCat[$cat_id])) ? print "checked='checked' " : ""; ?> name="cat" value="<?php echo $cat_id; ?>" class="custom-control-input get_cat" id="cat[<?php echo $cat_id; ?>]">
              <label class="custom-control-label" for="cat[<?php echo $cat_id; ?>]"><span><?php //echo $cat_image; ?></span> <span><?php echo $cat_title; ?></span><br></label>
              <small></small>
            </div>
          </a>

        </li>

        <?php   } ?>

        <?php
          $get_catagories = $getFromU->selectNonTopCatagories();
          foreach ($get_catagories as $get_catagory) {
            $cat_id = $get_catagory->cat_id;
            $cat_title = $get_catagory->cat_title;
            $cat_image = $get_catagory->cat_image;
/*
            if ($cat_image == "") {

            }else{
              $cat_image = " <img src='site_admin/other_images/$cat_image' width='20px' height='20px'> &nbsp;";
            }*/
        ?>

        <li class="form-control mb-2 bg-light">
          <a>
            <div class="custom-control custom-checkbox mr-sm-2" style="top: 15px">
              <input type="checkbox" <?php (isset($aCat[$cat_id])) ? print "checked='checked' " : ""; ?> name="cat" value="<?php echo $cat_id; ?>" class="custom-control-input get_cat" id="cat[<?php echo $cat_id; ?>]">
              <label class="custom-control-label" for="cat[<?php echo $cat_id; ?>]"><span><?php// echo $cat_image; ?></span> <span><?php echo $cat_title; ?></span><br></label>
              <small></small>
            </div>
          </a>
        </li>

        <?php   } ?>



      </ul>
    </div>
  </div>

</div>-->




<!-- NAVIGATION -->
    <nav id="navigation">
      <!-- container -->
      <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
        <!-- NAV -->
          <ul class="main-nav nav navbar-nav">

            <li class="active" ><a href="index.php?vhid=">Home</a></li>
            <li ><a href="shop.php?vhid=">Categories</a></li>
              <?php
          $get_catagories = $getFromU->selectTopCatagories();
          foreach ($get_catagories as $get_catagory) {
            $cat_id = $get_catagory->cat_id;
            $cat_title = $get_catagory->cat_title;
            $cat_image = $get_catagory->cat_image;
        ?>
            <li><a href="#"> <input type="checkbox" visibility="hidden"<?php (isset($aCat[$cat_id])) ? print "checked='checked' " : ""; ?> name="cat" value="<?php echo $cat_id; ?>" class="custom-control-input get_cat" id="cat[<?php echo $cat_id; ?>]">
              <label class="custom-control-label" for="cat[<?php echo $cat_id; ?>]"><span><?php //echo $cat_image; ?></span> <span><?php echo $cat_title; ?></span><br></label>
              <small></small></a></li>


        <?php   } ?>
          </ul>
          <!-- /NAV -->

        </div>
        <!-- /responsive-nav -->
      </div>
      <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->