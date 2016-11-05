<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Test_general extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('GNC_image');
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function test(){
            //$n = $this->Product_shipment->get_product_shipment_by_project_id(18);
            //echo json_encode($n, JSON_UNESCAPED_UNICODE);
            //echo var_dump($this->session->userdata('rekt'));
            //echo $this->input->server('REQUEST_METHOD');
            //echo var_dump($this->is_sign_in);
            
            //echo $this->gnc_image->default_member_img_path;
            //echo date('Y-m-d H:i:s', time());
            //echo var_dump($this->session->userdata('member_id'));
            //echo var_dump($_SESSION);
            
            echo $this->Member->hash_new_password('zxczxczxc');
        }
        
        function fb(){
            if(!$this->facebook->is_authenticated()){
                echo $this->facebook->login_url();

            }else{
                //echo $this->facebook->logout_url().'<br/>';
                echo $this->facebook->login_url().'<br/>';
                echo 'Log in';
                echo '<br/><hr/>';
                
                echo $this->facebook->logout_url().'<br/>';
                
                
            }
            
        }
        
        function test_email(){
            $this->load->library('email');
            
            $content = 'test';
            
            // Prepare email
            $from = $this->config->item('smtp_user');
            $from = 'greenicwork@gmail.com';
            //$to = 'tssniper3@gmail.com';
            //$to = 'tssniper3@greenic.co';
            $to = 'tssniper3@gmail.com';
            echo 'EMAIL TEST<br/>';
            echo var_dump($from).'<br/>';
            
            $this->email->set_newline("\r\n");
            $this->email->from($from, 'Greenic');
            $this->email->to($to);
            $this->email->subject('Please Confirm Greenic Account');
            $this->email->message($content);
            
            $send_result = $this->email->send();
            echo var_dump($send_result);
        }
        
        
    }