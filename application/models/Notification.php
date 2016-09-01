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
        
    
        function get_notification_by_member_id($member_id, $result_type='object'){
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
            $join_project_view = $this->CI->gnc_query->get_join_table_assoc('project_view', 'project_view.project_id = notification.notification_project_id');
            $join_arr = [$join_project_view];
            
            // Get notice records
            $notification_arr = $this->get_filter('*', $where_assoc, $join_arr, null, null, null, $result_type);
            
            return $notification_arr;
            
        }
        
    }