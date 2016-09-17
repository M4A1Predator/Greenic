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
        
        function all_category_page(){
            
            $page = $this->uri->segment(3);
            
            $data['page'] = $page;
            
            $this->load->view('back/index', $data);
            
        }
        
        
    }