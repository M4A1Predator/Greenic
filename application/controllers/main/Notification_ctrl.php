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
            
            // Get notification records
            $notification_arr = $this->Notification->get_notification_by_member_id($member_id);
            
            // encode json
            $notification_arr_json = json_encode($notification_arr, JSON_UNESCAPED_UNICODE);
            
            echo $notification_arr_json;
            
        }
        
        
    }