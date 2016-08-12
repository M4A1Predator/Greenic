<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Farm_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function add_farm_ajax(){
            /*
             *  Add member farm
             *
             */
            // Check login
            $this->gnc_authen->redirect_if_not_sign_in();
            
            // Get address data
            $province = $this->input->post('province');
            $district = $this->input->post('district');
            $sub_district = $this->input->post('sub_district');
            $farm_address = $this->input->post('farm_address');
            
            // Get farm_name
            $farm_name = $this->input->post('farm_name');
            
            // Get member data
            $member_id = $this->session->userdata('member_id');
            
            // Get status id = 1, normal
            $status_id = 1;
            
            // Prepare farm data
            $farm_data = array();
            $farm_data['farm_member_id'] = $member_id;
            $farm_data['farm_name'] = $farm_name;
            $farm_data['farm_province'] = $province;
            $farm_data['farm_district'] = $district;
            $farm_data['farm_sub_district'] = $sub_district;
            $farm_data['farm_address'] = $farm_address;
            $farm_data['farm_status_id'] = $status_id;
            
            // Add farm
            $add_result = $this->Farm->add($farm_data);
            
            if($add_result == FALSE){
                echo 0;
                return;
            }
            
            echo 1;
            
        }
        
        
    }