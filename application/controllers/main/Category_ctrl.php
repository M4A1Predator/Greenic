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
        
        function view_category_page($project_type_name){
            /*
             *  Load category project type page
             *
             *  @param  string  project type name
             *  
             */
            
            // Prepare data
            $data_assoc = array();
            $data_assoc['project_type_name'] = $project_type_name;
            
            // Get project type id
            $project_type_id = $this->Project_type->get_project_type_id_by_name($project_type_name);
            
            // Set project type id
            $data_assoc['project_type_id'] = $project_type_id;
            
            // Load view
            $this->load->view('main/category', $data_assoc);
            
        }
        
        function get_categories_ajax(){
            /*
             *  Get categories
             *  to be used by ajax
             *  
             */
            
            // Get project type id
            // Check request type
            if($this->request_type == 'POST'){
                $project_type_id = $this->input->post('project_type_id');
            }else if($this->request_type == 'GET'){
                $project_type_id = $this->input->get('project_type_id');
            }
            
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
        
        function get_last_projects_ajax(){
            /*
             *  Get projects by category
             *
             */
            
            // Get data
            $project_type_id = $this->input->get('project_type_id');
            $limit = $this->input->get('limit');
            
            // Set where
            $where_assoc = array();
            $where_assoc['project_status_id'] = $this->Status->status_normal_id;
            $where_assoc['category_project_type_id'] = $project_type_id;
            
            // Get projects
            // Set order by
            $order_by = 'project_time DESC';
            
            // Get projects
            $project_arr = $this->Project->get_filter('*', $where_assoc, null, $order_by, null, $limit, 'array', array('use_view' => TRUE));
            
            // JSON encode
            $project_arr_json = json_encode($project_arr, JSON_UNESCAPED_UNICODE);
            
            //echo $project_arr_json;
            $this->output->set_output($project_arr_json);
            
        }
        
        function get_popular_projects_ajax(){
            /*
             *  Get popular projects
             *  Sort by views and date
             *
             */
            
            // Get data
            $project_type_id = $this->input->get('project_type_id');
            $limit = $this->input->get('limit');
            
            // Get highest view project
            // Set where
            $where_assoc = array();
            $where_assoc['project_status_id'] = $this->Status->status_normal_id;
            $where_assoc['category_project_type_id'] = $project_type_id;
            
            // Set order
            $order_by = 'project_view DESC';
            
            // Get projects
            $project_arr = $this->Project->get_filter('*', $where_assoc, null, $order_by, null, $limit, 'array', array('use_view' => TRUE));
            
            // JSON encode
            $project_arr_json = json_encode($project_arr, JSON_UNESCAPED_UNICODE);
            
            //echo $project_arr_json;
            $this->output->set_output($project_arr_json);
            
        }
        
        
    }