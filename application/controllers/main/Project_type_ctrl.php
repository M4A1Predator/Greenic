<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Project_type_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function get_project_types_with_count_ajax(){
            /*
             *  Get project type with counting projects
             */
            
            // Get data
            $project_type_id = $this->input->get('project_type_id');
            
            // If no input then set value = 0
            if(!$project_type_id){
                $project_type_id = 0;
            }
            
            // Get project types
            $project_type_arr = $this->Project_type->get_project_type_with_count_project($project_type_id, 'array');
            
            // JSON encode
            $project_type_arr_json = json_encode($project_type_arr);
            
            echo $project_type_arr_json;
            
        }
        
        
    }