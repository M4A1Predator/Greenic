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
            
            // Get member type bt URI fragment
            $member_type_name = $this->uri->segment(3);
            
            // Set member type id
            $member_type_id = 1;
            if($member_type_name == $this->Member_type->member_farmer){
                $member_type_id = $this->Member_type->member_farmer_id;
            }else if($member_type_name == $this->Member_type->member_normal){
                $member_type_id = $this->Member_type->member_normal_id;
            }else{
                echo 'REKT';
                return;
            }
            
            // Load view
            $this->load->view('back/page/memberBasic');
            
        }
        
        
    }