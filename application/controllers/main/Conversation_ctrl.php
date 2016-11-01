<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Conversation_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function get_conversations_ajax(){
            
            // Get data
            $member_id = $this->session->userdata('member_id');
            
            // Get conversations
            $con_data = array();
            $con_data['member_id'] = $member_id;
            
            $conversation_data = $this->Conversation->get_member_conversations($con_data);
            $conversation_arr = $conversation_data['conversation_arr'];
            
            // Set data
            $data = array();
            $data['conversationData'] = $conversation_data;
            
            // json
            $data_json = json_encode($data, JSON_UNESCAPED_UNICODE);
            
            $this->output->set_output($data_json);
            
        }
        
        
    }