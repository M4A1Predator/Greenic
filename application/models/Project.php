<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Project extends MY_Model{
        
        public $table = 'project';
        
        function __construct(){
            parent::__construct();
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