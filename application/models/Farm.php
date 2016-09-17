<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Farm extends MY_Model{
        
        public $table = 'farm';
        
        function __construct(){
            parent::__construct();
            
        }
        function get_all_farm($filter_assoc=array(), $result_type='object'){
        //Set form
            $from_table = 'farm';
             // Set where
             $where_assoc = array();
            $where_assoc['farm_status_id'] = $this->Status->status_normal_id;
            
            
            // Set order
            $order_by = 'farm_id DESC';
            
             // Build query
            $this->db->select('*');
            $this->db->from($from_table);
            $this->db->where($where_assoc);
            $this->db->order_by($order_by);
            
            $query = $this->db->get();
            $result = $this->get_result($query, $result_type);
            
            $data['result'] = $result;
            
            return $data;
          
           
        }
        
    }