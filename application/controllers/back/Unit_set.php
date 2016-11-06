<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Unit_set extends MY_Controller{
        
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
        
        function all_unit_page(){
            
            // Get units
            $where_assoc = array();
            $join_project = $this->gnc_query->get_join_table_assoc('project', 'project.project_unit_id = unit.unit_id', 'left');
            $extra = array();
            $extra['group_by'] = 'unit.unit_id';
            $units = $this->Unit->get_filter('unit.*, count(project_id) as project_count', $where_assoc, [$join_project], null, null, null, 'object', $extra);
            
            $data['page'] = 'allUnit';
            $data['units'] = $units;
            
            $this->load->view('back/index', $data);
        }
        
        function add_unit_page(){
            
            // Set data
            $data = array();
            $data['page'] = 'addUnit';
            
            // Load view
            $this->load->view('back/index', $data);
            
        }
        
        function add_unit_ajax(){
            // Get data
            $unit_name = $this->input->post('unit_name');
            
            // Get member id
            $member_id = $this->session->userdata('member_id');
            
            $unit_data = array();
            $unit_data['unit_name'] = $unit_name;
            $unit_data['unit_creator_id'] = $member_id;
            
            // Check dup
            $is_dup = $this->Unit->is_dup($unit_data);
            if($is_dup === TRUE){
                $err_assoc = array('err'=>'duplicated');
                echo json_encode($err_assoc);
                return;
            }
            
            // Add
            $result = $this->Unit->add($unit_data);
            if(!$result){
                $err_assoc = array('err'=>'add failed');
                echo json_encode($err_assoc);
                return;
            }
            
            echo 1;
        }
        
        function edit_unit_page($unit_id=0){
            
            if($unit_id === 0){
                redirect('/gnc_admin');
                return;
            }
            // Get unit
            $where_assoc = array();
            $where_assoc['unit_id'] = $unit_id;
            $units = $this->Unit->get_filter('*', $where_assoc);
            if(!$units){
                redirect('/gnc_admin');
                return;
            }
            
            $unit = $units[0];
            
            $data = array();
            $data['page'] = 'editUnit';
            $data['unit'] = $unit;
            
            $this->load->view('back/index', $data);
        }
        
        function edit_unit_ajax($unit_id=0){
            if($unit_id === 0){
                echo 0;
                return;
            }
            
            // Get data
            $unit_name = $this->input->post('unit_name');
            
            // Update unit
            $where_assoc = array();
            $where_assoc['unit_id'] = $unit_id;
            
            $unit_data = array();
            $unit_data['unit_name'] = $unit_name;
            
            $result = $this->Unit->update($where_assoc, $unit_data);
            if(!$result){
                $err_assoc = array('err'=>'update failed');
                echo json_encode($err_assoc);
                return;
            }
            
            echo 1;
            
        }
        
        function remove_unit_ajax(){
            
            // Get data
            $unit_id = $this->input->post('unit_id');
            
            // Remove!
            $where_assoc = array();
            $where_assoc['unit_id'] = $unit_id;
            
            $res = $this->Unit->remove($where_assoc);
            if(!$res){
                $err_assoc = array('err'=>'remove failed');
                echo json_encode($err_assoc);
                return;
            }
            
            echo 1;
            
        }

    }