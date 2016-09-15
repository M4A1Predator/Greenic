<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Search extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function index(){
            echo 'test';
        }
        
        function search_result_page(){
            /*
             *  Load search project result page
             *  and display projects
             *
             */
            
            $this->load->view('main/search');
            
        }
        
        function search_projects_ajax(){
            
            // Get data
            $keyword = $this->input->get('keyword');
            $limit = $this->input->get('limit');
            $offset = $this->input->get('offset');
            $order_type = $this->input->get('order_type');
            $province = $this->input->get('project_province');
            $district = $this->input->get('project_district');
            
            // Filter data
            if(!$order_type){
                $order_type = 0;
            }else{
                $order_type = (int)$order_type;
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
            
            $filter_assoc = array();
            $filter_assoc['limit'] = $limit;
            $filter_assoc['offset'] = $offset;
            $filter_assoc['order_by'] = $order_by;
            
            // Filter filter data
            if($province){
                $filter_assoc['farm_province'] = $province;
            }
            if($district){
                $filter_assoc['farm_district'] = $district;
            }
            
            // Get projects
            $project_data = $this->Project->get_search_projects($keyword, $filter_assoc, 'array');
            
            //$project_arr = $project_data['result'];
            //$project_count = $project_data['count'];
            
            // Encode json
            $project_data_json = json_encode($project_data, JSON_UNESCAPED_UNICODE);
            
            $this->output->set_output($project_data_json);
            
            
        }
        
        
    }