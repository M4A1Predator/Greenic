<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Admin_home extends MY_Controller{
        
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
        
        function home(){
            /*
             *  Load admin home page
             */
            
            $this->load->view('back/index');
            
        }
        
        
    }