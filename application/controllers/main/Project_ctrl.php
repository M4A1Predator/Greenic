<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    ob_start();
    class Project_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('form_validation');
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function add_project_page(){
            /*
             *  Load add project page
             */
            
            // Get step from uri
            $step = $this->uri->segment(2, 'step1');
            
            // Prepare data
            $data_assoc = array();
            $data_assoc['step'] = $step;
            
            // Check step and load data
            if($step == 'step1'){
                
                // Load project types
                $project_type_arr = $this->Project_type->get_filter();
                
                // Set data
                $data_assoc['project_type_arr'] = $project_type_arr;
                
            }else if($step == 'step2'){
                
            }

            // Load view
            $this->load->view('main/addProject', $data_assoc);
            // flush
            ob_flush();
            
        }
        
        function add_project_step1_ajax(){
            /*
             *  Process add project step1 data
             *  keep data into session
             *  
             */
            
            // Set form rules
            $this->form_validation->set_rules('type_id', 'type_id', 'required|numeric');
            $this->form_validation->set_rules('category_id', 'category_id', 'required|numeric');
            $this->form_validation->set_rules('farm_id', 'farm_id', 'required|numeric');
            $this->form_validation->set_rules('project_name', 'project_name', 'required');
            $this->form_validation->set_rules('project_detail', 'project_detail', 'required');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                echo 0;
                return;
            }
            
            // Get values
            $project_name = $this->input->post('project_name');
            $project_type_id = $this->input->post('type_id');
            $category_id = $this->input->post('category_id');
            $farm_id = $this->input->post('farm_id');
            $project_detail = $this->input->post('project_detail');
            
            // Check data
            
            // Set project data to session
            $step1_data = array();
            $step1_data['add_project_name'] = $project_name;
            $step1_data['add_project_type_id'] = $project_type_id;
            $step1_data['add_project_category_id'] = $category_id;
            $step1_data['add_project_farm_id'] = $farm_id;
            $step1_data['add_project_detail'] = $project_detail;
            
            // Set as flash data
            $this->session->set_flashdata($step1_data);
            
            //echo var_dump($this->session->flashdata());
            echo 1;
        
        }
        
        
    }