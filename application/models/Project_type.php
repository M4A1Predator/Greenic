<?php
    // On start
    
    class Project_type extends MY_Model{
        
        public $table = 'project_type';
        
        public $vegetable = 'vegetable';
        public $fruit = 'fruit';
        public $animal = 'animal';
        
        function __construct(){
            parent::__construct();
        }
        
        function get_project_type_id_by_name($name){
            /*
             *  Get project type ID by proejct type name
             *
             *  @param  string  project type name
             *  
             */
            
            
            // Prepare default id
            $project_type_id = 1;
            
            // Get project type id
            if($name == $this->vegetable){
                $project_type_id = 1;
            }else if($name == $this->fruit){
                $project_type_id = 2;
            }else if($name == $this->animal){
                $project_type_id = 3;
            }
            
            return $project_type_id;
            
        }
        
        function get_project_type_with_count_project($project_type_id=0, $result_type='object'){
            /*
             *  Get project type
             *  with count project in each types
             *
             *  @param  int     project type id
             *  @param  string  needed result type
             *  
             */
            
            // Preapre where clause
            $where_assoc = array();
            
            // ID 0 means get all
            if($project_type_id !== 0){
                $where_assoc['project_type_id'] = $project_type_id;
            }
            
            // Build Query
            $this->db->select('project_type.*, count(project_id) as project_count');
            $this->db->from($this->table);
            $this->db->join('project_view', 'project_type.project_type_id = project_view.category_project_type_id', 'left');
            if($where_assoc){
                $this->db->where($where_assoc);
            }
            $this->db->where('project_status_id !=', $this->CI->Status->status_removed_id);
            $this->db->group_by('project_type.project_type_id');
            
            // Execute
            $query = $this->db->get();
            
            return $this->get_result($query, $result_type);
            
        }
        
        function get_project_type_with_count_project_admin($project_type_id=0, $result_type='object'){
            /*
             *  Get project type
             *  with count project in each types
             *
             *  @param  int     project type id
             *  @param  string  needed result type
             *  
             */
            
            // Preapre where clause
            $where_assoc = array();
            
            // ID 0 means get all
            if($project_type_id !== 0){
                $where_assoc['project_type_id'] = $project_type_id;
            }
            
            // Build Query
            $this->db->select('project_type.*, count(project_id) as project_count');
            $this->db->from($this->table);
            $this->db->join('project_view', 'project_type.project_type_id = project_view.category_project_type_id', 'left');
            if($where_assoc){
                $this->db->where($where_assoc);
            }
            //$this->db->where('project_status_id !=', $this->CI->Status->status_removed_id);
            $this->db->group_by('project_type.project_type_id');
            
            // Execute
            $query = $this->db->get();
            
            return $this->get_result($query, $result_type);
            
        }
        
        function get_project_type_with_count_category_admin($project_type_id=0, $result_type='object'){
            /*
             *  Get project type
             *  with count project in each types
             *
             *  @param  int     project type id
             *  @param  string  needed result type
             *  
             */
            
            // Preapre where clause
            $where_assoc = array();
            
            // ID 0 means get all
            if($project_type_id !== 0){
                $where_assoc['project_type_id'] = $project_type_id;
            }
            
            // Build Query
            $this->db->select('project_type.*, count(category_id) as category_count');
            $this->db->from($this->table);
            $this->db->join('category_view', 'project_type.project_type_id = category_view.category_project_type_id', 'left');
            if($where_assoc){
                $this->db->where($where_assoc);
            }
            //$this->db->where('project_status_id !=', $this->CI->Status->status_removed_id);
            $this->db->group_by('project_type.project_type_id');
            
            // Execute
            $query = $this->db->get();
            
            return $this->get_result($query, $result_type);
            
        }
        
    }