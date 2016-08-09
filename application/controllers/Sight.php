<?php
    class Sight extends CI_Controller{
        function __construct(){
            parent::__construct();
            // Load helpers
            
            // Load library
            
            // Do filter
            
        }
        
        function index(){
            /*  Redirect to Home page
             *
             */
            
            redirect('/main/');
            
        }
        
        function page(){
            echo 'ประกาศ';
            echo base_url();
        }
    }
    