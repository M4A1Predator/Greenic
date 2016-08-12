<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Category_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function get_categories_ajax(){
            /*
             *  Get categories
             *  to be used by ajax
             *  
             */
            
            // Get project type id
            $project_type_id = $this->input->post('project_type_id');
            
            // Get categories
            $where_assoc = array();
            $where_assoc['category_project_type_id'] = $project_type_id;
            $category_arr = $this->Category->get_filter('*', $where_assoc, null, null, 0, null, 'array');
            
            // JSON encode
            $category_arr_json = json_encode($category_arr, JSON_UNESCAPED_UNICODE);
            
            echo $category_arr_json;
            
        }
        
        function add_category_member_ajax(){
            /*
             *  Add category by member
             *
             */
            
            // Get project type id and category name
            $project_type_id = $this->input->post('project_type_id');
            $category_name = $this->input->post('category_name');
            // trim space
            $category_name = $category_name.trim(' ');
            
            // Prepare new category data
            $category_data = array();
            $category_data['category_project_type_id'] = $project_type_id;
            $category_data['category_name'] = $category_name;
            
            // Add category
            $add_result = $this->Category->add($category_data);
            
            if($add_result == FALSE){
                echo 0;
                return;
            }
            
            echo 1;
        }
        
        
    }