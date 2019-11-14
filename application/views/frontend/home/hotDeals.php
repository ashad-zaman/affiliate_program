  
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-12 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        



        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        
        <!-- ============================================== INFO BOXES ============================================== -->

        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 
        <!-- ============================================== SCROLL TABS ============================================== -->

        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
          <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0 text-center mt3 xsmt3">
            <div class="col-md-3 col-sm-3 col-xs-0 hidden-xs">
              <div class="headline"></div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 mt0 xsmt2"><h3 class="new-product-title text-center"><?=$page_heading;?></h3></div>
            <div class="col-md-3 col-sm-3 col-xs-0 hidden-xs">
                <div class="headline"></div>
            </div>
          </div>
            <!-- /.nav-tabs --> 
          </div>
            <div class="tab-content outer-top-xs">
                <div class="tab-pane in active" id="all">
                  <div class="product-slider">

                 <?php
                 $countProduct=0;
                 $startBanner=0;
                            if( !empty($get_product_lists) ):
                                foreach($get_product_lists as $get_product_list):

                                  // foreach($get_categorys as $get_category){

                                  //     if($get_category->id==$get_product_list->parent_cat_id)
                                  // }


                                  $product_details_url=base_url().'product/'.$get_product_list->slug;

                                  $image_url = "";
                                  if( $get_product_list->image_url !="" ):
                                      $image_url = '<img src="'.$get_product_list->image_url.'" alt="image for '.$get_product_list->title.'"  />';
                                  endif;

                                  $product_url = '';
                                  if( $get_product_list->product_url !="" ):
                                    $product_url=$get_product_list->product_url;
                                      ///$product_url = '<a href="'.$get_product_list->product_url.'" target="_blank">link</a>';
                                  endif;

                                  $discount_price = '';
                                  if( isset($get_product_list->discount_price)&&$get_product_list->discount_price !=""&&$get_product_list->discount_price>0):
                                    $discount_price='<span class="price-before-discount">'.$get_product_list->discount_price.'</span> <br/>';
                                      ///$product_url = '<a href="'.$get_product_list->product_url.'" target="_blank">link</a>';
                                  endif;


                                  $store_image = '';
                                  if( $get_product_list->is_store == 1 ):
                                      $store_image = '<img class="m-t-5" src="'.base_url('assets/frontend/images/amazon_small_logo.png').'">';
                                  elseif( $get_product_list->is_store == 2 ):
                                    $store_image = '<img src="'.base_url('assets/frontend/images/ebay.jpg').'">';
                                  elseif( $get_product_list->is_store == 3 ):
                                    $store_image = '<img src="'.base_url('assets/frontend/images/alibaba.png').'">';
                                  elseif( $get_product_list->is_store == 4 ):
                                    $store_image = '<img src="'.base_url('assets/frontend/images/aliexpress.png').'">';
                                  endif;

                  ?>
                      <div class="col-md-3">
                            <div class="products">
                              <div class="product">
                                <div class="hot-product-image">
                                  <div class="image"> <a href="<?=$product_url;?>" target="_blank"><?=$image_url;?></a> </div>
                                  <!-- /.image -->
                                </div>
                                <!-- /.product-image -->
                                
                                <div class="product-info text-center">
                                  <h3 class="name"><a href="<?=$product_details_url;?>"><?=$this->Common_model->shorter($get_product_list->title,25);?></a></h3>
                                  
                                  <div class="description"></div>
                                  <div class="product-price"> 

                                   <div class=" mdem11 smem10 xsem10 text-center price">Price: $ <?=$get_product_list->price;?></div>
                                   <?=$discount_price;?>
                                    <a rel=”nofollow” href="<?=$product_url;?>" target="_blank" class="price product-btn-style"> Buy Now &nbsp;<?=$store_image;?></a> 
                                   
                                  </div>
                                  <!-- /.product-price --> 
                                  
                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                  <div class="action">
                                    <ul class="list-unstyled">
                                      <li class="add-cart-button btn-group">
                                        <a href="<?=$product_details_url;?>"class="btn btn-primary icon"> View Details </a>
                                      </li>
                                    </ul>
                                  </div>
                                  <!-- /.action --> 
                                </div>
                                <!-- /.cart --> 
                              </div>
                              <!-- /.product --> 
                              
                            </div>
                        </div>
                        <?php
                                  $countProduct++;

                                if($countProduct%12==0)
                                {
                                  
                               $banner1="";
                               $banner2="";
                               $countbanner=1;
                                      if($get_vertical_long_banner)
                                      {
                                        //print_r($get_vertical_long_banner);
                                        $i=0;
                                        foreach($get_vertical_long_banner as $vertical_banner)
                                        {
                                          $i++;
                                          if($i<$startBanner)
                                          {
                                              continue;
                                          }
                                          else if($i>=$startBanner&&$countbanner<=2)
                                            {
                                              
                                              $countbanner++;
                                              if($banner1=='')
                                              $banner1=$vertical_banner->banner_description;
                                              else
                                              $banner2=$vertical_banner->banner_description;
                                            }
                                          else
                                             break;    

                                          
                                        }
                                        $startBanner+=2;
                                      }
                                      ?>
                                        <div class="col-md-12">
                                          <div class="wide-banners wow fadeInUp outer-bottom-xs">
                                            <div class="row">
                                              <div class="col-md-6 col-sm-6">
                                                  <?=$banner1;?>
                                                <!-- /.wide-banner --> 
                                              </div>
                                              <div class="col-md-6 col-sm-6">
                                                  <?=$banner2;?>
                                                <!-- /.wide-banner --> 
                                              </div>
                                            </div>
                                            <!-- /.row --> 
                                          </div>
                                        </div>
                                      <?php
                                      
                                  
                                      
                                }  ?>
                                
                                <?php



                                endforeach;
                            endif;
                        ?>
                             
                      
                    <!-- /.home-owl-carousel --> 
                  </div>
                  <!-- /.product-slider --> 
                </div>
            </div>
            <div class="data-table-toolbar pagination-top text-center">
                    <ul class="pagination">
                        <?php
                        foreach ( $links as $key=>$link ):
                            echo "<li>". $link."</li>";
                        endforeach;
                        ?>
                    </ul>
                </div>
        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
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
                  <div class="col-md-4 col-sm-4">
                  <?=$boxbanner1;?>
                    <!-- /.wide-banner --> 
                  </div>
                  <div class="col-md-4 col-sm-4">
                  <?=$boxbanner2;?>
                    <!-- /.wide-banner --> 
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4 col-sm-46">
                  <?=$boxbanner3;?>
                    <!-- /.wide-banner --> 
                  </div>
                  <!-- /.col --> 
                </div>
                <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        <!-- /.wide-banners --> 

      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
