<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Chat_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function main_chat_page(){
            $this->load->view('main/chatMain');
        }
        
        function conversation_page($farmer_id=0){
            
            // Filter
            if($farmer_id === 0 || !is_numeric($farmer_id)){
                redirect('/chat');
                return;
            }
            
            // Get farmer data
            $where_assoc = array();
            $where_assoc['member_id'] = $farmer_id;
            
            $farmer = $this->Member->get_member_view_by_id($farmer_id);
            if(!$farmer){
                redirect('/chat');
                return;
            }
            
            // Set data
            $data = array();
            $data['farmer'] = $farmer;
            
            $this->load->view('main/chatMessage', $data);
        }
        
        
    }