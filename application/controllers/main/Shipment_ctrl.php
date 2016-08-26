<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // On start
    class Shipment_ctrl extends MY_Controller{
        
        function __construct(){
            parent::__construct();
            
            // Load helper
            
            // Load library
            
            // Load model
            
            // Do filter
            
            // Init
            
        }
        
        function get_project_shipments_ajax($project_id){
            /*
             *  Get product shipment methods
             *  from project id
             *
             *  @param  int     project id
             *  
             */
            
            // Get shipment methods
            $shipment_arr = $this->Product_shipment->get_product_shipment_by_project_id($project_id, 'array');
            
            // Encode JSON
            $shipment_arr_json = json_encode($shipment_arr, JSON_UNESCAPED_UNICODE);
            
            echo $shipment_arr_json;
        }
        
        
    }