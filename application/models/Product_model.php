<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Product_model extends CI_Model

{

    /**

     * Common_models constructor.

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

    



    public function checkSlug($slug){



        $this->db->select('*');

        $this->db->from('adb_product_list');

        $this->db->where( [ 'slug'=> $slug ] );

        $query = $this->db->get();



        if( $query->num_rows() > 0 ):

            return true;

        else:    

            return false;

        endif;



    }



    /**

     * @param $select

     * @param $table

     * @param int $limit

     * @param int $offset

     * @param string $order_by

     * @param string $array rder_type

     * @param string $where

     * @return string data

     * @return mixed

     */

    public function getProductLimitDataCount( $select, $table, $data = ''){





        if(isset($data['stext']) && $data['stext'] !="" ):

            $where  = "(`title` LIKE '%".$data['stext']."%' ESCAPE '!' OR `price` LIKE '%".$data['stext']."%' ESCAPE '!' OR `brand` LIKE '%".$data['stext']."%' ESCAPE '!' )";

            $this->db->where( $where);

        endif;

        if(isset( $data['title'])&& $data['title'] !="" ):

            $this->db->where( 'title', $data['title'] );

        endif;



        if( isset( $data['slug'])&&$data['slug'] !="" ):

            $this->db->where( 'slug', $data['slug'] );

        endif;



        if( isset( $data['tagslug'])&&$data['tagslug'] !="" ):

            $this->db->where( 'tagslug', $data['tagslug'] );

        endif;



        if( isset($data['tag'])&&$data['tag'] !="" ):

            $this->db->where( 'tag', $data['tag'] );

        endif;



        if( isset( $data['product_url'])&&$data['product_url'] !="" ):

            $this->db->where( 'product_url', $data['product_url'] );

        endif;



        if( isset( $data['is_store'])&&$data['is_store'] !="" ):

            $this->db->where( 'is_store', $data['is_store'] );

        endif;



     



        if( isset( $data['status'])&&$data['status'] !="" ):

            $this->db->where( 'status', $data['status'] );

        endif;



        if( isset( $data['created_at'])&&$data['created_at'] !="" ):

            $this->db->where( 'created_at', $data['created_at'] );

        endif;



        if(isset( $data['parent_cat_id'])&& $data['parent_cat_id'] !="" ):

            $this->db->where( 'parent_cat_id', $data['parent_cat_id'] );

        endif;



        if(isset( $data['child_cat_id'])&& $data['child_cat_id'] !="" ):

            $this->db->where( 'child_cat_id', $data['child_cat_id'] );

        endif;



        if( isset( $data['is_deal'])&&$data['is_deal'] !="" ):

            $this->db->where( 'is_deal', $data['is_deal'] );

        endif;



        if( isset( $data['is_best_seller'])&&$data['is_best_seller'] !="" ):

            $this->db->where( 'is_best_seller', $data['is_best_seller'] );

        endif;



        if( isset( $data['is_top_rated'])&&$data['is_top_rated'] !="" ):

            $this->db->where( 'is_top_rated', $data['is_top_rated'] );

        endif;



        if( isset( $data['is_hot'])&&$data['is_hot'] !="" ):

            $this->db->where( 'is_hot', $data['is_hot'] );

        endif;

        if( isset( $data['is_gift'])&&$data['is_gift'] !="" ):

            $this->db->where( 'is_gift', $data['is_gift'] );

        endif;

        if( isset( $data['is_prime'])&&$data['is_prime'] !="" ):

            $this->db->where( 'is_prime', $data['is_prime']);

        endif;



        if( isset( $data['id'])&&$data['id'] !="" ):

            $this->db->where_not_in( 'id', array($data['id']) );

        endif;



        $this->db->select( $select );

        $this->db->from( $table );

        $this->db->distinct('id');

        $query = $this->db->get();



        //echo $this->db->last_query();exit;



        if( $query->num_rows() > 0 ):

            return $query->num_rows();

        endif;



    }



    /**

     * @param $select

     * @param $table

     * @param int $limit

     * @param int $offset

     * @param string $order_by

     * @param string $array rder_type

     * @param string $where

     * @return string data

     * @return mixed

     */

    public function getProductLimitDataNew( $select, $table, $limit = 0, $offset = 0, $order_type, $order_by, $data = '' ){

        //print_r($data);





        if(isset($data['stext']) && $data['stext'] !="" ):

            $where  = "(`title` LIKE '%".$data['stext']."%' ESCAPE '!' OR `price` LIKE '%".$data['stext']."%' ESCAPE '!' OR `brand` LIKE '%".$data['stext']."%' ESCAPE '!' )";

            $this->db->where( $where);

        endif;

        if(isset( $data['title'])&& $data['title'] !="" ):

            $this->db->where( 'title', $data['title'] );

        endif;



        if( isset( $data['slug'])&&$data['slug'] !="" ):

            $this->db->where( 'slug', $data['slug'] );

        endif;



        if( isset( $data['tagslug'])&&$data['tagslug'] !="" ):

            $this->db->where( 'tagslug', $data['tagslug'] );

        endif;



        if( isset($data['tag'])&&$data['tag'] !="" ):

            $this->db->where( 'tag', $data['tag'] );

        endif;



        if( isset( $data['product_url'])&&$data['product_url'] !="" ):

            $this->db->where( 'product_url', $data['product_url'] );

        endif;



        if( isset( $data['is_store'])&&$data['is_store'] !="" ):

            $this->db->where( 'is_store', $data['is_store'] );

        endif;



     



        if( isset( $data['status'])&&$data['status'] !="" ):

            $this->db->where( 'status', $data['status'] );

        endif;



        if( isset( $data['created_at'])&&$data['created_at'] !="" ):

            $this->db->where( 'created_at', $data['created_at'] );

        endif;



        if(isset( $data['parent_cat_id'])&& $data['parent_cat_id'] !="" ):

            $this->db->where( 'parent_cat_id', $data['parent_cat_id'] );

        endif;



        if(isset( $data['child_cat_id'])&& $data['child_cat_id'] !="" ):

            $this->db->where( 'child_cat_id', $data['child_cat_id'] );

        endif;



        if( isset( $data['is_deal'])&&$data['is_deal'] !="" ):

            $this->db->where( 'is_deal', $data['is_deal'] );

        endif;



        if( isset( $data['is_best_seller'])&&$data['is_best_seller'] !="" ):

            $this->db->where( 'is_best_seller', $data['is_best_seller'] );

        endif;



        if( isset( $data['is_top_rated'])&&$data['is_top_rated'] !="" ):

            $this->db->where( 'is_top_rated', $data['is_top_rated'] );

        endif;



        if( isset( $data['is_hot'])&&$data['is_hot'] !="" ):

            $this->db->where( 'is_hot', $data['is_hot'] );

        endif;

        if( isset( $data['is_gift'])&&$data['is_gift'] !="" ):

            $this->db->where( 'is_gift', $data['is_gift'] );

        endif;

        if( isset( $data['is_prime'])&&$data['is_prime'] !="" ):

            $this->db->where( 'is_prime', $data['is_prime']);

        endif;



        if( isset( $data['id'])&&$data['id'] !="" ):

            $this->db->where_not_in( 'id', array($data['id']) );

        endif;



        $this->db->select( $select );

        $this->db->from( $table );

        if($limit!=0 )
        {
            $this->db->limit( $limit, $offset );
        }
        

        

        if(isset( $order_by)&& $order_by !="" )

            $this->db->order_by( $order_type, $order_by );

        else

        $this->db->order_by( $order_type);



        $this->db->distinct('id');

        $query = $this->db->get();



        //echo $this->db->last_query();exit;



        if( $query->num_rows() > 0 ):

            return $query->result();

        endif;



    }



}