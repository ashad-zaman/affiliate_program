  

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

            <div class="col-md-6 col-sm-6 col-xs-12 mt0 xsmt2"><h3 class="new-product-title text-center">About Us</h3></div>

            <div class="col-md-3 col-sm-3 col-xs-0 hidden-xs">

                <div class="headline"></div>

            </div>

          </div>  

            <!-- /.nav-tabs --> 

          

          </div>

            <div class="tab-content outer-top-xs">

                <div class="tab-pane in active" id="all">

                  <div class="product-slider">




<p>Getconsumerproducts is a list of the best platform for people who want to save the time and stress of figuring out what to buy. Whatever sort of thing you need—tableware or TV or air purifier—we make shopping for it easy by telling you the best one to get. The site was founded in September 2011 and was acquired by The New York Times Company in October 2016.</p>
<br>
<p>
Our recommendations are made through vigorous reporting, interviewing, and testing by teams of veteran journalists, scientists, and researchers. Consider us a best-of list for everyday things; a curated gallery filled with only interesting, useful objects; a thank-you note to the designers and engineers who create the stuff that makes our lives better; a geeky friend with next-level research skills who tests everything they buy so you don’t have to. The point is to make buying great gear quickly easier so you can get on with living your life.
</p>
<br>
<p>
We pride ourselves on following rigorous journalistic standards and ethics, and we maintain editorial independence from our business operations. Our recommendations are always made entirely by our editorial team without input from our revenue team, and our writers and editors are never made aware of any business relationships.
</p>
<br>
<p><strong>
So you focus on only the best things?</strong></p>
<p>
We look for what we think is best for most people. We don’t look for the most feature-packed gadget, or the finest finishes in home goods. We pick the things that will fit best into the lives of everyday people who are shopping for it—and that’s what takes work.
</p>
<p>
The choices we’ve made here with our team took weeks or months of research and years of experience with a wide variety of gear. In addition to our own expertise, we include interviews and data from the best editorial sources around. We also employ the help of engineers, scientists, and other subject-matter experts. And we pore over customer reviews to find out what matters to regular people. Most gear we choose here isn’t top-of-the-line models that are overpriced and loaded with junk features; we aim to recommend items that are of high enough quality to warrant the price, but not items that cost more for extra features you’ll rarely use.
</p>
<p>
These are the same gadgets we’d recommend to our friends and family, and these are the same things we’d choose for ourselves.
</p>
<p><strong>
Do your affiliate commissions make you biased?</strong></p>
<p>
Up front: Our writers and editors are never made aware of which companies may have established affiliate relationships with our business team prior to making their picks. If readers choose to buy the products we recommend as a result of our research, analysis, interviews, and testing, our work is often (but not always) supported through an affiliate commission from the retailer when they make a purchase. If readers return their purchases because they’re dissatisfied or the recommendation is bad, we make nothing. There’s no incentive for us to pick inferior products or respond to pressure from manufacturers—in fact, it’s quite the opposite. We think that’s a pretty fair system that keeps us committed to serving our readers first.
</p>
<p>
The most important thing to us is the trust we have from readers. If we were to recommend something because we are biased or lazy, readers like you wouldn’t support our work. We also invite you to fact-check our pieces, which carefully outline the time, logic, and energy spent researching, interviewing experts, and testing the gear. Often, this takes dozens—sometimes even hundreds—of hours. Each guide plainly lays out all the evidence for why we made our picks so you can judge for yourself.
</p>
<p><strong>
What if the thing I want isn’t on your site?
</strong></p>
<p>
Email or tweet at us to let us know if you need help figuring out a particular buying problem. Our staff—made of smart and curious people who love to investigate reader questions—may be able to help.
</p>


                 

                        <!-- /.products -->

                        

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

