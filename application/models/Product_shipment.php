<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // On start
    
    class Product_shipment extends MY_Model{
        
        public $table = 'product_shipment';
        
        function __construct(){
            parent::__construct();
        }
        
        function get_product_shipment_by_project_id($project_id, $result_type='object'){
            /*
             *  Get shipment methods by project id
             *
             *  @param  int project id
             *
             */
            
            // Get shipment methods
            // Set where
            $where_assoc = array();
            $where_assoc['product_shipment_project_id'] = $project_id;
            // Set join
            $join_shipment = $this->CI->gnc_query->get_join_table_assoc($this->Shipment->table, 'shipment.shipment_id = product_shipment.product_shipment_shipment_id');
            $join_arr = [$join_shipment];
            
            // Get shipment
            $shipments = $this->get_filter('*', $where_assoc, $join_arr, null, null, null, $result_type);
            
            return $shipments;
        }
        
    }