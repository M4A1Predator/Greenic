<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Admin_authentication extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('form_validation');
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function sign_in_page(){
            /*
             *  Load login page
             *
             */
            
            // Load view
            $this->load->view('back/login');
            
        }
        
        function sign_in_pro_ajax(){
            /*
             *  Process admin sign in
             *
             */
            
            
        }
        
        
    }