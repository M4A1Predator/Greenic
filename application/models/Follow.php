<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Follow extends MY_Model{
        
        public $table = 'follow';
        
        public $target_type_project = 'project';
        public $target_type_farm = 'farm';
        public $target_type_farmer = 'farmer';
        
        function __construct(){
            parent::__construct();
        }
        
        function add_follow($member_id, $target_type, $target_id){
            /*
             *  Add follow to DB
             *  
             *
             *  @param  string  target type to be followed by member
             *  @param  int     target ID e.g(farm_id or project_od)
             *
             *  @return int if success or null if failed
             */
            
            // Prepare add data
            $data_assoc = array();
            $data_assoc['follow_member_id'] = $member_id;
            
            // Filter type
            if($target_type == $this->target_type_project){
                // Check must not be owner
                // Check is not following
                
                // Add follow project
                $data_assoc['follow_project_id'] = $target_id;
            }else{
                return NULL;
            }
            
            // Add follow to DB
            $add_result = $this->add($data_assoc);
            
            // Check add result
            if($add_result == FALSE){
                return NULL;
            }
            
            return $this->db->insert_id();
        }
        
        function get_follow_by_target_array($member_id, $target_id_assoc=array(), $result_type='object'){
            /*
             *  Get follow rows by check multiple target
             *
             *  @param  int  member id
             *  @param  assoc   assoc contains key as type of target id and value as that id
             *  
             */
            
            //Build query
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->where('follow_member_id', $member_id);
            $this->db->group_start();
            foreach($target_id_assoc as $field => $value){
                $this->db->or_where($field, $value);
            }
            $this->db->group_end();
            $query = $this->db->get();
            
            $result = $this->get_result($query, $result_type);
            
            return $result;
            
        }
        
        function get_follow_by_target_id($member_id, $project_id=NULL, $farm_id=NULL, $farmer_id=NULL, $result_type='object'){
            /*
             *  Get follow rows by check multiple target
             *
             *  @param  int  member id
             *  
             */
            
            //Build query
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->where('follow_member_id', $member_id);
            $this->db->group_start();
            if($project_id){
                $this->db->or_where('follow_project_id', $project_id);
            }
            if($farm_id){
                $this->db->or_where('follow_farm_id', $farm_id);
            }
            if($farmer_id){
                $this->db->or_where('follow_farmer_id', $farmer_id);
            }
            $this->db->group_end();
            $query = $this->db->get();
            
            $result = $this->get_result($query, $result_type);
            
            return $result;
        }
        
    }
