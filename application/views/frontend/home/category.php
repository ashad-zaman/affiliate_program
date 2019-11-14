<div class='col-md-9'> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        <?php 
       
        if(!isset($tag_name))
        {
          /*
        ?>
        <div id="category" class="category-carousel hidden-xs">
          <div class="item">
            <div class="image"> <img src="<?=base_url('assets/frontend/images/banners/'.$cat_slug.'.jpg');?>" alt="" style="width:100%" class="img-responsive"> </div>
            <div class="container-fluid">
              <div class="caption vertical-top text-left">
               <?php /*?>
              <div class="big-text"> Big Sale </div>
                <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
               <?php ?>
              </div>
              <!-- /.caption --> 
            </div>
            <!-- /.container-fluid --> 
          </div>
        </div>
        <?php */ } ?>
        
     
        <div class="clearfix filters-container">
          <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12 col-xs-offset-0 text-center mt3 xsmt3">
            <div class="col-md-3 col-sm-3 col-xs-0 hidden-xs nopadding">
              <div class="headline"></div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 mt0 xsmt2 text-center nopadding">
              <h3 style="margin-top: 9px;padding-top: 0px;" class="new-product-title text-center">
              <?php if(isset($tag_name))
                      echo 'Tag: '.$tag_name;
                      else
                          echo 'Products of '.$category_name;?>
            </h3>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-0 hidden-xs nopadding">
                <div class="headline"></div>
            </div>
          </div> 
          
          <?php /*?> <div class="col col-sm-6 col-md-2">
             
             <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                </ul>
              </div>
             
              <!-- /.filter-tabs --> 
            </div><?php */?>
            <!-- /.col -->
            
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">



                <div class="row">

                  <?php include('cat_product_list.php');?>
                        


                      
                </div>
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
            </div>
            <!-- /.tab-pane -->
          
            <!-- /.tab-pane #list-container --> 
          </div>
          <!-- /.tab-content -->
          <div class="data-table-toolbar pagination-top text-center">
                    <ul class="pagination">
                        <?php
                        foreach ( $links as $key=>$link ):
                            echo "<li>". $link."</li>";
                        endforeach;
                        ?>
                    </ul>
                </div>
          <?php /* <div class="clearfix filters-container">
            <div class="text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                  <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
                <!-- /.list-inline --> 
              </div>
              <!-- /.pagination-container --> </div>
            <!-- /.text-right --> 
            
          </div>*/?>
          <!-- /.filters-container --> 
          
        </div>
        <!-- /.search-result-container --> 

        <?php
        if($get_box_banners)
        {
          $boxbanner1="";
          $boxbanner2="";
          $boxbanner3="";
          foreach($get_box_banners as $key=>$box_banner)
          {
             
                if($key==3)
                  break;     

                if($boxbanner1=='')
                $boxbanner1=$box_banner->banner_description;
                else if($boxbanner2=='')
                $boxbanner2=$box_banner->banner_description;
                else
                $boxbanner3=$box_banner->banner_description;
                
           
            
          }
          
        }
        
        ?>
        <div class="box-wide-banners wide-banners wow fadeInUp outer-bottom-xs">
                <div class="row">
                  <div class="col-md-4 col-sm-4 amazon_banner_category">
                  <?=$boxbanner1;?>
                    <!-- /.wide-banner --> 
                  </div>
                  <div class="col-md-4 col-sm-4 amazon_banner_category">
                  <?=$boxbanner2;?>
                    <!-- /.wide-banner --> 
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4 col-sm-46 amazon_banner_category">
                  <?=$boxbanner3;?>
                    <!-- /.wide-banner --> 
                  </div>
                  <!-- /.col --> 
                </div>
                <!-- /.row --> 
        </div>
      <div id="amzn-assoc-ad-121eccbf-bd47-43aa-849b-24b7c6e82edc"></div><script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=121eccbf-bd47-43aa-849b-24b7c6e82edc"></script>

      </div>
      <!-- /.col --> 
     
      
      


    </div>
    <!-- /.row --> 

    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 


</div>
