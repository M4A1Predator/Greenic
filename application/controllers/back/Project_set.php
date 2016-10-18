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
            $page = $this->uri->segment(3, null);
            
            $data['page'] = $page;
            
            // Get data
            $limit = $this->input->get('limit');
            $page_number = $this->input->get('pageNum');
            
            if(!$limit){
                $limit = 10;
            }
            
            if(!$page_number or !is_numeric($page_number)){
                $page_number = 1;
            }else{
                $page_number = (int) $page_number;
            }
            
            // Set offset
            $offset = ($page_number * $limit) - $limit;
            
            //Get uri
            $page_name = $this->uri->segment(3);
            
             // Set filter data
            $filter_assoc = array();
            $filter_assoc['offset'] =   $offset;
            $filter_assoc['limit'] = $limit;
            
            $page = 'allProject';
            
            //Set  where
            $where_assoc = array();
            
             $group_by = '';
            if($farm_id = $this->uri->segment(4)){
                $farm_id = $this->uri->segment(4);
             $where_assoc['farm_id'] = $farm_id;    
             $group_by = 'project_id';
            }
            
            //Get all project
          if($page_name == $this->Page_manage->page_allProject ){
                $project_data = $this->Project->get_all_project($filter_assoc);
                $page = 'allProject';
                
            }else if($page_name == $this->Page_manage->page_allFarm){
                $project_data = $this->Farm->get_all_farm($filter_assoc);
               
                $page = 'allFarm';
                
            }else if($page_name == $this->Page_manage->page_allCategory){
                $project_data = $this->Project->get_all_category($filter_assoc);
                $project_data['count'] = 1;
                $page = 'allCategory';
                
            }else if($page_name == $this->Page_manage->page_allUnit){
                $project_data = $this->Unit->get_all_unit($filter_assoc);
                 
                $page = 'allUnit';
                
            }else if($page_name == $this->Page_manage->page_getFarmId){
                $project_data = $this->Farm->admin_get_farm_by_id($where_assoc,$group_by,$filter_assoc);
                
                $page = 'allProject';
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
             $data['page_number'] = $page_number;
             $data['count_data'] = $project_data['count'];
             
              // Set page amount
            $page_amount = 1;
            
            if($project_data['count'] > $limit){
                
                if($project_data['count'] % $limit !== 0){
                    $page_amount = ($project_data['count'] / $limit) + 1;
                }else{
                    $page_amount = ($project_data['count']/ $limit);
                }
            }
            
            $data['page_amount'] = $page_amount;
            $data['limit'] = $limit;
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
            
            
            $group_by ='project_id';
            //query
            $project_data =$this->Project->admin_get_project_by_id($where_assoc, $group_by);
            $project_shipment =$this->Project->admin_get_project_by_id($where_assoc);
            
            $data['project_detail'] = $project_data['result'];
            $data['project_ship'] = $project_shipment['result'];
            
            $data['page'] = $page;
            
            // Load view
            $this->load->view('back/index', $data);
            
            
        }
        
          function farm_detail(){
            $data = array();
            
            //set value
            $farm_edit = 'editFarm';
            //get member id
            $farm_id = $this->uri->segment(3);
            
            //set page
            $page_set = $this->uri->segment(2);
            $page='farmDetail';
            if($page_set==$farm_edit){
                $page='editFarm';
            }else{
                $page='farmDetail';
            }
            $where_assoc['farm_id'] = $farm_id;
            $where_assoc['offset'] = 0;
            
            //query
            $farm_data =$this->Farm->admin_get_farm_by_id($where_assoc);
            
            $data['farm_detail'] = $farm_data['result'];
            $data['page'] = $page;
            
            // Load view
            $this->load->view('back/index', $data);
            
            
        }
    }