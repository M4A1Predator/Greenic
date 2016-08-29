<?php
    class MY_Controller extends CI_Controller{
        
        public $request_type;
        public $is_sign_in;
        
        function __construct(){
            parent::__construct();
            // Load helpers
            
            // Load library
            
            // Do filter
            
            // Init
            $this->lang->load('uri_store', $this->config->item('web_language'));
            
            $this->request_type = $this->input->server('REQUEST_METHOD');
            $this->is_sign_in = $this->gnc_authen->is_sign_in();
        }
    }
    