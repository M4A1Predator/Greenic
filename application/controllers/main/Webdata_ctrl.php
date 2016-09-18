<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Webdata_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function about_page(){
            
            // Get data
            $where_assoc = array();
            $where_assoc['webdata_name'] = 'about';
            
            $results = $this->Webdata->get_filter('*', $where_assoc);
            if(!$results){
                redirect('/main/');
                return;
            }
            $about = $results[0];
            
            $data['about'] = $about;
            
            // Load view
            $this->load->view('main/aboutus', $data);
        }
        
        
    }