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
            // Get data
            //$limit = $this->input->post('limit');
            $limit = $this->input->get('limit');
            if(!is_numeric($limit)){
                echo 0;
                return;
            }
            
            // Get last projects
            // Set where
            $where_assoc = array();
            $where_assoc['project_status_id'] = $this->Status->status_normal_id;
            
            // Set order by
            $order_by = 'project_time DESC';
            
            // Get projects
            $project_arr = $this->Project->get_filter('*', $where_assoc, null, $order_by, null, $limit, 'array', array('use_view' => TRUE));
            
            // JSON encode
            $project_arr_json = json_encode($project_arr, JSON_UNESCAPED_UNICODE);
            
            echo $project_arr_json;
        }
        
        function get_popular_projects_ajax(){
            /*
             *  Get request for popular projects
             *
             */
            
            // Get data
            $limit = $this->input->get('limit');
            
            // Get highest view project
            // Set where
            $where_assoc = array();
            //$where_assoc['project_status_name'] = $this->Status->status_normal;
            $where_assoc['project_status_id'] = $this->Status->status_normal_id;
            
            // Set order
            $order_by = 'project_view DESC';
            
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
    