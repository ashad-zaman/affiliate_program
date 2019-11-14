<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Admin extends CI_Controller {



    private $loginInfo;

    private $userId;

    

    public function __construct(){

        parent::__construct();

        $this->load->model('Common_model');

        $this->load->model('Admin_model');

        if( $this->session->userdata('userDetails') !='' ):

        	$this->loginInfo = $this->session->userdata('userDetails');

        	$this->userId    = $this->loginInfo['login_info']->id;

        else:

        	redirect('login');

        endif;

    }



	public function index(){


		$data['main_content']   = 'admin/dashboard/index';

        $data['page_title']     = 'Dashboard';

        $this->load->view('includes/admin/template', $data);



    }



    public function add_nav_menu(){



        $cat_name   = "";

        $postData   = "";

        $pageNum    = 0;



        if( $this->uri->segment(2) != '' ):

            $pageNum = $this->uri->segment(2);

        endif;



        if( $this->input->post('category_name') ):

            $postData = [ 'name' => $this->input->post('category_name') ];

            $cat_name   = $this->input->post('category_name');

        endif;



        $totalRows                  = $this->Common_model->getLimitDataCount( '*', 'adb_nav_menu', $postData );

        $config                     = [];

        $config["base_url"]         = base_url().'add-nav-menu/';

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



        $data['get_categorys']      = $this->Common_model->getLimitData(  '*', 'adb_nav_menu', $config["per_page"], $pageNum,  'id', 'desc',  $postData );

        $data['search_post']        = $postData;



        $data['category_name']      = $cat_name;

        $data['get_parent_cates']   = $this->Common_model->getData( '*', 'adb_nav_menu', [ 'cat_parent_id' => 0 ] );

        $data['get_parent_cates_j'] = json_encode($data['get_parent_cates'] );

        $data['main_content']       = 'admin/setting/add_nav_menu';

        $data['page_title']         = 'Dashboard';

        $this->load->view('includes/admin/template', $data);



    }



    public function set_root_category(){



        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');

        $this->form_validation->set_rules('category_position', 'Category Position', 'trim|required');



        if( $this->form_validation->run() == FALSE ):

            self::add_nav_menu();

        else:

            $pdata = $this->input->post(); 

           $cat_name        = $this->input->post('category_name');

           $parent_category = $this->input->post('parent_category') !="" ? $this->input->post('parent_category') : 0;

           $cat_position    = $this->input->post('category_position');

           $cat_icon        = $this->input->post('cat_icon');

           $slug            = $this->clean_char(trim($cat_name));



           $data    = [

                'cat_parent_id'             => $parent_category,

                'name'                      => trim(htmlspecialchars($cat_name)),

                'slug'                      => $slug,

                'cat_child_group_by_name'   => '',

                'cat_icon'                  => $cat_icon,

                'is_position'               => $cat_position,

                'status'                    => 1,
                'meta_keyword'              => $pdata['meta_keyword'],

                'meta_description'          => $pdata['meta_description'],

                'created_by'                => $this->userId

           ];



           $result = $this->Common_model->insertData( 'adb_nav_menu', $data );



           if( $result > 0 ):

                $mess = [ 'status' => 1, 'text' => 'Category insert successfully.' ];

           else: 

                $mess = [ 'status' => 0, 'text' => 'Category insert failed.' ];

           endif;



            $this->session->set_flashdata( 'message', $mess );

            redirect('add-nav-menu');



        endif; 



    }



    public function clean_char($string) {

        $string      = str_replace(' ', '-', $string); //Replaces all spaces with hyphens.

        $remove_char = preg_replace('/[^A-Za-z0-9\-]/', '', $string); //Removes special chars.

        return str_replace("--", "-", strtolower($remove_char));

    }





    public function update_cat_status(){



        $id         = $this->uri->segment(2);

        $status     = $this->uri->segment(3);

        $page_num   = $this->uri->segment(4);



        $arr  = [

            'status' => $status

        ];



        $result = $this->Common_model->updateData( 'adb_nav_menu', $arr, [ 'id' => $id ] );



        if( $page_num > 0 ):

            redirect("add-nav-menu/".$page_num);

        else:

            redirect("add-nav-menu");

        endif;



    }



    public function update_cat_details(){



        $data   = $this->input->post();
        prinr_r($data);exit;

        $arr    = [

            'name'                      => $data['cat_name'],

            'slug'                      => $this->clean_char(trim($data['cat_name'])),

            'cat_parent_id'             => $data['parent_category'] !="" ? $data['parent_category'] : 0,

            'is_position'               => $data['category_position'],
            
            'cat_icon'                  => $data['cat_icon'],
            'meta_keyword'              => $data['meta_keyword'],
            'meta_description'          => $data['meta_description']

        ];

         $result = $this->Common_model->updateData( 'adb_nav_menu', $arr, [ 'id' => $data['cat_id'] ] );



        if( $result > 0 ):

            $mess = [ 'status' => 1, 'text' => 'Nav update successfully.' ];

        else:

            $mess = [ 'status' => 0, 'text' => 'Nav update successfully.' ];

        endif;

        

        $this->session->set_flashdata('message',$mess);

        redirect($data['url']);



    }

    

    /*menu management */

    public function banner_list(){



        $banner_title   = "";

        $postData   = "";

        $pageNum    = 0;



        if( $this->uri->segment(2) != '' ):

            $pageNum = $this->uri->segment(2);

        endif;



        if( $this->input->post('banner_title') ):

            $postData = [ 'banner_title' => $this->input->post('banner_title') ];

            $banner_title   = $this->input->post('banner_title');

        endif;



        $totalRows                  = $this->Common_model->getLimitDataCount( '*', 'adb_banners', $postData );

        

        $config                     = [];

        $config["base_url"]         = base_url().'banner-manager/';

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



        $data['get_banners']      = $this->Common_model->getLimitData(  '*', 'adb_banners', $config["per_page"], $pageNum,  'id', 'desc',  $postData );

        $data['search_post']        = $postData;



        $data['banner_title']      = $banner_title;

        $data['get_parent_cates']   = $this->Common_model->getData( '*', 'adb_nav_menu', [ 'status' => 1,'cat_parent_id' => 0 ] );

        $data['get_parent_cates_j'] = json_encode($data['get_parent_cates'] );

     

        $data['main_content']       = 'admin/setting/banner_manager';

        $data['page_title']         = 'Dashboard';

        $this->load->view('includes/admin/template', $data);



    }

    public function add_new_banner(){

        

        

        

        $this->form_validation->set_rules('banner_title', 'Banner Title', 'trim|required');

        



        if( $this->form_validation->run() == FALSE ):

            self::banner_list();

        else:



            $parent_cat_id          = $this->input->post('parent_cat_id');

            $sub_category           = $this->input->post('sub_category');

           $banner_title            = $this->input->post('banner_title');

           $description             = $this->input->post('description');

           $slug                    = $this->clean_char(trim($banner_title));

           $type                    = $this->input->post('type');

           



           $data    = [

                'parent_cat_id'         => $parent_cat_id,

                'child_cat_id'          => $sub_category !="" ? $sub_category : 0,

                'banner_title'          => trim(htmlspecialchars($banner_title)),

                'slug'                  => $slug,

                'banner_description'    => $description,

                'type'                  =>$type,

                'status'                => 1,

                'created_by'            => $this->userId,

                'created_at'            => date('Y-m-d h:i:s'),

                'updated_by'            => $this->userId,

                'updated_at'            => date('Y-m-d h:i:s'),

           ];



           $result = $this->Common_model->insertData( 'adb_banners', $data );



           if( $result > 0 ):

                $mess = [ 'status' => 1, 'text' => 'Banner insert successfully.' ];

           else: 

                $mess = [ 'status' => 0, 'text' => 'Banner insert failed.' ];

           endif;



            $this->session->set_flashdata( 'message', $mess );

            redirect('banner-manager');



        endif; 



    }

    public function update_banner_status(){



        $id         = $this->uri->segment(2);

        $status     = $this->uri->segment(3);

        $page_num   = $this->uri->segment(4);



        $arr  = [

            'status' => $status

        ];



        $result = $this->Common_model->updateData( 'adb_banners', $arr, [ 'id' => $id ] );



        if( $page_num > 0 ):

            redirect("banner-manager/".$page_num);

        else:

            redirect("banner-manager");

        endif;



    }

    public function edit_banner($id){



        if( $id == "" ):

            redirect('dashboard');

        endif;



        $data['get_categorys']          = $this->Common_model->getData('id,name','adb_nav_menu', [ 'status' => 1, 'cat_parent_id' => 0 ]);

        $data['get_banner_details']    = current($this->Common_model->getData('*','adb_banners', [ 'id' => $id ]));

        

        $data['get_has_categorys']      = $this->Common_model->getData('id,name','adb_nav_menu', [ 'status' => 1, 'cat_parent_id' => $data['get_banner_details']->parent_cat_id ]);



        // common::pr($data['get_categorys']);

        // exit;

        

        $data['main_content']   = 'admin/setting/edit_banner';

        $data['page_title']     = 'Edit Banner';

        $this->load->view('includes/admin/template', $data);



    }

    public function update_banner_details(){



        $data   = $this->input->post();

        $banner_title        = $this->input->post('banner_title');

        $description    = $this->input->post('description');

        $slug            = $this->clean_char(trim($banner_title));



        $arr    = [

        'parent_cat_id'         => $data['parent_cat_id'],

        'child_cat_id'          => $data['sub_category'] !="" ? $data['sub_category'] : 0,

        'banner_title'          => trim(htmlspecialchars($banner_title)),

        'slug'                  => $slug,

        'banner_description'    => $description,

        'updated_by'            => $this->userId,

        'updated_at'            => date('Y-m-d h:i:s'),

        ];



         $result = $this->Common_model->updateData( 'adb_banners', $arr, [ 'id' => $data['id'] ] );



        if( $result > 0 ):

            $mess = [ 'status' => 1, 'text' => 'Menu update successfully.' ];

        else:

            $mess = [ 'status' => 0, 'text' => 'Menu update successfully.' ];

        endif;

        

        $this->session->set_flashdata( 'message', $mess );

        redirect('edit-banner/'.$data['id']);



    }

    public function menu_settings()
    {

        $data['main_content']   = 'admin/setting/menu_settings';

        $data['page_title']     = 'Menu Settings';

        $this->load->view('includes/admin/template', $data);
    }

    public function manage_top_menu()
    {
       // $data['menuList']          = $this->Common_model->getDataJoinTable('adb_nav_menu.id,adb_nav_menu.name,adb_nav_menu.slug','adb_nav_menu','adb_top_menu', [ 'adb_nav_menu.status' => 1, 'adb_nav_menu.cat_parent_id' => 0 ],'adb_top_menu.menu_id = adb_nav_menu.id');
        $data['menuList']          = $this->Common_model->getData('id,name,slug','adb_nav_menu', 'adb_nav_menu.id not in (select menu_id from adb_top_menu) and status=1 and cat_parent_id=0');
        $data['get_categorys']          = $this->Common_model->getDataJoinTable('adb_top_menu.id,adb_nav_menu.name,adb_nav_menu.slug,adb_top_menu.position','adb_top_menu','adb_nav_menu', '','adb_top_menu.menu_id = adb_nav_menu.id','adb_top_menu.position');
        $data['main_content']   = 'admin/setting/menu/manage_top_menu';

        $data['page_title']     = 'Manage Top Menu';

        $this->load->view('includes/admin/template', $data);
    }
    public function saceOrder()
    {
         $orderValue=$this->input->post('order');
         if(isset($orderValue)&&$orderValue!=''){
             foreach($orderValue as $key=>$item){
                $this->Common_model->updateData('adb_top_menu',['position'=>$key+1],['id'=>$item]);

             }
         }
         print_r($orderValue);
    }
    public function add_top_menu()
    {
        $this->form_validation->set_rules('menu', 'Menu Name', 'trim|required');
        if( $this->form_validation->run() == FALSE ):

            self::manage_top_menu();

        else:



            $menu          = $this->input->post('menu');
 
           $total_topmenu= $this->Common_model->getData('id','adb_top_menu'); 
           $data    = [

                'menu_id'         => $menu,

                'position'          =>isset($total_topmenu)?count($total_topmenu)+1:1,

                'created_by'            => $this->userId,

                'created_at'            => date('Y-m-d h:i:s') 

           ];



           $result = $this->Common_model->insertData( 'adb_top_menu', $data );



           if( $result > 0 ):

                $mess = [ 'status' => 1, 'text' => 'Menu insert successfully.' ];

           else: 

                $mess = [ 'status' => 0, 'text' => 'Menu insert failed.' ];

           endif;



            $this->session->set_flashdata( 'message', $mess );

            redirect('manage-top-menu');



        endif; 



    }
    public function manage_sub_menu()
    {

        $data['main_content']   = 'admin/setting/menu/manage_sub_menu';

        $data['page_title']     = 'Manage sub menu';

        $this->load->view('includes/admin/template', $data);
    }

}

