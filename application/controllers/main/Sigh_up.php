<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Sigh_up extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('email');
            $this->load->library('form_validation');
            
            // Load model
            
            // Do filter
            
        }
        
        function sign_up(){
            /*
             *  Sign up
             *  Add member to database
             *  
             */
            
            // Set up form validation
            $this->form_validation->set_rules('fullname', 'fullname', 'required');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required|regex_match[/[a-zA-Z0-9!@#$%&.,:*\-\]\[\/]/]');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                return 0;
            }
            
            // Get input
            $fullname = $this->input->post('fullname');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            // Add member to database
            // Create member assoc
            $add_result = $this->Member->add_member($fullname, $email, $password);
            if($add_result == FALSE){
                return 0;
            }
            
            // After added, send confirm email
            $member_assoc = $add_result;
            
            
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
            $from = 'predatorkpop@gmail.com';
            $to = 'tssniper3@gmail.com';
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
        
        
    }