<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

		$this->load->model('Common_model');

		$this->load->model('Product_model');

	}



	/**

	 * @return mixed 

	 */

	public function index() {



		$cat_name   = "";

        $postData   = "";

        $pageNum    = 0;



        if( $this->uri->segment(2) != ''&&$this->uri->segment(2)>1):

            $pageNum = $this->uri->segment(2)-1;

		endif;





		$postData=[



			'status'=>1

		];







        $totalRows                  = $this->Product_model->getProductLimitDataCount( '*', 'adb_product_list', $postData );

        $config                     = [];

        $config["base_url"]         = base_url().'products/';

        $config["total_rows"]       = $totalRows;

        $config["per_page"]         = 36;

        $config['use_page_numbers'] = true;

        $config['num_links']        =intval($totalRows/$config["per_page"]);

        $config['cur_tag_open']     = '&nbsp;<a class="current active">';

        $config['cur_tag_close']    = '</a>';

        $config['next_link']        = 'Next Page';

        $config['prev_link']        = 'Previous Page';



        $this->pagination->initialize($config);

        $str_links                  = $this->pagination->create_links();

        $data["links"]              = explode('&nbsp;',$str_links );

        $data['get_product_lists']  = $this->Product_model->getProductLimitDataNew(  '*', 'adb_product_list', $config["per_page"], $pageNum*$config["per_page"],  'id', 'desc',  $postData );



      //  $data['search_post']        = $postData;

	  

		$data['title']        = 'Home' ;

		$data['keyword']      = 'get best consumer products, consumer products, best review products, best selling,' ;

        $data['pageNum']      =  $pageNum;

        $data['get_categorys']      			= $this->Common_model->getData('id,name','adb_nav_menu', [ 'status' => 1]);

		$data['get_box_banners']      			= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>1]);

		$data['get_vertical_long_banner']		= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>2]);

		$data['get_horizontal_long_banner']     = $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>3]);



		$data['main_content'] 	= 'frontend/home/index';

		$this->load->view('includes/frontend/template', $data);



	}

	public function category_details($cat_slug='') {

		$cat_name   = "";

        $postData   = "";

        $pageNum    = 0;

        if(is_numeric( $this->uri->segment(3))&& $this->uri->segment(3) != '' && $this->uri->segment(3)>1 ):

            $pageNum = $this->uri->segment(3)-1;

		endif;

		

		$data['category_details']      = $this->Common_model->getData('*','adb_nav_menu', [ 'status' => 1,'slug' => $cat_slug]);

		if(!isset($data['category_details'])&&count($data['category_details'])==0)

		{

			redirect('404page');

		}

		$cat_name=$data['category_details'][0]->name;

		

		if($data['category_details'][0]->cat_parent_id==0)

		{

			$postData=[

				'parent_cat_id'=>$data['category_details'][0]->id,

				'status'=>1

			];

		}

		else

		{

			$postData=[

				'child_cat_id'=>$data['category_details'][0]->id,

				'status'=>1

			];

		}

		

        $totalRows                  = $this->Product_model->getProductLimitDataCount( '*', 'adb_product_list', $postData );

        $config                     = [];

        $config["base_url"]         = base_url().'category/'.$cat_slug;

        $config["total_rows"]       = $totalRows;

        $config["per_page"]         = 36;

		$config['use_page_numbers'] = true;

        $config['num_links']        =intval($totalRows/$config["per_page"]);

        $config['cur_tag_open']     = '&nbsp;<a class="current active">';

        $config['cur_tag_close']    = '</a>';

		$config['next_link']        = 'Next Page';

        $config['prev_link']        = 'Previous Page';



        $this->pagination->initialize($config);

        $str_links                  = $this->pagination->create_links();

        $data["links"]              = explode('&nbsp;',$str_links );



        $data['get_product_lists']  = $this->Product_model->getProductLimitDataNew(  '*', 'adb_product_list', $config["per_page"], $pageNum*$config["per_page"],  'id', 'desc',  $postData );



	  //  $data['search_post']        = $postData;

	    $data['title']        = $cat_name ;

		$data['keyword']      = $cat_name.', get best '.$cat_name.' products, best consumer products,best products, best review '.$cat_name.' products, best selling '.$cat_name.' products' ;

	    $data['category_name']      = $cat_name;

        $data['cat_slug']      		= $cat_slug;

        $data['get_categorys']      = $this->Common_model->getData('id,name','adb_nav_menu', [ 'status' => 1]);

		$data['get_box_banners']      			= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>1]);

		$data['get_vertical_long_banner']		= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>2]);

		$data['get_horizontal_long_banner']     = $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>3]);



		$data['main_content'] 	= 'frontend/home/category';

		$this->load->view('includes/frontend/template_category', $data);



	}



	public function product_details($product_slug='') {



		$cat_name   = "";

        $postData   = "";

		$pageNum    = 0;

		$config                     = [];

        $config["per_page"]         = 100;

		if(!isset($product_slug))

		{

			redirect('404page');

			

		}

		

		

		//$id     = $this->input->post('id');

		  $data['product_details']= $this->Common_model->getData('*','adb_product_list', [ 'slug' => $product_slug ]);

		 

		 

			if(isset($data['product_details'][0]->tag)&&$data['product_details'][0]->tag!='')

			{

				//$postData = [ 'tag' => $data['product_details'][0]->tag ];

				if($data['product_details'][0]->parent_cat_id!=0)

				{

					$postData = [ 

						'parent_cat_id' => $data['product_details'][0]->parent_cat_id,

						'tag' => $data['product_details'][0]->tag,

						'id'=>$data['product_details'][0]->id,

						'status'=>1

					 ];

				}	

				else{

					$postData = [ 

						'tag' => $data['product_details'][0]->tag,

						'id'=>$data['product_details'][0]->id,

						'status'=>1

					 ];

				}

				

			}

			

		  $data['related_product_lists']  = $this->Product_model->getProductLimitDataNew(  '*', 'adb_product_list', $config["per_page"], $pageNum,  'tag asc ,id desc', '',  $postData );



		  $data['parent_cat_details']	= $this->Common_model->getData('*','adb_nav_menu', [ 'status' => 1,'id' => $data['product_details'][0]->parent_cat_id]);

		  $data['child_cat_details']	= $this->Common_model->getData('*','adb_nav_menu', [ 'status' => 1,'id' => $data['product_details'][0]->child_cat_id]);

		 



		  $data['get_box_banners']      		= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>1]);

		  $data['get_vertical_long_banner']		= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>2]);

		  $data['get_horizontal_long_banner']   = $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>3]);

  

		  $data['title']        = $data['product_details'][0]->title;

		  $data['meta_keyword']      = $data['product_details'][0]->meta_keyword;

		  $data['meta_description']      = $data['product_details'][0]->meta_description;

		  

		//  echo json_encode(current($result)); 

		$data['product_name']=$data['product_details'][0]->title;
		$data['brand']=$data['product_details'][0]->brand;
		$data['color']=$data['product_details'][0]->color;
		$data['review']=$data['product_details'][0]->rating;

		$data['main_content'] 	= 'frontend/home/productDetail';

		$this->load->view('includes/frontend/template_singleproduct', $data);



	}



	public function deals() {



		$cat_name   = "";

        $postData   = "";

        $pageNum    = 0;



        if( $this->uri->segment(2) != '' ):

            $pageNum = $this->uri->segment(2);

		endif;

		



		$postData=[

			'is_deal'=>1,

			'status'=>1

		];





        $totalRows                  = $this->Product_model->getProductLimitDataCount( '*', 'adb_product_list', $postData );

        $config                     = [];

        $config["base_url"]         = base_url().'hot-deals/';

        $config["total_rows"]       = $totalRows;

        $config["per_page"]         = 36;

        $config['use_page_numbers'] = true;

        $config['num_links']        =intval($totalRows/$config["per_page"]);

        $config['cur_tag_open']     = '&nbsp;<a class="current active">';

        $config['cur_tag_close']    = '</a>';

        $config['next_link']        = '>>';

        $config['prev_link']        = '<<';



        $this->pagination->initialize($config);

        $str_links                  = $this->pagination->create_links();

        $data["links"]              = explode('&nbsp;',$str_links );

		$data['page_heading']		="All Deals";

        $data['get_product_lists']  = $this->Product_model->getProductLimitDataNew(  '*', 'adb_product_list', $config["per_page"], $pageNum*$config["per_page"],  'id', 'desc',  $postData );

		$data['get_categorys']      = $this->Common_model->getData('id,name','adb_nav_menu', [ 'status' => 1]);

		$data['get_box_banners']      			= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>1]);

		$data['get_vertical_long_banner']		= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>2]);

		$data['get_horizontal_long_banner']     = $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>3]);

	  

		$data['title']        = 'Hot deals';

		$data['keyword']      = 'hot deal, best  product deal, best review  deal ';



		$data['main_content'] 	= 'frontend/home/hotDeals';

		$this->load->view('includes/frontend/template', $data);



	}



	public function product_tag($product_tag_slug='') 

	{

		$cat_name   = "";

        $postData   = "";

        $pageNum    = 0;

       

		

		if(!isset($product_tag_slug)&&$product_tag_slug=='')

		{

			redirect('404page');

		}

		

		

		if(isset($product_tag_slug))

		{

			$postData=['tagslug'=>$product_tag_slug,'status'=>1];

		}

		else

		{

			$postData=['tagslug'=>$product_tag_slug,'status'=>1];

		}

		

        $totalRows                  = $this->Product_model->getProductLimitDataCount( '*', 'adb_product_list', $postData );

        $config                     = [];

        $config["base_url"]         = base_url().'product-tag/'.$product_tag_slug;

        $config["total_rows"]       = $totalRows;

        $config["per_page"]         = 36;

		$config['use_page_numbers'] = true;

        $config['num_links']        =intval($totalRows/$config["per_page"]);

        $config['cur_tag_open']     = '&nbsp;<a class="current active">';

        $config['cur_tag_close']    = '</a>';

		$config['next_link']        = 'Next Page';

        $config['prev_link']        = 'Previous Page';



        $this->pagination->initialize($config);

        $str_links                  = $this->pagination->create_links();

        $data["links"]              = explode('&nbsp;',$str_links );



        $data['get_product_lists']  = $this->Product_model->getProductLimitDataNew(  '*', 'adb_product_list', $config["per_page"], $pageNum*$config["per_page"],  'id', 'desc',  $postData );



        $data['tag_name']      		=ucwords(str_replace("-"," ",$product_tag_slug)) ;

        $data['get_categorys']      = $this->Common_model->getData('id,name','adb_nav_menu', [ 'status' => 1]);

		$data['get_box_banners']      			= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>1]);

		$data['get_vertical_long_banner']		= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>2]);

		$data['get_horizontal_long_banner']     = $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>3]);



		$data['title']        = $data['tag_name'] ;

		$data['keyword']      = $data['tag_name'].', get best '.$data['tag_name'].' products, best consumer products,best products, best review '.$data['tag_name'].' products, best selling '.$data['tag_name'].' products' ;;

		$data['main_content'] 	= 'frontend/home/category';

		$this->load->view('includes/frontend/template_category', $data);



	}



	public function bestSelling() {



		$cat_name   = "";

        $postData   = "";

        $pageNum    = 0;



        if( $this->uri->segment(2) != '' ):

            $pageNum = $this->uri->segment(2);

		endif;

		



		$postData=[

			'is_best_seller'=>1,

			'status'=>1

		];





        $totalRows                  = $this->Product_model->getProductLimitDataCount( '*', 'adb_product_list', $postData );

        $config                     = [];

        $config["base_url"]         = base_url().'category/best-selling/';

        $config["total_rows"]       = $totalRows;

        $config["per_page"]         = 36;

        $config['use_page_numbers'] = true;

        $config['num_links']        =intval($totalRows/$config["per_page"]);

        $config['cur_tag_open']     = '&nbsp;<a class="current active">';

        $config['cur_tag_close']    = '</a>';

        $config['next_link']        = '>>';

        $config['prev_link']        = '<<';



        $this->pagination->initialize($config);

        $str_links                  = $this->pagination->create_links();

        $data["links"]              = explode('&nbsp;',$str_links );

		$data['page_heading']		="Best Selling";

        $data['get_product_lists']  = $this->Product_model->getProductLimitDataNew(  '*', 'adb_product_list', $config["per_page"], $pageNum*$config["per_page"],  'id', 'desc',  $postData );

		$data['get_categorys']      = $this->Common_model->getData('id,name','adb_nav_menu', [ 'status' => 1]);

		$data['get_box_banners']      			= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>1]);

		$data['get_vertical_long_banner']		= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>2]);

		$data['get_horizontal_long_banner']     = $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>3]);

	  

		

		$data['title']        = 'Best selling' ;

		$data['keyword']      = 'Best selling items, get best '.$data['title'].' products, best consumer products,best products, best review '.$data['title'].' products, best selling '.$data['title'].' products' ;

		



		$data['main_content'] 	= 'frontend/home/hotDeals';

		$this->load->view('includes/frontend/template', $data);



	}



	public function topRated() {



		$cat_name   = "";

        $postData   = "";

        $pageNum    = 0;



        if( $this->uri->segment(2) != '' ):

            $pageNum = $this->uri->segment(2);

		endif;

		



		$postData=[

			'is_top_rated'=>1,

			'status'=>1

		];





        $totalRows                  = $this->Product_model->getProductLimitDataCount( '*', 'adb_product_list', $postData );

        $config                     = [];

        $config["base_url"]         = base_url().'category/top-rated/';

        $config["total_rows"]       = $totalRows;

        $config["per_page"]         = 36;

        $config['use_page_numbers'] = true;

        $config['num_links']        =intval($totalRows/$config["per_page"]);

        $config['cur_tag_open']     = '&nbsp;<a class="current active">';

        $config['cur_tag_close']    = '</a>';

        $config['next_link']        = '>>';

        $config['prev_link']        = '<<';



        $this->pagination->initialize($config);

        $str_links                  = $this->pagination->create_links();

        $data["links"]              = explode('&nbsp;',$str_links );

		$data['page_heading']		="Best Selling";

        $data['get_product_lists']  = $this->Product_model->getProductLimitDataNew(  '*', 'adb_product_list', $config["per_page"], $pageNum*$config["per_page"],  'id', 'desc',  $postData );

		$data['get_categorys']      = $this->Common_model->getData('id,name','adb_nav_menu', [ 'status' => 1]);

		$data['get_box_banners']      			= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>1]);

		$data['get_vertical_long_banner']		= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>2]);

		$data['get_horizontal_long_banner']     = $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>3]);

	  

		

		

		$data['title']        = 'Top Rated Products' ;

		$data['keyword']      = 'get best Top Rated products,Top Rated, best consumer products,best products, best review  products, best selling  products' ;

		





		$data['main_content'] 	= 'frontend/home/hotDeals';

		$this->load->view('includes/frontend/template', $data);



	}





	public function hotItems() {



		$cat_name   = "";

        $postData   = "";

        $pageNum    = 0;



        if( $this->uri->segment(2) != '' ):

            $pageNum = $this->uri->segment(2);

		endif;

		



		$postData=[

			'is_hot'=>1,

			'status'=>1

		];





        $totalRows                  = $this->Product_model->getProductLimitDataCount( '*', 'adb_product_list', $postData );

        $config                     = [];

        $config["base_url"]         = base_url().'category/hot-items/';

        $config["total_rows"]       = $totalRows;

        $config["per_page"]         = 36;

        $config['use_page_numbers'] = true;

        $config['num_links']        =intval($totalRows/$config["per_page"]);

        $config['cur_tag_open']     = '&nbsp;<a class="current active">';

        $config['cur_tag_close']    = '</a>';

        $config['next_link']        = '>>';

        $config['prev_link']        = '<<';



        $this->pagination->initialize($config);

        $str_links                  = $this->pagination->create_links();

        $data["links"]              = explode('&nbsp;',$str_links );

		$data['page_heading']		="Best Selling";

        $data['get_product_lists']  = $this->Product_model->getProductLimitDataNew(  '*', 'adb_product_list', $config["per_page"], $pageNum*$config["per_page"],  'id', 'desc',  $postData );

		$data['get_categorys']      = $this->Common_model->getData('id,name','adb_nav_menu', [ 'status' => 1]);

		$data['get_box_banners']      			= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>1]);

		$data['get_vertical_long_banner']		= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>2]);

		$data['get_horizontal_long_banner']     = $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>3]);

	  

		$data['title']        = 'Hot items' ;

		$data['keyword']      = 'get hot item,Top Rated item, best consumer products,best products, best review  products, best selling  products' ;

		

		

		$data['main_content'] 	= 'frontend/home/hotDeals';

		$this->load->view('includes/frontend/template', $data);



	}

	public function product_search_result_submit($search_text='') {



		$category=$this->input->post('category');



		$txt_search=$this->input->post('txt_search');



		if(isset($category)&&$category!='')

		{

			$url=base_url().'product-search-result/'.$category;

		}

		if((isset($category)&&$category!='') && (isset($txt_search)&&$txt_search!=''))

		{

			$url=base_url().'product-search-result/'.$category.'/'.$txt_search;

		}

		if((!isset($category)||$category=='') && (isset($txt_search)&&$txt_search!=''))

		{

			$url=base_url().'product-search-result/'.$txt_search;

		}



		redirect($url);



	}

	public function product_search_result() {


		
		$text1=$this->uri->segment(2);

		$text2=$this->uri->segment(3);

		if(!isset($text1)&&$text1==null&&$text1=='')

		{

			redirect('404page');

		}

		
		
		

		$cat_name   = "";

        $postData   = "";

        $pageNum    = 0;

        if(is_numeric( $this->uri->segment(4))&& $this->uri->segment(4) != '' && $this->uri->segment(4)>1 ):

            $pageNum = $this->uri->segment(4)-1;

		endif;



		$search_text=$text1;

		$search_text_only=$text1;

		$cat_slug='';


		$data['get_categorys'] =$get_categoryss= $this->Common_model->getData('*','adb_nav_menu', [ 'status' => 1]);

		
		if(!empty($get_categoryss)):

			foreach ($get_categoryss as $get_category):
			  if(($get_category->cat_parent_id==0)&&($get_category->slug==$text1)&&$get_category->slug!='')
			  {
				$cat_slug=$text1;
				break;
				 
			  }
			endforeach;

		endif;


		if(isset($text2)&&$text2!='')

		{

			$search_text=$text2;

			$search_text_only=$text2;

			

		}



		if(isset($cat_slug)&&$cat_slug!='')

		{



			$data['category_details']      = $this->Common_model->getData('*','adb_nav_menu', [ 'status' => 1,'slug' => $cat_slug]);



			if(!isset($data['category_details'])&&count($data['category_details'])==0)

			{

				redirect('404page');

			}

			

			if(isset($text2)&&$text2!='')
			{
				$postData = [ 
					'stext' => $search_text,'parent_cat_id'=>$data['category_details'][0]->id,'status'=>1
				 ];
			}
			else
			{
				$postData = [ 
					'parent_cat_id'=>$data['category_details'][0]->id,'status'=>1
				 ];
			}
		}

		else

		{

			$postData = [ 

				'stext' => $search_text,'status'=>1

			 ];

		}



		$search_text=($cat_slug!='')?$cat_slug.'/'.$search_text:$search_text;

		

        $totalRows                  = $this->Product_model->getProductLimitDataCount( '*', 'adb_product_list', $postData );

        $config                     = [];

        $config["base_url"]         = base_url().'product-search-result/'.$search_text;

        $config["total_rows"]       = $totalRows;

        $config["per_page"]         = 36;

		$config['use_page_numbers'] = true;

        $config['num_links']        =intval($totalRows/$config["per_page"]);

        $config['cur_tag_open']     = '&nbsp;<a class="current active">';

        $config['cur_tag_close']    = '</a>';

		$config['next_link']        = 'Next Page';

        $config['prev_link']        = 'Previous Page';



        $this->pagination->initialize($config);

        $str_links                  = $this->pagination->create_links();

        $data["links"]              = explode('&nbsp;',$str_links );



        $data['get_product_lists']  	= $this->Product_model->getProductLimitDataNew(  '*', 'adb_product_list', $config["per_page"], $pageNum*$config["per_page"],  'id', 'desc',  $postData );

		$data['pageNum']      			=  $pageNum;

        $data['search_text']      		= $search_text_only;

		$data['get_box_banners']      			= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>1]);

		$data['get_vertical_long_banner']		= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>2]);

		$data['get_horizontal_long_banner']     = $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>3]);





		$data['title']        = $search_text_only ;

		$data['keyword']      = $search_text_only.', get hot item,Top Rated item, best consumer products,best products, best review  products, best selling  products' ;

		





		$data['main_content'] 	= 'frontend/home/searchResult';

		$this->load->view('includes/frontend/template', $data);



	}

	public function about_us() {


		$data['title']        = 'about Us' ;

		$data['keyword']      = 'about Us' ;
		$data['get_box_banners']      			= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>1]);

		$data['get_vertical_long_banner']		= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>2]);

		$data['get_horizontal_long_banner']     = $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>3]);

		$data['main_content'] 	= 'frontend/home/aboutUs';

		$this->load->view('includes/frontend/template', $data);
	}
	public function contact_us() {


		$data['title']        = 'Contact Us' ;

		$data['keyword']      = 'Contact Us' ;
		$data['get_box_banners']      			= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>1]);

		$data['get_vertical_long_banner']		= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>2]);

		$data['get_horizontal_long_banner']     = $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>3]);

		$data['main_content'] 	= 'frontend/home/contactUs';

		$this->load->view('includes/frontend/template', $data);
	}
	public function privacy_policy() {


		$data['title']        = 'Privacy Policy' ;

		$data['keyword']      = 'Privacy Policy' ;
		$data['get_box_banners']      			= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>1]);

		$data['get_vertical_long_banner']		= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>2]);

		$data['get_horizontal_long_banner']     = $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>3]);

		$data['main_content'] 	= 'frontend/home/privacyPolicy';

		$this->load->view('includes/frontend/template', $data);
	}
	public function cookie_policy() {


		$data['title']        = 'Cookie Policy' ;

		$data['keyword']      = 'Cookie Policy' ;
		$data['get_box_banners']      			= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>1]);

		$data['get_vertical_long_banner']		= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>2]);

		$data['get_horizontal_long_banner']     = $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>3]);

		$data['main_content'] 	= 'frontend/home/cookiePolicy';

		$this->load->view('includes/frontend/template', $data);
	}
	public function terms_and_conditions() {


		$data['title']        = 'Terms and Conditions' ;

		$data['keyword']      = 'Terms and Conditions' ;
		$data['get_box_banners']      			= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>1]);

		$data['get_vertical_long_banner']		= $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>2]);

		$data['get_horizontal_long_banner']     = $this->Common_model->getRandomData('*','adb_banners', [ 'status' => 1,'type'=>3]);

		$data['main_content'] 	= 'frontend/home/termsCondition';

		$this->load->view('includes/frontend/template', $data);
	}
	public function sitemap_slug_create_order_menu(){

		$get_categories =$this->Common_model->getData('*','adb_nav_menu', [ 'status' => 1]);
		
		//$get_product_lists = $this->Product_model->getProductLimitDataNew(  '*', 'adb_product_list',0, 0,  'id', 'desc',  ['status'=>1,'parent_cat_id'=>$get_category->id] );
	
		$count = 1;
		foreach( $get_categories as $get_category ):

			$get_product_lists = $this->Product_model->getProductLimitDataNew(  '*', 'adb_product_list',0, 0,  'id', 'desc',  ['status'=>1,'parent_cat_id'=>$get_category->id] );
			
			foreach( $get_product_lists as $get_product_list ):

				
	
				$product_slug  = base_url($get_product_list->slug);// order online
				$myFile     = $get_category->slug."sitemap.xml";
				$contents   = file_get_contents($myFile);
				$contents   = str_replace('</urlset>', '', $contents);
				file_put_contents($myFile, $contents);

				$myfile     = fopen("info_testing.xml", "a") or die("Unable to open file!");
				
				$data       = "<url><loc>".$product_slug."</loc><lastmod>".$get_product_list->updated_at."</lastmod><priority>0.80</priority></url></urlset>";// order online sitmap
			
				$txt        = $data . PHP_EOL;
				fwrite($myfile, $txt);
				fclose($myfile);

				$count++;
			endforeach;
		endforeach;

	}


}