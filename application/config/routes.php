<?php

defined('BASEPATH') OR exit('No direct script access allowed');





$route['default_controller'] = 'home';



$route['products']                  = 'home/index';

$route['products/(:num)']           = 'home/index/$1';

$route['404_override']              = '';

$route['translate_uri_dashes']      = FALSE;



//Auth

$route['login']         = 'auth/index';

$route['get-login']     = 'auth/getLogin';

$route['logout']        = 'auth/logout';



//Admin

$route['dashboard']                             = 'admin/index';

$route['add-nav-menu']                          = 'admin/add_nav_menu';

$route['add-nav-menu/(:num)']                   = 'admin/add_nav_menu/$1';

$route['set-root-category']                     = 'admin/set_root_category';

$route['update-cat-details']                    = 'admin/update_cat_details';

$route['update-cat-status/(:num)/(:num)/(:num)']= 'admin/update_cat_status/$1/$2/$3';



//product

$route['collect-product']                               = 'product/index';

$route['get-has-category']                              = 'product/get_has_category';

$route['get-slug-create']                               = 'product/get_slug_create';

$route['add-product']                                   = 'product/add_product';

$route['product-list']                                  = 'product/product_list';

$route['product-list/(:num)']                           = 'product/product_list/$1';

$route['update-product-status/(:any)/(:any)/(:any)']    = 'product/update_product_status/$1/$2/$3';

$route['get-product-details']                           = 'product/get_product_details';

$route['delete-product/(:any)/(:any)']                  = 'product/delete_product/$1/$2';

$route['edit-product/(:num)']                           = 'product/edit_product/$1';

$route['update-product']                                = 'product/update_product/$1';

$route['delete-nav/(:any/(:any))']                      = 'product/delete_nav/$1/$2';



//menu

$route['banner-manager']                            = 'admin/banner_list';

$route['banner-manager/(:num)']                     = 'admin/banner_list/$1';

$route['add-banner']                                = 'admin/add_new_banner';

$route['update-banner-status/(:any)/(:any)/(:any)'] = 'admin/update_banner_status/$1/$2/$3';

$route['update-banner-details']                     = 'admin/update_banner_details';

$route['edit-banner/(:num)']                        = 'admin/edit_banner/$1';

$route['menu-settings']                        = 'admin/menu_settings';
$route['manage-top-menu']                        = 'admin/manage_top_menu';
$route['manage-sub-menu']                        = 'admin/manage_sub_menu';
$route['add-top-menu']                        = 'admin/add_top_menu';


/*Frontend */



$route['hot-deals']                        = 'home/deals';

$route['hot-deals/(:num)']                 = 'home/deals/$1';



$route['category/best-selling']            = 'home/bestSelling';

$route['category/best-selling/(:num)']     = 'home/bestSelling/$1';



$route['category/top-rated']               = 'home/topRated';

$route['category/top-rated/(:num)']        = 'home/topRated/$1';



$route['category/hot-items']               = 'home/hotItems';

$route['category/hot-items/(:num)']        = 'home/hotItems/$1';





$route['category/(:any)']           = 'home/category_details/$1';

$route['category/(:any)/(:num)']    = 'home/category_details/$1/$2';

//$route['category']                = 'home/category_details';

$route['product/(:any)']            = "home/product_details/$1";

$route['product-tag/(:any)']        = "home/product_tag/$1";

$route['product-tag/(:any)/(:num)'] = "home/product_tag/$1/$2";





$route['product-search-result-submit']        = "home/product_search_result_submit";

$route['product-search-result/(:any)']        = "home/product_search_result/$1";

$route['product-search-result/(:any)/(:any)'] = "home/product_search_result/$1/$2";

$route['product-search-result/(:any)/(:any)/(:num)'] = "home/product_search_result/$1/$2/$3";



$route['sitemap-slug-create-order-menu'] = "home/sitemap_slug_create_order_menu";



/*Pages */

$route['about-us']                        = 'home/about_us';

$route['contact-us']                      = 'home/contact_us';

$route['contact-us-form-submit']          = 'home/contact_us_form_submit';

$route['privacy-policy']                  = 'home/privacy_policy';

$route['cookie-policy']                   = 'home/cookie_policy';

$route['terms-and-conditions']            = 'home/terms_and_conditions';















