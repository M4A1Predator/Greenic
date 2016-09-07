<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Member_set extends MY_Controller{
        
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
        
        function member_list_page(){
            /*
             *  Display member list page
             *  
             */
            
            // Get data
            $page_number = $this->input->get('page_number');
            
            // Get member type bt URI fragment
            $member_type_name = $this->uri->segment(3);
            
            // Set member type id
            $member_type_id = 1;
            $page = 'memberBasic';
            if($member_type_name == $this->Member_type->member_farmer){
                $member_type_id = $this->Member_type->member_farmer_id;
                $page = 'memberFarmer';
            }else if($member_type_name == $this->Member_type->member_normal){
                $member_type_id = $this->Member_type->member_normal_id;
                $page = 'memberBasic';
            }else{
                return;
            }
            
            // Set page name
            $data = array();
            $data['page'] = $page;
            
            // Get members
            $where_assoc = array();
            $where_assoc['member_type_id'] = $member_type_id;
            
            // Filter normal members 
            if($member_type_name == $this->Member_type->member_normal){
                
                
            }else if($member_type_name == $this->Member_type->member_farmer){
                // Filter farmer members
            }
            
            $members = $this->Member->get_filter('*', $where_assoc, null, null, null, null, 'object');
            
            
            $data['members'] = $members;
            
            // Load view
            $this->load->view('back/index', $data);
            
        }
        
        
    }