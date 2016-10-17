<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Category_set extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('GNC_admin_authen');
            
            // Load model
            
            // Do filter
            $this->is_sign_in = $this->gnc_admin_authen->is_sign_in();
            $this->gnc_admin_authen->redirect_if_not_sign_in();
            
            // Init
            
        }
        
        function all_project_type_page(){
            
            // get page
            $page = $this->uri->segment(3);
            $data['page'] = $page;
            
            // Get project types
            $project_types = $this->Project_type->get_project_type_with_count_category_admin();
            
            $all_project_count = 0;
            foreach($project_types as $pt){
                //$all_project_count += (int)$pt->project_count;
                $all_project_count += (int)$pt->category_count;
            }
            
            // Set data
            $data['project_types'] = $project_types;
            $data['all_project_count'] = $all_project_count;
            
            $this->load->view('back/index', $data);
            
        }
        
        function all_category_project_page(){
            
            // get page
            $data['page'] = 'allSpecies';
            
            // get data
            $pt_id = $this->uri->segment(3);
            
            $page_num = $this->input->get('p');
            if(!$page_num || !is_numeric($page_num)){
                $page_num = 1;
            }
            
            $limit = 20;
            $offset = ($limit * $page_num) - $limit;
            
            // get projects
            $where_assoc = array();
            if($pt_id){
                $where_assoc['category_project_type_id'] = $pt_id;
            }
            
            // Get category with project count
            $join_project = $this->gnc_query->get_join_table_assoc('project', 'project.project_category_id = category.category_id', 'left');
            $select = '*, count(project_id) as project_count';
            $categories = $this->Category->get_filter($select, $where_assoc, [$join_project], null, $offset, $limit, 'object', array('group_by' => 'category_id'));
            $category_count = $this->Category->get_filter_count($select, $where_assoc, [$join_project], null, $offset, $limit, 'object', array('group_by' => 'category_id'));
            
            // Get category with breed count
            $join_breed = $this->gnc_query->get_join_table_assoc('breed', 'breed.breed_category_id = category.category_id', 'left');
            $select = 'category_id, count(breed_id) as breed_count';
            $cat_breeds = $this->Category->get_filter($select, $where_assoc, [$join_breed], null, $offset, $limit, 'object', array('group_by' => 'category_id'));
            //echo var_dump($cat_breeds);
            //return;
            
            // Assign breed count to object
            foreach($categories as $k => $cat){
                $bc = $cat_breeds[$k]->breed_count;
                $categories[$k]->breed_count = $cat_breeds[$k]->breed_count;
            }
            
            $page_amount = get_page_amount($category_count, $limit);
            
            // Set data
            $data['project_type_id'] = $pt_id;
            $data['categories'] = $categories;
            $data['page_num'] = $page_num;
            $data['page_amount'] = $page_amount;
            
            // Load view
            $this->load->view('back/index', $data);
            ob_flush();
            
        }
        
        function edit_category_page(){
            $category_id = $this->uri->segment(3);
            
            // Get category
            $where_assoc = array();
            $where_assoc['category_id'] = $category_id;
            $category = $this->Category->get_filter_single('*', $where_assoc);
            if(!$category){
                redirect('/');
                return;
            }
            
            // Get type
            $where_assoc = array();
            $project_types = $this->Project_type->get_filter();
            
            $data = array();
            $data['page'] = 'editSpecies';
            $data['category'] = $category;
            $data['project_types'] = $project_types;
            
            // Load view
            $this->load->view('back/index', $data);
            ob_flush();
        }
        
        function edit_category_ajax(){
            
            // Get data
            $category_id = $this->uri->segment(3);
            
            $category_name = $this->input->post('category_name');
            $category_project_type_id = $this->input->post('category_project_type_id');
            
            $update_data = array();
            $update_data['category_name'] = $category_name;
            $update_data['category_project_type_id'] = $category_project_type_id;
            
            $where_assoc = array();
            $where_assoc['category_id'] = $category_id;
            
            // Update
            $result = $this->Category->update($where_assoc, $update_data);
            
            if(!$result){
                $err_assoc = array('err'=>'update failed');
                echo json_encode($err_assoc);
                return;
            }
            
            echo 1;
            
        }
        
        function add_category_page(){
            // Get type
            $where_assoc = array();
            $project_types = $this->Project_type->get_filter();
            
            // Set data
            $data = array();
            $data['page'] = 'addSpecies';
            $data['project_types'] = $project_types;
            
            // Load view
            $this->load->view('back/index', $data);
            ob_flush();
            
        }
        
        function add_category_ajax(){
            
            // Get data
            $category_name = $this->input->post('category_name');
            $category_project_type_id = $this->input->post('category_project_type_id');
            
            // Get member id
            $member_id = $this->session->userdata('member_id');
            
            $category_data = array();
            $category_data['category_name'] = $category_name;
            $category_data['category_project_type_id'] = $category_project_type_id;
            $category_data['category_creator_id'] = $member_id;
            
            // Check dup
            $is_dup = $this->Category->is_dup($category_data);
            if($is_dup === TRUE){
                $err_assoc = array('err'=>'duplicated');
                echo json_encode($err_assoc);
                return;
            }
            
            // Add
            $result = $this->Category->add($category_data);
            if(!$result){
                $err_assoc = array('err'=>'add failed');
                echo json_encode($err_assoc);
                return;
            }
            
            $data = array();
            $data['project_type_id'] = $category_project_type_id;
            
            $this->output->set_output(json_encode($data, JSON_UNESCAPED_UNICODE));
            
        }
        
        function is_dup(){
            $data = array();
            $data['category_name'] = 'กีวี';
            $is_dup = $this->Category->is_dup($data);
            echo var_dump($is_dup);
        }
    
    }