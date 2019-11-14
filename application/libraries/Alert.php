<?php

/**
 * Created by PhpStorm.
 * User: Sajib
 * Date: 06/10/2016
 * Time: 04:37 PM
 */
class Alert
{
    /**
     * Alert constructor.
     */
    public function __construct()
    {
        //code here
    }

    /**
     * @param $mess
     * @return string
     */
    static function success($mess){
        return '<div class="alert alert-success" role="alert">'. $mess .'</div>';
    }

    /**
     * @param $mess
     * @return string
     */
    static function danger($mess){
        return '<div class="alert alert-danger" role="alert">'. $mess .'</div>';
    }

    /**
     * @param $mess
     * @return string
     */
    static function warning($mess){
        return '<div class="alert alert-warning" role="alert">'. $mess .'</div>';
    }

    /**
     * @param $mess
     * @return string
     */
    static function info($mess){
        return '<div class="alert alert-info" role="alert">'. $mess .'</div>';
    }

    /**
     * @param $caption
     * @param $mess
     * @return string
     */
    static function calloutDanger($caption,$mess){

        return '<div class="bs-callout bs-callout-danger" id="callout-progress-animation-css3">'.
                    '<h4>'. $caption .'</h4>'.
                    '<p>'. $mess .'</p>'.
                '</div>';

    }

    /**
     * @param $caption
     * @param $mess
     * @return string
     */
    static function calloutInfo($caption,$mess){

        return '<div class="bs-callout bs-callout-info">'.
                    '<h4>'. $caption .'</h4>'.
                    '<p>'. $mess .'</p>'.
                '</div>';

    }
}