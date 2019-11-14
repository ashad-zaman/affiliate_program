<!DOCTYPE html>



<html lang="en">







<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">



<!-- Meta -->







<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">





<?php 



if(isset($meta_description) && $meta_description!='')

{

  if(isset($color) && $color!='')

  {

   $meta_description=$meta_description.' | '.$color;  

  }

  if(isset($review) && $review!='')

  {

   $meta_description=$meta_description.' | '.$review.' out 5 reviews';  

  }

  if(isset($brand) && $brand!='')

  {

    $meta_description=$meta_description.' | '.$brand;

  }

  

}



?>



<meta name="description" content="<?=isset($meta_description)?$meta_description:''?>">



<meta name="author" content="">

<?php 



if(isset($meta_keyword) && $meta_keyword!='')

{

  if(isset($color) && $color!='')

  {

   $meta_keyword=$meta_keyword.','.$color;  

  }

  

  if(isset($brand) && $brand!='')

  {

    $meta_keyword=$meta_keyword.','.$brand;

  }

  

}



?>



<meta name="keywords" content="<?=isset($meta_keyword)?$meta_keyword:''?>">



<meta name="robots" content="all">

<?php 



if(isset($title) && $title!='')

{

  if(isset($review) && $review!='')

  {

   $title=$title.' | '.$review.' out 5 reviews';  

  }

  if(isset($brand) && $brand!='')

  {

    $title=$title.' | '.$brand;

  }

  

}

$isHome=$this->uri->segment(1);
if(isset($isHome)&&$isHome!='')
{
    $isBest_seller=$this->uri->segment(2);
    
    
   if($isBest_seller=='best-selling'){
       
    $title='best selling';
    $description='best selling';
    $image=base_url('assets/frontend/images/sliders/atoz-getconsumerproducts.jpg');
    $img_width=640;
    $img_height=442;
        
   }
  elseif($isHome=='category')
  {
   $title=$category_name;
    $description=$category_name;
    $image=base_url('assets/frontend/images/banners/'.$cat_slug.'.jpg');
    $img_width=640;
    $img_height=442;
  }
  elseif($isHome=='product')
    {
   $title=$product_details[0]->title;
    $description=$product_details[0]->description;
    $image=$product_details[0]->image_url;
    $img_width=60; 
    $img_height=60;
    }
?>
<?php

if(isset($img_width))
{
?>
<meta property="og:type" content="article" />
<meta itemprop="og:headline" content="<?=isset($title)?$title:''?>" />
<meta itemprop="og:description" content="<?=isset($description)?$description:''?>" />
<meta property="og:image" content="<?=isset($image)?$image:''?>" />
<meta property="og:image:width" content="<?=$img_width?>" />
<meta property="og:image:height" content="<?=$img_height?>" />
<meta property="fb:app_id" content="265386317655643">
<?php } }?>
<title><?=isset($title)?$title:''?> | consumer products</title>







<!-- Bootstrap Core CSS -->



<link rel="stylesheet" href="<?=base_url('assets/frontend/css/bootstrap.min.css');?>">







<!-- Customizable CSS -->



<link rel="stylesheet" href="<?=base_url('assets/frontend/css/main.css');?>">



<link rel="stylesheet" href="<?=base_url('assets/frontend/css/blue.css');?>">



<link rel="stylesheet" href="<?=base_url('assets/frontend/css/owl.carousel.css');?>">



<link rel="stylesheet" href="<?=base_url('assets/frontend/css/owl.transitions.css');?>">



<link rel="stylesheet" href="<?=base_url('assets/frontend/css/animate.min.css');?>">



<link rel="stylesheet" href="<?=base_url('assets/frontend/css/rateit.css');?>">



<link rel="stylesheet" href="<?=base_url('assets/frontend/css/bootstrap-select.min.css');?>">







<!-- Icons/Glyphs -->



<link rel="stylesheet" href="<?=base_url('assets/frontend/css/font-awesome.css');?>">







<!-- Fonts -->



<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>



<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>



<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>



<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128962574-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-128962574-1');
</script>


</head>



<body class="cnt-home" id="page-top">



<!-- ============================================== HEADER ============================================== -->



<header class="header-style-1"> 



  



  <!-- ============================================== TOP MENU ============================================== -->



  <div class="top-bar animate-dropdown">



    <div class="container">



      <div class="header-top-inner">



        <div class="clearfix"></div>



      </div>



      <!-- /.header-top-inner --> 



    </div>



    <!-- /.container --> 



  </div>



  <!-- /.header-top --> 



  <!-- ============================================== TOP MENU : END ============================================== -->



  <div class="main-header">



    <div class="container">



      <div class="row">



      



        <div class="col-xs-12 col-md-4 col-lg-3 logo-holder"> 



          <!-- ============================================================= LOGO ============================================================= -->



          <div class="logo"> <a href="<?=base_url();?>"> <img src="<?=base_url('assets/frontend/images/logo.png');?>" width="190px" alt="logo"> </a> </div>



          <!-- /.logo --> 



          <!-- ============================================================= LOGO : END ============================================================= --> 



        </div>



        <!-- /.logo-holder -->



        



     



  <div class="col-xs-12 col-md-8 col-lg-push-1 col-lg-7 top-search-holder"> 



          <!-- /.contact-row --> 



          <!-- ============================================================= SEARCH AREA ============================================================= -->



          <div class="search-area">



           <form action="<?=base_url('product-search-result-submit')?>" method="post">







              <div class="control-group">



                <select id="category" name="category" style="width: 110px;padding: 5px;display: inline-block;line-height: 50px;height: 46px;border: 0px !important;" id="parent_cat_id" class="form-control " onchange="parentCategory(this.value)">



                  <option value="">Category</option>



                  <?php



                  $get_categoryss=$this->Common_model->getData('*','adb_nav_menu', [ 'status' => 1]);



                      if(!empty($get_categoryss)):



                          foreach ($get_categoryss as $get_category):

                            if($get_category->cat_parent_id==0)

                            {

                            

                              echo '<option value="'.$get_category->slug.'">'.ucwords($get_category->name).'</option>';

                            }

                          endforeach;



                      endif;



                  ?>



                



                  <input id="txt_search" name="txt_search" class="search-field" placeholder="Type to search" />



                  <button type="submit" class="search-button"> </button>



                  



            </div>







            </form>



          </div>



          <!-- /.search-area --> 



          <!-- ============================================================= SEARCH AREA : END ============================================================= --> 



        </div>



     



        <!-- /.top-search-holder -->



        



        <!-- /.top-cart-row --> 



      </div>



      <!-- /.row --> 



      



    </div>



    <!-- /.container --> 



    



  </div>



  <!-- /.main-header --> 



  



  <!-- ============================================== NAVBAR ============================================== -->



  <?php include('topmenu.php');?>



  <!-- ============================================== NAVBAR : END ============================================== --> 



  



</header>



