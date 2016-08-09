<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Test_session extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            $this->load->helper('test/test_helper');
            
            // Load library
            
            // Load model
            
            // Do filter
            
        }
        
        function index(){
            
            $data = $this->session->userdata();
            
            print_assoc($data);
            
        }
        
        
    }