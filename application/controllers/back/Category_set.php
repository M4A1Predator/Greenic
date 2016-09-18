<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Category_set extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function all_project_type_page(){
            
            // get page
            $page = $this->uri->segment(3);
            $data['page'] = $page;
            
            // Get project types
            $project_types = $this->Project_type->get_project_type_with_count_project_admin();
            
            $all_project_count = 0;
            foreach($project_types as $pt){
                $all_project_count += (int)$pt->project_count;
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
            
            // get projects
            $where_assoc = array();
            if($pt_id){
                $where_assoc['category_project_type_id'] = $pt_id;
            }
            
            $join_project = $this->gnc_query->get_join_table_assoc('project', 'project.project_category_id = category.category_id');
            $select = '*, count(project_id) as project_count';
            $categories = $this->Category->get_filter($select, $where_assoc, [$join_project], null, null, null, 'object', array('group_by' => 'category_id'));
            
            // Set data
            $data['project_type_id'] = $pt_id;
            $data['categories'] = $categories;
            
            // Load view
            $this->load->view('back/index', $data);
            ob_flush();
            
        }
        
        
    }