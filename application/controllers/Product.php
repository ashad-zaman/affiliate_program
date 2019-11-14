<?php



defined('BASEPATH') OR exit('No direct script access allowed');







class Product extends CI_Controller {







    private $loginInfo;



    private $userId;



    private $IP;



    private $machine;



    private $browser;



    



    public function __construct(){







        parent::__construct();







        $this->IP       = $_SERVER['REMOTE_ADDR'];



        $this->machine  = php_uname('n');



        $this->browser  = $_SERVER['HTTP_USER_AGENT'];







        $this->load->model('Common_model');



        $this->load->model('Product_model');



        if( $this->session->userdata('userDetails') !='' ):



        	$this->loginInfo = $this->session->userdata('userDetails');



        	$this->userId    = $this->loginInfo['login_info']->id;



        else:



        	redirect('login');



        endif;



        



    }







	public function index(){







        $data['get_categorys']  = $this->Common_model->getData('id,name','adb_nav_menu', [ 'status' => 1, 'cat_parent_id' => 0 ]);



		$data['main_content']   = 'admin/product/collect_product';



        $data['page_title']     = 'Add  Product';



        $this->load->view('includes/admin/template', $data);







    }







    public function get_has_category(){



        $data   = $this->input->post();



        $result = $this->Common_model->getData('id,name','adb_nav_menu', [ 'status' => 1, 'cat_parent_id' => $data['parent_id'] ]);



        echo json_encode($result);



    }







    public function get_slug_create(){







        $data       = $this->input->post();



        $slug       = $this->clean_char($data['slug']);







        $check_slug = $this->Product_model->checkSlug($slug);







        if( $check_slug == true ):



            $result = $this->add_slug_last_section_specific_time($slug);



        else:



            $result = $slug;



        endif;







        echo json_encode($result);



    }







    public function clean_char($string) {



        $string      = str_replace(' ', '-', $string); //Replaces all spaces with hyphens.



        $remove_char = preg_replace('/[^A-Za-z0-9\-]/', '', $string); //Removes special chars.



        return str_replace("--", "-", strtolower($remove_char));



    }







    public function add_slug_last_section_specific_time($slug){



        return $slug.'-'.date('i');



    }



    public static function slugify($text)



    {



      // replace non letter or digits by -



      $text = preg_replace('~[^\pL\d]+~u', '-', $text);



    



      // transliterate



      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);



    



      // remove unwanted characters



      $text = preg_replace('~[^-\w]+~', '', $text);



    



      // trim



      $text = trim($text, '-');



    



      // remove duplicate -



      $text = preg_replace('~-+~', '-', $text);



    



      // lowercase



      $text = strtolower($text);



    



      if (empty($text)) {



        return 'n-a';



      }



    



      return $text;



    }



    public function add_product(){







        $this->form_validation->set_rules('parent_cat_id', 'Category Parent', 'trim|required');



        $this->form_validation->set_rules('title', 'Title', 'trim|required');



        $this->form_validation->set_rules('slug', 'Slug', 'trim|required');



        $this->form_validation->set_rules('price', 'Price', 'trim|required');



        $this->form_validation->set_rules('image_url', 'Image URL', 'trim|required');



        $this->form_validation->set_rules('product_url', 'Product URL', 'trim|required');



        $this->form_validation->set_rules('store', 'Store', 'trim|required');







        if( $this->form_validation->run() == FALSE ):



            self::index();



        else:







           $data = $this->input->post(); 



          



           $arr  = [



                'parent_cat_id'         => $data['parent_cat_id'],



                'child_cat_id'          => $data['sub_category'] !="" ? $data['sub_category'] : 0,



                'title'                 => $data['title'],



                'description'           => $data['description'],



                'slug'                  => $data['slug'],



                'image_url'             => $data['image_url'],



                'price'                 => $data['price'],



                'discount_price'        => $data['discount_price'],



                'discount_percentage'   => $data['discount_percentage'],



                'product_url'           => $data['product_url'],



                'is_store'              => $data['store'],

                

                'is_prime'               => isset($data['is_prime'])?1:0,

                'is_deal'               => isset($data['is_deal'])?1:0,

                'is_best_seller'        => isset($data['is_best_seller'])?1:0,

                'is_top_rated'          => isset($data['is_top_rated'])?1:0,

                'is_hot'                => isset($data['is_hot'])?1:0,

                'is_gift'                => isset($data['is_gift'])?1:0,



                'tag'                   => $data['tag'],



                

                'tagslug'               => $this->slugify($data['tag']),



                'meta_keyword'          => $data['meta_keyword'],



                'meta_description'      => $data['meta_description'],

                'video_url'             => $data['video_url'],
                'brand'                 => $data['brand'],

                'rating'                => $data['rating'],

                

                'review_label'          => $data['review_label'],

                'review_url'            => $data['review_url'],



                'question_answered_label'          => $data['question_answered_label'],

                'question_answered_url'            => $data['question_answered_url'],



                'status'                => 1,

                'created_by'            => $this->userId,

                'created_at'            => date('Y-m-d h:i:s'),

                'updated_by'            => $this->userId,

                'updated_at'            => date('Y-m-d h:i:s')



           ];







           $result = $this->Common_model->insertData( 'adb_product_list', $arr );







           if( $result > 0 ):



                $mess = [ 'status' => 1, 'text' => 'Product insert successfully.' ];



           else: 



                $mess = [ 'status' => 0, 'text' => 'Product insert failed.' ];



           endif;







            $this->session->set_flashdata( 'message', $mess );



            redirect('collect-product');







        endif; 







    }







    public function product_list(){







        $cat_name   = "";



        $postData   = "";



        $pageNum    = 0;







        if( $this->uri->segment(2) != '' ):



            $pageNum = $this->uri->segment(2);



        endif;







        if( $this->input->post() ):







            $this->session->unset_userdata(['title', 'slug', 'product_url', 'product_cate', 'store', 'status', 'date']);



            $this->session->set_userdata('title', $this->input->post('title'));



            $this->session->set_userdata('slug', $this->input->post('slug'));



            $this->session->set_userdata('product_url', $this->input->post('product_url'));



            $this->session->set_userdata('product_cate', $this->input->post('product_cate'));



            $this->session->set_userdata('store', $this->input->post('store'));



            $this->session->set_userdata('status', $this->input->post('status'));



            $this->session->set_userdata('date', strtotime($this->input->post('date')));







        endif;







        $postData = [ 



            'title'             => $this->session->userdata('title'), 



            'slug'              => $this->session->userdata('slug'), 



            'product_url'       => $this->session->userdata('product_url'), 



            'parent_cat_id'     => $this->session->userdata('product_cate'), 



            'is_store'          => $this->session->userdata('store'), 



            'status'            => $this->session->userdata('status'), 



            'created_at'        => $this->session->userdata('date'), 



        ];







        $data['title']          = $postData['title'];



        $data['slug']           = $postData['slug'];



        $data['product_url']    = $postData['product_url'];



        $data['parent_cat_id']  = $postData['parent_cat_id'];



        $data['is_store']       = $postData['is_store'];



        $data['status']         = $postData['status'];



        $data['created_at']     = $postData['created_at'];







        $totalRows                  = $this->Product_model->getProductLimitDataCount( '*', 'adb_product_list', $postData );



        $config                     = [];



        $config["base_url"]         = base_url().'product-list/';



        $config["total_rows"]       = $totalRows;



        $config["per_page"]         = 20;



        $config['use_page_numbers'] = FALSE;



        $config['num_links']        = $totalRows;



        $config['cur_tag_open']     = '&nbsp;<a class="current active">';



        $config['cur_tag_close']    = '</a>';



        $config['next_link']        = '>>';



        $config['prev_link']        = '<<';







        $this->pagination->initialize($config);



        $str_links                  = $this->pagination->create_links();



        $data["links"]              = explode('&nbsp;',$str_links );







        $data['get_product_lists']  = $this->Product_model->getProductLimitDataNew(  '*', 'adb_product_list', $config["per_page"], $pageNum,  'id', 'desc',  $postData );







        $data['search_post']        = $postData;







        $data['category_name']      = $cat_name;



        $data['get_categorys']      = $this->Common_model->getData('id,name','adb_nav_menu', [ 'status' => 1, 'cat_parent_id' => 0 ]);











        $data['main_content']       = 'admin/product/product_list';



        $data['page_title']         = 'Dashboard';



        $this->load->view('includes/admin/template', $data);







    }







    public function update_product_status(){







        $id         = $this->uri->segment(2);



        $status     = $this->uri->segment(3);



        $page_num   = $this->uri->segment(4);







        $arr  = [



            'status' => $status



        ];







        $result = $this->Common_model->updateData( 'adb_product_list', $arr, [ 'id' => $id ] );







        if( $page_num > 0 ):



            redirect("product-list/".$page_num);



        else:



            redirect("product-list");



        endif;







    }







    public function get_product_details(){







        $id     = $this->input->post('id');



        $result = $this->Common_model->getData('*','adb_product_list', [ 'id' => $id ]);



        echo json_encode(current($result)); 







    }







    public function delete_product(){







        $id         = $this->uri->segment(2);



        $page_num   = $this->uri->segment(3);







        $result     = $this->Common_model->deleteRow( 'adb_product_list', $id  );







        if( $page_num > 0 ):



            redirect("product-list/".$page_num);



        else:



            redirect("product-list");



        endif;







    }







    public function edit_product($id){







        if( $id == "" ):



            redirect('dashboard');



        endif;







        $data['get_categorys']          = $this->Common_model->getData('id,name','adb_nav_menu', [ 'status' => 1, 'cat_parent_id' => 0 ]);



        $data['get_product_details']    = current($this->Common_model->getData('*','adb_product_list', [ 'id' => $id ]));



        $data['get_has_categorys']      = $this->Common_model->getData('id,name','adb_nav_menu', [ 'status' => 1, 'cat_parent_id' => $data['get_product_details']->parent_cat_id ]);







        // common::pr($data['get_categorys']);



        // exit;



        



        $data['main_content']   = 'admin/product/edit_product';



        $data['page_title']     = 'Edit Product';



        $this->load->view('includes/admin/template', $data);







    }







    public function update_product(){







        $data = $this->input->post(); 







        $this->form_validation->set_rules('parent_cat_id', 'Category Parent', 'trim|required');



        $this->form_validation->set_rules('title', 'Title', 'trim|required');



        $this->form_validation->set_rules('slug', 'Slug', 'trim|required');



        $this->form_validation->set_rules('price', 'Price', 'trim|required');



        $this->form_validation->set_rules('image_url', 'Image URL', 'trim|required');



        $this->form_validation->set_rules('product_url', 'Product URL', 'trim|required');



        $this->form_validation->set_rules('store', 'Store', 'trim|required');







        if( $this->form_validation->run() == FALSE ):



            self::edit_product($data['id']);



        else:







           $arr  = [



                'parent_cat_id'         => $data['parent_cat_id'],



                'child_cat_id'          => $data['sub_category'] !="" ? $data['sub_category'] : 0,



                'title'                 => $data['title'],



                'description'           => $data['description'],



                'slug'                  => $data['slug'],



                'image_url'             => $data['image_url'],



                'price'                 => $data['price'],



                'discount_price'        => $data['discount_price'],



                'discount_percentage'   => $data['discount_percentage'],



                'product_url'           => $data['product_url'],



                'is_store'              => $data['store'],



                'is_prime'               => isset($data['is_prime'])?1:0,

                'is_deal'               => isset($data['is_deal'])?1:0,

                'is_best_seller'        => isset($data['is_best_seller'])?1:0,

                'is_top_rated'          => isset($data['is_top_rated'])?1:0,

                'is_hot'                => isset($data['is_hot'])?1:0,

                'is_gift'                => isset($data['is_gift'])?1:0,

                'tag'                   => $data['tag'],



                'tagslug'               => $this->slugify($data['tag']),

                

                'meta_keyword'          => $data['meta_keyword'],



                'meta_description'      => $data['meta_description'],



                'video_url'             => $data['video_url'],
                'brand'                 => $data['brand'],

                'rating'                => $data['rating'],

                'review_label'          => $data['review_label'],

                'review_url'            => $data['review_url'],



                'question_answered_label'          => $data['question_answered_label'],

                'question_answered_url'            => $data['question_answered_url'],



                'updated_by'            => $this->userId,



                'updated_at'            => date('Y-m-d h:i:s'),



           ];







           $result = $this->Common_model->dataUpdate( 'adb_product_list', $arr, $data['id'] );







           if( $result > 0 ):



                $mess = [ 'status' => 1, 'text' => 'Product update successfully.' ];



           else: 



                $mess = [ 'status' => 0, 'text' => 'Product update failed.' ];



           endif;







            $this->session->set_flashdata( 'message', $mess );



            redirect('edit-product/'.$data['id']);







        endif; 







    }







    public function delete_nav(){







        $id         = $this->uri->segment(2);



        $page_num   = $this->uri->segment(3);







        $result     = $this->Common_model->deleteRow( 'adb_nav_menu', $id  );







        if( $page_num > 0 ):



            redirect("add-nav-menu/".$page_num);



        else:



            redirect("add-nav-menu");



        endif;







    }







    



    



}



