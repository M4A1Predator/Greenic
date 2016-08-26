<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Project_post_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('form_validation');
            
            // Load model
            
            // Do filter
            
            // Init
        }
        
        function add_project_post_ajax(){
            /*
             *  Add project post
             *  this function response to ajax
             *
             */
            
            // Create form rules
            $this->form_validation->set_rules('project_id', 'project_id', 'required|numeric');
            $this->form_validation->set_rules('post_caption', 'post_caption', 'required|trim');
            $this->form_validation->set_rules('post_detail', 'post_detail', 'required|trim');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                echo 0;
                return;
            }
            
            // Check image
            $image_field = 'post_image';
            if(!array_key_exists($image_field, $_FILES)){
                echo 'no image';
                return;
            }
            
            // Check file type
            $post_image_ext = pathinfo($_FILES[$image_field]['name'], PATHINFO_EXTENSION);
            $post_image_type = $_FILES[$image_field]['type'];
            // File muse be image
            if(strpos($post_image_type, 'image') !== 0){
                echo 'type error';
                return;
            }
            
            // Get data
            $project_id = $this->input->post('project_id');
            $post_caption = $this->input->post('post_caption');
            $post_detail = $this->input->post('post_detail');
            $post_image = $_FILES[$image_field];
            
            // Upload image
            echo var_dump($post_image);
            echo var_dump(getimagesize($post_image['tmp_name']));
            return ;
            
            // Add post data
            //$added_post_id = $this->Project_post->add_project_post($project_id, $post_caption, $post_detail);
            
        }
        
        
    }