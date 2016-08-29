<?php
    // On start
    class Test_project_type extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            $this->load->helper('test/test_helper');
            
            // Load library
            
            // Do filter
            
        }
        
        function test_project_type(){
            $this->load->model('Project_type');
            $project_type_array = $this->Project_type->get_all();
            
        }
        
        function project_count(){
            $pt = $this->Project_type->get_project_type_with_count_project(0, 'array');
            echo var_dump($this->db->last_query())."<br/>";
            print_assoc($pt);
        }
        
        
    }