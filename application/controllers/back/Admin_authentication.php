<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Admin_authentication extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('GNC_admin_authen');
            $this->load->library('form_validation');
            
            // Load model
            $this->load->model('Admin');
            
            // Do filter
            $this->is_sign_in = $this->gnc_admin_authen->is_sign_in();
            
            // Init
            
        }
        
        function sign_in_page(){
            /*
             *  Load login page
             *
             */
            
            // Load view
            $this->load->view('back/login');
            
        }
        
        function sign_in_pro_ajax(){
            /*
             *  Process admin sign in
             *
             */
            $this->form_validation->set_rules('username', 'username', 'required|alpha_dash');
            $this->form_validation->set_rules('password', 'password', 'required|regex_match[/[a-zA-Z0-9!@#$%&.,:*\-\]\[\/]/]');
            
            // Check form
            if($this->form_validation->run() == FALSE){
                echo '{"error": "invalid input"}';
                return;
            }
            
            // Get data
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            // Call authen function
            $admin = $this->Admin->admin_authentication($username, $password);
            
            if(!$admin){
                echo '{"error": "Wrong username or password"}';
                return;
            }
            
            // Prepare data
            $admin_session_data = $admin;
            
            // Clear session first
            //$this->session->sess_destroy();
            
            // Set session data
            $this->session->set_userdata($admin_session_data);
            
            echo 1;
            
        }
        
        function sign_out_pro(){
            /*
             *  Sign out function
             *  clear session data
             *  
             */
            
            // Filter is logged in
            
            // Get session keys
            $admin_data = $this->session->userdata();
            $session_keys = array_keys($admin_data);
            
            // Clear session
            $this->session->unset_userdata($session_keys);
            
            // Destroy session
            $this->session->sess_destroy();
            
            // Redirect
            redirect('/gnc_admin/');
        }
        
        function test(){
            $admin = $this->Admin->admin_authentication('admin_01', 'zxczxc');
            echo var_dump($admin);
            echo var_dump($this->session->userdata());
            
        }
        
        
    }