<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Vote_review_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function send_vote_review_ajax(){
            
            // Check login first
            if($this->is_sign_in == FALSE){
                echo 0;
                return;
            }
            
            $this->load->library('form_validation');
            
            // Create form rules
            $this->form_validation->set_rules('review_id', 'review_id', 'required|numeric');
            $this->form_validation->set_rules('agree', 'agree', 'required|regex_match[/[01]{1}/]');
            
            // Check form
            if($this->form_validation->run() == FALSE){
                echo 'input error';
                return;
            }
            
            // Get data
            $review_id = $this->input->post('review_id');
            $agree = $this->input->post('agree');
            $member_id = $this->session->userdata('member_id');
            
            // Check have vote this review
            if($this->Vote_review->is_member_ever_vote_review($review_id, $member_id) === TRUE){
                echo 'voted';
                return;
            }
            
            // Add vote review
            $add_result = $this->Vote_review->add_vote_review($review_id, $agree, $member_id);
            
            if(!$add_result){
                echo 'add failed';
                return;
            }
            
            echo 1;
            return;
        }
        
        function get_vote_reviews_of_project_ajax(){
            
            // Get data
            $project_id = $this->input->get('project_id');
            
            $vote_review_data = $this->Vote_review->vote_review_by_project_id($project_id, 'array');
            
            $vote_review_arr = $vote_review_data['result'];
            
            // Make it json
            $vote_review_data_json = json_encode($vote_review_data, JSON_UNESCAPED_UNICODE);
            
            $this->output->set_output($vote_review_data_json);
        }
        
        
    }