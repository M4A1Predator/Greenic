<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Test_general extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            $this->load->library('GNC_image');
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function test(){
            //$n = $this->Product_shipment->get_product_shipment_by_project_id(18);
            //echo json_encode($n, JSON_UNESCAPED_UNICODE);
            //echo var_dump($this->session->userdata('rekt'));
            //echo $this->input->server('REQUEST_METHOD');
            //echo var_dump($this->is_sign_in);
            
            echo $this->gnc_image->default_member_img_path;
        }
        
        
    }