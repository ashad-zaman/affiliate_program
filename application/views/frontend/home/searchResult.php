  

      <!-- ============================================== CONTENT ============================================== -->

      <div class="col-xs-12 col-sm-12 col-md-12 homebanner-holder"> 

       

        <!-- ============================================== INFO BOXES ============================================== -->





        <!-- /.info-boxes --> 

        <!-- ============================================== INFO BOXES : END ============================================== --> 

        <!-- ============================================== SCROLL TABS ============================================== -->



        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">

          <div class="more-info-tab clearfix ">



          <div class="col-md-12 col-sm-12 col-xs-12 col-xs-offset-0 text-center mt3 xsmt3">

            <div class="col-md-3 col-sm-3 col-xs-0 hidden-xs">

              <div class="headline"></div>

            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 mt0 xsmt2"><h3 class="new-product-title text-center">Search Result for : <?=$search_text?></h3></div>

            <div class="col-md-3 col-sm-3 col-xs-0 hidden-xs">

                <div class="headline"></div>

            </div>

          </div>  

            <!-- /.nav-tabs --> 

          

          </div>

            <div class="tab-content outer-top-xs">

                <div class="tab-pane in active" id="all">

                  <div class="product-slider">



                  <?php include('product_list.php');?>

                        <!-- /.products -->

                        

                    <!-- /.home-owl-carousel --> 

                  </div>

                  <!-- /.product-slider --> 

                </div>

                

            </div>

            <div class="data-table-toolbar pagination-top text-center">

                    <ul class="pagination">

                        <?php

                        foreach ( $links as $key=>$link ):

                          if($pageNum==$key)

                            echo "<li >". $link."</li>";

                          else

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

          $boxbanner4="";

          foreach($get_box_banners as $key=>$box_banner)

          {

             

                if($key==4)

                  break;     



                if($boxbanner1=='')

                $boxbanner1=$box_banner->banner_description;

                else if($boxbanner2=='')

                $boxbanner2=$box_banner->banner_description;

                else if($boxbanner3=='')

                $boxbanner3=$box_banner->banner_description;

                else 

                $boxbanner4=$box_banner->banner_description;

          }

          

        }

        

        ?>

         <div class="box-wide-banners wide-banners wow fadeInUp outer-bottom-xs">

                <div class="row">

                  <div class="col-md-3 col-sm-3">

                  <?=$boxbanner1;?>

                    <!-- /.wide-banner --> 

                  </div>

                  <div class="col-md-3 col-sm-3">

                  <?=$boxbanner2;?>

                    <!-- /.wide-banner --> 

                  </div>

                  <!-- /.col -->

                  <div class="col-md-3 col-sm-3">

                  <?=$boxbanner3;?>

                    <!-- /.wide-banner --> 

                  </div>

                  <div class="col-md-3 col-sm-3">

                  <?=$boxbanner4;?>

                    <!-- /.wide-banner --> 

                  </div>

                  <!-- /.col --> 

                </div>

                <!-- /.row --> 

        </div>

        <!-- /.wide-banners --> 


	<div id="amzn-assoc-ad-408f1ad4-dc8c-4b24-8f21-26bb1fe850e6"></div><script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=408f1ad4-dc8c-4b24-8f21-26bb1fe850e6"></script>

      </div>

      <!-- /.homebanner-holder --> 

      <!-- ============================================== CONTENT : END ============================================== --> 

