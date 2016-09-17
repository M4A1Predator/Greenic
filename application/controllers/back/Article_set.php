<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Article_set extends MY_Controller{
        
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
        
        function all_article_page(){
            
            // Get data
            $page = $this->uri->segment(3, null);
            
            $data['page'] = $page;
            
            // Get data
            $limit = $this->input->get('limit');
            $page_number = $this->input->get('pageNum');
            
            if(!$limit){
                $limit = 15;
            }
            
            if(!$page_number or !is_numeric($page_number)){
                $page_number = 1;
            }else{
                $page_number = (int) $page_number;
            }
            
            // Set offset
            $offset = ($page_number * $limit) - $limit;
            
            // Get articles
            $this->load->library('gnc_query');
            $where_assoc = array();
            //$where_assoc['article_status_id !='] = $this->Status->status_removed_id;
            
            $join_member = $this->gnc_query->get_join_table_assoc('member_public_view', 'member_public_view.member_id = article.article_member_id');
            $join_status = $this->gnc_query->get_join_table_assoc('status', 'status.status_id = article.article_status_id');
            $join_array = [$join_status];
            
            $order_by = 'article_time DESC';
            
            $articles = $this->Article->get_filter('*', $where_assoc, $join_array, $order_by, $offset, $limit);
            $article_count = $this->Article->get_filter_count('*', $where_assoc, $join_array, $order_by, $offset, $limit);
            
            // Set data
            $data['articles'] = $articles;
            $data['page_number'] = $page_number;
            $data['article_count'] = $article_count;
            
            
            // Set page amount
            $page_amount = 1;
            if($article_count > $limit){
                
                if($article_count % $limit !== 0){
                    $page_amount = ($article_count / $limit) + 1;
                }else{
                    $page_amount = ($article_count / $limit);
                }
            }
            $data['page_amount'] = $page_amount;
            
            // Load view
            $this->load->view('back/index', $data);
            
        }
        
        function add_atricle_page(){
            // Get page data
            $page = $this->uri->segment(3, null);
            $data['page'] = $page;
            
            // Load view
            $this->load->view('back/index', $data);
        }
        
        
        function add_article_ajax(){
            
            // Get data
            $article_headline = $this->input->post('headline');
            $article_content = $this->input->post('content');
            $member_id = $this->session->userdata('member_id');
            
            // Prepare data
            $article_data = array();
            $article_data['article_headline'] = $article_headline;
            $article_data['article_content'] = $article_content;
            $article_data['article_cover_image'] = NULL;
            $article_data['article_member_id'] = $member_id;
            
            $article_data['article_status_id'] = $this->Status->status_publish_id;
            
            // Upload cover image
            $article_cover_image_field = 'article_cover_image';
            if(array_key_exists($article_cover_image_field, $_FILES)){
                // Upload image
                // Load library
                $this->load->library('upload');
                $this->load->library('image_lib');
                $this->load->library('GNC_image');
                
                $cover_image = $_FILES[$article_cover_image_field];
                
                // Get file type
                $cover_image_ext = pathinfo($cover_image['name'], PATHINFO_EXTENSION);
                $cover_image_type = $cover_image['type'];
                
                // Check file type
                if(!$this->gnc_image->is_image_file($cover_image)){
                    echo 'Invalid file';
                    return;
                }
                
                // Generate file name
                $cover_image_name = $this->gnc_image->generate_file_name('art_').'.'.$cover_image_ext;
                $cover_image_location = ARTICLE_IMAGE_PATH.'cover_imgs';
                
                // Set upload image config
                $config = array();
                $config['upload_path'] = $cover_image_location;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['remove_spaces'] = true;
                $config['max_size']	= '20000';
                $config['max_width']  = '3850';
                $config['max_height']  = '3850';
                $config['file_name'] = $cover_image_name;
                $config['overwrite'] = TRUE;
                $fieldname = $article_cover_image_field;  //input tag name
                
                // Upload image
                $this->upload->initialize($config);
                if(!$this->upload->do_upload($fieldname)){
                    echo 'Upload error'.$this->upload->display_errors();
                    return;
                }else{
                    // Set path value
                    $cover_image_full_path = $cover_image_location.'/'.$cover_image_name;
                    $article_data['article_cover_image'] = $cover_image_full_path;
                }
            }
            
            // Add article
            $add_result = $this->Article->add($article_data);
            if(!$add_result){
                echo '{"error": "add failed"}';
                return;
            }
            
            echo 1;
            
        }
        
        
    }