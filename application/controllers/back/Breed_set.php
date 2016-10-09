<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Breed_set extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function category_breed_page(){
            
            $data = array();
            $data['page'] = 'allBreed';
            
            
            $this->load->view('back/index', $data);
            ob_flush();
            
        }
        
        
    }