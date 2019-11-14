<?php
/**
 * Created by PhpStorm.
 * User: Sajib Mridha
 * Mobile: 01979753333
 * Date: 06/10/2016
 * Time: 05:11 PM
 */

class common
{
    /**
     * common_helper constructor.
     * @pr -> result Print and Exit
     * @country -> return show all county list
     * @userDetails -> return full user details
     * @changePassword
     * @userFullname -> user name return
     * @getCategoryName
     * @getChildCatName
     * @getChildCategories
     * @getChildCategory
     * @getMenuReturn
     * @getBookLinks -> return book links
     * @get_widget -> load sidebar widgets
     * @getCommentsReturn
     * @get_time_ago
     * @getRecentBooks -> Returns Most Recent Book list (count 4 books)
     * @getSimilarBooks
	 * @getBookName
	 * @getSlugAndCatDetails
	 * @getLimitData
     */

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Print and Die
     * @param $data
     */
    static function pr($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit();
    }

    /**
     * @param $data
     */
    static function pr1($data){
        echo "<pre>";
        print_r($data);

    }

    /**
     * Get country List
     * @return mixed
     */
    static function country( $data = null ){
        $ci = & get_instance();
        $ci->load->model('Common_model');
        return $ci->Common_model->country($data);
    }

    /**
     * @param int $id
     * @return mixed
     */
    static function userDetails( $id = 0 ){
        $ci = & get_instance();
        $ci->load->model('Common_model');
        return $ci->Common_model->userDetails($id);
    } 

    /**
     * @param int $id
     * @return mixed
     */
    static function getSpecificInfoNav( $where ){
        $ci = & get_instance();
        $ci->load->model('Common_model');
        return $ci->Common_model->getSpecificInfoNav( $where );
    }

    /**
     * @param int $id
     * @param null $data
     * @return mixed
     */
    static function changePassword( $id = 0 , $data = null ){
        $ci = & get_instance();
        $ci->load->model('Common_model');
        return $ci->Common_model->changePassword( $id, $data );
    }

    /**
     * @param int $id
     * @return mixed
     */
    static function userFullname( $id = 0 ){
        $ci = & get_instance();
        $ci->load->model('Common_model');
        return $ci->Common_model->userFullname($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    static function getCategoryName( $id = 0 ){
        $ci =  & get_instance();
        $ci->load->model('Common_model');
        return $ci->Common_model->getCategoryName($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    static function getChildCatName( $id = 0 ){
        $ci =  & get_instance();
        $ci->load->model('Common_model');
        return $ci->Common_model->getChildCatName($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    static function getChildCategories( $id = 0 ) {
        $ci =  & get_instance();
        $ci->load->model('Category_model');
        return $ci->Category_model->get_children_categories($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    static function getChildCategory( $id = 0 ) {
        $ci =  & get_instance();
        $ci->load->model('Category_model');
        return $ci->Category_model->getChildCategory($id);
    }

    /**
     * @return menu category and child category array
     */
    static function getMenuReturn(){

        $ci = & get_instance();
        $ci->load->model('Home_model');

        $categoryArray = array();
        $parent_category = $ci->Home_model->show_category();

        if( isset($parent_category) ):

            foreach ( $parent_category as $parentValues ):

                $catResult = array(
                    'parent_id' 	=> $parentValues->id,
                    'category_name' => $parentValues->category_name,
                    'slug' 			=> $parentValues->slug,
                    'status' 		=> $parentValues->status,
                    'date' 			=> $parentValues->date,
                    'child'			=> $ci->Home_model->show_child_category($parentValues->id),
                );

                array_push($categoryArray,$catResult);

            endforeach;
        endif;

        return $categoryArray;

    }

    /**
     * @param null $id
     * @return mixed
     */
    static function getBookLinks($id = null ) {
        $ci = & get_instance();
        $ci->load->model('Book_model');
        return $ci->Book_model->getBookLinks($id);
    }

    /**
     * @param $widget_name
     * @return
     * @Load widgets
     */
    static function get_widget($widget_name) {
        $ci = & get_instance();
        return $ci->load->view('includes/widgets/' . $widget_name);
    }

    /**
     * @param $book_id
     * @return array
     */
    static function getCommentsReturn( $book_id ){

        $ci = & get_instance();
        $ci->load->model('Common_model');

        $categoryArray = array();
        $parentComments = $ci->Common_model->getMultiData( '*', 'bp_comments', array( 'book_id' => $book_id ) );

        if( isset($parentComments) ):

            foreach ( $parentComments as $commentsValues ):

                if( $commentsValues->parent_id == 0 && $commentsValues->status == 1 ):

                    $catResult = array(
                        'parent_id' => $commentsValues->id,
                        'book_id'   => $commentsValues->book_id,
                        'user_id'   => $commentsValues->user_id,
                        'name'      => $commentsValues->name,
                        'email'     => $commentsValues->email,
                        'message'   => $commentsValues->message,
                        'rateing'   => $commentsValues->rateing,
                        'status'    => $commentsValues->status,
                        'date'      => $commentsValues->date,
                        'comments_child' => $ci->Common_model->show_comments_child($commentsValues->id)
                    );

                    array_push($categoryArray, $catResult);

                endif;

            endforeach;
        endif;

        return $categoryArray;

    }

    /**
     * @param $time
     * @return string
     */
    static function get_time_ago( $time ){
        $estimate_time = time() - $time;

        if( $estimate_time < 1 )
        {
            return 'less than 1 second ago';
        }

        $condition = array(
            12 * 30 * 24 * 60 * 60  =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        );

        foreach( $condition as $secs => $str )
        {
            $d = $estimate_time / $secs;

            if( $d >= 1 )
            {
                $r = round( $d );
                return  $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
            }
        }
    }
	
	/**
     * @param $select
     * @param $table
     * @param $status
     * @return mixed
     */
    static function getCount( $select, $table, $status ){

        $ci = & get_instance();
        $ci->load->model('Common_model');
        return $ci->Common_model->getCount( $select, $table, $status );

    }
	
	/**
     * @param $count
     * @return mixed
     */
    static function getRecentBooks($count) {

        $CI = & get_instance();
        $CI->load->model('Common_model');

        return $CI->Common_model->getLimitData('*', 'bp_book', $count, 0, 'id', 'DESC', array( 'status' => 1 ) );
    }
	
	/**
     * @param $category
     * @param $count
     * @param $id
     * @return mixed
     */
    static function getSimilarBooks($category, $count, $id) {
        $CI = & get_instance();
        $CI->load->model('Common_model');

        return $CI->Common_model->getLimitData('*', 'bp_book', $count, 0, 'id', 'DESC', 
            array( 
                'status' => 1,
                'child_cat_id' => $category,
                'id <>' => $id
                )
            );
    }
	
	/**
     * @return mixed
     */
	static function getBookName() {
        $ci = & get_instance();
        $ci->load->model('Home_model');
        return $ci->Home_model->getBookName();
    }
	
	/**
     * @return mixed
     */
    static function getBooks() {
        $CI = & get_instance();
        $CI->load->model('Book_model');
        return json_encode($CI->Book_model->get_book());
    }
	
	/**
     * @param int $id
     * @return mixed
     */
	static function getSlugAndCatDetails( $id = 0 ){
        $ci = & get_instance();
        $ci->load->model('Home_model');
        return $ci->Home_model->getSlugAndCatDetails($id);
    }
	
	/**
     * @param $select
     * @param $table
     * @param $limit
     * @param $offset
     * @param $id
     * @param $desc
     * @param $where
     * @return mixed
     */
    static function getLimitData( $select, $table, $limit, $offset, $id, $desc, $where ) {

        $CI = & get_instance();
        $CI->load->model('Common_model');

        return $CI->Common_model->getLimitData( $select, $table, $limit, $offset, $id, $desc, $where );
    }

}