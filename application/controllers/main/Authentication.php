<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Authentication extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('form_validation');
            
            // Load model
            
            // Do filter
            
        }
        
        function authen(){
            /*
             *  Authentication function
             *  
             */
            // Set up form validation
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required|regex_match[/[a-zA-Z0-9!@#$%&.,:*\-\]\[\/]/]|min_length[8]');
            $this->form_validation->set_rules('remember_sign_in', 'remember_sign_in');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                echo 0;
                return;
            }
            
            // Get post values
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $remember_sign_in = $this->input->post('remember_sign_in');
            
            // Authen member
            // Authen secure
            //--------------
            
            // Check authen member
            $member = $this->Member->member_authentication($email, $password);
            if($member == NULL){
                echo 0;
                return FALSE;
            }
            
            // Set session
            $member_session_data = array();
            $member_session_data = $member;
            $this->session->set_userdata($member_session_data);
            
            // If remember sign in
            
            // Authen success
            echo 1;
            
        }
        
        function sign_out(){
            /*
             *  Sign out function
             *  clear session data
             *  
             */
            
            // Filter is logged in
            
            // Get session keys
            $member = $this->session->userdata();
            $session_keys = array_keys($member);
            
            // Clear session
            $this->session->unset_userdata($session_keys);
            
            // Destroy session
            $this->session->sess_destroy();
            
            // Redirect
            redirect('/main/');
        }
        
        
        
    }