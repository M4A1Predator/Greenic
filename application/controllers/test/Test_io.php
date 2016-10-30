<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Test_io extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function index(){
            $this->load->view('test/index');
        }
        
        function notice(){
            $member_id = $this->session->userdata('member_id');
            
            // Get notification records
            //$notification_arr = $this->Notification->get_notification_by_member_id($member_id, 'array');
            // Get data
            $member_id = $this->session->userdata('member_id');
            
            // Get notification records
            // Set where
            $where_assoc = array();
            $where_assoc['notification_member_id'] = $member_id;
            //$where_assoc['notification_notice'] = 0;
            
            // Join
            $join_activity_type = $this->gnc_query->get_join_table_assoc('activity_type', 'activity_type.activity_type_id = notification.notification_activity_type_id');
            $join_project_view = $this->gnc_query->get_join_table_assoc('project_view', 'project_view.project_id = notification.notification_project_id');
            $join_arr = [$join_project_view, $join_activity_type];
            
            // Set order
            $order_by = 'notification.notification_time DESC';
            
            // Get notice records
            $notification_arr = $this->Notification->get_filter('*', $where_assoc, $join_arr, $order_by, null, null, 'array');
            
            // encode json
            $notification_arr_json = json_encode($notification_arr, JSON_UNESCAPED_UNICODE);
            
            // Create notification message data
            foreach($notification_arr as $key => $notification){
            
            }
            echo var_dump($notification_arr)."<br/>";
            echo $this->Activity_type->activity_type_update_timeline_id;
            
        }
        
        
        function test_chat(){
            $msg = $this->input->post('msg');
            
            $data = array();
            $data['msg'] = $msg;
            
            $send_result = $this->gnc_socket->send_message($data);
            
            echo 1;
            
        }
        
    }