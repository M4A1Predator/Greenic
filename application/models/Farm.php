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
            $where_assoc['farm.farm_status_id'] = $this->Status->status_normal_id;


            // Set order
            $order_by = 'farm_id DESC';
            $group_by = 'farm_id';
             // Build query
            $this->db->select('*,count(project_id)as count_project,count(follow_farm_id)as count_followfarm');
            $this->db->from($from_table);
            $this->db->join('project ', ' project.project_farm_id  = farm.farm_id ', 'left');
            $this->db->join('follow  ', 'farm.farm_id = follow.follow_farm_id ','left');
            $this->db->join('member', 'farm.farm_member_id = member.member_id', 'left');
            $this->db->where($where_assoc);
            $this->db->order_by($order_by);
            $this->db->group_by($group_by);

            $query = $this->db->get();
            $result = $this->get_result($query, $result_type);
            
            
             $this->db->select('*,count(project_id)as count_project,count(follow_farm_id)as count_followfarm');
            $this->db->from($from_table);
            $this->db->join('project ', ' project.project_farm_id  = farm.farm_id ', 'left');
            $this->db->join('follow  ', 'farm.farm_id = follow.follow_farm_id ','left');
            $this->db->join('member', 'farm.farm_member_id = member.member_id', 'left');
            $this->db->where($where_assoc);
            $this->db->order_by($order_by);
            $this->db->group_by($group_by);
            $count = $this->db->count_all_results();
            
            

            $data['result'] = $result;
            $data['count'] = $count;
            return $data;


        }

        function admin_get_farm_by_id($where_assoc=array(),$group_by=array(),$filter_assoc=array(), $result_type='object'){
            // Get data
            $offset = isset($filter_assoc['offset'])?$filter_assoc['offset']:null;
            $limit = isset($filter_assoc['limit'])?$filter_assoc['limit']:null;
            
            //Set form
            $from_table = 'farm';
            
            
            // Set order
            $order_by = 'project_time DESC';
            //$group_by = 'project_id';
             // Build query  get Fillter
            $this->db->select('*,count(project_id)as count_project,count(follow_farm_id)as count_followfarm');
            $this->db->from($from_table);
            $this->db->join('project ', ' project.project_farm_id  = farm.farm_id ','left');
            $this->db->join('follow  ', 'farm.farm_id = follow.follow_farm_id ','left');
            $this->db->join('member', 'farm.farm_member_id = member.member_id', 'left');
            $this->db->join('category', 'category.category_id = project.project_category_id', 'left');
            $this->db->join('project_type', 'project_type.project_type_id = category.category_project_type_id', 'left');
            $this->db->join('breed', 'project.project_breed_id = breed.breed_id', 'left');
            $this->db->where($where_assoc);

            if($group_by ){
            $this->db->group_by($group_by);
            $this->db->order_by($order_by);
            }else{}
            $query = $this->db->get();
            $result = $this->get_result($query, $result_type);

            // Get all project in farm
            $this->db->select('*,count(project_id)as count_project,count(follow_farm_id)as count_followfarm');
            $this->db->from($from_table);
            $this->db->join('project ', ' project.project_farm_id  = farm.farm_id ','left');
            $this->db->join('follow  ', 'farm.farm_id = follow.follow_farm_id ','left');
            $this->db->join('member', 'farm.farm_member_id = member.member_id', 'left');
            $this->db->join('category', 'category.category_id = project.project_category_id', 'left');
            $this->db->join('project_type', 'project_type.project_type_id = category.category_project_type_id', 'left');
            $this->db->join('breed', 'project.project_breed_id = breed.breed_id', 'left');
            $this->db->where($where_assoc);

            if($group_by ){
                $this->db->group_by($group_by);
                $this->db->order_by($order_by);
            }else{}
            $count = $this->db->count_all_results();
            
            $data['result'] = $result;
            $data['count'] = $count;

            return $data;
        }
        
        function get_all_farm_count(){
            $where_assoc = array();
            $where_assoc['farm_status_id'] = $this->CI->Status->status_normal_id;
            
            $this->db->select('count(farm_id) as farm_count');
            $this->db->from($this->table);
            $this->db->where($where_assoc);
            $query = $this->db->get();
            
            $result = $this->get_result($query, 'object');
            
            $count = $result[0]->farm_count;
            return $count;
        }

    }
