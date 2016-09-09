<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Unit_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function add_unit_member_ajax(){
            /*
             *  Add unit by member
             */
            
            // Check if not sign in then return error
            if($this->is_sign_in == FALSE){
                echo 0;
                return;
            }
            
            // Create form rules
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('unit_name', 'unit_name', 'required');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                echo 'invalid input';
                return;
            }
            
            // Get data
            $unit_name = $this->input->post('unit_name');
            $member_id = $this->session->userdata('member_id');
            
            // Set unit data
            $unit_data = array();
            $unit_data['unit_name'] = $unit_name;
            $unit_data['unit_creator_id'] = $member_id;
            $unit_data['unit_order'] = 50; // Use to display in UI after default units
            
            // Add unit
            $add_result = $this->Unit->add($unit_data);
            
            if($add_result == FALSE){
                echo 'add failed';
                return;
            }
            
            echo 1;
            
        }
        
        
    }