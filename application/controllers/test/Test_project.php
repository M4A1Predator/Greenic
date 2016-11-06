<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Test_project extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function add(){
            //$project_data_assoc = array();
            //$project_data_assoc['project_name'] = 'TEST';
            //$project_data_assoc['project_detail'] = 'DES';
            //$project_data_assoc['project_startdate'] = '2016-12-10';
            //$project_data_assoc['project_selldate'] = '2016-11-11';
            //$project_data_assoc['project_quantity'] = 100;
            //$project_data_assoc['project_ppu'] = 20;
            //$project_data_assoc['project_lowest_order'] = 0;
            //$project_data_assoc['project_category_id'] = 13;
            //$project_data_assoc['project_breed_id'] = 1;
            //$project_data_assoc['project_unit_id'] = 1;
            //$project_data_assoc['project_farm_id'] = 3;
            
            $project_data_assoc = array();
            $project_data_assoc['project_name'] = $this->session->userdata('add_project_name');
            $project_data_assoc['project_detail'] = $this->session->userdata('add_project_detail');
            $project_data_assoc['project_startdate'] = $this->session->userdata('add_project_start_date');
            $project_data_assoc['project_selldate'] = $this->session->userdata('add_project_sell_date');
            $project_data_assoc['project_quantity'] = $this->session->userdata('add_project_quantity');
            $project_data_assoc['project_ppu'] = $this->session->userdata('add_project_ppu');
            $project_data_assoc['project_lowest_order'] = $this->session->userdata('add_project_lowest_order');
            $project_data_assoc['project_category_id'] = $this->session->userdata('add_project_category_id');
            if($this->session->userdata('add_project_breed_id')){
                //$project_data_assoc['project_breed_id'] = $this->session->userdata('add_project_breed_id');
                
            }
            $project_data_assoc['project_unit_id'] = $this->session->userdata('add_project_unit_id');
            $project_data_assoc['project_farm_id'] = $this->session->userdata('add_project_farm_id');
            
            $r = $this->Project->add_project($project_data_assoc);
            $this->db->trans_rollback();
            echo var_dump($r);
        }
        
        
        function check_owner(){
            $member_id = $this->session->userdata('member_id');
            $project_id = $this->input->get('pid');
            
            echo $member_id.'<br/>';
            echo $project_id.'<br/>';
            echo $num = 14;
            echo '<br/>';
            
            $o = $this->Project->is_project_owner($num, $project_id);
            echo var_dump($o);
        }
        
        
    }