<?php
    // On start
    
    class Admin extends MY_Model{
        
        public $table = 'admin';
        
        private $password_hash_cost = 12;
        private $password_hash_option = array('cost' => 12);
        
        function __construct(){
            parent::__construct();
        }
        
        function admin_authentication($admin_username, $password){
            /*
             *  Authen admin
             *  check admin username and password
             *  then return admin data
             *
             *  @param  strnig   admin username
             *  @param  string  admin password
             */
            
            // Check username
            $where_assoc = array();
            $where_assoc['admin_username'] = $admin_username;
            $where_assoc['member_type_id'] = $this->Member_type->member_admin_id;
            
            // Set join
            $join_member = $this->CI->gnc_query->get_join_table_assoc('member', 'member.member_id = admin.admin_member_id');
            $join_status = $this->CI->gnc_query->get_join_table_assoc('status', 'member.member_status_id = status.status_id');
            $join_arr = [$join_member, $join_status];
            
            // Get admin
            $admin = $this->get_filter_single('*', $where_assoc, $join_arr, 'array');
            
            // If wrong username
            if(!$admin){
                return NULL;
            }
            
            // Check status
            if($admin['status_name'] != $this->Status->status_normal){
                return NULL;
            }
            
            // Check password
            $verify_password = password_verify($password, $admin['member_password']);
            if(!$verify_password){
                return NULL;
            }
            
            // Check if need rehash
            if(password_needs_rehash($admin['member_password'], PASSWORD_DEFAULT, $this->password_hash_option)){
                $hash_password = password_hash($password, PASSWORD_DEFAULT, $this->password_hash_cost);
            }
            
            // Unset unneccesary data
            unset($admin['member_password']);
            unset($admin['member_token']);
            
            return $admin;
            
        }
        
    }