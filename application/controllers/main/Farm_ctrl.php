<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Farm_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('form_validation');
            
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
            
            // Set form rules
            $this->form_validation->set_rules('farm_name', 'farm_name', 'required');
            $this->form_validation->set_rules('province', 'province', 'required');
            $this->form_validation->set_rules('district', 'district', 'required');
            $this->form_validation->set_rules('sub_district', 'sub_district', 'required');
            $this->form_validation->set_rules('farm_address', 'farm_address', 'required');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                echo 0;
                return;
            }
            
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
        
        function get_member_farms_ajax(){
            /*
             *  Get member farms by member id
             */
            if($this->gnc_authen->is_sign_in() == FALSE){
                return;
            }
            
            // Get member id
            $member_id = $this->session->userdata('member_id');
            
            // Get farms
            $where_assoc = array();
            $where_assoc['farm_member_id'] = $member_id;
            $where_assoc['farm_status_id'] = 1;
            //$join_status = $this->gnc_query->get_join_table_assoc('status', 'farm.farm_status_id = status.status_id');
            //$join_arr = [$join_status];
            $farm_arr = $this->Farm->get_filter('*', $where_assoc, null, null, 0, null, 'array');
            
            // Encode JSON
            $farm_arr_json = json_encode($farm_arr, JSON_UNESCAPED_UNICODE);
            
            echo $farm_arr_json;
            
        }
        
        
    
        function member_farm_page(){
            /*
             *  Display member farm page
             *  
             */
            // Check sign in
            $this->gnc_authen->redirect_if_not_sign_in();
            
            // Get data
            $member_id = $this->session->userdata('member_id');
            
            // Get farms
            $where_assoc = array();
            $where_assoc['farm_member_id'] = $member_id;
            $where_assoc['farm_status_id'] = $this->Status->status_normal_id;
            
            $farms = $this->Farm->get_filter('*', $where_assoc, null, null, null, null, 'object', array('use_view' => TRUE));
            
            // Set view data
            $data = array();
            $data['farms'] = $farms;
            
            // Load view
            $this->load->view('main/manageFarm', $data);
            
        }
    
    }