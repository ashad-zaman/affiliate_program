  

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

            <div class="col-md-6 col-sm-6 col-xs-12 mt0 xsmt2"><h3 class="new-product-title text-center">Privacy Policy</h3></div>

            <div class="col-md-3 col-sm-3 col-xs-0 hidden-xs">

                <div class="headline"></div>

            </div>

          </div>  

            <!-- /.nav-tabs --> 

          

          </div>

            <div class="tab-content outer-top-xs">

                <div class="tab-pane in active" id="all">

                  <div class="product-slider">



                   Scriptcoder operates the <a href="getconsumerproducts.com" target="_blank">getconsumerproducts.com</a>, which provides the SERVICE.



This page is used to inform website visitors regarding our policies with the collection, use, and disclosure of Personal Information if anyone decided to use our Service, the Website Name website.



If you choose to use our Service, then you agree to the collection and use of information in relation with this policy. The Personal Information that we collect are used for providing and improving the Service. We will not use or share your information with anyone except as described in this Privacy Policy.



The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible at Website URL, unless otherwise defined in this Privacy Policy.



<p><strong>Information Collection and Use</strong></p>

For a better experience while using our Service, we may require you to provide us with certain personally identifiable information, including but not limited to your name, phone number, and postal address. The information that we collect will be used to contact or identify you.



<p><strong>Log Data</strong></p>


We want to inform you that whenever you visit our Service, we collect information that your browser sends to us that is called Log Data. This Log Data may include information such as your computer's Internet Protocol (“IP”) address, browser version, pages of our Service that you visit, the time and date of your visit, the time spent on those pages, and other statistics.



<p><strong>Cookies</strong></p>


Cookies are files with small amount of data that is commonly used an anonymous unique identifier. These are sent to your browser from the website that you visit and are stored on your computer's hard drive.



Our website uses these “cookies” to collection information and to improve our Service. You have the option to either accept or refuse these cookies, and know when a cookie is being sent to your computer. If you choose to refuse our cookies, you may not be able to use some portions of our Service.



<p><strong>Service Providers</strong></p>

We may employ third-party companies and individuals due to the following reasons:



To facilitate our Service;

To provide the Service on our behalf;

To perform Service-related services; or

To assist us in analyzing how our Service is used.

We want to inform our Service users that these third parties have access to your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However, they are obligated not to disclose or use the information for any other purpose.



<p><strong>Security</strong></p>

We value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and we cannot guarantee its absolute security.



<p><strong>Links to Other Sites</strong></p>

Our Service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by us. Therefore, we strongly advise you to review the Privacy Policy of these websites. We have no control over, and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.



<p><strong>Children's Privacy</strong></p>



Our Services do not address anyone under the age of 13. We do not knowingly collect personal identifiable information from children under 13. In the case we discover that a child under 13 has provided us with personal information, we immediately delete this from our servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact us so that we will be able to do necessary actions.



<p><strong>Changes to This Privacy Policy</strong></p>

We may update our Privacy Policy from time to time. Thus, we advise you to review this page periodically for any changes. We will notify you of any changes by posting the new Privacy Policy on this page. These changes are effective immediately, after they are posted on this page.



<p><strong>Contact Us</strong></p>

If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us.



This Privacy Policy page was created at Privacy Policy Template.net

                        

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

