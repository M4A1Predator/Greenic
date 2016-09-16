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
        
        
    }