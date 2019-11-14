<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    /**
     * Common_models constructor.
     * @userFullName
     * @getData
     * @deleteRow
     * @insertData
     * @updateData
     */
    private $IP;
    private $machine;
    private $browser;

    function __construct()
    {
        parent::__construct();
        $this->IP       = $_SERVER['REMOTE_ADDR'];
        $this->machine  = php_uname('n');
        $this->browser  = $_SERVER['HTTP_USER_AGENT'];

    }

    public function clean_char($string) {
        $string      = str_replace(' ', '', $string); //Replaces all spaces with hyphens.
        $remove_char = preg_replace('/[^A-Za-z0-9\-]/', '', $string); //Removes special chars.
        return str_replace("-", " ", $remove_char);
    }


}