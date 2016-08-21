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
            // Category must not have master category
            $where_assoc['category_master_id'] = NULL;
            $category_arr = $this->Category->get_filter('*', $where_assoc, null, null, 0, null, 'array');
            
            // JSON encode
            $category_arr_json = json_encode($category_arr, JSON_UNESCAPED_UNICODE);
            
            echo $category_arr_json;
            
        }
        
        function get_sub_categories_ajax($category_master_id){
            /*
             *  Get sub categoryies by master category id
             *  to be used by Ajax
             *
             *  @param  int     project type id
             *  @param  int     master category id
             *  
             */
            // Get sub catagories
            $where_assoc = array();
            //$where_assoc['category_type_id'] = $type_id;
            $where_assoc['category_master_id'] = $category_master_id;
            
            $category_arr = $this->Category->get_filter('*', $where_assoc, null, null, 0, null, 'array');
            
            //JSON encode
            $category_arr_json = json_encode($category_arr, JSON_UNESCAPED_UNICODE);
            
            echo $category_arr_json;
        }
        
        function add_category_member_ajax(){
            /*
             *  Add category by member
             *
             */
            if($this->gnc_authen->is_sign_in() == FALSE){
                return;
            }
            
            // Get project type id and category name
            $project_type_id = $this->input->post('project_type_id');
            $category_master_id = $this->input->post('category_master_id');
            $category_name = $this->input->post('category_name');
            // trim space
            $category_name = $category_name.trim(' ');
            
            // Prepare new category data
            $category_data = array();
            $category_data['category_project_type_id'] = $project_type_id;
            $category_data['category_name'] = $category_name;
            // If this is sub category
            if($category_master_id){
                $category_data['category_master_id'] = $category_master_id;
            }
            
            // Add category
            $add_result = $this->Category->add($category_data);
            
            if($add_result == FALSE){
                echo 0;
                return;
            }
            
            echo 1;
        }
        
        
    }