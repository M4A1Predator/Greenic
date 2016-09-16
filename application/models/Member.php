<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    // On start
    
    class Member extends MY_Model{
        
        public $table = 'member';
        public $view = 'member_view';
        
        private $password_hash_cost = 12;
        private $password_hash_option = array('cost' => 12);
        
        function __construct(){
            parent::__construct();
        }
        
        private function generate_token($size=22){
            /*
             *  Generate random string
             *  @param  int     size of random bytes
             *
             *  @return string  hash token string
             */
            
            // Random string
            $token = openssl_random_pseudo_bytes($size);
            
            // Encrypt
            $hash_token = hash('sha256', $token);
            
            return $hash_token;
        }
        
        function hash_new_password($password){
            // Encrypt password
            $hash_password = password_hash($password, PASSWORD_BCRYPT, $this->password_hash_option);
            
            return $hash_password;
        }
        
        function add_admin($name, $admin_name, $email, $password, $address='', $level=1, $data_assoc=array() ){
            /*
             *  Add admin to system
             *
             *  @param  string  fullname
             *  @param  string  admin username
             *  @param  string  email use to login
             *  @param  string  password
             *  @param  string  address
             *  @param  assoc   another data
             *
             *  @return assoc   added data or FALSE
             */
            
            // Encrypt password
            $hash_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => $this->password_hash_cost]);
            
            // Get memeber type admin
            $where_member_admin = array();
            $where_member_admin['member_type_name'] = $this->Member_type->member_admin;
            $member_type = $this->Member_type->get_filter_single('*', $where_member_admin, null);
            
            // Get status default status is normal, ID = 1
            $status_id = 1;
            
            // Genearate token to confirmation
            //$token = $this->generate_token();
            
            // Prepare assoc to insert
            $insert_assoc = array();
            $insert_assoc['member_firstname'] = $name;
            $insert_assoc['member_email'] = $email;
            //$insert_assoc['member_token'] = $token;
            $insert_assoc['member_password'] = $hash_password;
            $insert_assoc['member_address'] = $address;
            $insert_assoc['member_type_id'] = $member_type->member_type_id;
            $insert_assoc['member_status_id'] = $status_id;
            
            // If found other data then add it
            if($data_assoc){
                $insert_assoc = array_merge($insert_assoc, $data_assoc);
            }
            
            // Insert to table
            // Start trans
            $this->db->trans_begin();
            
            // Add admin
            $add_result = $this->add($insert_assoc);
            
            if(!$add_result){
                return FALSE;
            }
            
            // Get insert member id
            $member_id = $this->db->insert_id();
            
            // Prepare admin data
            $insert_admin_assoc = array();
            $insert_admin_assoc['admin_username'] = $admin_name;
            $insert_admin_assoc['admin_level'] = $level;
            $insert_admin_assoc['admin_member_id'] = $member_id;
            
            // Load Admin model
            $this->CI->load->model('Admin');
            
            // Add admin
            $add_admin_result = $this->CI->Admin->add($insert_admin_assoc);
            if(!$add_admin_result){
                // Roll back if insert is not success
                $this->db->trans_rollback();
                return FALSE;
            }
            // End transaction
            $this->db->trans_commit();
            
            // Return added data
            $added_data_assoc = array_merge($insert_assoc, $insert_admin_assoc);
            return $added_data_assoc;
        }
        
        function add_member($firstname, $lastname, $email, $password, $address=''){
            /*
             *  Add member to system
             *
             *  @param  string  firstname
             *  @param  string  lastname
             *  @param  string  email use to login
             *  @param  string  password
             *  @param  string  address
             *
             *  @return bool    TRUE if add success or FALSE if not
             *  
             */
            
            // Encrypt password
            $hash_password = password_hash($password, PASSWORD_BCRYPT, $this->password_hash_option);
            
            // Get memeber type normal
            $where_member_normal = array();
            $where_member_normal['member_type_name'] = $this->Member_type->member_normal;
            $member_type = $this->Member_type->get_filter_single('*', $where_member_normal, null);
            
            // Get status default status is non-verify, ID = 6
            $status_id = 6;
            
            // Genearate token to confirmation
            $token = $this->generate_token();
            
            // Prepare assoc to insert
            $insert_assoc = array();
            $insert_assoc['member_firstname'] = $firstname;
            $insert_assoc['member_lastname'] = $lastname;
            $insert_assoc['member_email'] = $email;
            $insert_assoc['member_token'] = $token;
            $insert_assoc['member_password'] = $hash_password;
            $insert_assoc['member_address'] = $address;
            $insert_assoc['member_type_id'] = $member_type->member_type_id;
            $insert_assoc['member_status_id'] = $status_id;
            
            // Add member
            $add_result = $this->add($insert_assoc);
            if(!$add_result){
                return FALSE;
            }
            
            // Return added data
            $added_member = array();
            $added_member['member_id'] = $this->db->insert_id();
            $added_member = array_merge($added_member, $insert_assoc);
            unset($added_member['password']);
            
            return $added_member;
        }
        
        
        function get_member_by_id($member_id, $result_type='object'){
            /*
             *  Get member data by id
             *
             *  @param  int     member id
             *  
             */
            
            // Set where clause
            $where_assoc = array();
            $where_assoc['member_id'] = $member_id;
            
            // Get member
            $member = $this->get_filter_single('*', $where_assoc, null, $result_type);
            
            if(is_array($member)){
                unset($member['password']);
            }else{
                $member->password = null;
            }
            
            return $member;
        }
        
        
        function member_authentication($email, $password){
            /*
             *  Member Authentication
             *
             *  @param  string  email
             *  @param  string  password
             *
             *  @return object  authen member
             *  
             */
            
            // Get member data from email
            $where_assoc = array();
            $where_assoc['member_email'] = $email;
            // Join member type and status
            $join_member_type = $this->CI->gnc_query->get_join_table_assoc('member_type', 'member.member_type_id = member_type.member_type_id');
            $join_status = $this->CI->gnc_query->get_join_table_assoc('status', 'member.member_status_id = status.status_id');
            $join_array = [$join_member_type, $join_status];
            $member = $this->get_filter_single('*', $where_assoc, $join_array, 'array');
            
            // Check if not found member
            if(!$member){
                return NULL;
            }
            
            // Is member can login
            // Get verify time if null means non-verify member
            //if($member['member_verify_time'] == FALSE ){
            //    return NULL;
            //}
            
            // Check status
            if($member['status_name'] != $this->Status->status_normal){
                return NULL;
            }
            
            // Verify password
            $verify_password = password_verify($password, $member['member_password']);
            if(!$verify_password){
                return NULL;
            }
            
            // Check if need rehash
            if(password_needs_rehash($member['member_password'], PASSWORD_DEFAULT, $this->password_hash_option)){
                $hash_password = password_hash($password, PASSWORD_DEFAULT, $this->password_hash_cost);
            }
            
            // Unset unneccessary values
            unset($member['member_password']);
            unset($member['member_token']);
            
            // Return member assoc
            return $member;
        }
        
        function get_member_session_data_by_id($member_id){
            /*
             *  Get member data(type, status) by member id
             *
             *  @param  int     member id
             *
             */
            // Get member data from email
            $where_assoc = array();
            $where_assoc['member_id'] = $member_id;
            // Join member type and status
            $join_member_type = $this->CI->gnc_query->get_join_table_assoc('member_type', 'member.member_type_id = member_type.member_type_id');
            $join_status = $this->CI->gnc_query->get_join_table_assoc('status', 'member.member_status_id = status.status_id');
            $join_array = [$join_member_type, $join_status];
            $member = $this->get_filter_single('*', $where_assoc, $join_array, 'array');
            
            // Check if not found member
            if(!$member){
                return NULL;
            }
            
            // Unset unneccessary values
            unset($member['member_password']);
            unset($member['member_token']);
            
            // Return member assoc
            return $member;
        }
        
        function change_member_type($member_id, $new_member_type_id){
            /*
             *  change member type by id
             *
             *  @param  int member id
             *  @param  int new member type id from member type model
             *
             */
            
            // Set where assoc
            $where_assoc = array();
            $where_assoc['member_id'] = $member_id;
            
            // Set update data assoc
            $data_assoc = array();
            $data_assoc['member_type_id'] = $new_member_type_id;
            
            // Update
            $update_result = $this->update($where_assoc, $data_assoc);
            
            return $update_result;
            
        }
        
        
        function get_member_normal_data_list_admin($filter_assoc=array(), $result_type='object'){
            /*
             *  get member list 
             *
             */
            
            // Get data
            $offset = $filter_assoc['offset'];
            $limit = $filter_assoc['limit'];
            
            // Set where
            $where_assoc = array();
            $where_assoc['member_type_id'] = $this->Member_type->member_normal_id;
            
            // Build query
            $this->db->select('*, count(follow_id) as follow_count');
            $this->db->from($this->view);
            $this->db->join('follow', 'follow.follow_member_id = member_view.member_id', 'left');
            $this->db->where($where_assoc);
            $this->db->group_by('member_view.member_id');
            $this->db->offset($offset);
            $this->db->limit($limit);
            
            $query = $this->db->get();
            $result = $this->get_result($query, $result_type);
            
            // Get count
            $this->db->select('*, count(follow_id) as follow_count');
            $this->db->from($this->view);
            $this->db->join('follow', 'follow.follow_member_id = member_view.member_id', 'left');
            $this->db->where($where_assoc);
            $this->db->group_by('member_view.member_id');
            $count = $this->db->count_all_results();
            
            // Set data
            $data['result'] = $result;
            $data['count'] = $count;
            
            return $data;
            
        }
        
        function get_member_farmer_data_list_admin($filter_assoc=array(), $result_type='object'){
            /*
             *  get member farmer list 
             *
             */
            
            // Get data
            $offset = $filter_assoc['offset'];
            $limit = $filter_assoc['limit'];
            
            // Set where
            $where_assoc = array();
            $where_assoc['member_type_id'] = $this->Member_type->member_farmer_id;
            
            // Build query
            $this->db->select('*, count(follow_id) as follow_count, count(farm_id) as farm_count');
            $this->db->from($this->view);
            $this->db->join('follow', 'follow.follow_member_id = member_view.member_id', 'left');
            $this->db->join('farm', 'farm.farm_member_id = member_view.member_id', 'left');
            //$this->db->join('project', 'project.project_farm_id = farm.farm_id', 'left');
            $this->db->where($where_assoc);
            $this->db->group_by('member_view.member_id');
            $this->db->offset($offset);
            $this->db->limit($limit);
            
            $query = $this->db->get();
            $result = $this->get_result($query, $result_type);
            
            // Get count
            $this->db->select('*, count(follow_id) as follow_count, count(farm_id) as farm_count, count(project_id) as project_count');
            $this->db->from($this->view);
            $this->db->join('follow', 'follow.follow_member_id = member_view.member_id', 'left');
            $this->db->join('farm', 'farm.farm_member_id = member_view.member_id', 'left');
            $this->db->join('project', 'project.project_farm_id = farm.farm_id', 'left');
            $this->db->where($where_assoc);
            $this->db->group_by('member_view.member_id');
            $count = $this->db->count_all_results();
            
            // Set data
            $data['result'] = $result;
            $data['count'] = $count;
            
            return $data;
            
        }
    
    
        /*
         *  Add member that registered via facebook to DB
         *
         *  @param  assoc   facebook data
         *
         *  @return bool
         */
        function add_member_from_facebook($facebook_data){
            
            // Prepare data
            $member_data = array();
            $member_data['member_facebook_id'] = $facebook_data['id'];
            
            // Set membername
            $name_arr = explode(' ', $facebook_data['name']);
            
            $member_data['member_firstname'] = $name_arr[0];
            if(count($name_arr) > 1){
                $member_data['member_lastname'] = end($name_arr);
            }
            
            // Set email, password, verify time
            $member_data['member_email'] = $facebook_data['email'];
            $member_data['member_password'] = 'fb';
            $member_data['member_verify_time'] = date('Y-m-d H:i:s');
            
            // Set status and type
            $member_data['member_status_id'] = $this->CI->Status->status_normal_id;
            $member_data['member_type_id'] = $this->CI->Member_type->member_normal_id;
            
            // Add member
            $add_result = $this->add($member_data);
            
            if(!$add_result){
                return FALSE;
            }
            
            return TRUE;
            
        }
        
        /*
         *  Authen by facebook
         *
         *  @param  string  facebook id
         *  
         */
        function authen_by_facebook($facebook_id){
            
            // Get member by facebook id
            $where_assoc = array();
            $where_assoc['member_facebook_id'] = $facebook_id;
            // Join member type and status
            $join_member_type = $this->CI->gnc_query->get_join_table_assoc('member_type', 'member.member_type_id = member_type.member_type_id');
            $join_status = $this->CI->gnc_query->get_join_table_assoc('status', 'member.member_status_id = status.status_id');
            $join_array = [$join_member_type, $join_status];
            
            $member = $this->get_filter_single('*', $where_assoc, $join_array, 'array');
            
            // Check status
            if($member['status_name'] != $this->Status->status_normal){
                return NULL;
            }
            
            // Unset unneccessary values
            unset($member['member_password']);
            unset($member['member_token']);
            
            // Return member assoc
            return $member;
        }
    }