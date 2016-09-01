<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Test_io extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function index(){
            $this->load->view('test/index');
        }
        
        function notice(){
            $member_id = $this->session->userdata('member_id');
            
            // Get notification records
            $notification_arr = $this->Notification->get_notification_by_member_id($member_id, 'array');
            
            echo var_dump($notification_arr);
        }
        
        
    }