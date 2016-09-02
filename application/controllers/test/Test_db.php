<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Test_db extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function get_insert(){
            echo $this->db->insert_id();
            
        }
        
        function put_req(){
            echo $this->request_type.'<br/>';
            echo var_dump($this->input->raw_input_stream);
        }
        
        
        
    }