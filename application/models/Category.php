<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Category extends MY_Model{
        
        public $table = 'category';
        public $view = 'category_view';
        
        function __construct(){
            parent::__construct();
        }
        
        function get_category_data($project_type_id=NULL, $category_master_id=NULL, $filter_data=array(), $result_type='object'){
            /*
             *  Get category data
             *  name master and project amount
             *
             */
            
            $limit = null;
            $offset = 0;
            
            if(isset($filter_data['limit'])){
                $limit = $filter_data['limit'];
            }
            
            if(isset($filter_data['offset'])){
                $offset = $filter_data['offset'];
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
            
            if($category_master_id){
                $this->db->where('category_view.category_master_id', $category_master_id);
            }
            // Group by
            $this->db->group_by('project_view.project_category_id');
            
            // Order by
            $this->db->order_by('project_count DESC');
            
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
            $this->db->join('project_view', 'project_view.project_category_id = category_view.category_id');
            // Set where clause
            if($project_type_id){
                $this->db->where('category_view.category_project_type_id', $project_type_id);
            }
            
            if($category_master_id){
                $this->db->where('category_view.category_master_id', $category_master_id);
            }
            // Group by
            $this->db->group_by('project_view.project_category_id');
            
            $count = $this->db->count_all_results();
            
            $data = array();
            $data['result'] = $result;
            $data['count'] = $count;
            
            // Return
            return $data;
            
        }
        
    }