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
            $where_assoc = array();
             $group_by = '';
            if($farm_id = $this->uri->segment(4)){
                $farm_id = $this->uri->segment(4);
             $where_assoc['farm_id'] = $farm_id;
             $group_by = 'project_id';
            }
          if($page_name == $this->Page_manage->page_allProject ){
              
                $project_data = $this->Project->get_all_project($filter_assoc);
                
            }else if($page_name == $this->Page_manage->page_allFarm){
                $project_data = $this->Farm->get_all_farm($filter_assoc);
                
                $page = 'allFarm';
            }else if($page_name == $this->Page_manage->page_allCategory){
                $project_data = $this->Project->get_all_category($filter_assoc);
               
                $page = 'allCategory';
            }else if($page_name == $this->Page_manage->page_allUnit){
                 $project_data = $this->Unit->get_all_unit($filter_assoc);
                $page = 'allUnit';
            }else if($page_name == $this->Page_manage->page_getFarmId){
                $project_data = $this->Farm->admin_get_farm_by_id($where_assoc,$group_by);
                
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
            
            
            
            //query
            $farm_data =$this->Farm->admin_get_farm_by_id($where_assoc);
            
            $data['farm_detail'] = $farm_data['result'];
            $data['page'] = $page;
            
            // Load view
            $this->load->view('back/index', $data);
            
            
        }
    }