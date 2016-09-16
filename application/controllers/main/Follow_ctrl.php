<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Follow_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('form_validation');
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function add_follow_ajax(){
            /*
             *  Add follow
             *  used by ajax POST request
             *
             *  
             */
            
            // Create form rules
            $this->form_validation->set_rules('target_type', 'target_type', 'required');
            $this->form_validation->set_rules('target_id', 'target_id', 'required|numeric');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                echo 0;
                return;
            }
            
            // Check login
            if(!$this->is_sign_in){
                echo 0;
                return;
            }
            
            // Check member must have not been follow this target before
            
            // Prepare data
            $member_id = $this->session->userdata('member_id');
            $target_type = $this->input->post('target_type');
            $target_id = $this->input->post('target_id');
            
            // Add follow to DB
            $added_follow_id = $this->Follow->add_follow($member_id, $target_type, $target_id);
            
            // Check result
            if(!$added_follow_id){
                echo 0;
                return;
            }
            
            echo 1;
            
        }
        
        function remove_follow_ajax(){
            // Create form rules
            $this->form_validation->set_rules('target_type', 'target_type', 'required');
            $this->form_validation->set_rules('target_id', 'target_id', 'required|numeric');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                echo 0;
                return;
            }
            
            // Check login
            if(!$this->is_sign_in){
                echo 0;
                return;
            }
            
            // Check member must have not been follow this target before
            
            // Prepare data
            $member_id = $this->session->userdata('member_id');
            $target_type = $this->input->post('target_type');
            $target_id = $this->input->post('target_id');
            
            // Add follow to DB
            $added_follow_id = $this->Follow->remove_follow($member_id, $target_type, $target_id);
            
            // Check result
            if(!$added_follow_id){
                echo 0;
                return;
            }
            
            echo 1;
        }
        
        
    }