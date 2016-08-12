<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    ob_start();
    class Project_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
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
                
            }

            // Load view
            $this->load->view('main/addProject', $data_assoc);
            // flush
            ob_flush();
            
        }
        
        function add_project_step1_pro(){
            /*
             *  Process add project step1 data
             *  keep data into session
             *  
             */
            
            // Set form rules
            
        }
        
        
    }