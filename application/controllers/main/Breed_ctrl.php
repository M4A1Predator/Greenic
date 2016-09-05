<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Breed_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function add_breed_member_ajax(){
            /*
             *  Add subcategory(Breed)
             *  
             */
            
            if($this->is_sign_in == FALSE){
                return;
            }
            $member_id = $this->session->userdata('member_id');
            
            // Get project type id and category name
            $category_id = $this->input->post('category_id');
            $breed_name = $this->input->post('breed_name');
            
            // trim space
            $breed_name = $breed_name.trim(' ');
            
            // Prepare new category data
            $breed_data = array();
            $breed_data['breed_category_id'] = $category_id;
            $breed_data['breed_name'] = $breed_name;
            $breed_data['breed_creator_id'] = $member_id;
            
            // Add category
            $add_result = $this->Breed->add($breed_data);
            
            if($add_result == FALSE){
                //echo var_dump($this->db->error());
                echo 0;
                return;
            }
            
            echo 1;
            
        }
        
        function get_breeds_ajax(){
            /*
             *  Get breed array
             */
            
            // Get data
            $category_id = $this->input->get('category_id');
            
            // Set filter
            $where_assoc = array();
            $where_assoc['breed_category_id'] = $category_id;
            
            // Get breeds
            $breed_arr = $this->Breed->get_filter('*', $where_assoc);
            $breed_count = $this->Breed->get_filter_count('*', $where_assoc);
            
            // JSON encode
            //$breed_arr_json = json_encode($breed_arr, JSON_UNESCAPED_UNICODE);
            
            // Set data
            $data['result'] = $breed_arr;
            $data['count'] = $breed_count;
            
            // JSON encode
            $data_json = json_encode($data, JSON_UNESCAPED_UNICODE);
            
            // Output 
            $this->output->set_output($data_json);
            
        }
        
        
    }