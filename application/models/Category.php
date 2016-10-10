<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Category extends MY_Model{
        
        public $table = 'category';
        public $view = 'category_view';
        
        function __construct(){
            parent::__construct();
        }
        
        function get_category_data($project_type_id=NULL, $filter_data=array(), $result_type='object'){
            /*
             *  Get category data
             *  name master and project amount
             *
             */
            
            $limit = null;
            $offset = 0;
            $order_by = 'project_count DESC';
            
            if(isset($filter_data['limit'])){
                $limit = $filter_data['limit'];
            }
            
            if(isset($filter_data['offset'])){
                $offset = $filter_data['offset'];
            }
            
            if(isset($filter_data['order_by'])){
                $order_by = $filter_data['order_by'];
            }
            
            // Build query
            $this->db->select('category_view.*, count(project_category_id) as project_count');
            //$this->db->select('*');
            $this->db->from($this->view);
            // Join project view
            $this->db->join('project_view', 'project_view.project_category_id = category_view.category_id', 'left');
            // Set where clause
            if($project_type_id){
                $this->db->where('category_view.category_project_type_id', $project_type_id);
            }
            $this->db->where('project_status_id', $this->Status->status_normal_id);
            // Group by
            // $this->db->group_by('project_view.project_category_id');
            $this->db->group_by('category_view.category_id, project_view.project_category_id');
            
            // Order by
            if($order_by){
                $this->db->order_by($order_by);
            }
                
            // Set limit
            $this->db->offset($offset);
            $this->db->limit($limit);
            
            // Execute
            $query = $this->db->get();
            $result = $this->get_result($query, $result_type);
            
            // Get count
            // Build query
            $this->db->select('category_view.*, count(project_category_id) as project_count');
            //$this->db->select('*');
            $this->db->from($this->view);
            // Join project view
            $this->db->join('project_view', 'project_view.project_category_id = category_view.category_id', 'left');
            // Set where clause
            if($project_type_id){
                $this->db->where('category_view.category_project_type_id', $project_type_id);
            }
            $this->db->where('project_status_id', $this->Status->status_normal_id);
            // Group by
            //$this->db->group_by('project_view.project_category_id');
            $this->db->group_by('category_view.category_id, project_view.project_category_id');
            
            // Order by
            if($order_by){
                $this->db->order_by($order_by);
            }
            
            $count = $this->db->count_all_results();
            
            $data = array();
            $data['result'] = $result;
            $data['count'] = $count;
            
            // Return
            return $data;
            
        }
        
    
        function is_dup($category_data){
            $category_name = $category_data['category_name'];
            
            // Check dup
            $where_assoc = array();
            $where_assoc['category_name'] = $category_name;
            
            $categories = $this->get_filter('*', $where_assoc);
            if($categories){
                return TRUE;
            }
            
            return FALSE;
        }
    }