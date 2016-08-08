<?php
    // On start
    class Test_member extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            $this->load->helper('test/test_helper');
            
            // Load library
            $this->load->library('email');
            
            // Load model
            
            // Do filter
            
        }
        
        function add_admin(){
            
            $name = 'แอดมิน';
            $admin_name = 'admin_01';
            $email = 'a1@gnc.com';
            $password = 'zxczxc';
            
            $added_admin = $this->Member->add_admin($name, $admin_name, $email, $password);
            echo var_dump($this->db->error());
            
            echo var_dump($added_admin);
        }
        
        function add_member(){
            $name = 'นาย ก';
            $email = 'm1@gnc.com';
            $password = 'zxczxc zx';
            
            //$this->db->trans_start(TRUE);
            $added_member = $this->Member->add_member($name, $email, $password);
            echo var_dump($this->db->error());
            //$this->db->trans_complete();
            
            $this->send_confirm_email($added_member);
        }
        
        function crypt(){
            $password = 'mlg360noscope';
            $salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
            $hash_password = password_hash($password, PASSWORD_DEFAULT, array('cost' => 12));
            echo strlen($hash_password).' : '.$hash_password.'<br/>';
            
            $hash_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
            echo strlen($hash_password).' : '.$hash_password.'<br/>';
            
            echo 'Re-hash'.'<br/>';
            
            $rehash = password_needs_rehash($hash_password, PASSWORD_DEFAULT, ['cost' => 12]);
            echo $rehash;
        }
        
        function random_string(){
            $random = mcrypt_create_iv(64, MCRYPT_DEV_URANDOM);
            echo $random.'<br/>';
            
            $random2 = openssl_random_pseudo_bytes(22);
            echo gettype($random2).'<br/>';
            echo $random2.'<br/>';
            echo hash('sha256', $random);
        }
        
        function login(){
            
            //$email = 'a1@gnc.com';
            $email = 'm1@gnc.com';
            $password = 'zxczxc';
            
            $member = $this->Member->member_authentication($email, $password);
            print_assoc($member);

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
        
        function get_time(){
            $date = date('Y-m-d H:i:s');
            echo $date;
        }
        
        
    }