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
            if(!$page_number){
                $page_number = 1;
            }
            $limit = 20;
            
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
            
            // Set filter data
            $filter_assoc = array();
            $filter_assoc['offset'] = 0;
            $filter_assoc['limit'] = null;
            
            // Filter normal members 
            if($member_type_name == $this->Member_type->member_normal){
                $member_data = $this->Member->get_member_normal_data_list_admin($filter_assoc);
            // Filter farmer members
            }else if($member_type_name == $this->Member_type->member_farmer){
                $member_data = $this->Member->get_member_farmer_data_list_admin($filter_assoc);
            }
            
            $data['members'] = $member_data['result'];
            $data['member_count'] = $member_data['count'];
            $data['page_number'] = $page_number;
            $data['limit'] = $limit;
            
            // Load view
            $this->load->view('back/index', $data);
            
        }
        
        
    
    
    }