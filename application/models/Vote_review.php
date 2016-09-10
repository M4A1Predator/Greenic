<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Vote_review extends MY_Model{
        
        public $table = 'vote_review';
        
        function __construct(){
            parent::__construct();
        }
        
        
        /*
         *  Add vote review to DB
         *
         *  @param   int    review id
         *  @param   int    0 = disagree, 1 = agree
         *  @param   int    vote owner
         *
         *  @return bool
         */
        function add_vote_review($review_id, $agree, $member_id){
            // Prepare data
            $vote_review_data = array();
            $vote_review_data['vote_review_review_id'] = $review_id;
            $vote_review_data['vote_review_agree'] = $agree;
            $vote_review_data['vote_review_member_id'] = $member_id;
            
            // Add
            $add_result = $this->add($vote_review_data);
            return $add_result;
        }
        
        function is_member_ever_vote_review($review_id, $member_id){
            
            // Set where
            $where_assoc = array();
            $where_assoc['vote_review_review_id'] = $review_id;
            $where_assoc['vote_review_member_id'] = $member_id;
            
            // Get review
            $reviews = $this->get_filter('*', $where_assoc);
            
            if($reviews){
                return TRUE;
            }
            
            return FALSE;
            
        }
        
        function vote_review_by_project_id($project_id, $result_type='object'){
            
            // Get reviews
            $where_assoc = array();
            $where_assoc['review.review_project_id'] = $project_id;
            
            // Build query
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->join('review', 'review.review_id = vote_review_review_id', 'right');
            $this->db->where($where_assoc);
            $query = $this->db->get();
            
            $result = $this->get_result($query, $result_type);
            
            // Get count
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->join('review', 'review.review_id = vote_review_review_id', 'right');
            $this->db->where($where_assoc);
            $count = $this->db->count_all_results();
            
            $data['result'] = $result;
            $data['count'] = $count;
            
            return $data;
        }
        
    }