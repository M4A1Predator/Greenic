<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Notification extends MY_Model{
        
        public $table = 'notification';
        
        function __construct(){
            parent::__construct();
        }
        
        function check_and_add_notification($activity_type_id, $target_type, $target_id, $project_id){
            /*
             *  Check who's follow project of farm or farmer
             *  then Add notification record
             *
             *  @param  int  activity type id
             *  @param  string  type of target (farm, project, farmer)
             *  @param  int     following target id
             *  @param  int  project id
             *  
             */
            
            // Get follower ids
            $where_assoc = array();
            if($target_type == 'project'){
                $where_assoc['follow_project_id'] = $target_id;
            }else if($target_type == 'farm'){
                $where_assoc['follow_farm_id'] = $target_id;
            }else if($target_type == 'farmer'){
                $where_assoc['follow_farmer_id'] = $target_id;
            }
            
            $follow_arr = $this->CI->Follow->get_filter('*', $where_assoc);
            
            // Add notification records follow the follow records
            foreach($follow_arr as $follow){
                $data_assoc = array();
                $data_assoc['notification_notice'] = 0;
                $data_assoc['notification_member_id'] = $follow->follow_member_id;
                $data_assoc['notification_activity_type_id'] = $activity_type_id;
                $data_assoc['notification_project_id'] = $project_id;
                
                $add_result = $this->add($data_assoc);
                
            }
            
        }
        
        function add_update_timeline_notification($project_post_id){
            /*
             *  Add update time notificaiton
             *
             *  @param  int  post id
             *
             */
            
            // Set data
            // activity update timeline id
            $activity_type_id = $this->CI->Activity_type->activity_type_update_timeline_id;
            
            // Get project post data
            $where_assoc = array();
            $where_assoc['project_post_id'] = $project_post_id;
            $project_post = $this->CI->Project_post->get_filter_single('*', $where_assoc);
            if(!$project_post){
                return;
            }
            
            // Get follower ids
            $where_assoc = array();
            $where_assoc['follow_project_id'] = $project_post->project_post_project_id;
            
            // Get follow record
            $follower_arr = $this->CI->Follow->get_filter('*', $where_assoc);
            if(!$follower_arr){
                return;
            }
            
            // Add update timeline notification record
            foreach($follower_arr as $follow){
                // Prepare notic data
                $notic_assoc = array();
                $notic_assoc['notification_notice'] = 0;
                $notic_assoc['notification_member_id'] = $follow->follow_member_id;
                $notic_assoc['notification_activity_type_id'] = $activity_type_id;
                $notic_assoc['notification_project_id'] = $project_post->project_post_project_id;
                $notic_assoc['notification_project_post_id'] = $project_post->project_post_id;
                
                // Add notification
                $add_result = $this->add($notic_assoc);
            }
            
        }
        
    
        function get_notification_by_member_id($member_id, $limit=null, $result_type='object'){
            /*
             *  Get notification records by member id
             *
             *  @param  int     member id
             *  
             */
            
            // Set where
            $where_assoc = array();
            $where_assoc['notification_member_id'] = $member_id;
            //$where_assoc['notification_notice'] = 0;
            
            // Join
            $join_activity_type = $this->CI->gnc_query->get_join_table_assoc('activity_type', 'activity_type.activity_type_id = notification.notification_activity_type_id');
            $join_project_view = $this->CI->gnc_query->get_join_table_assoc('project_view', 'project_view.project_id = notification.notification_project_id');
            $join_arr = [$join_project_view, $join_activity_type];
            
            // Get notice records
            $notification_arr = $this->get_filter('*', $where_assoc, $join_arr, null, $limit, null, $result_type);
            
            return $notification_arr;
            
        }
        
    
        function notice_all_notification_by_member_id($member_id){
            /*
             *  Update noticed all member notification
             *
             *  @param  int  member id
             * 
             */
            
            // Set where
            $where_assoc = array();
            $where_assoc['notification_member_id'] = $member_id;
            
            // Set update data
            $update_assoc = array();
            $update_assoc['notification_notice'] = 1;
            
            // Update
            $update_result = $this->update($where_assoc, $update_assoc);
            
            return $update_result;
            
        }
    
    }