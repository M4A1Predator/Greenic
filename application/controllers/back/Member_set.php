<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Member_set extends MY_Controller{

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

        function member_list_page(){
            /*
             *  Display member list page
             *
             */

            // Get data
            $page_number = $this->input->get('page_number');
            if(!$page_number){
                $page_number = 1;
            }
            $limit = 20;

            // Get member type bt URI fragment
            $member_type_name = $this->uri->segment(3);

            // Set member type id
            $member_type_id = 1;
            $page = 'memberBasic';
            if($member_type_name == $this->Member_type->member_farmer){
                $member_type_id = $this->Member_type->member_farmer_id;
                $page = 'memberFarmer';
            }else if($member_type_name == $this->Member_type->member_normal){
                $member_type_id = $this->Member_type->member_normal_id;
                $page = 'memberBasic';
            }else{
                return;
            }

            // Set page name
            $data = array();
            $data['page'] = $page;

            // Get members
            $where_assoc = array();
            $where_assoc['member_type_id'] = $member_type_id;
            //$where_assoc['member_status_id !='] = $this->Status->status_removed_id;

            // Set filter data
            $filter_assoc = array();
            $filter_assoc['offset'] = 0;
            $filter_assoc['limit'] = null;

            // Filter normal members
            if($member_type_name == $this->Member_type->member_normal){
                $member_data = $this->Member->get_member_normal_data_list_admin($filter_assoc);
            // Filter farmer members
            }else if($member_type_name == $this->Member_type->member_farmer){
                $member_data = $this->Member->get_member_farmer_data_list_admin($filter_assoc);
            }

            $data['members'] = $member_data['result'];
            
            if(isset($member_data['result2'])){
                $data['members2'] = $member_data['result2'];
            }
            
            if(isset($member_data['result3'])){
                $data['members3'] = $member_data['result3'];
            }
            
            $data['member_count'] = $member_data['count'];
            $data['page_number'] = $page_number;
            $data['limit'] = $limit;

            // Load view
            $this->load->view('back/index', $data);

        }
        function member_detail(){
            $data = array();

            // Get member id bt URI fragment
            $member_edit = 'memberEdit';

            $member_id = $this->uri->segment(3);
            $page_set = $this->uri->segment(2);
            $page='basicDetail';
            if($page_set==$member_edit){
                $page='memberEdit';
            }else{
                $page='basicDetail';
            }
            $data['view_use']='member_id';
            $where_assoc = array();
            $where_assoc['member_id'] = $member_id;
            //$where_assoc['member_status_id !='] = $this->Status->status_removed_id;

            $member_data = $this->Member->get_filter('*',$where_assoc);

            $data['page'] = $page;
            $data['member_detail'] = $member_data;

            // Load view
            $this->load->view('back/index', $data);


        }

        function farmer_detail(){
            $data = array();

            //get member id
            $member_id = $this->uri->segment(3);
            $where_assoc['member_id'] = $member_id;
            //$where_assoc['member_status_id !='] = $this->Status->status_removed_id;

            //set page
            $page = 'farmerDetail';

            //query
            $farmer_data =$this->Member->get_member_farmer_by_id($where_assoc);

            $data['farmer_detail'] = $farmer_data['result'];
            $data['page'] = $page;

            // Load view
            $this->load->view('back/index', $data);

        }

        function remove_member_ajax(){
            
            // Get data
            $remove_member_id = $this->input->post('remove_member_id');
            
            // update
            $where_assoc = array();
            $where_assoc['member_id'] = $remove_member_id;
            
            $update_data = array();
            $update_data['member_status_id'] = $this->Status->status_removed_id;
            
            $res = $this->Member->update($where_assoc, $update_data);
            
            if(!$res){
                $err_assoc = array('err'=>'update failed');
                echo json_encode($err_assoc);
                return;
            }
            
            echo 1;
        }
        
        function ban_member_ajax(){
            
            // Get data
            $remove_member_id = $this->input->post('remove_member_id');
            
            // update
            $where_assoc = array();
            $where_assoc['member_id'] = $remove_member_id;
            
            $update_data = array();
            $update_data['member_status_id'] = $this->Status->status_banned_id;
            
            $res = $this->Member->update($where_assoc, $update_data);
            
            if(!$res){
                $err_assoc = array('err'=>'update failed');
                echo json_encode($err_assoc);
                return;
            }
            
            echo 1;
        }
        
        function unban_member_ajax(){
            
            // Get data
            $remove_member_id = $this->input->post('remove_member_id');
            
            // update
            $where_assoc = array();
            $where_assoc['member_id'] = $remove_member_id;
            
            $update_data = array();
            $update_data['member_status_id'] = $this->Status->status_normal_id;
            
            $res = $this->Member->update($where_assoc, $update_data);
            
            if(!$res){
                $err_assoc = array('err'=>'update failed');
                echo json_encode($err_assoc);
                return;
            }
            
            echo 1;
        }
        

    }
