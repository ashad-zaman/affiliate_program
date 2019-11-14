<!-- Single Product Details-->

<?php

                            if( !empty($product_details) ):

                                foreach($product_details as $product_detail):



                                  // foreach($get_categorys as $get_category){



                                  //     if($get_category->id==$product_detail->parent_cat_id)

                                  // }



								  $tagurl=base_url().'product-tag/'.$product_detail->tagslug;	

								  $product_details_url=base_url().'product/'.$product_detail->slug;

								  

                                  $image_url = "";

                                  if( $product_detail->image_url !="" ):

                                      $image_url = '<img src="'.$product_detail->image_url.'" alt="image for '.$product_detail->title.'" width="60" heigh="60"/>';

                                  endif;



                                  $product_url = '';

                                  if( $product_detail->product_url !="" ):

                                    $product_url=$product_detail->product_url;

                                      ///$product_url = '<a href="'.$product_detail->product_url.'" target="_blank">link</a>';

                                  endif;

								 

                                  $discount_price = '';

                                  if( isset($product_detail->discount_price)&&$product_detail->discount_price !=""&&$product_detail->discount_price>0):

                                    $discount_price='<span class="price-strike" style="padding-left:10px;">'.$product_detail->discount_price.'</span> <br/>';

                                      ///$product_url = '<a href="'.$product_detail->product_url.'" target="_blank">link</a>';

                                  endif;





                                  $store_image = '';

                                  if( $product_detail->is_store == 1 ):

                                      $store_image = '<img src="'.base_url('assets/frontend/images/amazon_small_logo.png').'">';

                                  elseif( $product_detail->is_store == 2 ):

                                    $store_image = '<img src="'.base_url('assets/frontend/images/ebay.jpg').'">';

                                  elseif( $product_detail->is_store == 3 ):

                                    $store_image = '<img src="'.base_url('assets/frontend/images/alibaba.png').'">';

                                  elseif( $product_detail->is_store == 4 ):

                                    $store_image = '<img src="'.base_url('assets/frontend/images/aliexpress.png').'">';

								  endif;

								endforeach;

								endif;

                  ?>







<div class='single-product'>

<div class='col-md-9'>

<div class="detail-block">

   <div class="row  wow fadeInUp">

	<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">

    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">

            <div class="single-product-gallery-item" id="slide1">

                <a data-lightbox="image-1" data-title="Gallery" target="_blank" href="<?=$product_url;?>">

                    <img class="img-responsive" alt="image for <?=$product_detail->title;?>" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=$product_detail->image_url;?>" />

                </a>

            </div><!-- /.single-product-gallery-item -->



			<?php /*

				<div class="single-product-gallery-item" id="slide2">

				<a data-lightbox="image-1" data-title="Gallery" href="<?=base_url('assets/frontend/images/products/p9.jpg');?>">

						<img class="img-responsive" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p9.jpg');?>" />

					</a>

				</div><!-- /.single-product-gallery-item -->



				<div class="single-product-gallery-item" id="slide3">

				<a data-lightbox="image-1" data-title="Gallery" href="<?=base_url('assets/frontend/images/products/p10.jpg');?>">

						<img class="img-responsive" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p10.jpg');?>" />

					</a>

				</div><!-- /.single-product-gallery-item -->



				<div class="single-product-gallery-item" id="slide4">

				<a data-lightbox="image-1" data-title="Gallery" href="<?=base_url('assets/frontend/images/products/p11.jpg');?>">

						<img class="img-responsive" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p11.jpg');?>" />

					</a>

				</div><!-- /.single-product-gallery-item -->



				<div class="single-product-gallery-item" id="slide5">

				<a data-lightbox="image-1" data-title="Gallery" href="<?=base_url('assets/frontend/images/products/p12.jpg');?>">

						<img class="img-responsive" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p12.jpg');?>" />

					</a>

				</div><!-- /.single-product-gallery-item -->



				<div class="single-product-gallery-item" id="slide6">

				<a data-lightbox="image-1" data-title="Gallery" href="<?=base_url('assets/frontend/images/products/p13.jpg');?>">

						<img class="img-responsive" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p13.jpg');?>" />

					</a>

				</div><!-- /.single-product-gallery-item -->



				<div class="single-product-gallery-item" id="slide7">

				<a data-lightbox="image-1" data-title="Gallery" href="<?=base_url('assets/frontend/images/products/p14.jpg');?>">

						<img class="img-responsive" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p14.jpg');?>" />

					</a>

				</div><!-- /.single-product-gallery-item -->



				<div class="single-product-gallery-item" id="slide8">

				<a data-lightbox="image-1" data-title="Gallery" href="<?=base_url('assets/frontend/images/products/p15.jpg');?>">

						<img class="img-responsive" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p15.jpg');?>" />

					</a>

				</div><!-- /.single-product-gallery-item -->



				<div class="single-product-gallery-item" id="slide9">

				<a data-lightbox="image-1" data-title="Gallery" href="<?=base_url('assets/frontend/images/products/p16.jpg');?>">

						<img class="img-responsive" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p16.jpg');?>" />

					</a>

				</div><!-- /.single-product-gallery-item -->



			*/?>

        </div><!-- /.single-product-slider -->



<?php /*



        <div class="single-product-gallery-thumbs gallery-thumbs">



            <div id="owl-single-product-thumbnails">

                <div class="item">

                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">

                        <img class="img-responsive" width="85" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p17.jpg');?>" />

                    </a>

                </div>



                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">

                    <img class="img-responsive" width="85" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p18.jpg');?>" />

                    </a>

                </div>

                <div class="item">



                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">

                    <img class="img-responsive" width="85" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p19.jpg');?>" />

                    </a>

                </div>

                <div class="item">



                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="4" href="#slide4">

                    <img class="img-responsive" width="85" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p20.jpg');?>" />

                    </a>

                </div>

                <div class="item">



                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="5" href="#slide5">

                    <img class="img-responsive" width="85" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p21.jpg');?>" />

                    </a>

                </div>

                <div class="item">



                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="6" href="#slide6">

                    <img class="img-responsive" width="85" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p22.jpg');?>" />

                    </a>

                </div>

                <div class="item">



                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="7" href="#slide7">

                    <img class="img-responsive" width="85" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p23.jpg');?>" />

                    </a>

                </div>

                <div class="item">



                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="8" href="#slide8">

                    <img class="img-responsive" width="85" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p24.jpg');?>" />

                    </a>

                </div>

                <div class="item">



                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="9" href="#slide9">

                    <img class="img-responsive" width="85" alt="" src="<?=base_url('assets/frontend/images/blank.gif');?>" data-echo="<?=base_url('assets/frontend/images/products/p25.jpg');?>" />

                    </a>

                </div>

			</div><!-- /#owl-single-product-thumbnails -->

			

        </div><!-- /.gallery-thumbs -->



*/?>

    </div><!-- /.single-product-gallery -->

</div><!-- /.gallery-holder -->        		





					<!-- product details-->

					<div class='col-sm-6 col-md-7 product-info-block'>

						<div class="product-info">

							<h1 class="name product-details"><?=$product_detail->title;?></h1>



							 <?php if(isset($product_detail->rating)&&$product_detail->rating>0)

                                      {

										  ?>

							<!-- <div class="a-icon-row ">



                                      <?php if(isset($product_detail->rating)&&$product_detail->rating>0)

                                      {

                                        //echo str_replace(".","-",$get_product_list->rating);

										?>

										<div class="col-sm-6 col-md-2 text-left nopadding">

                                      <a rel=”nofollow” class="a-size-small"   href="<?=$product_detail->review_url;?>" target="_blank">

                                        <i class="a-icon a-icon-star a-star-<?=str_replace(".","-",$product_detail->rating);?>"><span class="a-icon-alt"><?=$product_detail->rating;?> out of 5 stars</span></i>

									  </a>

									  </div>

                                      <?php } ?>

									  <div class="col-sm-6 col-md-10 nopadding">

                                        <?php if(isset($product_detail->review_url) && isset($product_detail->review_label))

                                        { ?>

                                          <a rel=”nofollow” class="a-size-small "  href="<?=$product_detail->review_url;?>" target="_blank"><?=$product_detail->review_label;?></a>

                                        <?php } ?>

										

										<?php if(isset($product_detail->question_answered_url) && isset($product_detail->question_answered_label))

                                        { ?>

										<a rel=”nofollow” class="a-size-small"   href="<?=$product_detail->question_answered_url;?>" target="_blank">&nbsp;&nbsp;|&nbsp;&nbsp;

										<?=$product_detail->question_answered_label;?>

										</a>

										<?php } ?>

										</div> 



										

                             </div> -->

							 <?php } ?>
							
							 <?php if(isset($product_detail->is_best_seller) && $product_detail->is_best_seller==1)

                                        { ?>

										<div class="best-seller-single">

											<i class="a-icon a-icon-addon p13n-best-seller-badge">#1 Best Seller</i>

										</div>

										<?php } ?>

										
										<?php if(isset($product_detail->is_prime) && $product_detail->is_prime==1)

														{ ?>

															<div class="" style="width: 55px !important;float: left;">

															<span style="position: relative; top: 2px;">

																<!-- <i class="a-icon a-icon-prime a-icon-small" role="img"></i>  -->

															</span>

															</div>

														<?php } ?>
							<?php /* ?>

							<div class="rating-reviews m-t-20">

								<div class="row">

									<div class="col-sm-3">

										<div class="rating rateit-small"></div>

									</div>

									<div class="col-sm-8">

										<div class="reviews">

											<a href="#" class="lnk">(13 Reviews)</a>

										</div>

									</div>

								</div><!-- /.row -->		

							</div><!-- /.rating-reviews -->

							<?php */?>

	<?php /*

								<div class="stock-container info-container m-t-10">

									<div class="row">

										<div class="col-sm-2">

											<div class="stock-box">

												<span class="label">Availability :</span>

											</div>	

										</div>

										<div class="col-sm-9">

											<div class="stock-box">

												<span class="value">In Stock</span>

											</div>	

										</div>

									</div><!-- /.row -->	

								</div><!-- /.stock-container -->

	*/?>

							

							<div class="price-container info-container ">

								<div class="row">

									<div class="col-sm-12">

										<div class="price-box">

										<div style="float: left;width: 100%;">

										<div class=" mdem11 smem10 xsem10 text-left price" style="float: left;">Price: $ <?=$product_detail->price;?></div>

										   <?=$discount_price;?>

										</div>





										   <a rel=”nofollow” href="<?=$product_url;?>" target="_blank" class="price  product-btn-style-details"> Buy FROM <?=$store_image;?></a> 

										</div>

										

									</div>





								</div><!-- /.row -->

							</div><!-- /.price-container -->



							<div class="ProductDescription">

								<h4 class="product-description product-details">Product Description</h4>

								<div class="description-container">

								<div>About the Product :</div><br>

									<p class="description"><?=(($product_detail->description=='')?$product_detail->title:$product_detail->description);?></p>

								</div><!-- /.description-container -->

							</div>



							<div class="Producttags">

								<br>

								<h4 class="product-description product-details">Related Tags</h4> 

								<div class="description-container m-t-20">

								<?php if(isset($product_detail->tag)&&$product_detail->tag!='')

								{

								?>

									<a href="<?=$tagurl;?>">  <?=$product_detail->tag;?></a>

								<?php

								}

								else{

								?>

									<p>Not any related tag for this product</p>

								<?php

								}

							 ?>



							

								</div><!-- /.description-container -->

							</div>

							



							



							



							

						</div><!-- /.product-info -->

					</div><!-- /.col-sm-7 -->

				</div><!-- /.row -->

                </div>

				

<!-- ============================================== UPSELL PRODUCTS ============================================== -->



<section class="section featured-product wow fadeInUp">
<?php

	if( !empty($related_product_lists) ):

		?>
	<h3 class="section-title">chosse related Products</h3>

	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

			

	

	<?php

	if($related_product_lists)
		foreach($related_product_lists as $related_product_list):



			// foreach($get_categorys as $get_category){



			//     if($get_category->id==$related_product_list->parent_cat_id)

			// }





			$product_details_url=base_url().'product/'.$related_product_list->slug;



			$image_url = "";

			if( $related_product_list->image_url !="" ):

				$image_url = '<img src="'.$related_product_list->image_url.'" alt="image for '.$related_product_list->title.'" width="60" heigh="60"/>';

			endif;



			$product_url = '';

			if( $related_product_list->product_url !="" ):

			$product_url=$related_product_list->product_url;

				///$product_url = '<a href="'.$related_product_list->product_url.'" target="_blank">link</a>';

			endif;



			$discount_price = '';

			if( isset($related_product_list->discount_price)&&$related_product_list->discount_price !=""&&$related_product_list->discount_price>0):

			$discount_price='<span class="price-before-discount">'.$related_product_list->discount_price.'</span> <br/>';

				///$product_url = '<a href="'.$related_product_list->product_url.'" target="_blank">link</a>';

			endif;





			$store_image = '';

			if( $related_product_list->is_store == 1 ):

				$store_image = '<img class="m-t-5" src="'.base_url('assets/frontend/images/amazon_small_logo.png').'">';

			elseif( $related_product_list->is_store == 2 ):

			$store_image = '<img src="'.base_url('assets/frontend/images/ebay.jpg').'">';

			elseif( $related_product_list->is_store == 3 ):

			$store_image = '<img src="'.base_url('assets/frontend/images/alibaba.png').'">';

			elseif( $related_product_list->is_store == 4 ):

			$store_image = '<img src="'.base_url('assets/frontend/images/aliexpress.png').'">';

			endif;



                  ?>

	

					<div class="item item-carousel">

						<div class="products">

							<div class="product">		

								<div class="product-image">

								<div class="image"> <a href="<?=$product_url;?>" target="_blank"><?=$image_url;?></a> </div>		

									           		   

								</div><!-- /.product-image -->

									

								

								<div class="product-info text-center">

								<div class="product-name">

									<h3 class="name"><a href="<?=$product_details_url;?>"><?=$this->Common_model->shorter($related_product_list->title,55);?></a></h3>

								</div>  

								<div class="a-icon-row">



                                    <?php if(isset($related_product_list->rating)&&$related_product_list->rating>0)

                                      {

                                        //echo str_replace(".","-",$related_product_list->rating);

                                       ?>

                                      <!-- <a rel=”nofollow” class="a-size-small " href="<?=$related_product_list->review_url;?>" target="_blank">-->

                                      <!--   <i class="a-icon a-icon-star a-star-<?=str_replace(".","-",$related_product_list->rating);?>"><span class="a-icon-alt"><?=$related_product_list->rating;?> out of 5 stars</span></i>-->

                                      <!--</a>-->

                                       <?php } ?>



                                        <?php if(isset($related_product_list->review_url))

                                        { ?>

                                          <!--<a rel=”nofollow” class="a-size-small " href="<?=$related_product_list->review_url;?>" target="_blank"><?=preg_replace("/[^0-9,.]/", "", $related_product_list->review_label);?></a>-->

                                        <?php } ?>

                                  </div>

									<?php /*?><div class="rating rateit-small"></div><?php */?>





								 <?php 

                                  $width='width: 131px !important;';

                                  if(isset($related_product_list->is_prime) && $related_product_list->is_prime==1)

                                    { 

                                      $width='width: 115px !important;';

                                    }

                                      ?>







									<div class="description"></div>



									<div class="product-price">	

									<div style="float: left;width: 100%;">





									<div class="mdem11 smem10 xsem10 text-center price nopadding pb-10"  style="<?=$width?>float: left;text-align:right;"> $ <?=$related_product_list->price;?></div>

                                   <?=$discount_price;?>

								   <?php if(isset($related_product_list->is_prime) && $related_product_list->is_prime==1)

                                    { ?>

                                      <div class="" style="width: 53px !important;float: left;margin-top: 7px;">

                                      <span style="position: relative; top: 2px;">

                                        <i class="a-icon a-icon-prime a-icon-small" role="img"></i> 

                                      </span>

                                      </div>

									<?php 

								  } ?>

                                </div>

                                    <a href="<?=$product_url;?>" target="_blank" class="price  product-btn-style"> BUY FROM <?=$store_image;?></a> 

									</div><!-- /.product-price -->

									

								</div><!-- /.product-info -->

								<div class="cart clearfix animate-effect">

										<div class="action">

											<ul class="list-unstyled">

												<li class="add-cart-button btn-group">

													<a href="<?=$product_details_url;?>"class="btn btn-primary icon"> View Details </a>

												</li>

											</ul>

										</div><!-- /.action -->

								</div><!-- /.cart -->

							</div><!-- /.product -->

				

						</div><!-- /.products -->

					</div><!-- /.item -->



 					<?php

                                  

                        endforeach;

                    

                    ?>



	
	

			</div><!-- /.home-owl-carousel -->
			<?php 

 endif;

?>
			<div id="amzn-assoc-ad-121eccbf-bd47-43aa-849b-24b7c6e82edc"></div><script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=121eccbf-bd47-43aa-849b-24b7c6e82edc"></script>


</section><!-- /.section -->





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

        </section>

</div>

<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

        <!-- /.wide-banners --> 