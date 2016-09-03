<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Notification_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function get_notifications_ajax(){
            /*
             *  Get nitificaiton records
             *
             */
            
            // Check login
            if(!$this->is_sign_in){
                echo 0;
                return;
            }
            
            // Get data
            $member_id = $this->session->userdata('member_id');
            
            $limit = 10;
            
            // Get notification records
            // Set where
            $where_assoc = array();
            $where_assoc['notification_member_id'] = $member_id;
            //$where_assoc['notification_notice'] = 0;
            
            // Join
            $join_activity_type = $this->gnc_query->get_join_table_assoc('activity_type', 'activity_type.activity_type_id = notification.notification_activity_type_id');
            $join_project_view = $this->gnc_query->get_join_table_assoc('project_view', 'project_view.project_id = notification.notification_project_id', 'left');
            $join_porject_post = $this->gnc_query->get_join_table_assoc('project_post', 'project_post.project_post_id = notification.notification_project_post_id', 'left');
            $join_arr = [$join_project_view, $join_activity_type, $join_porject_post];
            
            // Set order
            $order_by = 'notification_time DESC';
            
            // Get notice records
            $notification_arr = $this->Notification->get_filter('*', $where_assoc, $join_arr, $order_by, null, $limit, 'array');
            
            // Create notification message data
            foreach($notification_arr as $key => $notification){
                if((int)$notification['notification_activity_type_id'] === $this->Activity_type->activity_type_update_timeline_id){
                    $notification_arr[$key]['activity_text'] = 'อัพเดท timeline';
                }
            }
            
            // encode json
            $notification_arr_json = json_encode($notification_arr, JSON_UNESCAPED_UNICODE);
            
            //echo $notification_arr_json;
            //$this->output->set_content_type('application/json');
            $this->output->set_output($notification_arr_json);
            
        }
        
        
    
        function notice_all_notifications_ajax(){
            /*
             *  Update notifications to be noticed
             *
             */
            
            // Check sign in
            if($this->is_sign_in == FALSE){
                echo 0;
                return;
            }
            
            if($this->request_type != 'PUT'){
                return;
            }
            
            // Get data
            $member_id = $this->session->userdata('member_id');
            
            // Update notice of notifications
            $update_result = $this->Notification->notice_all_notification_by_member_id($member_id);
            
            if($update_result == FALSE){
                echo 0;
                return;
            }
            $this->output->set_output(1);
        }
    
    }