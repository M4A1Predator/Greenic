<?php
    ob_start();
    defined('BASEPATH') OR exit('No direct script access allowed'); 
    class Home extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            $this->lang->load('general_message', $this->config->item('web_language'));
        }
        
        function index(){
            /*
             *  Load home page
             *  
             */
            
            // Set where clause
            $where_assoc = array();
            //$where_assoc['project']
            
            // Set init data
            $data = array();
            $data['msg'] = 'msg';
            
            // load view
            $this->load->view('main/index.php', $data);
            
            // flush
            ob_flush();
        }
        
        function get_last_projects_ajax(){
            /*
             *  Get last projects to display in home page
             *  
             */
            
            // Load library
            $this->load->library('form_validation');
            
            // Create form rules
            $this->form_validation->set_rules('limit', 'limit', 'numeric');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                echo 0;
                return;
            }
            
            // Get data
            $limit = $this->input->post('limit');
            
            // Get last projects
            // Set where
            $where_assoc = array();
            
            // Set order by
            $order_by = 'project_time DESC';
            
            // Get projects
            $project_arr = $this->Project->get_filter('*', $where_assoc, null, $order_by, null, $limit, 'array', array('use_view' => TRUE));
            
            // JSON encode
            $project_arr_json = json_encode($project_arr, JSON_UNESCAPED_UNICODE);
            
            echo $project_arr_json;
        }
        
        function test(){
            echo 'test';
        }
        
    }
    