<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Review_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function send_review_ajax(){
            /*
             *  Member send review
             *  
             */
            if($this->is_sign_in == FALSE){
                echo 0;
                return;
            }
            
            // Create form rules
            $this->load->library('form_validation');
            $this->form_validation->set_rules('rate', 'rate', 'required');
            $this->form_validation->set_rules('comment', 'comment', 'required');
            $this->form_validation->set_rules('buy_date', 'buy_date', 'required');
            $this->form_validation->set_rules('buy_amount', 'buy_amount', 'required');
            $this->form_validation->set_rules('project_id', 'project_id', 'required');
            
            // Validate form
            if($this->form_validation->run() == FALSE){
                echo validation_errors();
                echo '{"error": "wrong input"}';
                return;
            }
            
            // Get data
            $rate = $this->input->post('rate');
            $comment = $this->input->post('comment');
            $buy_date = $this->input->post('buy_date');
            $buy_amount = $this->input->post('buy_amount');
            $member_id = $this->session->userdata('member_id');
            $project_id = $this->input->post('project_id');
            
            // Add review data to DB
            $review_data = array();
            $review_data['review_member_id'] = $member_id;
            $review_data['review_rate'] = $rate;
            $review_data['review_comment'] = $comment;
            $review_data['review_buydate'] = $buy_date;
            $review_data['review_buyamount'] = $buy_amount;
            $review_data['review_project_id'] = $project_id;
            
            $add_result = $this->Review->add($review_data);
            
            if($add_result == FALSE){
                echo 'add error';
                return;
            }
            
            echo 1;
            
        }
        
        
        function get_project_reviews_ajax(){
            /*
             *  Get project reviews and analyst data
             *
             */
            
            // Get data
            $project_id = $this->input->get('project_id');
            
            // Set up filter
            $filter_assoc = array();
            $filter_assoc['limit'] = null;
            $filter_assoc['offset'] = 0;
            
            // Get reviews
            $review_data= $this->Review->get_review_data_by_project_id($project_id, $filter_assoc, 'array');
            $review_arr = $review_data['result'];
            $review_count = $review_data['count'];
            
            // Analyze
            // Set review rate
            $review_rate = 0.0;
            $total_rate = 0;
            $rate_select_arr = [0, 0, 0, 0, 0];
            foreach($review_arr as $review){
                $rate = (int)$review['review_rate'];
                
                $rate_select_arr[$rate-1] += 1;
                
                $total_rate += $rate;
            }
            $review_rate = (float)($total_rate / $review_count);
            
            // Count review rate
            
            
            // Set data
            $data = array();
            $data['review_rate'] = $review_rate;
            $data['reviews'] = $review_arr;
            $data['review_count'] = $review_count;
            $data['rate_select_arr'] = $rate_select_arr;
            
            // JSON encode
            $data_json = json_encode($data, JSON_UNESCAPED_UNICODE);
            
            $this->output->set_output($data_json);
            
        }
    
    }