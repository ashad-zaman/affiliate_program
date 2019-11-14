    </div>

    <!-- /.row --> 

    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 

  </div>

  <!-- /.container --> 

</div>

<!-- /#top-banner-and-menu --> 



<!-- ============================================================= FOOTER ============================================================= -->

<footer id="footer" class="footer color-bg">

<div class="scroll-top" style="display: none;">
      <a class="page-scroll" href="#page-top"><span class="fa fa-angle-up"></span></a>
    </div>
  <div class="footer-bottom">

    <div class="container">

      <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-3">

          <div class="module-heading">

            <h4 class="module-title">Contact Us</h4>

          </div>

          <!-- /.module-heading -->

          

          <div class="module-body">

            <ul class="toggle-footer" style="">

              <li class="media">

                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>

                <div class="media-body">

                  <p>8928 Sutor Ave, Ozone Park, NY 11417 USA</p>

                </div>

              </li>

              <li class="media">

                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>

                <div class="media-body">

                  <p>+1 775 581 4695</p>

                </div>

              </li>

              <li class="media">

                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>

                <div class="media-body"> <span><a href="#">info@getconsumerproducts.com</a></span> </div>

              </li>

            </ul>

          </div>

          <!-- /.module-body --> 

        </div>

        <!-- /.col -->

        

        <div class="col-xs-12 col-sm-6 col-md-3">

          

          <!-- /.module-body --> 

        </div>

        <!-- /.col -->

        <div class="col-xs-12 col-sm-6 col-md-3">

         

          <!-- /.module-body --> 

        </div>



        <div class="col-xs-12 col-sm-6 col-md-3">

          <div class="module-heading">

            <h4 class="module-title">Corporation</h4>

          </div>

          <!-- /.module-heading -->

          

          <div class="module-body">

            <ul class='list-unstyled'>

              <li class="first"><a title="Your Account" href="<?=base_url('about-us')?>">About us</a></li>

              <li><a title="Information" href="<?=base_url('contact-us')?>">Contact Us</a></li>

              <li><a title="Addresses" href="<?=base_url('privacy-policy')?>">Privacy Policy</a></li>

              <li><a title="Addresses" href="<?=base_url('cookie-policy')?>">Cookie Policy</a></li>

              <li class="last"><a title="Orders History" href="<?=base_url('terms-and-conditions')?>">Terms and Conditions</a></li>

            </ul>

          </div>

          <!-- /.module-body --> 

        </div>

        <!-- /.col -->

        

       

      </div>

    </div>

  </div>

  <div class="copyright-bar">

    <div class="container">

      <div class="col-xs-12 col-sm-6 no-padding social">

        <ul class="link">

          <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>

          <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>

          <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>

        </ul>

      </div>

      <div class="col-xs-12 col-sm-6 no-padding">

        <div class="clearfix payment-methods">

          <p>© <?=date('Y')?>. All Rights Reserved scriptcoder</p>

        </div>

        <!-- /.payment-methods --> 

      </div>

    </div>

  </div>

</footer>

<!-- ============================================================= FOOTER ============================================================= -->



<!-- ============================================================= FOOTER : END============================================================= --> 



<!-- For demo purposes – can be removed on production --> 



<!-- For demo purposes – can be removed on production : End --> 



<!-- JavaScripts placed at the end of the document so the pages load faster --> 

<script src="<?=base_url('assets/frontend/js/jquery-1.11.1.min.js');?>"></script> 

<script src="<?=base_url('assets/frontend/js/bootstrap.min.js');?>"></script> 

<script src="<?=base_url('assets/frontend/js/bootstrap-hover-dropdown.min.js');?>"></script> 

<script src="<?=base_url('assets/frontend/js/owl.carousel.min.js');?>"></script> 

<script src="<?=base_url('assets/frontend/js/echo.min.js');?>"></script> 

<script src="<?=base_url('assets/frontend/js/jquery.easing-1.3.min.js');?>"></script> 

<script src="<?=base_url('assets/frontend/js/bootstrap-slider.min.js');?>"></script> 

<script src="<?=base_url('assets/frontend/js/jquery.rateit.min.js');?>"></script> 

<script type="text/javascript" src="<?=base_url('assets/frontend/js/lightbox.min.js');?>"></script> 

<script src="<?=base_url('assets/frontend/js/bootstrap-select.min.js');?>"></script> 

<script src="<?=base_url('assets/frontend/js/wow.min.js');?>"></script> 

<script src="<?=base_url('assets/frontend/js/scripts.js');?>"></script>


<script>
  $(document).scroll(function() {
    
  var y = $(this).scrollTop();
  if (y > 100) {
    jQuery('.scroll-top').fadeIn();
  } else {
    jQuery('.scroll-top').fadeOut();
  }
});
jQuery('.page-scroll').on('click', function (e) {
	e.preventDefault();
  jQuery('html, body').stop().animate({
		scrollTop: jQuery(jQuery(this).attr('href')).offset().top
  }, 500, 'swing');
  
});
// magic.js
$(document).ready(function() {



$( "form#contactForm" ).on( "submit", function( event ) {
  event.preventDefault();
  alert("here");
  console.log( $( this ).serialize() );

  

    // process the form
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         :'https://getconsumerproducts.com/contact-us-form-submit', // the url where we want to POST
        data        : $("form#contactForm").serialize(), // our data object
    }).done(function(data) {

            // log data to the console so we can see
            console.log(data); 

            // here we will handle errors and validation messages
        });
});
});
</script>


</body>



</html>