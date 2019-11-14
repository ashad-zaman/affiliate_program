<?php
/**
 * Created by PhpStorm.
 * User: Sajib Mridha
 * Mobile: 01979753333
 * Date: 06/10/2016
 * Time: 05:11 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class User_models extends CI_Model
{
    /**
     * User_models constructor.
     * @getLogin
     */

    /**
     * User_models constructor.
     */
    function __construct()
    {
        parent::__construct();
    }


    /**
     * @param $username
     * @param $password
     */
    public function getLogin($email,$password){

        $data = [ 'email' => $email, 'password' => $password, 'status' => 1 ];
        $this->db->select('*');
        $this->db->from('adb_users');
        $this->db->where($data);
        $query = $this->db->get();
        
        if( $query->num_rows() > 0 ):
            return $query->row();
        endif;

    }
	
	
}