<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Conversation extends MY_Model{
        
        public $table = 'conversation';
        
        function __construct(){
            parent::__construct();
        }
        
        function get_conversation($data, $result_type='array'){
            
            $member_a_id = $data['member_a_id'];
            $member_b_id = $data['member_b_id'];
            
            $where_a = array(
                'conversation_member_a_id' => $member_a_id,
                'conversation_member_b_id' => $member_b_id,
            );
            $where_b = array(
                'conversation_member_a_id' => $member_b_id,
                'conversation_member_b_id' => $member_a_id,
            );
            
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->group_start();
            $this->db->where($where_a);
            $this->db->group_end();
            $this->db->or_group_start();
            $this->db->where($where_b);
            $this->db->group_end();
            $query = $this->db->get();
            
            $result = $this->get_result($query, $result_type);
            if(!$result){
                return null;
            }
            $conversation = $result[0];
            
            return $conversation;
            
        }
        
        function create_conversation($data){
            
            $conversation_data = array();
            $conversation_data['conversation_member_a_id'] = $data['member_a_id'];
            $conversation_data['conversation_member_b_id'] = $data['member_b_id'];
            
            $res = $this->db->insert($this->table, $conversation_data);
            if(!$res){
                return FALSE;
            }
            
            return $this->db->insert_id();
            
        }
        
        function get_member_conversations($data, $result_type='array'){
            
            // Get columns
            $member_field_arr = $this->db->list_fields('member_view');
            $select = 'conversation.* , ';
            foreach($member_field_arr as $field){
                if($field == 'member_password'){
                    continue;
                }
                $select .= 'member_a.'.$field.' as '.$field.'_a, ';
                $select .= 'member_b.'.$field.' as "'.$field.'_b", ';
            }
            // Get conversations
            //$this->db->select("conversation_id as id, member_a.member_firstname as member_firstname_a, member_b.member_firstname as nameb");
            $this->db->select($select);
            $this->db->from($this->table);
            $this->db->join('member_view as member_a', 'member_a.member_id = conversation_member_a_id');
            $this->db->join('member_view as member_b', 'member_b.member_id = conversation_member_b_id');
            $this->db->group_start();
            $this->db->where('conversation_member_a_id', $data['member_id']);
            $this->db->or_where('conversation_member_b_id', $data['member_id']);
            $this->db->group_end();
            $this->db->order_by('conversation_time DESC');
            $query = $this->db->get();
            
            $result = $this->get_result($query, $result_type);
            
            // Set data
            $res_data = array();
            $res_data['conversation_arr'] = $result;
            
            return $res_data;
            
        }
        
        function update_conversation_time($conversation_id){
            
            if(!is_numeric($conversation_id)){
                return FALSE;
            }
            
            // Update timestamp
            //$update_data = array();
            ////$update_data['conversation_time'] = 'CURRENT_TIMESTAMP';
            //$update_data['conversation_time'] = 'DATE_ADD(NOW(), INTERVAL 1 MINUTE)';
            //
            //$where_assoc = array();
            //$where_assoc['conversation_id'] = $conversation_id;
            //
            //$this->update($where_assoc, $update_data);
            
            $query = $this->db->query("UPDATE greenic_conversation 
                  SET  
                     conversation_time = DATE_ADD(NOW(), INTERVAL 10 SECOND)
                  WHERE conversation_id = ".$conversation_id."");
            
            return $query;
            
        }
        
        function get_all_conversation_count(){
            $where_assoc = array();
            //$where_assoc['conversation_status_id'] = $this->CI->Status->status_normal_id;
            
            $this->db->select('count(conversation_id) as conversation_count');
            $this->db->from($this->table);
            $this->db->where($where_assoc);
            $query = $this->db->get();
            
            $result = $this->get_result($query, 'object');
            
            $count = $result[0]->conversation_count;
            return $count;
        }
    
    }