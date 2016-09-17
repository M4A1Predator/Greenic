<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Unit extends MY_Model{
        
        public $table = 'unit';
        
        function __construct(){
            parent::__construct();
            
        }
            function get_all_unit($filter_assoc=array(), $result_type='object'){
        //Set form
            $from_table = 'unit u';
             
            
            
            // Set group_by
            $group_by = 'u.unit_name';
            
             // Build query
            $this->db->select('u.unit_name as unit_name, count(p.project_unit_id) as unit_count , ,p.project_time as unit_create_date');
            $this->db->from($from_table);
            $this->db->join('project p', 'p.project_unit_id  = u.unit_id ');
            $this->db->group_by($group_by);
               
            $query = $this->db->get();
            $result = $this->get_result($query, $result_type);
            
            $data['result'] = $result;
            
            return $data;
          
           
        
        }
        
    }