<?php
    ob_start();
    defined('BASEPATH') OR exit('No direct script access allowed'); 
    class Home extends CI_Controller{
        function index(){            
            $data = array(
                'msg' => 'msg'
            );
            
            $this->load->view('main/index.php', $data);
        }
        
        function test(){
            echo 'test';
        }
        
    }
    