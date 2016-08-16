<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Product_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function get_all_units_ajax(){
            /*
             *  Get all product units
             */
            
            // Get all units
            $unit_arr = $this->Unit->get_filter('*', null, null, null, 0, null, 'array');
            
            // Encode JSON
            $unit_arr_json = json_encode($unit_arr, JSON_UNESCAPED_UNICODE);
            
            echo $unit_arr_json;
        }
        
        
    }