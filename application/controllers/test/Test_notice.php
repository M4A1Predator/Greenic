<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Test_notice extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        function index(){
            
        }
        
        function add_post(){
            $add = $this->Notification->add_update_timeline_notification(11);
            echo var_dump($add);
        }
        
        
    }