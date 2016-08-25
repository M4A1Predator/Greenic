<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Project extends MY_Model{
        
        public $table = 'project';
        public $view = 'project_view';
        
        function __construct(){
            parent::__construct();
        }
        
        function get_project_by_id($project_id, $result_type='object', $use_view=FALSE){
            // Get project
            $where_assoc = array();
            $where_assoc['project_id'] = $project_id;
            
            // Get project data from view
            $project_arr = $this->Project->get_filter('*', $where_assoc, null, null, null, null, 'object', array('use_view' => $use_view));
            if(count($project_arr) !== 1){
                return NULL;
            }
            return $project_arr[0];
            
        }
        
        function add_project($data_assoc){
            /*
             *  Add project to DB
             *
             *  @param  assoc   project data assoc
             *  
             */
            
            // Get status
            // Add normal status 1 as default
            $data_assoc['project_status_id'] = 1;
            
            // Check data
            
            // Add project
            $add_result = $this->add($data_assoc);
            
            // Check add result
            if($add_result == FALSE){
                return NULL;
            }
            
            return $this->db->insert_id();
        }
        
    }