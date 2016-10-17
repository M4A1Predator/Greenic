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

    }