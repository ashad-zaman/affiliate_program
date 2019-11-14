  

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

            <div class="col-md-6 col-sm-6 col-xs-12 mt0 xsmt2"><h3 class="new-product-title text-center">Contact Us</h3></div>

            <div class="col-md-3 col-sm-3 col-xs-0 hidden-xs">

                <div class="headline"></div>

            </div>

          </div>  

            <!-- /.nav-tabs --> 

          
          </div>

            <div class="tab-content outer-top-xs">

                <div class="tab-pane in active" id="all">

                  <div class="product-slider">
                          <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
   
                              <form role="form" action="<?php echo base_url()."home/contact-us-form-submit";?>" method="POST" id="contactForm">
                                 <div class="row">
                                      <div class="form-group col-sm-6">
                                          <label for="name" class="h4">Name</label>
                                          <input type="text" class="form-control" id="name"   name="name" placeholder="Enter name" data-error="Please type your name" required>
                                          <div class="help-block with-errors"></div>
                                      </div>
                                      <div class="form-group col-sm-6">
                                          <label for="email" class="h4">Email</label>
                                          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" data-error="Please type your email" required>
                                          <div class="help-block with-errors"></div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="message" class="h4 ">Message</label>
                                      <textarea id="message" name="message" class="form-control" rows="5" placeholder="Enter your message" data-error="Please tpe your message" required></textarea>
                                      <div class="help-block with-errors"></div>
                                  </div>
                                  <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>
                                    <div id="msgSubmit" class="h3 text-center hidden">Message Submitted!</div>
                                </form>
                            </div>
                           </div>

                        <!-- /.products -->
                      <div style="height:100px;"></div>
                      

                    <!-- /.home-owl-carousel --> 

                  </div>

                  <!-- /.product-slider --> 

                </div>

                

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



</div>

      <!-- /.homebanner-holder --> 

      <!-- ============================================== CONTENT : END ============================================== --> 

