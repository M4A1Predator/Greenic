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
        
        function search_result_page(){
            /*
             *  Load search project result page
             *  and display projects
             *
             */
            
            $this->load->view('main/search');
            
        }
        
        
    }