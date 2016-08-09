<?php
    ob_start();
    defined('BASEPATH') OR exit('No direct script access allowed'); 
    class Home extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            
            $this->lang->load('general_message', $this->config->item('web_language'));
        }
        
        function index(){
            /*
             *  Load home page
             *  
             */
            
            // Set init data
            $data = array(
                'msg' => 'msg'
            );
            
            // load view
            $this->load->view('main/index.php', $data);
            
            // flush
            ob_flush();
        }
        
        function test(){
            echo 'test';
        }
        
    }
    