<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Review extends MY_Model{
        
        public $table = 'review';
        
        function __construct(){
            parent::__construct();
        }
        
        function get_review_data_by_project_id($project_id, $filter_assoc=array(), $result_type='object'){
            /*
             *  Get reviews by project id
             *
             */
            
            $limit = $filter_assoc['limit'];
            $offset = $filter_assoc['offset'];
            
            // Set where
            $where_assoc = array();
            $where_assoc['review_project_id'] = $project_id;
            
            // Set order
            $order_by = 'review_time DESC';
            
            // Build query
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->join('member_public_view', 'member_public_view.member_id = review.review_member_id');
            //$this->db->join('project_view', 'project_view.project_id = review.review_project_id');
            $this->db->where($where_assoc);
            $this->db->order_by($order_by);
            $this->db->offset($offset);
            $this->db->limit($limit);
            // Get result
            $query = $this->db->get();
            $result = $this->get_result($query, $result_type);
            
            // Get count
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->join('member_public_view', 'member_public_view.member_id = review.review_member_id');
            $this->db->where($where_assoc);
            $this->db->order_by($order_by);
            $count = $this->db->count_all_results();
            
            // Set data
            $data = array();
            $data['result'] = $result;
            $data['count'] = $count;
            
            return $data;
        }
        
    
        function has_ever_review_project($member_id, $project_id){
            /*
             *  check member is reviewed this project or not
             *
             *  @return bool
             */
            
            // Set where
            $where_assoc = array();
            $where_assoc['review_member_id'] = $member_id;
            $where_assoc['review_project_id'] = $project_id;
            
            $reviews = $this->get_filter('*', $where_assoc);
            
            if($reviews){
                return TRUE;
            }
            
            return FALSE;
            
        }
    
    
        
        function get_review_data_by_project_ids($project_id_arr, $filter_assoc=array(), $result_type='object'){
            /*
             *  Get reviews by project id
             *
             */
            
            $limit = $filter_assoc['limit'];
            $offset = $filter_assoc['offset'];
            
            // Set where
            $where_assoc = array();
            $where_assoc['review_project_id'] = $project_id;
            
            // Set order
            $order_by = 'review_time DESC';
            
            // Build query
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->join('member_public_view', 'member_public_view.member_id = review.review_member_id');
            //$this->db->join('project_view', 'project_view.project_id = review.review_project_id');
            foreach($project_id_arr as $project_id){
                $this->db->or_where('');
            }
            $this->db->order_by($order_by);
            $this->db->offset($offset);
            $this->db->limit($limit);
            // Get result
            $query = $this->db->get();
            $result = $this->get_result($query, $result_type);
            
            // Get count
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->join('member_public_view', 'member_public_view.member_id = review.review_member_id');
            $this->db->where($where_assoc);
            $this->db->order_by($order_by);
            $count = $this->db->count_all_results();
            
            // Set data
            $data = array();
            $data['result'] = $result;
            $data['count'] = $count;
            
            return $data;
        }
    
    
        function get_review_rate($review_arr){
            $review_rate = 0.0;
            $total_rate = 0;
            $rate_select_arr = [0, 0, 0, 0, 0];
            $review_count = count($review_arr);
            
            foreach($review_arr as $review){
                $rate = (int)$review['review_rate'];
                
                $rate_select_arr[$rate-1] += 1;
                
                $total_rate += $rate;
            }
            if($review_count !== 0){
                $review_rate = (float)($total_rate / $review_count);
            }else{
                $review_rate = 0;
            }
            
            return $review_rate;
            
        }
    
    }