<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Sign_up extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('email');
            $this->load->library('form_validation');
            
            // Load model
            
            // Do filter
            
        }
        
        function sign_up_pro(){
            /*
             *  Sign up
             *  Add member to database
             *  
             */
            
            // Set up form validation
            $this->form_validation->set_rules('fullname', 'fullname', 'required');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[member.member_email]');
            $this->form_validation->set_rules('password', 'password', 'required|regex_match[/[a-zA-Z0-9!@#$%&.,:*\-\]\[\/]/]|min_length[8]');
            
            // Prepare result assoc
            $result_assoc = array();
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                $error_assoc = array(
                                'status' => 'error',
                                'error' => form_error('email')
                            );
                $error_json = json_encode($error_assoc);
                
                $result_assoc['result'] = 0;
                $result_assoc['error'] = 'form error';
            }
            
            // Get input
            $fullname = $this->input->post('fullname');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            // Add member to database
            // Create member assoc
            $add_result = $this->Member->add_member($fullname, $email, $password);
            
            // get added member
            $added_member = $add_result;
            
            // Send confirm email
            $send_result = $this->send_confirm_email($added_member);
            
            // Check add result, success or not
            if($add_result == FALSE){
                $result_assoc['result'] = 0;
                $result_assoc['error'] = 'error';
            }else{
                $result_assoc['result'] = 0;
                $result_assoc['error'] = 'error';
            }
            
            // Build json
            $result_json = json_encode($result_assoc);
            
            // Response json
            echo $result_json;
        }
        
        function send_confirm_email($member){
            /*
             *  Generate content and send confirm email to user
             *
             *  @param  string  email
             *  @param  string  confirm token
             *  
             */
            
            // Set up url
            $confirm_url = 'http://greenic.co/verify_account/'.$member['member_id'].'/'.$member['member_token'];
            
            // Email content
            $content = 'Confirm account<br/>';
            $content .= 'Go to confirm link<br/>';
            $content .= '<a href="'.$confirm_url.'">'.$confirm_url.'</a>';
            
            // Prepare email
            $from = $this->config->item('smtp_user');
            $to = 'tssniper3@gmail.com';
            //$to = $member['member_email'];
            
            $this->email->set_newline("\r\n");
            $this->email->from($from, 'Greenic');
            $this->email->to($to);
            $this->email->subject('Please Confirm Greenic Account');
            $this->email->message($content);
            
            // sent email
            $send_result = $this->email->send();
            return $send_result;
        }
        
        function verify_account(){
            /*
             *  Verify account
             *  Check if token with member id was right
             *  then make account verified
             *  
             */
            
            // Get member id and token from URI
            $member_id = $this->uri->segment(2);
            $token = $this->uri->segment(3);
            
            // Get member token
            $where_assoc = array(
                            'member_id' => $member_id
                        );
            $member = $this->Member->get_filter_single('member_name, member_email, member_token', $where_assoc, null, 'array');
            if($member == FALSE){
                return;
            }
            
            // Check member token is not correct then redirect
            if($token != $member['member_token']){
                return;
            }
            
            // Add verify time
            // Get current datetime
            $current_datetime = date('Y-m-d H:i:s');
            
            // Set member update
            $where_assoc = array();
            $where_assoc['member_id'] = $member_id;
            
            // Prepare update data
            $update_assoc = array(  'member_verify_time' => $current_datetime,
                                    'member_token' => NULL
                                  );
            
            // Update member
            $update_result = $this->Member->update($where_assoc, $update_assoc);
            if($update_result == FALSE){
                return;
            }
            
            // redirect
            redirect('/main/');
            
        }
        
        function check_unique_email(){
            /*
             *  Check is email unique
             */
            
            // Set rule
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            
            // Check input
            if($this->form_validation->run() == FALSE){
                echo null;
                return;
            }
            
            // Prepare result assoc
            $result_assoc = array();
            
            // Get input
            $email = $this->input->post('email');
            
            // Check email by get member
            $where_assoc = array('member_email' => $email);
            $member_arr = $this->Member->get_filter('member_email', $where_assoc);
            
            // If get member means email have been used
            if($member_arr){
                $result_assoc['result'] = FALSE;
            }else{
                $result_assoc['result'] = TRUE;
            }
            
            // Transform to JSON
            $result_json = json_encode($result_assoc);
            echo $result_json;
            
        }
        
        
    }