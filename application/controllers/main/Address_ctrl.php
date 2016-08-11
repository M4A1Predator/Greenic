<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Address_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            $this->load->helper('test/test_helper');
            
            // Load library
            
            // Load model
            $this->load->model('address/Province');
            $this->load->model('address/District');
            $this->load->model('address/Sub_district');
            
            // Do filter
            
            // Init
            
        }
        
        function get_district(){
            /*
             *  Get district by province ID
             */
            
            // Get province id
            $province_id = $this->input->post('province_id');
            //$province_id = 1;
            // Get districts
            $where_assoc = array();
            $where_assoc['district_province_id'] = $province_id;
            $district_arr = $this->District->get_filter('*', $where_assoc, null, 'district_name ASC', 0, null, 'array');
            
            // Encode to JSON
            $district_json = json_encode($district_arr, JSON_UNESCAPED_UNICODE );
            
            echo $district_json;
            
        }
        
        function get_sub_district(){
            /*
             *  Get sub-district by province ID
             */
            
            // Get province id
            $district_id = $this->input->post('district_id');
            $province_id = $this->input->post('province_id');
            
            // Get sub-districts
            $where_assoc = array();
            $where_assoc['sub_district_district_id'] = $district_id;
            //$where_assoc['sub_district_province_id'] = $province_id;
            $sub_district_arr = $this->Sub_district->get_filter('*', $where_assoc, null, 'sub_district_name ASC', 0, null, 'array');
            
            // Encode to JSON
            $sub_district_json = json_encode($sub_district_arr, JSON_UNESCAPED_UNICODE );
            
            echo $sub_district_json;
        }
        
        
    }