<?php



                      $countProduct=0;

                      $startBanner=0;

                                  if( !empty($get_product_lists) ){

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

                                            $store_image = '<img  class="m-t-5" src="'.base_url('assets/frontend/images/amazon_small_logo.png').'">';

                                        elseif( $get_product_list->is_store == 2 ):

                                          $store_image = '<img src="'.base_url('assets/frontend/images/ebay.jpg').'">';

                                        elseif( $get_product_list->is_store == 3 ):

                                          $store_image = '<img src="'.base_url('assets/frontend/images/alibaba.png').'">';

                                        elseif( $get_product_list->is_store == 4 ):

                                          $store_image = '<img src="'.base_url('assets/frontend/images/aliexpress.png').'">';

                                        endif;



                        ?>

                      <div class="col-md-3 nopadding">

                            <div class="products">

                              <div class="product">

                                <div class="product-image">

                                  <div class="image"> <a href="<?=$product_url;?>" target="_blank"><?=$image_url;?></a> </div>

                                  <!-- /.image -->

                                </div>

                                <!-- /.product-image -->

                                

                                <div class="product-info text-center">

                                 <div class="product-name">

                                     <h3 class="name"><a href="<?=$product_details_url;?>"><?=$this->Common_model->shorter($get_product_list->title,45);?></a></h3>

                                  </div>


<!--
                                   <div class="a-icon-row">



                                      <?php if(isset($get_product_list->rating)&&$get_product_list->rating>0)

                                      {

                                        //echo str_replace(".","-",$get_product_list->rating);

                                        ?>

                                      <a rel=”nofollow” class="a-size-small " href="<?=$get_product_list->review_url;?>" target="_blank">

                                        <i class="a-icon a-icon-star a-star-<?=str_replace(".","-",$get_product_list->rating);?>"><span class="a-icon-alt"><?=$get_product_list->rating;?> out of 5 stars</span></i>

                                      </a>

                                      <?php } ?>



                                        <?php if(isset($get_product_list->review_url))

                                        { ?>

                                          <a rel=”nofollow” class="a-size-small " href="<?=$get_product_list->review_url;?>" target="_blank"><?=preg_replace("/[^0-9,.]/", "", $get_product_list->review_label);?></a>

                                        <?php } ?>

                                    </div>  -->





                                  <?php 

                                 

                                  $width='';

                                  if(isset($get_product_list->is_prime) && $get_product_list->is_prime==1)

                                    { 

                                      $width='width: 105px !important;float: left;text-align:right;';

                                    }
                                  
                                    if(isset($discount_price)&&$discount_price>0)
                                      {
                                        $width='width: 105px !important;float: left;text-align:right;';
                                      }

                                    $isfullwidth='width: 115px !important;';
                                      ?>





                                  <div class="description"></div>

                                  <div class="product-price"> 

                                  <div style="float: left;width: 100%;">

                                  <div class=" mdem11 smem10 xsem10 text-center price nopadding pb-10" style="<?=$width?>">$ <?=$get_product_list->price;?></div>
                                  
                                  <?php 
                                   if(isset($discount_price)&&$discount_price>0)
                                   {
                                    $isfullwidth='width: 100% !important;';
                                  ?>
                                  <div class=" mdem11 smem10 xsem10 text-center price nopadding pb-10" style="<?=$width?>"><?=$discount_price;?></div>
                                  <?php 
                                   }
                                  ?>
                                   

                                   <?php if(isset($get_product_list->is_prime) && $get_product_list->is_prime==1)

                                    { ?>

                                      <div class="" style="<?=$isfullwidth?>float: left;margin-top: 7px;">

                                      <span style="position: relative;top: 2px;float: left;left: 10px;">

                                        <!-- <i class="a-icon a-icon-prime a-icon-small" role="img"></i>  -->

                                      </span>

                                      </div>

                                    <?php } ?>

                                </div>

                                    <a rel=”nofollow” href="<?=$product_url;?>" target="_blank" class="price  product-btn-style">BUY FROM <?=$store_image;?></a> 

                                  </div>

                                  <!-- /.product-price --> 

                                  

                                </div>

                                <!-- /.product-info -->

                                <div class="cart clearfix animate-effect">

                                  <div class="action">

                                    <ul class="list-unstyled">

                                      <li class="add-cart-button btn-group">

                                        <a href="<?=$product_details_url;?>" class="btn btn-primary icon"> View Details </a>

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

                             }

                        else 

                        {

                          ?>

                          <div class="text-center">Sorry, No Products Found</div>

                          <?php



                        }

                        ?>