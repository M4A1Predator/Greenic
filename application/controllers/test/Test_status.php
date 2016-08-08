<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    // On start
    class Test_status extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load model
            $this->load->model('Status');
            
            // Load library
            
            // Do filter
            
        }
        
        function show_status(){
            $status_arr = $this->Status->get_all($result_type='object');
            
            foreach($status_arr as $status){
                //echo $status['status_name'].'<br/>';
                echo $status->status_name.'<br/>';
            }
            
        }
        
        function filter_status(){
            $where_assoc = array();
            $where_assoc['status_name'] = 'normals';
            
            $join_assoc = $this->gnc_query->get_join_table_assoc('member', 'member.member_status_id = status.status_id', '');
            
            $status_arr = $this->Status->get_filter('*', $where_assoc);
            
            echo 'No result'.'<br/>';
            echo var_dump($status_arr);
            echo '<br/>--------------------------------'.'<br/>';
            
            //------------------------------------
            
            $where_assoc = array();
            $where_assoc['status_name like'] = '%';
            
            $join_assoc = $this->gnc_query->get_join_table_assoc('member', 'member.member_status_id = status.status_id', 'left');
            
            $status_arr = $this->Status->get_filter('status.status_name, member.member_id', $where_assoc, [$join_assoc], 'status.status_name ASC', 1, 5);
            
            echo 'Has results'.'<br/>';
            
            foreach($status_arr as $status){
                echo var_dump($status).'<br/>';
            }
            //echo var_dump($status_arr);
            echo '--------------------------------<br/>';
            $where_assoc = array('member_email' => 'm1@gnc.com');
            $member_arr = $this->Member->get_filter('member_email', $where_assoc);
            echo var_dump($member_arr);
            echo '--------------------------------<br/>';
        }
        
        function filter_single_status(){
            $where_assoc = array();
            $where_assoc['status_id'] = 3;
            //$where_assoc['status_name like'] = '%b%';
            
            //$join_assoc = $this->gnc_query->get_join_table_assoc('member', 'member.member_status_id = status.status_id');
            
            $status = $this->Status->get_filter_single('*', $where_assoc, null, 'array');
            
            echo var_dump($status);
               
        }
        
        
    }