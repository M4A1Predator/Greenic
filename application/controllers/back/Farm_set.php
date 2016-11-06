<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Farm_set extends MY_Controller{
        
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
        
        function remove_farm_ajax(){
            
            // Get data
            $farm_id = $this->input->post('farm_id');
            
            // Update
            $where_assoc = array(
                    'farm_id' => $farm_id,
                );
            
            $update_data = array();
            $update_data['farm_status_id'] = $this->Status->status_removed_id;
            
            $res = $this->Farm->update($where_assoc, $update_data);
            
            if(!$res){
                $err_assoc = array('err'=>'update failed');
                echo json_encode($err_assoc);
                return;
            }
            
            echo 1;
            
        }
        
    }