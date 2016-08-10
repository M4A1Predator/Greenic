<?php
    // On start
    class Test_directory extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            $this->load->helper('test/test_helper');
            
            // Load library
            $this->load->library('email');
            
            // Load model
            
            // Do filter
            
        }
        
        function index(){
            echo 'Test sub directory';
        }
    }