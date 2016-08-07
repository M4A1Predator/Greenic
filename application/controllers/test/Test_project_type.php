<?php
    // On start
    class Test_project_type extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Do filter
            
        }
        
        function test_project_type(){
            $this->load->model('Project_type');
            $project_type_array = $this->Project_type->get_all();
            

        }
        
        
    }