<?php include('header_top.php');?>
<!-- ============================================== HEADER : END ============================================== -->


<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
      <li><a href="<?=base_url();?>">Home</a></li>
        <li class='active'><?php 
        if(isset($tag_name))
          echo $tag_name;
        else
          echo $category_name;
          ?></li>
      </ul>
    </div>
    <!-- /.breadcrumb-inner --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      
      <div class='col-md-3 sidebar amazon_banner_category'> 
        <!-- ================================== TOP NAVIGATION ================================== -->
        <?php 
      $sidebartop=(!isset($sidebartop))?'sidebartop.php':$sidebartop;
      include($sidebartop); 
      ?>
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== -->
        <div class="sidebar-module-container">
          <div class="sidebar-filter"> 
           
            <?php //include('sidebarcategory.php');?>
            <?php //include('priceslider.php');?>
             <!-- ============================================== COLOR============================================== -->
            
            <!-- /.sidebar-widget --> 
            <!-- ============================================== COLOR: END ============================================== --> 
            <!-- ============================================== COMPARE============================================== -->
           
            <!-- /.sidebar-widget --> 
            <!-- ============================================== COMPARE: END ============================================== --> 
            <!-- ============================================== PRODUCT TAGS ============================================== -->
            <?php //include('productTag.php');?>
            <?php include('advertizement.php');?>
            <?php /*<div class="home-banner"> <img src="<?=base_url('assets/frontend/images/banners/LHS-banner.jpg');?>" alt="Image"> </div>*/?>
          </div>
          <!-- /.sidebar-filter --> 
        </div>
        <!-- /.sidebar-module-container --> 
      </div>
    