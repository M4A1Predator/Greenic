<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Project_set extends MY_Controller{

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
        function project_list(){
          /*
           *  Display  list page
           *
           */

          // Get data
          $page_number = $this->input->get('page_number');
          if(!$page_number){
              $page_number = 1;
          }
          $limit = 20;
            
            $page_name = $this->uri->segment(3);
             // Set filter data
            $filter_assoc = array();
            $filter_assoc['offset'] = 0;
            $filter_assoc['limit'] = null;
            
            $page = 'allProject';
           
              
          if($page_name == $this->Page_manage->page_allProject ){
              
                $project_data = $this->Project->get_all_project($filter_assoc);
                $page = 'allProject';
            }else if($page_name == $this->Page_manage->page_allFarm){
                $project_data = $this->Farm->get_all_farm($filter_assoc);
                $page = 'allFarm';
            }else if($page_name == $this->Page_manage->page_allCategory){
                $project_data = $this->Project->get_all_category($filter_assoc);
               
                $page = 'allCategory';
            }else if($page_name == $this->Page_manage->page_allUnit){
                 $project_data = $this->Unit->get_all_unit($filter_assoc);
                $page = 'allUnit';
            }else{
                return;
            }
              // Set page name
            $data = array();
            $data['page'] = $page;
            
                        // Get project
                if (!$project_data) {
                        die('Invalid query: ' . mysql_error());
                    }
        
             $data['projects'] = $project_data['result'];
         
            // Load view
            $this->load->view('back/index', $data);
        }
        
        function project_detail(){
            $data = array();
            
            //set value
            $project_edit = 'projectEdit';
            //get member id
            $project_id = $this->uri->segment(3);
            
            //set page
            $page_set = $this->uri->segment(2);
            $page='projectDetail';
            if($page_set==$project_edit){
                $page='projectEdit';
            }else{
                $page='projectDetail';
            }
            $where_assoc['project_id'] = $project_id;
            
            
            
            //query
            $project_data =$this->Project->admin_get_project_by_id($where_assoc);
            print_r($project_data);   
            $data['project_detail'] = $project_data['result'];
            $data['page'] = $page;
            
            // Load view
            $this->load->view('back/index', $data);
            
            
        }
    }