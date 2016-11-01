<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Chat_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('form_validation');
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function main_chat_page(){
            $this->gnc_authen->redirect_if_not_sign_in();
            
            // Get data
            $member_id = $this->session->userdata('member_id');
            
            
            $this->load->view('main/chatMain');
        }
        
        function conversation_page($receiver_id=0){
            $this->gnc_authen->redirect_if_not_sign_in();
            // Filter
            if($receiver_id === 0 || !is_numeric($receiver_id)){
                redirect('/chat');
                return;
            }
            
            $member_id = $this->session->userdata('member_id');
            
            // Get $receiver data
            $where_assoc = array();
            $where_assoc['member_id'] = $receiver_id;
            
            $receiver = $this->Member->get_member_view_by_id($receiver_id);
            if(!$receiver){
                redirect('/chat');
                return;
            }
            
            // Get conversation data
            $conversation_data['member_a_id'] = $member_id;
            $conversation_data['member_b_id'] = $receiver_id;
            $conversation = $this->Conversation->get_conversation($conversation_data, 'array');
            if(!$conversation){
                // Create if not found
                $conversation_id = $this->Conversation->create_conversation($conversation_data);
                if(!$conversation_id){
                    echo 'create con err';
                    return;
                }
                $conversation = $this->Conversation->get_conversation($conversation_data, 'array');
            }
        
            // Set data
            $data = array();
            $data['receiver'] = $receiver;
            $data['conversation'] = $conversation;
            
            $this->load->view('main/chatMessage', $data);
        }
        
        function get_conversation_message_list_ajax(){
            // Check login
            if(!$this->is_sign_in){
                echo 0;
                return;
            }
            
            // Get data
            $member_id = $this->session->userdata('member_id');
            $receiver_id = $this->input->get('receiver_id');
            $conversation_id = $this->input->get('conversation_id');
            
            // Get messages
            $where_assoc = array();
            //$where_assoc['chat_sender_id'] = $member_id;
            //$where_assoc['chat_receiver_id'] = $receiver_id;
            $where_assoc['chat_conversation_id'] = $conversation_id;
            $order_by = 'chat_sendtime ASC';
            
            $message_arr = $this->Chat->get_filter('*', $where_assoc, null, $order_by, null, 120, 'array');
            $data = array();
            $data['messageList'] = $message_arr;
            
            // make it JSON
            
            $data_json = json_encode($data, JSON_UNESCAPED_UNICODE);
            
            $this->output->set_output($data_json);
            
        }
        
        function get_recent_chat_members_ajax(){
            
            // Get data
            $member_id = $this->session->userdata('member_id');
            
        }
        
        function send_message_ajax(){
            
            $this->form_validation->set_rules('sender', 'sender', 'required|numeric');
            $this->form_validation->set_rules('message', 'message', 'trim|required|max_length[300]');
            $this->form_validation->set_rules('receiver', 'receiver', 'required|numeric');
            $this->form_validation->set_rules('conversation_id', 'conversation_id', 'required|numeric');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                $err_arr = array(
                        'msg' => validation_errors()
                    );
                $err_json = json_encode($err_arr);
                echo $err_json;
                return;
            }
            
            // Check login
            if(!$this->is_sign_in){
                echo 0;
                return;
            }
            
            // Get data
            $member_id = $this->session->userdata('member_id');
            $message = $this->input->post('message');
            $receiver_id = $this->input->post('receiver');
            $conversation_id = $this->input->post('conversation_id');
            
            // set data
            //$now_time
            $chat_data = array();
            //$chat_data['chat_sender_id'] = $member_id;
            //$chat_data['chat_receiver_id'] = $receiver_id;
            $chat_data['chat_member_id'] = $member_id;
            $chat_data['chat_conversation_id'] = $conversation_id;
            $chat_data['chat_message'] = $message;
            
            // Add to DB
            $add_result = $this->Chat->add($chat_data);
            if(!$add_result){
                $err_arr = array(
                        'msg' => 'add error'
                    );
                $err_json = json_encode($err_arr);
                echo $err_json;
                return;
            }
            
            // Send to socket by Library
            $send_result = $this->gnc_socket->send_message($chat_data);
            if(!$send_result){
                $err_arr = array(
                        'msg' => 'send error'
                    );
                $err_json = json_encode($err_arr);
                echo $err_json;
                return;
            }
            $this->Conversation->update_conversation_time($conversation_id);
            
            echo 1;
            
        }
        
        
    }