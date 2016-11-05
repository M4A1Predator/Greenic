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
        
        function view_project_type_page($project_type_name){
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
        
        function view_category_page(){
            /*
             *  Display category page
             *  set up data to use in category page
             *
             */
            
            // Get project type id
            $project_type_name = $this->uri->segment(2);
            $project_type_id = $this->Project_type->get_project_type_id_by_name($project_type_name);
            $category_id = $this->uri->segment(3);
            $sub_category_id = $this->uri->segment(4, '');
            
            // Prepare data
            $data_assoc = array();
            $data_assoc['project_type_name'] = $project_type_name;
            $data_assoc['project_type_id'] = $project_type_id;
            $data_assoc['category_id'] = $category_id;
            $data_assoc['subcategory'] = $sub_category_id;
            
            // Load view
            $this->load->view('main/subCategory', $data_assoc);
            
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
            $member_id = $this->session->userdata('member_id');
            
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
            $category_data['category_creator_id'] = $member_id;
            
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
            $where_assoc['member_status_id'] = $this->Status->status_normal_id;
            
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
            $where_assoc['member_status_id'] = $this->Status->status_normal_id;
            
            // Set order
            $order_by = 'project_view DESC';
            
            // Get projects
            $project_arr = $this->Project->get_filter('*', $where_assoc, null, $order_by, null, $limit, 'array', array('use_view' => TRUE));
            
            // JSON encode
            $project_arr_json = json_encode($project_arr, JSON_UNESCAPED_UNICODE);
            
            //echo $project_arr_json;
            $this->output->set_output($project_arr_json);
            
        }
        
        
    
        function get_projects_ajax(){
            /*
             *  Get projects by catgory
             *
             */
            
            // Get data
            $limit = $this->input->get('limit');
            $offset = $this->input->get('offset');
            $category_id = $this->input->get('category_id');
            $breed_id = $this->input->get('breed_id');
            $order_type = $this->input->get('order_type');
            $province = $this->input->get('project_province');
            $district = $this->input->get('project_district');
            
            if(!$order_type){
                $order_type = 0;
            }else{
                $order_type = (int)$order_type;
            }
        
            
            // Set where clause
            $filter_assoc = array();
            $filter_assoc['limit'] = $limit;
            $filter_assoc['offset'] = $offset;
            
            if($category_id){
                $filter_assoc['category_id'] = $category_id;
            }
            
            // Set order
            $order_by = 'project_time DESC';
            switch($order_type){
                case 0: $order_by = 'project_time DESC';
                        break;
                case 1: $order_by = 'project_ppu ASC';
                        break;
                case 2: $order_by = 'project_ppu DESC';
                        break;
                case 3: $order_by = 'project_view DESC';
                        break;
                case 4: break;
            }
            
            //$filter_assoc['order_by'] = $order_by;
            
            // Get projects from DB
            //$project_data = $this->Project->get_project_by_category($filter_assoc, 'array');
            //$project_arr = $project_data['result'];
            //$project_count = $project_data['count'];
            // Set where clause
            $where_assoc = array();
            $where_assoc['project_status_id'] = $this->Status->status_normal_id;
            $where_assoc['member_status_id'] = $this->Status->status_normal_id;
            $where_assoc['category_id'] = $category_id;
            if($breed_id){
                $where_assoc['breed_id'] = $breed_id;
            }
            if($province){
                $where_assoc['farm_province'] = $province;
            }
            if($district){
                $where_assoc['farm_district'] = $district;
            }
            // Get project data and amount
            $project_arr = $this->Project->get_filter('*', $where_assoc, null, $order_by, $offset, $limit, 'array', array('use_view' => TRUE));
            $project_count = $this->Project->get_filter_count('*', $where_assoc, null, $order_by, null, null, 'array', array('use_view' => TRUE));
            
            // Set data
            $data['result'] = $project_arr;
            $data['count'] = $project_count;
            
            // Encode JSON
            $data_json = json_encode($data, JSON_UNESCAPED_UNICODE);
            
            $this->output->set_output($data_json);
        }
    
    
        function get_filter_categories_ajax(){
            /*
             *  Get categories from DB
             *
             */
            
            // Get data
            $project_type_id = $this->input->get('project_type_id');
            $limit = $this->input->get('limit');
            $offset = $this->input->get('offset');
            
            // Set where
            $where_assoc = array();
            if($project_type_id){
                $where_assoc['category_project_type_id'] = $project_type_id;
            }
            
            // Set filter assoc
            $filter_assoc = array();
            $filter_assoc['limit'] = $limit;
            $filter_assoc['offset'] = $offset;
            
            // Get data
            //$category_arr = $this->Category->get_filter('*', $where_assoc, null, null, null, null, 'array');
            $category_arr = $this->Category->get_category_data($project_type_id, $filter_assoc, 'array');
            
            // JSON encode
            $category_arr_json = json_encode($category_arr, JSON_UNESCAPED_UNICODE);
            
            // Set output 
            $this->output->set_output($category_arr_json);
            
        }
        
        function get_top_categories_ajax(){
            /*
             *  Get top categories
             *
             */
            
            // Get data
            $limit = $this->input->get('limit');
            
            // Get categories
            // Set filter assoc
            $filter_assoc = array();
            $filter_assoc['limit'] = $limit;
            //$filter_assoc['order_by'] = '';
            
            $category_arr = $this->Category->get_category_data(null, $filter_assoc, 'array');
            
            // JSON encode
            $category_arr_json = json_encode($category_arr, JSON_UNESCAPED_UNICODE);
            
            $this->output->set_output($category_arr_json);
        }
        
        
    }