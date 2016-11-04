<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start

    class Unit extends MY_Model{

        public $table = 'unit';

        function __construct(){
            parent::__construct();
        }
        function get_all_unit($filter_assoc=array(), $result_type='object'){
            
            // Get data
            $offset = $filter_assoc['offset'];
            $limit = $filter_assoc['limit'];
                
            //Set form
            $from_table = 'unit u';
    
    
    
            // Set group_by
            $group_by = 'u.unit_name';
    
             // Build query
            $this->db->select('u.unit_name as unit_name, count(p.project_unit_id) as unit_count , ,p.project_time as unit_create_date');
            $this->db->from($from_table);
            $this->db->join('project p', 'p.project_unit_id  = u.unit_id ');
            $this->db->group_by($group_by);
            $this->db->offset($offset);
            $this->db->limit($limit);
    
            $query = $this->db->get();
            $result = $this->get_result($query, $result_type);
            
            $this->db->select('u.unit_name as unit_name, count(p.project_unit_id) as unit_count , ,p.project_time as unit_create_date');
            $this->db->from($from_table);
            $this->db->join('project p', 'p.project_unit_id  = u.unit_id ');
            $this->db->group_by($group_by);
            $count = $this->db->count_all_results();
            
            
    
            $data['result'] = $result;
            $data['count'] = $count;
            return $data;
    
        }
        
        function is_dup($unit_data){
            $unit_name = $unit_data['unit_name'];
            
            // Check dup
            $where_assoc = array();
            $where_assoc['unit_name'] = $unit_name;
            
            $units = $this->get_filter('*', $where_assoc);
            if($units){
                return TRUE;
            }
            
            return FALSE;
        }

    }
