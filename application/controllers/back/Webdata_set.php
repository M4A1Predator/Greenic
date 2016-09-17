<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Webdata_set extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('GNC_admin_authen');
            
            // Load model
            
            // Do filter
            $this->is_sign_in = $this->gnc_admin_authen->is_sign_in();
            $this->gnc_admin_authen->redirect_if_not_sign_in();
            // Init
            
        }
        
        function about_page(){
            // Load about page
            
            $page = $this->uri->segment(3);
            
            // Get data
            $where_assoc = array();
            $where_assoc['webdata_name'] = 'about';
            
            $abouts = $this->Webdata->get_filter('*', $where_assoc);
            
            $about = $abouts[0];
            
            // Set data
            $data['page'] = $page;
            $data['about'] = $about;
            
            // Load view
            $this->load->view('back/index', $data);
            ob_flush();
            
        }
        
        function edit_about_ajax(){
            // Get data
            $about = $this->input->post('about');
            
            // Update data
            $where_assoc['webdata_name'] = 'about';
            
            $update_data['webdata_value'] = $about;
            
            $result = $this->Webdata->update($where_assoc, $update_data);
            if(!$result){
                echo 'update failed';
                return;
            }
            
            echo 1;
        }
        
        function terms_page(){
            $page = $this->uri->segment(3);
            
            // Get data
            $where_assoc = array();
            $where_assoc['webdata_name'] = 'terms';
            
            $results = $this->Webdata->get_filter('*', $where_assoc);
            
            $terms = $results[0];
            
            // Set data
            $data['page'] = $page;
            $data['terms'] = $terms;
            // Load view
            $this->load->view('back/index', $data);
            ob_flush();
        }
        
        function edit_terms_ajax(){
            // Get data
            $terms = $this->input->post('terms');
            
            // Update data
            $where_assoc['webdata_name'] = 'terms';
            
            $update_data['webdata_value'] = $terms;
            
            $result = $this->Webdata->update($where_assoc, $update_data);
            if(!$result){
                echo 'update failed';
                return;
            }
            
            echo 1;
        }
        
        function agreement_page(){
            $page = $this->uri->segment(3);
            
            // Get data
            $where_assoc = array();
            $where_assoc['webdata_name'] = 'agreement';
            
            $results = $this->Webdata->get_filter('*', $where_assoc);
            
            $agreement = $results[0];
            
            // Set data
            $data['page'] = $page;
            $data['agreement'] = $agreement;
            // Load view
            $this->load->view('back/index', $data);
            ob_flush();
        }
        
        function edit_agreement_ajax(){
            // Get data
            $agreement = $this->input->post('agreement');
            
            // Update data
            $where_assoc['webdata_name'] = 'agreement';
            
            $update_data['webdata_value'] = $agreement;
            
            $result = $this->Webdata->update($where_assoc, $update_data);
            if(!$result){
                echo 'update failed';
                return;
            }
            
            echo 1;
            
        }
        
    
        function web_setting_page(){
            
            $page = $this->uri->segment(3);
            
            // Get data
            
            // Set data
            $data['page'] = $page;
            
            // Load view
            $this->load->view('back/index', $data);
            ob_flush();
            
        }
    }