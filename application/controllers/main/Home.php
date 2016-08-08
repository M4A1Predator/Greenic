<?php
    ob_start();
    defined('BASEPATH') OR exit('No direct script access allowed'); 
    class Home extends CI_Controller{
        
        function __construct(){
            parent::__construct();
        }
        
        function index(){            
            $data = array(
                'msg' => 'msg'
            );
            
            $this->load->view('main/index.php', $data);
            ob_flush();
        }
        
        function test(){
            echo 'test';
        }
        
    }
    