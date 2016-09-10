<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Authentication extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('form_validation');
            $this->load->library('GNC_image');
            
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
            
            // Fitler data
            // Set defaults image if member doesn't have image profile
            if(!$member_session_data['member_img_path']){
                //$member_session_data['member_img_path'] = $this->gnc_image->default_member_img_path;
                $member_session_data['member_img_path'] = get_default_member_image_path();
            }
            
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
            
            // If use facebook then sign out facebook
            //if($this->session->userdata('facebook_sign_in') && $this->session->userdata('facebook_sign_in') === TRUE){
            //    redirect($this->facebook->logout_url());
            //    return;
            //}
            
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
        
        function facebook_sign_in(){
            /*
             *  Sign in with facebook
             *
             */
            
            //echo 'Facebook test <br/>';
            //return;
            
            $data['facebook_user'] = array();

            // Check if user is logged in
            if ($this->facebook->is_authenticated()){
                // User logged in, get user details
                $facebook_user = $this->facebook->request('get', '/me?fields=id,name,email');
                if (isset($facebook_user['error']))
                {
                    echo var_dump($facebook_user['error']);
                    return;
                }
                $data['facebook_user'] = $facebook_user;
                
                // Authen
                $member = $this->Member->authen_by_facebook($facebook_user['id']);
                
                if(!$member){
                    
                    // Add member if member haven't regis
                    $add_result = $this->Member->add_member_from_facebook($facebook_user);
                    
                    if(!$add_result){
                        return;
                    }
                    redirect($this->facebook->login_url());
                    return;
                }
                
                // Set session
                $member_session_data = array();
                $member_session_data = $member;
                
                // Fitler data
                // Set defaults image if member doesn't have image profile
                if(!$member_session_data['member_img_path']){
                    $member_session_data['member_img_path'] = get_default_member_image_path();
                }
                $member_session_data['facebook_sign_in'] = TRUE;
                $this->session->set_userdata($member_session_data);
                echo var_dump($member_session_data);
                echo 'Sign in success';
                redirect('/main/');
                return; 
            }
            echo 'Non login';
            // display view
            //$this->load->view('examples/web', $data);
            
        }
        
        function facebook_sign_out(){
            $this->facebook->destroy_session();
            $this->session->sess_destroy();
            redirect('/main/');
        }
        
    }