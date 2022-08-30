<?php
$aMan = array();
$aPCat = array();
$aCat = array();

// / Manufacturers Code Starts ///

if (isset($_REQUEST['man']) && is_array($_REQUEST['man'])){
  foreach($_REQUEST['man'] as $sKey => $sVal){
    if ((int)$sVal != 0){
      $aMan[(int)$sVal] = (int)$sVal;
    }
  }
}

// / Manufacturers Code Ends ///
// / Products Categories Code Starts ///

if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])){
  foreach($_REQUEST['p_cat'] as $sKey => $sVal){
    if ((int)$sVal != 0){
      $aPCat[(int)$sVal] = (int)$sVal;
    }
  }
}

// / Products Categories Code Ends ///
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




<div class="card sidebar-menu">
  <div class="card-header">
   
     <h3 class="aside-title"> Manufacturers</h3>
    <div class="float-right">
      <a href="#" class="text-dark"><span class="nav-toggle1 hide-show1" style="font-size: 10px"><i class="fas fa-minus"></i></span></a>
    </div>
  </div>
  <div class="panel-collapse1 collapse-data1">
    <div class="card-body">
      <div class="input-group">
        <input type="text" class="form-control" name="" id="dev-table-filter" data-action="filter" data-filter="#dev-manufacturer" placeholder="Filter Manufacturer" aria-describedby="basic-addon1">
        <div class="input-group-prepend">
          <a href="#" class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></a href="#">
        </div>
      </div>
    </div>
    <div class="card-body scroll-menu">
      <ul class="nav nav-pills nav-stacked category-menu" id="dev-manufacturer">
        <?php
          $get_manufacturers = $getFromU->selectTopManufacturer();
          foreach ($get_manufacturers as $get_manufacturer) {
            $manufacturer_id = $get_manufacturer->manufacturer_id;
            $manufacturer_title = $get_manufacturer->manufacturer_title;
            $manufacturer_image = $get_manufacturer->manufacturer_image;
/*
            if ($manufacturer_image == "") {

            }else{
              $manufacturer_image = " <img src='site_admin/other_images/$manufacturer_image' width='20px' height='20px'> &nbsp;";
            }*/
        ?>

        <li class="checkbox checkbox-primary form-control mb-2 bg-light">
          <a>
            <div class="custom-control custom-checkbox mr-sm-2" style="top: 15px">
              <input type="checkbox" <?php (isset($aMan[$manufacturer_id])) ? print "checked='checked' " : ""; ?> name="manufacturer" value="<?php echo $manufacturer_id; ?>" class="custom-control-input get_manufacturer" id="manufac[<?php echo $manufacturer_id; ?>]">
              <label class="custom-control-label" for="manufac[<?php echo $manufacturer_id; ?>]"><span><?php //echo $manufacturer_image; ?></span> <span><?php echo $manufacturer_title; ?></span><br></label>
<small></small>
            </div>
          </a>
        </li>

        <?php   } ?>

        <?php
          $get_manufacturers = $getFromU->selectNonTopManufacturer();
          foreach ($get_manufacturers as $get_manufacturer) {
            $manufacturer_id = $get_manufacturer->manufacturer_id;
            $manufacturer_title = $get_manufacturer->manufacturer_title;
           
            $manufacturer_image = $get_manufacturer->manufacturer_image;
 /*
            if ($manufacturer_image == "") {

            }else{
              $manufacturer_image = " <img src='site_admin/other_images/$manufacturer_image' width='20px'height='5px' > &nbsp;";
            }*/
        ?>

        <li class="checkbox checkbox-primary form-control mb-2 bg-light">
          <a>
            <div class="custom-control custom-checkbox mr-sm-2" style="top: 15px">
              <input type="checkbox" <?php (isset($aMan[$manufacturer_id])) ? print "checked='checked' " : ""; ?> name="manufacturer" value="<?php echo $manufacturer_id; ?>" class="custom-control-input get_manufacturer" id="manufac[<?php echo $manufacturer_id; ?>]">
              <label class="custom-control-label" for="manufac[<?php echo $manufacturer_id; ?>]"><span><?php //echo $manufacturer_image; ?></span> <span><?php echo $manufacturer_title; ?></span><br></label>
            </div>
          </a>
        </li>

        <?php   } ?>



      </ul>
    </div>
  </div>

</div>

  <!-- aside Widget -->
            <div class="aside">
              <h3 class="aside-title">Price</h3>
              <div class="price-filter">
                <div id="price-slider"></div>
                <div class="input-number price-min">
                  <input id="price-min" type="number">
                  <span class="qty-up">+</span>
                  <span class="qty-down">-</span>
                </div>
                <span>-</span>
                <div class="input-number price-max">
                  <input id="price-max" type="number">
                  <span class="qty-up">+</span>
                  <span class="qty-down">-</span>
                </div>
              </div>
            </div>
            <!-- /aside Widget -->
<div class="card sidebar-menu">
  <div class="card-header">
   
      <h3 class="aside-title"> Product Categories</h3>
    <div class="float-right">
      <a href="#" class="text-dark"><span class="nav-toggle2 hide-show2" style="font-size: 10px"><i class="fas fa-minus"></i></span></a>
    </div>
  </div>
  <div class="panel-collapse2 collapse-data2">
    <div class="card-body">
      <div class="input-group">
        <input type="text" class="form-control" name="" id="dev-table-filter" data-action="filter" data-filter="#dev-p-cats" placeholder="Filter Product Categories" aria-describedby="basic-addon2">
        <div class="input-group-prepend">
          <a href="#" class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></a href="#">
        </div>
      </div>
    </div>
    <div class="card-body scroll-menu">
      <ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cats">
        <?php
          $get_product_catagories = $getFromU->selectTopProductCatagories();
          foreach ($get_product_catagories as $get_product_catagory) {
            $p_cat_id = $get_product_catagory->p_cat_id;
            $p_cat_title = $get_product_catagory->p_cat_title;
            $p_cat_image = $get_product_catagory->p_cat_image;
/*
            if ($p_cat_image == "") {

            }else{
              $p_cat_image = " <img src='site_admin/other_images/$p_cat_image' width='20px' height='5px'> &nbsp;";
            }*/
        ?>

        <li class="checkbox checkbox-primary form-control mb-2 bg-light">
          <a>
            <div class="custom-control custom-checkbox mr-sm-2" style="top: 15px">
              <input type="checkbox" <?php (isset($aPCat[$p_cat_id])) ? print "checked='checked' " : ""; ?> name="p_cat" value="<?php echo $p_cat_id; ?>" class="custom-control-input get_p_cat" id="p_cat[<?php echo $p_cat_id; ?>]">
              <label class="custom-control-label" for="p_cat[<?php echo $p_cat_id; ?>]"><span><?php// echo $p_cat_image; ?></span> <span><?php echo $p_cat_title; ?></span><br></label>
              <small></small>
            </div>
          </a>
        </li>

        <?php   } ?>

        <?php
          $get_product_catagories = $getFromU->selectNonTopProductCatagories();
          foreach ($get_product_catagories as $get_product_catagory) {
            $p_cat_id = $get_product_catagory->p_cat_id;
            $p_cat_title = $get_product_catagory->p_cat_title;
            $p_cat_image = $get_product_catagory->p_cat_image;
/*
            if ($p_cat_image == "") {

            }else{
              $p_cat_image = " <img src='site_admin/other_images/$p_cat_image' width='20px' height='20px'> &nbsp;";
            }*/
        ?>

        <li class="checkbox checkbox-primary form-control mb-2 bg-light">
          <a>
            <div class="custom-control custom-checkbox mr-sm-2" style="top: 15px">
              <input type="checkbox" <?php (isset($aPCat[$p_cat_id])) ? print "checked='checked' " : ""; ?> name="p_cat" value="<?php echo $p_cat_id; ?>" class="custom-control-input get_p_cat" id="p_cat[<?php echo $p_cat_id; ?>]">
              <label class="custom-control-label" for="p_cat[<?php echo $p_cat_id; ?>]"><span><?php //echo $p_cat_image; ?></span> <span><?php echo $p_cat_title; ?></span><br></label>
              <small></small>
            </div>
          </a>
        </li>

        <?php   } ?>

      </ul>
    </div>
  </div>

</div>



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

</div>

