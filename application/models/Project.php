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
        function admin_get_project_by_id($where_assoc=array(), $result_type='object'){
            // Get project
             // Build query
            $this->db->select('*');
            $this->db->from($this->view);
            $this->db->join('product_shipment', 'product_shipment.product_shipment_project_id = project_view.project_id', 'left');
            $this->db->join('shipment', 'shipment.shipment_id = product_shipment.product_shipment_id', 'left');
            $this->db->where($where_assoc);
            
            
            
            $query = $this->db->get();
            $result = $this->get_result($query, $result_type);
            
           
            $data['result'] = $result;
            //$data['count'] = $count;
            
            return $data;
            
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
            //echo var_dump($data_assoc);
            
            // Add project
            $add_result = $this->add($data_assoc);
            
            // Check add result
            if($add_result == FALSE){
                return NULL;
            }
            
            return $this->db->insert_id();
        }
        
        
        function get_project_by_category($filter_assoc, $result_type='object'){
            /*
             *  Get projects by category id
             *
             */
            
            // Get data
            $category_id = $filter_assoc['category_id'];
            $order_by = $filter_assoc['order_by'];
            $offset = $filter_assoc['offset'];
            $limit = $filter_assoc['limit'];
            
            // Build query
            $this->db->select('*');
            $this->db->from($this->view);
            $this->db->where('category_id', $category_id);
            //$this->db->or_where('category_master_id', $category_id);
            $this->db->order_by($order_by);
            $this->db->offset($offset);
            $this->db->limit($limit);
            $query = $this->db->get();
            
            $result = $this->get_result($query, $result_type);
            
            // Build query
            $this->db->select('*');
            $this->db->from($this->view);
            $this->db->where('category_id', $category_id);
            $this->db->or_where('category_master_id', $category_id);
            $this->db->order_by($order_by);
            //$this->db->offset($offset);
            //$this->db->limit($limit);
            $count = $this->db->count_all_results();
            
            // Set return data
            $data['result'] = $result;
            $data['count'] = $count;
            return $data;
            
        }
        
        function get_all_project($filter_assoc=array(), $result_type='object'){
          
            //Set from
            $from_table = 'project';
             // Set where
             $where_assoc = array();
            $where_assoc['project_status_id'] = $this->Status->status_normal_id;
            
            
            // Set order
            $order_by = 'project_time DESC';
            
             // Build query
            $this->db->select('*');
            $this->db->from($this->view);
            $this->db->where($where_assoc);
            $this->db->order_by($order_by);
            
            $query = $this->db->get();
            $result = $this->get_result($query, $result_type);
            
            $data['result'] = $result;
             
            return $data;
        }
        function get_all_category($filter_assoc=array(), $result_type='object'){
             
             
             
            //Set from
            $from_table = 'category ';
             // Set group_by
            $group_by = 'project_type.project_type_name';
            //order by
            $order_by ='count_type DESC';
               //Build query   t.project_type_name as type_name ,COUNT(t.project_type_id)as count_type 
            $this->db->select('*');
            $this->db->from($from_table);            
            $this->db->join('project  ', 'category.category_id = project.project_category_id ', 'left'); 
            $this->db->join('project_type  ', 'category.category_project_type_id = project_type.project_type_id ');   
            
            $this->db->group_by($group_by); 
            //$this->db->order_by($order_by); 
            
            $query = $this->db->get();
            $result = $this->get_result($query, $result_type);
            
             
             $data['result'] = $result;
             
            
            
            return $data;
             
        }
    }