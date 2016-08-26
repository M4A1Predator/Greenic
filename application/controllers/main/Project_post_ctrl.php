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
            $this->form_validation->set_rules('post_detail', 'post_detail', 'trim');
            
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
            // Load library
            $this->load->library('image_lib');
            $this->load->library('upload');
            // Get generated unique id
            $uq_id = uniqid();
            $hash_uq_id = hash('sha1', $uq_id);
            // Generate file name
            $post_image_name = 'ppst_'.$project_id.'_'.$hash_uq_id.'.'.$post_image_ext;
            // Set file location
            $post_image_location = PROJECT_IMAGE_PATH.'posts/';
            $post_image_path = $post_image_location.$post_image_name;
            
            // Resize image
            $resize_config['image_library'] = 'gd2';
            $resize_config['source_image'] = $post_image['tmp_name'];
            $resize_config['create_thumb'] = FALSE;
            $resize_config['maintain_ratio'] = TRUE;
            $resize_config['width']         = 1000;
            $resize_config['height']       = 600;
            
            $this->image_lib->initialize($resize_config);
            $this->image_lib->resize();
            
            // Set upload image config
            $upload_config = array();
            $upload_config['upload_path'] = $post_image_location;
            $upload_config['allowed_types'] = 'gif|jpg|png|jpeg';
            $upload_config['remove_spaces'] = true;
            $upload_config['max_size']	= '4048';
            $upload_config['max_width']  = '2100';
            $upload_config['max_height']  = '2100';
            $upload_config['file_name'] = $post_image_name;
            $upload_config['overwrite'] = TRUE;
            $fieldname = $image_field;  //input tag name
            
            // Check upload result
            $this->upload->initialize($upload_config);
            if(!$this->upload->do_upload($fieldname)){
                echo 'cant upload'.$this->upload->display_errors();
                return;
            }
            
            // Get uploaded data
            $ud = $this->upload->data();
            
            // Add post data
            $added_post_id = $this->Project_post->add_project_post($project_id, $post_caption, $post_detail, $post_image_path);
            if($added_post_id == NULL){
                echo 'post error';
                return;
            }
            
            echo 1;
            
        }
        
        
        function get_project_posts_ajax(){
            /*
             *  Get project posts
             *  request from ajax
             *
             */
            
            // Create form rules
            $this->form_validation->set_rules('project_id', 'project_id', 'required|numeric');
            $this->form_validation->set_rules('post_offset', 'post_offset', 'numeric');
            $this->form_validation->set_rules('post_limit', 'post_limit', 'numeric');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                echo 0;
                return;
            }
            
            // Get data
            $project_id = $this->input->post('project_id');
            $post_offset = $this->input->post('post_offset');
            $post_limit = $this->input->post('post_limit');
            
            if($post_offset == NULL){
                $post_offset = 0;
            }
            if($post_limit == NULL){
                $post_limit = 5;
            }
            
            // Get porject posts
            // Set where
            $where_assoc = array();
            $where_assoc['project_post_project_id'] = $project_id;
            // Set order
            $order_by = 'project_post_time DESC';
            
            // Get posts
            $project_post_arr = $this->Project_post->get_filter('*', $where_assoc, null, $order_by, $post_offset, $post_limit, 'array');
            
            // JSON encode
            $project_post_arr_json = json_encode($project_post_arr, JSON_UNESCAPED_UNICODE);
            
            echo $project_post_arr_json;
        }
        
    }