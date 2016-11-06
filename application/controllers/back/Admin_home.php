<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Admin_home extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('GNC_admin_authen');
            
            // Load model
            
            // Do filter
            $this->is_sign_in = $this->gnc_admin_authen->is_sign_in();
            $this->gnc_admin_authen->redirect_if_not_sign_in();
            // Init

        }
        
        function home(){
            /*
             *  Load admin home page
             */
            
            // Get project count
            $project_count = $this->Project->get_all_project_count();
            
            // Get member count
            $member_count = $this->Member->get_member_count($this->Member_type->member_normal_id);
            $farmer_count = $this->Member->get_member_count($this->Member_type->member_farmer_id);
            
            // Get farm count
            $farm_count = $this->Farm->get_all_farm_count();
            
            // Get follow count
            $follow_count = $this->Follow->get_all_follow_count();
            
            // Get conversation count
            $conversation_count = $this->Conversation->get_all_conversation_count();

            // Set view data
            $data = array();
            $data['page'] = 'main';
            $data['project_count'] = $project_count;
            $data['member_count'] = $member_count;
            $data['farmer_count'] = $farmer_count;
            $data['farm_count'] = $farm_count;
            $data['follow_count'] = $follow_count;
            $data['conversation_count'] = $conversation_count;
            
            // Load view
            $this->load->view('back/index', $data);
            
        }
        
        
    }