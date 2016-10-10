<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Breed_set extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function category_breed_page(){
            
            $data = array();
            $data['page'] = 'allBreed';
            
            // Get data
            $category_id = $this->uri->segment(3);
            
            // Get category
            $where_assoc = array();
            $where_assoc['category_id'] = $category_id;
            $category = $this->Category->get_filter_single('*', $where_assoc);
            if(!$category){
                redirect('/');
                return;
            }
            
            // Get breeds
            $where_assoc = array();
            $where_assoc['breed_category_id'] = $category_id;
            $join_project = $this->gnc_query->get_join_table_assoc('project', 'project.project_breed_id = breed.breed_id', 'left');
            $extra = array(
                        'group_by' => 'breed_id'
                    );
            $breeds = $this->Breed->get_filter('*, count(project_id) as project_count', $where_assoc, [$join_project], null, null, null, 'object', $extra);
            
            // Set data
            $data['category'] = $category;
            $data['breeds'] = $breeds;
            
            $this->load->view('back/index', $data);
            ob_flush();
            
        }
        
        function edit_breed_page(){
            
            $breed_id = $this->uri->segment(5);
            
            $where_assoc = array();
            $where_assoc['breed_id'] = $breed_id;
            $join_category = $this->gnc_query->get_join_table_assoc('category_view', 'category_view.category_id = breed.breed_category_id');
            $breeds = $this->Breed->get_filter('*', $where_assoc, [$join_category]);
            
            if(!$breeds){
                return;
            }
            
            $breed = $breeds[0];
            
            $data = array();
            $data['page'] = 'editBreed';
            $data['breed'] = $breed;
            
            $this->load->view('back/index', $data);
            ob_flush();
        }
        
        function edit_breed_ajax(){
            
            $breed_id = $this->uri->segment(5);
            
            // Get data
            $breed_name = $this->input->post('breed_name');
            
            // Update
            $where_assoc = array();
            $where_assoc['breed_id'] = $breed_id;
            
            $breed_data = array();
            $breed_data['breed_name'] = $breed_name;
            
            $result = $this->Breed->update($where_assoc, $breed_data);
            if(!$result){
                $err_assoc = array('err'=>'update failed');
                echo json_encode($err_assoc);
                return;
            }
            
            echo 1;
            
        }
        
        function add_breed_page(){
            
            // Get data
            $category_id = $this->uri->segment(3);
            
            // Get category
            $where_assoc = array();
            $where_assoc['category_id'] = $category_id;
            $category = $this->Category->get_filter_single('*', $where_assoc);
            if(!$category){
                redirect('/');
                return;
            }
            
            $data = array();
            $data['page'] = 'addBreed';
            $data['category'] = $category;
            
            $this->load->view('back/index', $data);
            ob_flush();
        }
        
        function add_breed_ajax(){
            
            // Get data
            $category_id = $this->uri->segment(3);
            $member_id = $this->session->userdata('member_id');
            
            $breed_name = $this->input->post('breed_name');
            
            
            
            // Add breed
            $breed_data = array();
            $breed_data['breed_name'] = $breed_name;
            $breed_data['breed_category_id'] = $category_id;
            $breed_data['breed_creator_id'] = $member_id;
            
            // Check data
            $is_dup = $this->Breed->is_dup($breed_data);
            if($is_dup === TRUE){
                $err_assoc = array('err'=>'duplicated');
                echo json_encode($err_assoc);
                return;
            }
            
            $result = $this->Breed->add($breed_data);
            if(!$result){
                $err_assoc = array('err'=>'update failed');
                echo json_encode($err_assoc);
                return;
            }
            
            echo 1;
            
        }
        
        
    }