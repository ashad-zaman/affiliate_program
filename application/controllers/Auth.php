<?php
/**
 * Created by PhpStorm.
 * User: Sajib Mridha
 * Mobile: 01979753333
 * Date: 06/10/2016
 * Time: 05:11 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    /**
     * Auth constructor.
     * @login
     * @getLogin
     * @logout
     * @url_get_contents
     */
	 
	private $secretKey;
	private $IP;
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_models');
        $this->load->model('Common_model');
    }

    /**
     * @return user login views
     */
    public function index() {
        $data['main_content'] 	= 'frontend/login/index';
        $this->load->view('includes/frontend/template', $data);
    }

    /**
     * @return user information
     */
    public function getLogin(){

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if( $this->form_validation->run() == FALSE ):
            self::index();
        else:

            $email      = trim(htmlspecialchars($this->input->post('email')));
            $password   = trim(htmlspecialchars(sha1($this->input->post('password'))));
            $result     = $this->User_models->getLogin($email,$password);

            if( $result !='' && $result->role == 1 && $result->status == 1 ):

                $login_info = [ 'login_info' => $result, 'is_logged_in' => true ];
                $this->session->set_userdata( 'userDetails', $login_info );
                redirect('dashboard');

            else:

                $mess = [ 'status' => 0, 'text' => 'Invalid email or password.' ];
                $this->session->set_flashdata( 'message', $mess );
                redirect('login');

            endif;

        endif;        

    }

    /**
     * @session destroy
     */
    public function logout(){
		
		$this->session->unset_userdata('userDetails');
        session_destroy();
        redirect('login');
		
    }


}